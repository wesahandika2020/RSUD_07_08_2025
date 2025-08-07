<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-05-09 00:14:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 00:14:21 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('743134', '2025-05-08 17:46', '2025-05-09 01:30', 'IGD', 'ICU', 'Penkes ec encephalopaty metabolik + Hipoglikemia DM perbaikan + elektrolit imbalance, AKI dd CKD, TB Paru on OAT minggu-1', NULL, '672', '1', NULL, 'n penurunan kesadaran, sulit diajak komunikasi sejak 2 jam 16.00 SMRS.', 'TB on OAT', NULL, NULL, '1', NULL, NULL, '2', '3', '2', '7', NULL, NULL, '2', '2', '2', NULL, NULL, NULL, '137', NULL, '36.9', NULL, '30', '0', NULL, '0', NULL, '1', 'tinggi', '2', '2', '0', NULL, '1', '2025-05-09', '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, NULL, '1', '15', NULL, NULL, 'metakarpal sinistra
dex 10  tpm 
metakarpal sinistra
Drip KCL 25 meq dalam RL 500 cc/ 8 jam
', 'inj omeprazole 40 mg iv 
- inj citiicolin 500 mg iv 
dex 40 %  total 4 fles ', '1', 'DR, GDS, ELEKTROLIT, UR, CR', '1', 'thorax tgl 30 april 2025', '1', 'EKG ', 'laboratorium 
terapi ', 'PRC 1 kolf ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 00:16', NULL, '597', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 00:14:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 00:14:45 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('743134', '2025-05-08 17:46', '2025-05-09 01:30', 'IGD', 'ICU', 'Penkes ec encephalopaty metabolik  Hipoglikemia DM perbaikan  elektrolit imbalance, AKI dd CKD, TB Paru on OAT minggu-1', NULL, '672', '1', NULL, 'n penurunan kesadaran, sulit diajak komunikasi sejak 2 jam 16.00 SMRS.', 'TB on OAT', NULL, NULL, '1', NULL, NULL, '2', '3', '2', '7', NULL, NULL, '2', '2', '2', NULL, NULL, NULL, '137', NULL, '36.9', NULL, '30', '0', NULL, '0', NULL, '1', 'tinggi', '2', '2', '0', NULL, '1', '2025-05-09', '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, NULL, '1', '15', NULL, NULL, 'metakarpal sinistra
dex 10  tpm 
metakarpal sinistra
Drip KCL 25 meq dalam RL 500 cc/ 8 jam
', 'inj omeprazole 40 mg iv 
- inj citiicolin 500 mg iv 
dex 40 %  total 4 fles ', '1', 'DR, GDS, ELEKTROLIT, UR, CR', '1', 'thorax tgl 30 april 2025', '1', 'EKG ', 'laboratorium 
terapi ', 'PRC 1 kolf ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 00:16', NULL, '597', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 00:14:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 00:14:55 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('743134', '2025-05-08 17:46', '2025-05-09 01:30', 'IGD', 'ICU', 'Penkes ec encephalopaty metabolik  Hipoglikemia DM ', NULL, '672', '1', NULL, 'n penurunan kesadaran, sulit diajak komunikasi sejak 2 jam 16.00 SMRS.', 'TB on OAT', NULL, NULL, '1', NULL, NULL, '2', '3', '2', '7', NULL, NULL, '2', '2', '2', NULL, NULL, NULL, '137', NULL, '36.9', NULL, '30', '0', NULL, '0', NULL, '1', 'tinggi', '2', '2', '0', NULL, '1', '2025-05-09', '1', '2025-05-09', NULL, NULL, NULL, NULL, '1', '', NULL, NULL, '1', '15', NULL, NULL, 'metakarpal sinistra
dex 10  tpm 
metakarpal sinistra
Drip KCL 25 meq dalam RL 500 cc/ 8 jam
', 'inj omeprazole 40 mg iv 
- inj citiicolin 500 mg iv 
dex 40 %  total 4 fles ', '1', 'DR, GDS, ELEKTROLIT, UR, CR', '1', 'thorax tgl 30 april 2025', '1', 'EKG ', 'laboratorium 
terapi ', 'PRC 1 kolf ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 00:16', NULL, '597', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 00:51:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 01:09:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 01:09:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 01:10:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 01:10:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 01:31:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 01:31:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 01:31:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 01:31:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 01:32:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 01:32:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 01:47:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 01:47:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 02:08:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 02:08:55 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '735' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-05-09 03:04:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 04:07:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-05-09 05:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 05:48:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 05:48:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 05:48:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 05:48:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 05:48:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 05:59:08 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-09 06:06:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:10:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:10:40 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '861507', "id_layanan_pendaftaran" = '743115', "waktu" = '2025-05-09 06:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan sesak napas, sesak tidak membaik dengan istirahat, disertai batuk berdahak , mual', "objective" = 'Kesadaran composmentis, GCS 15, EWS Hijau (4), akral teraba hangat, nadi teraba kuat, pasien tampak sesak nafas, batuk produksi (+) warna kehijauan, suara paru sn ves n/n, rh +/+, wh +/+, Tampak mual makan hanya habis 1/4 porsi. TD:  111/65mmHg, N: 76x/m , RR: 20x/m, S: 36.3C, SpO2: 93persen  Ra, Spo2: 96 Þngan nasal canul 3lpm. Tgl 08/05/25 Terpasang IVFD Vemplon (TAKA no. 22). Tanggal 04-5-25 lab dari RS Haji Jakarta HB : 12.3 HT : 37 LEU : 8 TROMB : 307 GDS : 101mg/dl RO. Thorax Exp (+). Tanggal 8-5-25 dari RSUD kota TNG EKG terlampir, HB : 11.6 HT : 33 LEU : 8.7 TROMB : 333 GDS : 85mg/dl, UR : 19 CR : 0,5. Riw PPOK sebelumnya, pengobatan TB selama 1 th th 2012. Tgl 09/05/25 Intake: 900 cc, Output: 1900 cc/ 24jam ', "assessment" = 'Bersihan jalan nafas tidak efektif, Nausea', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2010', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '1635', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-05-09 06:10:40'
WHERE "id" = '861507'
ERROR - 2025-05-09 06:10:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:10:46 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '861507', "id_layanan_pendaftaran" = '743115', "waktu" = '2025-05-09 06:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan sesak napas, sesak tidak membaik dengan istirahat, disertai batuk berdahak , mual', "objective" = 'Kesadaran composmentis, GCS 15, EWS Hijau (4), akral teraba hangat, nadi teraba kuat, pasien tampak sesak nafas, batuk produksi (+) warna kehijauan, suara paru sn ves n/n, rh +/+, wh +/+, Tampak mual makan hanya habis 1/4 porsi. TD:  111/65mmHg, N: 76x/m , RR: 20x/m, S: 36.3C, SpO2: 93persen  Ra, Spo2: 96 Þngan nasal canul 3lpm. Tgl 08/05/25 Terpasang IVFD Vemplon (TAKA no. 22). Tanggal 04-5-25 lab dari RS Haji Jakarta HB : 12.3 HT : 37 LEU : 8 TROMB : 307 GDS : 101mg/dl RO. Thorax Exp (+). Tanggal 8-5-25 dari RSUD kota TNG EKG terlampir, HB : 11.6 HT : 33 LEU : 8.7 TROMB : 333 GDS : 85mg/dl, UR : 19 CR : 0,5. Riw PPOK sebelumnya, pengobatan TB selama 1 th th 2012. Tgl 09/05/25 Intake: 900 cc, Output: 1900 cc/ 24jam ', "assessment" = 'Bersihan jalan nafas tidak efektif, Nausea', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2010', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '1635', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-05-09 06:10:46'
WHERE "id" = '861507'
ERROR - 2025-05-09 06:17:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:17:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:28:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:33:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:36:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:36:45 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A102%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 06:37:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:37:45 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A142%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 06:39:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:39:54 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A112%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 06:40:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:40:40 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A106%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 06:41:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 06:41:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090038) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:41:28 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090038) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090038', '00114667', '2025-05-09 06:41:26', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002057664587', NULL, '0223B1370425Y001897', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Konservasi Gigi', 0, 2, NULL, '20250509A115')
ERROR - 2025-05-09 06:41:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090040) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:41:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090040) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090040', '00007570', '2025-05-09 06:41:53', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049173467', NULL, '102501040425Y000251', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250509A015')
ERROR - 2025-05-09 06:42:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090042) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:42:41 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090042) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090042', '00374407', '2025-05-09 06:42:40', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001126755066', NULL, '102501030425Y001728', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250509B279')
ERROR - 2025-05-09 06:44:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:44:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:44:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 06:44:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:44:41 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A110%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 06:46:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 06:46:22 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A123%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 06:49:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:53:49 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 299
ERROR - 2025-05-09 06:53:49 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 300
ERROR - 2025-05-09 06:53:53 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 299
ERROR - 2025-05-09 06:53:53 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 300
ERROR - 2025-05-09 06:55:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:58:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 87
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-05-09 06:59:12 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 91
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 94
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 96
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$nama_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 26
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$id_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 27
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tanggal_lahir_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 28
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$asal_ruangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 41
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 59
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 60
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 65
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 66
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 74
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 75
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 79
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 80
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 84
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 85
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 89
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 90
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 94
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 95
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 99
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 100
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 104
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 105
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 109
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 110
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 114
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 115
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 119
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 120
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 124
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 125
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 130
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 131
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 136
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 137
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 142
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 143
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 148
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 149
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 154
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 155
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 160
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 161
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 169
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 170
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 174
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 175
ERROR - 2025-05-09 06:59:12 --> Severity: Notice  --> Undefined property: stdClass::$updated_on /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 181
ERROR - 2025-05-09 07:00:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090084) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:00:10 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090084) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090084', '00373745', '2025-05-09 07:00:09', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001405465086', NULL, '102501100425Y001457', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250509B235')
ERROR - 2025-05-09 07:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:01:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:02:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:03:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:03:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:03:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:04:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:04:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:04:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:05:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:06:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:06:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:07:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090101) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:07:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090101) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090101', '00054373', '2025-05-09 07:07:02', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001830572008', NULL, '0496B0000525Y000611', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Syaraf', 0, '2', '', '20250509B074')
ERROR - 2025-05-09 07:07:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090102) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:07:06 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090102) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090102', '00054373', '2025-05-09 07:07:05', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001830572008', NULL, '0496B0000525Y000611', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Syaraf', 0, '2', '', '20250509B074')
ERROR - 2025-05-09 07:07:31 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 07:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:07:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:08:46 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 07:09:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:09:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 07:09:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:09:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 07:09:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:09:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:12:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 07:13:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:13:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 07:13:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:13:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 07:14:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:14:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:15:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:15:31 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A223%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:16:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:16:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:16:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 07:16:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:17:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:17:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 07:19:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:19:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:19:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:19:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:20:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:20:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090162) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:20:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090162) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090162', '00375816', '2025-05-09 07:20:11', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003581288289', NULL, '0223R0650525B000131', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik Anak', 0, 2, '', '20250509A229')
ERROR - 2025-05-09 07:20:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:21:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 07:21:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:21:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 07:21:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:21:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 07:21:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:22:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:22:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A097%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:23:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:23:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A194%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:23:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090176) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:23:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090176) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:23:44 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090176) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090176', '00040210', '2025-05-09 07:23:42', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002466249467', NULL, '0223R0380525V001047', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik THT', 0, 2, NULL, '20250509B270')
ERROR - 2025-05-09 07:23:44 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090176) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090176', '00040759', '2025-05-09 07:23:42', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000040896909', NULL, '102501040525Y001485', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250509A239')
ERROR - 2025-05-09 07:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:23:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:23:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:24:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:24:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:24:54 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A234%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:25:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:26:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:26:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:26:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 07:27:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:27:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:30:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:30:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:30:58 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A218%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:31:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090199) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:31:27 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090199) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090199', '00330841', '2025-05-09 07:31:15', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001206488079', NULL, '0114R0500325B000270', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250509A041')
ERROR - 2025-05-09 07:31:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090200) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:31:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090200) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090200', '00367091', '2025-05-09 07:31:16', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002052724353', NULL, '102504020225Y004141', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250509B236')
ERROR - 2025-05-09 07:31:52 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-05-09 07:32:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:33:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:33:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:34:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:35:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090209) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:35:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090209) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090209', '00276810', '2025-05-09 07:34:55', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 9, '', NULL, NULL, 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250509C012')
ERROR - 2025-05-09 07:35:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:37:07 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-09 07:37:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:37:10 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A088%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:37:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:38:10 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-09 07:38:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:38:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:38:22 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A220%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:38:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:38:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:38:56 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A235%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:39:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:39:15 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-09 07:39:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:40:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:40:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:40:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:40:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:40:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:40:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:41:39 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-09 07:41:39 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-09 07:41:39 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-09 07:41:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090235) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:41:41 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090235) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090235', '00141355', '2025-05-09 07:41:40', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002261379734', NULL, '0223B0710525P000272', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250509A242')
ERROR - 2025-05-09 07:42:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:42:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:42:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:42:49 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-09 07:42:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:43:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:43:30 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-09 07:43:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:44:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:45:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:45:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:46:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:46:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090253) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:46:49 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090253) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090253', '00086864', '2025-05-09 07:46:44', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003039421858', NULL, '022310040525Y000266', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250509A203')
ERROR - 2025-05-09 07:47:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:47:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A103%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:47:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:47:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:47:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:48:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090260) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:48:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090260) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090260', '00287917', '2025-05-09 07:48:02', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002379627336', NULL, NULL, 'Lama', '0', '1775', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-05-09 07:48:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:48:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:48:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:49:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:49:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:49:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:50:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:50:11 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A116%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 07:50:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:50:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:51:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:51:09 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:51:09 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:51:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:51:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:51:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:51:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:51:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:51:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:52:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:52:49 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 299
ERROR - 2025-05-09 07:52:49 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 300
ERROR - 2025-05-09 07:53:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:53:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:54:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:54:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:55:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (842777, '6', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 07:55:39 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (842777, '6', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (842777, '6', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 07:55:54 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:55:54 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:07 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:07 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:08 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:08 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:09 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:09 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:56:13 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:13 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:56:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:56:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:57:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:57:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:57:25 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:57:25 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:57:26 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:57:26 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:58:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 07:58:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 07:58:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:59:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 07:59:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:00:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090292) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:00:00 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090292) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090292', '00353047', '2025-05-09 07:59:59', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002125398813', NULL, '102503010425Y000594', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250509B013')
ERROR - 2025-05-09 08:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:00:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:00:09 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A107%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:00:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:00:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:00:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:00:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090294) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:00:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090294) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090294', '00157718', '2025-05-09 08:00:32', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002458796433', NULL, '102501040525Y001393', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Paru', 0, '2', '', '20250509A243')
ERROR - 2025-05-09 08:00:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090295) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:00:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090295) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090295', '00157718', '2025-05-09 08:00:54', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002458796433', NULL, '102501040525Y001393', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Paru', 0, '2', '', '20250509A243')
ERROR - 2025-05-09 08:01:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:01:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:01:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:02:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:02:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:02:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:02:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:02:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:02:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:02:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:02:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:03:21 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:03:21 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:03:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:03:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:03:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:03:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:03:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-05-09 08:03:50 --> Severity: Notice  --> Trying to get property 'success' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-05-09 08:03:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:03:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:04:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:04:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:04:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:04:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:05:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:06:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:06:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:06:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:06:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090312) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:06:59 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090312) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090312', '00290816', '2025-05-09 08:06:27', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001135438604', NULL, '102501020325Y002300', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250509B069')
ERROR - 2025-05-09 08:07:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:07:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:07:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:07:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:07:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:07:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:07:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:07:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:07:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090313) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:07:37 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090313) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090313', '00178554', '2025-05-09 08:07:33', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000816260692', NULL, '102501020325Y002445', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250509A012')
ERROR - 2025-05-09 08:07:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:07:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:08:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250516B211) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:08:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250516B211) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250516B211', '211', 'B211', 'B', '2025-05-16', '0', '2025-05-09 08:08:10', 'Booking', 'APM', 'Asuransi', 0, '2025-05-16  07:46:09', 0, '1945', '00089771', 84, 260884, 34, 'IRM', '081211987780', '3674074305730001', '1973-05-03', 'dr. DHANI Sp.KFR', 1, 'Asuransi', 104, '130', '200', 'Ok.', '0', '56261', '0000048852246', 'JKN', '305732', '0', '34', '0223B1570325P001032', 'KLINIK KF MODERNLAND', '2025-06-15', 'SAR', '3', NULL, '0223R0380525V003829', '35', 'Belum', 201, 'Rujukan tidak valid')
ERROR - 2025-05-09 08:08:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:09:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:09:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:09:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:10:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:11:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:11:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:12:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:12:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:12:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:12:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:12:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:13:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090328) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:13:00 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090328) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090328', '00178554', '2025-05-09 08:13:00', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000816260692', NULL, '102501020325Y002445', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Jantung', 0, '2', '', '20250509A012')
ERROR - 2025-05-09 08:13:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090330) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:13:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090330) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090330', '00369690', '2025-05-09 08:13:08', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001158797924', NULL, '0223U1190525Y000891', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Konservasi Gigi', 0, '2', '', '20250509B080')
ERROR - 2025-05-09 08:13:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:13:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:13:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:14:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:14:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:14:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:14:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:14:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:14:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:14:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (842806, '4', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:14:46 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (842806, '4', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (842806, '4', '', '1', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 08:15:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:15:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 08:15:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:16:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:16:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:16:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:16:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:16:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:16:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:16:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:16:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:16:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:17:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:17:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:17:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:17:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:18:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 08:18:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (842811, '4', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:18:36 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (842811, '4', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (842811, '4', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 01:18:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 01:18:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:18:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:18:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:18:50 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:18:50 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:18:52 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:18:52 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:18:54 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:18:54 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:19:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:19:21 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 299
ERROR - 2025-05-09 08:19:21 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 300
ERROR - 2025-05-09 08:19:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:19:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:19:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:19:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:19:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:19:46 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:19:46 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:19:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:20:06 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 299
ERROR - 2025-05-09 08:20:06 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 300
ERROR - 2025-05-09 08:20:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:20:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:21:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:21:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-09 09&quot;
LINE 1: ...NULL, &quot;perawatt_cpo&quot; = '489', &quot;jam_tanggal_cpo&quot; = '2025-05-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:21:22 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-09 09"
LINE 1: ...NULL, "perawatt_cpo" = '489', "jam_tanggal_cpo" = '2025-05-0...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '742953', "id_pendaftaran" = '685666', "id_users" = '2069', "id_data_catatan_perioperatift" = '3697', "suhu_ckp" = '{"suhu_ckp_1":"36.4","suhu_ckp_2":"88","suhu_ckp_3":"18","suhu_ckp_4":"130\/82","suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":null}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"standar","standar_kewaspadaan_ckp_2":"tumor coli posterior"}', "rencana_tindakan_operasi_ckp" = 'eksisi', "dokter_operator_ckp" = '65', "rencana_perawatan_pasca_operasi_ckp" = 'ranap jati', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":"1","verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":"1","verifikasi_pasien_7":"1","verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":"1","verifikasi_pasien_11":"1","verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":"1","verifikasi_pasien_15":"1","verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":"1","verifikasi_pasien_19":"1","verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":"1","verifikasi_pasien_23":"1","verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":"1","verifikasi_pasien_27":"1","verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":"1","verifikasi_pasien_31":"1","verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":"1","verifikasi_pasien_35":"1","verifikasi_pasien_36":"thorax, usg muskulo"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":"1","persiapan_fisik_pasien_3":"1","persiapan_fisik_pasien_4":"puasa jam 23","persiapan_fisik_pasien_5":"1","persiapan_fisik_pasien_6":"1","persiapan_fisik_pasien_7":"1","persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":"1","persiapan_fisik_pasien_10":"1","persiapan_fisik_pasien_11":"1","persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":"1","persiapan_fisik_pasien_22":"1","persiapan_fisik_pasien_23":"1","persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":"1","persiapan_fisik_pasien_30":"1","persiapan_fisik_pasien_31":"1","persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":"1","persiapan_fisik_pasien_39":"1","persiapan_fisik_pasien_40":"ceftriaxone 1 gr jam 7","persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":"1","persiapan_fisik_pasien_44":"1","persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = '160', "jam_pfp" = '7:00', "perawat_penerima_ot_ppo" = '178', "jam_ppo" = '7:00', "site_marketing" = '{"site_marketing":"1"}', "perawat_ot_po" = NULL, "jam_tanggal_po" = NULL, "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":"1","asuhan_keperawatan_ak_2":"1","asuhan_keperawatan_ak_3":"1","asuhan_keperawatan_ak_4":"1","asuhan_keperawatan_ak_5":"1","asuhan_keperawatan_ak_6":"1","asuhan_keperawatan_ak_7":"1","asuhan_keperawatan_ak_8":"1","asuhan_keperawatan_ak_9":"1","asuhan_keperawatan_ak_10":null,"asuhan_keperawatan_ak_11":"1","asuhan_keperawatan_ak_12":null,"asuhan_keperawatan_ak_13":null,"asuhan_keperawatan_ak_14":"1","asuhan_keperawatan_ak_15":null,"asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":"1","asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":"1","asuhan_keperawatan_ak_33":"1","asuhan_keperawatan_ak_58":"1","asuhan_keperawatan_ak_34":"1","asuhan_keperawatan_ak_35":"1","asuhan_keperawatan_ak_36":"1","asuhan_keperawatan_ak_37":"1","asuhan_keperawatan_ak_38":"1","asuhan_keperawatan_ak_39":"1","asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":"1","asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":null,"asuhan_keperawatan_ak_45":null,"asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":"1","asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":"1","asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":null,"asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = '479', "perawwat_anastesi_pa" = '495', "perawwat_kamar_bedah" = '634', "time_out_ckio" = '{"time_out_ckio_1":"1","time_out_ckio_2":"7:45","time_out_ckio_4":"1","time_out_ckio_5":"7:40","time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":"7:45","time_out_ckio_11":"8:30"}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":"Eksisi ","catatan_keperawatan_intra_operasi_2":"1","catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":"1","catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":null,"catatan_keperawatan_intra_operasi_9":"1","catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":"1","catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":"1","catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":null,"catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":"1","catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":"1","catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":"1","catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":"1","catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":"1","catatan_keperawatan_intra_operasi_55":null,"catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":"1","catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":"1","catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":"1","catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":"1","catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":"0","catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":"1","catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":"1","catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":"1","catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-05-09 07:45', "perawat_instrument_1" = '630', "perawat_instrument_2" = '479', "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":"1","asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":"1","asuhan_keperawatannnnn_ak_72":"1","asuhan_keperawatannnnn_ak_73":"1","asuhan_keperawatannnnn_ak_74":"1","asuhan_keperawatannnnn_ak_75":null,"asuhan_keperawatannnnn_ak_76":"1","asuhan_keperawatannnnn_ak_77":"1","asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":"1","asuhan_keperawatannnnn_ak_80":"1","asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":"1","asuhan_keperawatannnnn_ak_84":"1","asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = '479', "perawwat_anastesi_paa" = '495', "perawwat_kamar_bedahh" = '634', "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":"1","catatan_keperawatan_sesudah_operasi_2":"8:35","catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":"9:00"}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":"1","catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":"1","catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":null,"catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":"1","catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":null,"catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":"1","catatan_keperawatan_sesudah_op_21":null,"catatan_keperawatan_sesudah_op_22":"1","catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":null,"catatan_keperawatan_sesudah_op_25":"1","catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":"1","catatan_keperawatan_sesudah_op_30":null,"catatan_keperawatan_sesudah_op_31":"1","catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":"1","catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":"1","catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":"1","catatan_keperawatan_sesudah_op_40":"2","catatan_keperawatan_sesudah_op_42":null,"catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":"1","ceklis_persiapan_operasi_2":"1","ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":"1","ceklis_persiapan_operasi_10":"1","ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":null,"ceklis_persiapan_operasiii_2":null,"ceklis_persiapan_operasiii_3":null,"ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":null,"jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = '489', "jam_tanggal_cpo" = '2025-05-09 09', "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":"1","asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":"1","asssuhan_keperawatannnnn_ak_49":null,"asssuhan_keperawatannnnn_ak_50":"1","asssuhan_keperawatannnnn_ak_51":"1","asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":"1","asssuhan_keperawatannnnn_ak_55":"1","asssuhan_keperawatannnnn_ak_56":"1","asssuhan_keperawatannnnn_ak_57":"1","asssuhan_keperawatannnnn_ak_58":"1","asssuhan_keperawatannnnn_ak_59":"1","asssuhan_keperawatannnnn_ak_60":"1","asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":"1","asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":"1","asssuhan_keperawatannnnn_ak_70":"1","asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":"1","asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = '476', "perawwat_ruangan_prrr" = '479', "perawwat_anastesi_paaa" = '495', "perawwat_kamar_bedahhh" = '634', "updated_at" = '2025-05-09 08:21:22'
WHERE "id_data_catatan_perioperatift" = '3697'
ERROR - 2025-05-09 08:21:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-09 09&quot;
LINE 1: ...NULL, &quot;perawatt_cpo&quot; = '489', &quot;jam_tanggal_cpo&quot; = '2025-05-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:21:26 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-09 09"
LINE 1: ...NULL, "perawatt_cpo" = '489', "jam_tanggal_cpo" = '2025-05-0...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '742953', "id_pendaftaran" = '685666', "id_users" = '2069', "id_data_catatan_perioperatift" = '3697', "suhu_ckp" = '{"suhu_ckp_1":"36.4","suhu_ckp_2":"88","suhu_ckp_3":"18","suhu_ckp_4":"130\/82","suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":null}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"standar","standar_kewaspadaan_ckp_2":"tumor coli posterior"}', "rencana_tindakan_operasi_ckp" = 'eksisi', "dokter_operator_ckp" = '65', "rencana_perawatan_pasca_operasi_ckp" = 'ranap jati', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":"1","verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":"1","verifikasi_pasien_7":"1","verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":"1","verifikasi_pasien_11":"1","verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":"1","verifikasi_pasien_15":"1","verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":"1","verifikasi_pasien_19":"1","verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":"1","verifikasi_pasien_23":"1","verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":"1","verifikasi_pasien_27":"1","verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":"1","verifikasi_pasien_31":"1","verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":"1","verifikasi_pasien_35":"1","verifikasi_pasien_36":"thorax, usg muskulo"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":"1","persiapan_fisik_pasien_3":"1","persiapan_fisik_pasien_4":"puasa jam 23","persiapan_fisik_pasien_5":"1","persiapan_fisik_pasien_6":"1","persiapan_fisik_pasien_7":"1","persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":"1","persiapan_fisik_pasien_10":"1","persiapan_fisik_pasien_11":"1","persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":"1","persiapan_fisik_pasien_22":"1","persiapan_fisik_pasien_23":"1","persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":"1","persiapan_fisik_pasien_30":"1","persiapan_fisik_pasien_31":"1","persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":"1","persiapan_fisik_pasien_39":"1","persiapan_fisik_pasien_40":"ceftriaxone 1 gr jam 7","persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":"1","persiapan_fisik_pasien_44":"1","persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = '160', "jam_pfp" = '7:00', "perawat_penerima_ot_ppo" = '178', "jam_ppo" = '7:00', "site_marketing" = '{"site_marketing":"1"}', "perawat_ot_po" = NULL, "jam_tanggal_po" = NULL, "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":"1","asuhan_keperawatan_ak_2":"1","asuhan_keperawatan_ak_3":"1","asuhan_keperawatan_ak_4":"1","asuhan_keperawatan_ak_5":"1","asuhan_keperawatan_ak_6":"1","asuhan_keperawatan_ak_7":"1","asuhan_keperawatan_ak_8":"1","asuhan_keperawatan_ak_9":"1","asuhan_keperawatan_ak_10":null,"asuhan_keperawatan_ak_11":"1","asuhan_keperawatan_ak_12":null,"asuhan_keperawatan_ak_13":null,"asuhan_keperawatan_ak_14":"1","asuhan_keperawatan_ak_15":null,"asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":"1","asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":"1","asuhan_keperawatan_ak_33":"1","asuhan_keperawatan_ak_58":"1","asuhan_keperawatan_ak_34":"1","asuhan_keperawatan_ak_35":"1","asuhan_keperawatan_ak_36":"1","asuhan_keperawatan_ak_37":"1","asuhan_keperawatan_ak_38":"1","asuhan_keperawatan_ak_39":"1","asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":"1","asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":null,"asuhan_keperawatan_ak_45":null,"asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":"1","asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":"1","asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":null,"asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = '479', "perawwat_anastesi_pa" = '495', "perawwat_kamar_bedah" = '634', "time_out_ckio" = '{"time_out_ckio_1":"1","time_out_ckio_2":"7:45","time_out_ckio_4":"1","time_out_ckio_5":"7:40","time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":"7:45","time_out_ckio_11":"8:30"}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":"Eksisi ","catatan_keperawatan_intra_operasi_2":"1","catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":"1","catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":null,"catatan_keperawatan_intra_operasi_9":"1","catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":"1","catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":"1","catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":null,"catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":"1","catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":"1","catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":"1","catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":"1","catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":"1","catatan_keperawatan_intra_operasi_55":null,"catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":"1","catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":"1","catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":"1","catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":"1","catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":"0","catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":"1","catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":"1","catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":"1","catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-05-09 07:45', "perawat_instrument_1" = '630', "perawat_instrument_2" = '479', "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":"1","asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":"1","asuhan_keperawatannnnn_ak_72":"1","asuhan_keperawatannnnn_ak_73":"1","asuhan_keperawatannnnn_ak_74":"1","asuhan_keperawatannnnn_ak_75":null,"asuhan_keperawatannnnn_ak_76":"1","asuhan_keperawatannnnn_ak_77":"1","asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":"1","asuhan_keperawatannnnn_ak_80":"1","asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":"1","asuhan_keperawatannnnn_ak_84":"1","asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = '479', "perawwat_anastesi_paa" = '495', "perawwat_kamar_bedahh" = '634', "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":"1","catatan_keperawatan_sesudah_operasi_2":"8:35","catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":"9:00"}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":"1","catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":"1","catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":null,"catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":"1","catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":null,"catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":"1","catatan_keperawatan_sesudah_op_21":null,"catatan_keperawatan_sesudah_op_22":"1","catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":null,"catatan_keperawatan_sesudah_op_25":"1","catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":"1","catatan_keperawatan_sesudah_op_30":null,"catatan_keperawatan_sesudah_op_31":"1","catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":"1","catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":"1","catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":"1","catatan_keperawatan_sesudah_op_40":"2","catatan_keperawatan_sesudah_op_42":null,"catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":"1","ceklis_persiapan_operasi_2":"1","ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":"1","ceklis_persiapan_operasi_10":"1","ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":null,"ceklis_persiapan_operasiii_2":null,"ceklis_persiapan_operasiii_3":null,"ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":null,"jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = '489', "jam_tanggal_cpo" = '2025-05-09 09', "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":"1","asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":"1","asssuhan_keperawatannnnn_ak_49":null,"asssuhan_keperawatannnnn_ak_50":"1","asssuhan_keperawatannnnn_ak_51":"1","asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":"1","asssuhan_keperawatannnnn_ak_55":"1","asssuhan_keperawatannnnn_ak_56":"1","asssuhan_keperawatannnnn_ak_57":"1","asssuhan_keperawatannnnn_ak_58":"1","asssuhan_keperawatannnnn_ak_59":"1","asssuhan_keperawatannnnn_ak_60":"1","asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":"1","asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":"1","asssuhan_keperawatannnnn_ak_70":"1","asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":"1","asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = '476', "perawwat_ruangan_prrr" = '479', "perawwat_anastesi_paaa" = '495', "perawwat_kamar_bedahhh" = '634', "updated_at" = '2025-05-09 08:21:26'
WHERE "id_data_catatan_perioperatift" = '3697'
ERROR - 2025-05-09 08:21:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:21:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:22:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:22:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:23:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090360) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:23:33 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090360) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090360', '00349349', '2025-05-09 08:23:32', 'Laboratorium', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '7', NULL, NULL, NULL, 'Lama', '0', '1768', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-05-09 08:23:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:24:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:24:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:24:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:25:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:25:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:25:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:26:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090369) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:26:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090369) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090369', '00273485', '2025-05-09 08:26:11', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002285031058', NULL, '0223B0660525Y000552', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Obgyn', 0, 2, NULL, '20250509A150')
ERROR - 2025-05-09 08:26:26 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:26:26 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:26:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:26:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:26:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:27:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:27:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:27:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:27:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 08:28:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:28:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 08:28:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:28:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 08:28:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:28:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:28:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:28:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:28:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:28:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:28:53 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND "ab"."kode_booking" = '20250509A217'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:28:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:28:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:29:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:29:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:29:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:29:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:29:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:29:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:29:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:29:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:29:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:29:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:29:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090381) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:29:46 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090381) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090381', '00217110', '2025-05-09 08:29:45', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002099532148', NULL, '102501100325Y002808', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250509B194')
ERROR - 2025-05-09 08:29:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:29:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:29:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:29:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:30:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:30:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A130%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:30:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:30:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:30:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090383) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:30:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090383) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090383', '00236034', '2025-05-09 08:30:36', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001276167238', NULL, '100501020525Y000594', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik THT', 0, 2, NULL, '20250509B356')
ERROR - 2025-05-09 08:30:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:31:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:31:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:31:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:31:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:31:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:31:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:31:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:31:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (842845, '3', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:31:49 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (842845, '3', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (842845, '3', '', '1', '', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 1, 'SEHARI MAX 8X SEMPROT', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 08:32:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:32:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (842850, '6', '', '7', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:32:27 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (842850, '6', '', '7', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (842850, '6', '', '7', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 08:32:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:32:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:32:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:32:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A086%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:32:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:32:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:32:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:33:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090391) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:33:26 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090391) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090391', '00066773', '2025-05-09 08:33:25', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001718869533', NULL, '1025R0020225B000340', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250509B282')
ERROR - 2025-05-09 08:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:33:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:33:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:33:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:34:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:34:31 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-05-09 08:34:31 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-05-09 08:34:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:34:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:34:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:35:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:35:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:35:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:35:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:35:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:36:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:36:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:36:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:36:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:36:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:36:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:36:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:36:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:36:35 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A124%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:36:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:36:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:36:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:36:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:36:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:36:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:36:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A108%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:37:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:38:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:38:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:38:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:38:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:39:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:39:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:39:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:39:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:39:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:39:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:39:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 08:39:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:39:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 08:40:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:40:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:40:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:40:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:40:28 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-05-09 08:40:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:40:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:40:42 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A133%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:41:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:42:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:42:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:42:36 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-05-09 08:42:40 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:42:40 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:42:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:42:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:42:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:42:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 9657
ERROR - 2025-05-09 08:43:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:43:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:43:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:43:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:43:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:44:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:44:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:44:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:44:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 08:44:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:44:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 08:44:29 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 08:44:29 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 08:44:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:44:42 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:44:42 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:44:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:44:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:44:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:44:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:45:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:45:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:46:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:46:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:46:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:46:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:46:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:46:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:46:40 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A087%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:46:42 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-09 08:46:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 08:46:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 08:46:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 08:46:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 08:46:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 08:46:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 08:46:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 08:47:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:47:29 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-05-09 08:47:29 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-05-09 08:47:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-05-09 08:47:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:47:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A113%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:47:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:47:37 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-05-09 08:47:37 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-05-09 08:47:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-05-09 08:48:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:48:15 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 08:48:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:48:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:48:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:48:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:48:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:49:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:49:13 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00364767'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-09 08:49:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:49:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 08:49:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:49:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 08:49:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:49:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:49:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:49:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:50:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:50:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:50:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:50:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:50:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 08:50:51 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-05-09 08:50:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:50:55 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 08:50:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:50:55 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 08:50:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:51:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:52:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:52:24 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-05-09 08:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:52:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:52:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-05-09 08:52:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:52:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:52:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:52:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:52:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-05-09 08:52:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:52:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:52:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:52:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:53:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:53:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:53:22 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A139%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:53:26 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 08:53:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:53:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:54:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:55:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:55:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:55:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:55:26 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A089%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 08:55:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:55:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:56:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:56:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:56:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:56:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:56:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:56:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:56:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:56:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 08:56:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 08:56:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 08:57:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:57:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:58:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:58:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:58:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:58:26 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:58:26 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:58:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:59:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 08:59:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:59:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:59:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:59:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:59:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:59:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:59:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:59:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:59:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:59:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:59:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 08:59:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 08:59:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:00:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090474) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:00:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pasien_id_idx_copy1&quot;
DETAIL:  Key (id)=(00375863) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:00:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pasien_id_idx_copy1&quot;
DETAIL:  Key (id)=(00375863) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:00:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pasien_id_idx_copy1"
DETAIL:  Key (id)=(00375863) already exists. - Invalid query: INSERT INTO "sm_pasien" ("id", "rm_lama", "tanggal_daftar", "no_identitas", "nama", "status_pasien", "kelamin", "tempat_lahir", "tanggal_lahir", "alamat", "no_prop", "nama_prop", "no_kab", "nama_kab", "no_kec", "nama_kec", "no_kel", "nama_kel", "agama", "gol_darah", "id_pendidikan", "id_pekerjaan", "status_kawin", "nama_ayah", "nama_ibu", "telp", "id_etnis", "etnis_lainnya", "hamkom", "hamkom_lainnya", "status", "disabilitas", "no_rw", "no_rt", "no_rumah", "kode_pos", "is_pegawai_rsud", "email", "last_active") VALUES ('00375863', '', '2025-05-09 09:00:12', '3671015607600001', 'MARTINI SUTJIADI', NULL, 'P', 'TANGERANG', '1960-07-16', 'JL BENTENG MAKASAR GG VI NO. 48', '36', NULL, '71', NULL, '1', 'TANGERANG', '1001', 'SUKARASA', 'Buddha', NULL, '5', '15', 'Belum Kawin', NULL, NULL, '0895337819626', '1', NULL, '', NULL, 'Hidup', 0, '08', '01', NULL, NULL, 0, NULL, '2025-05-09 09:00:12')
ERROR - 2025-05-09 09:00:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090474) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090474', '00181716', '2025-05-09 09:00:12', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001634836329', NULL, '102506020225Y002830', 'Lama', NULL, 1951, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250509B071')
ERROR - 2025-05-09 09:00:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pasien_id_idx_copy1"
DETAIL:  Key (id)=(00375863) already exists. - Invalid query: INSERT INTO "sm_pasien" ("id", "rm_lama", "tanggal_daftar", "no_identitas", "nama", "status_pasien", "kelamin", "tempat_lahir", "tanggal_lahir", "alamat", "no_prop", "nama_prop", "no_kab", "nama_kab", "no_kec", "nama_kec", "no_kel", "nama_kel", "agama", "gol_darah", "id_pendidikan", "id_pekerjaan", "status_kawin", "nama_ayah", "nama_ibu", "telp", "id_etnis", "etnis_lainnya", "hamkom", "hamkom_lainnya", "status", "disabilitas", "no_rw", "no_rt", "no_rumah", "kode_pos", "is_pegawai_rsud", "email", "last_active") VALUES ('00375863', '', '2025-05-09 09:00:13', '3173085202760019', 'TETI LENTINA', NULL, 'P', 'MEDAN', '1976-02-12', 'JL. GELATIK RAYA C2', '36', 'BANTEN', '3', 'TANGERANG', '12', 'PASAR KEMIS', '1010', 'KUTABUMI', 'Kristen', NULL, '5', '15', 'Belum Kawin', NULL, NULL, '089526835933', '17', NULL, '', NULL, 'Hidup', 0, '009', '004', NULL, NULL, 0, NULL, '2025-05-09 09:00:13')
ERROR - 2025-05-09 09:00:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:00:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A096%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 09:00:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:00:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090476) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:00:21 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090476) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090476', '00375865', '2025-05-09 09:00:21', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001720514002', NULL, '102501020525Y000848', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik Periodonti', 0, '2', '', '20250509A255')
ERROR - 2025-05-09 09:00:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:00:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:00:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:00:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:00:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:01:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:01:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:01:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:01:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:01:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:01:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 09:01:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:02:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:02:01 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 09:02:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:02:01 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 09:02:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:03:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:03:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 09:03:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:03:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 09:03:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (842933, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:03:12 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (842933, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (842933, '3', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 09:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:03:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:04:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:04:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:04:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND "ab"."kode_booking" = '20250509A216'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 09:04:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:04:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:05:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:05:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:05:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:05:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:42 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:42 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:45 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:45 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:05:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:05:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:05:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 09:05:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:05:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 09:06:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:06:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 09:06:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:06:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 09:06:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:06:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:06:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:07:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:07:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:08:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:08:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:08:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 09:09:26 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:09:26 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:09:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:09:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 09:09:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:09:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 09:09:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:09:49 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:09:49 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:09:49 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:09:49 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:09:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:09:52 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A140%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 09:10:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:11:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:11:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:11:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:11:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:11:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:12:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:12:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:12:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:12:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:12:25 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:12:25 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:12:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 09:13:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:13:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:13:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:14:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:15:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:15:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:15:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:16:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:16:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:16:37 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 09:16:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:16:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:17:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:18:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:18:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:18:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:18:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:19:13 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:19:13 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:19:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:19:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:19:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 09:19:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 09:19:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:19:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:19:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:19:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:19:43 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:19:43 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:19:43 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:19:43 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:19:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:19:48 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
LINE 9: WHERE "pd"."id" = 'undefined'
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = 'undefined'
ERROR - 2025-05-09 09:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:20:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:20:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:20:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:20:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 09:20:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:21:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:22:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843009, '4', '', '21', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:22:10 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843009, '4', '', '21', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843009, '4', '', '21', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 09:22:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:23:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:23:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:24:07 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:24:07 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:24:07 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:24:07 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:24:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:24:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:24:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:25:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:25:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:25:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:25:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:25:29 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-09 09:25:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 09:25:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:25:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:26:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:26:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:26:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:26:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:26:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:26:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:26:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:26:40 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-05-09 09:26:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:26:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A143%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 09:26:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:27:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:27:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090549) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:27:07 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090549) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090549', '00044281', '2025-05-09 09:27:06', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000036337274', NULL, '102501020225Y003766', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250509A060')
ERROR - 2025-05-09 09:27:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:27:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 09:27:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:27:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:28:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:28:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:28:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:28:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:28:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:28:22 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:28:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:28:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:28:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:28:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:28:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:28:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:28:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:28:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:29:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:29:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:29:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:29:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:29:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:29:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:29:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:29:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:29:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:29:43 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:29:43 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:29:43 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:29:43 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:29:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:29:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:29:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:29:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:29:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:30:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:30:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:30:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:30:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:30:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:30:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:30:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:30:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:31:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:31:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:31:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:31:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:31:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:31:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:31:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A120%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 09:32:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:32:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:32:52 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A090%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 09:32:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:33:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:33:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:33:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:33:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:33:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:34:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:34:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:34:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:34:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:34:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:35:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:35:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:36:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:36:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:36:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:36:19 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:36:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:36:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:36:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 09:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:37:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:37:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:37:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:37:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:37:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:37:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A109%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 09:37:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843052, '6', '', '', 'N...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:37:59 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843052, '6', '', '', 'N...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843052, '6', '', '', 'NEBU', '', 'PC', '0', '', '0', 'MORN', 'sallbutamol', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 09:38:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:38:33 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:38:33 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:38:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:38:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:39:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:39:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:39:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:39:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:39:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:39:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 09:39:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:40:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:40:32 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 09:40:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:40:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 09:41:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:41:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:41:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:41:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:41:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:41:43 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-05-09 09:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:41:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:41:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-05-09 09:42:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:42:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:42:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:42:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:42:34 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-09 09:42:58 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:42:58 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:07 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:07 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:08 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:08 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:21 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:21 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:22 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:25 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:25 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:27 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:27 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:43:28 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:28 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:50 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:50 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:52 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:52 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:54 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:54 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:55 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:55 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:58 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:58 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:43:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:43:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:01 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:01 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:09 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:09 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:44:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:44:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:18 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:18 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:19 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:44:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:44:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:44:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:44:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:45:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:45:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:45:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:45:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:46:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:46:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:47:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:47:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:47:35 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00372978'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-09 09:47:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:47:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:47:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:47:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:48:10 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11862
ERROR - 2025-05-09 09:48:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:48:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:48:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:48:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:48:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 09:48:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:48:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:48:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:49:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:49:37 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:49:37 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 09:49:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:49:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 09:49:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:50:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:50:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:50:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:50:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:50:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:50:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:51:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:51:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:51:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:51:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A204%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 09:51:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:51:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:52:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:52:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:53:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:53:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:53:07 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-09 09:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:53:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:54:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:54:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:54:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505090604) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 09:54:07 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505090604) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505090604', '00375201', '2025-05-09 09:54:06', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003636583964', NULL, '102504050525Y000008', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Penyakit Mulut', 0, 2, NULL, '20250509B197')
ERROR - 2025-05-09 09:54:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:54:21 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:54:21 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:54:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:54:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:54:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:54:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:54:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:54:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:54:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:55:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:56:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:56:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:56:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:56:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:56:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:56:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:56:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 09:56:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 09:56:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:56:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:56:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:56:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:57:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:57:21 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8390
ERROR - 2025-05-09 09:57:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:57:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:57:34 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11862
ERROR - 2025-05-09 09:57:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:57:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:58:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:58:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:58:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:58:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:59:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:59:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:59:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:59:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:59:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 09:59:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:59:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:59:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:00:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:00:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:00:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A224%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 10:01:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:01:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:01:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:01:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:01:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:01:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:01:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:01:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:01:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:01:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:01:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:02:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:02:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:02:44 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 10:02:44 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 10:02:44 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 10:02:44 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 10:02:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:03:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:03:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:03:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:03:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:03:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:03:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:03:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:04:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:04:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:04:25 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A135%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 10:04:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:04:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:05:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:05:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
			jko.*, "tp"."total", "k"."nama" as "kelas", COALESCE(jko.klasifikasi, '') as klasifikasi, COALESCE(ro.nama, '') as ruang_operasi, "p"."kelamin", "p"."tanggal_lahir", "p"."nama" as "nama_pasien", "p"."agama", "p"."telp", COALESCE(l.nama, '') as operasi, COALESCE(ll.nama, '') as parent, "p"."telp", "top"."id" as "id_tim_operasi", "lp"."id_pendaftaran", "lp"."tindak_lanjut" "tindak_lanjut_pengirim", concat_ws(' | ', "icd"."icd9", icd.nama) tindakan_icd9
FROM "sm_jadwal_kamar_operasi" as "jko"
LEFT JOIN "sm_layanan_pendaftaran" as "lp" ON "jko"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_tarif_pelayanan" as "tp" ON "tp"."id" = "jko"."id_tarif"
LEFT JOIN "sm_ruang_operasi" as "ro" ON "ro"."id" = "jko"."id_ruang_operasi"
LEFT JOIN "sm_kelas" as "k" ON "k"."id" = "tp"."id_kelas"
LEFT JOIN "sm_pasien" as "p" ON "p"."id" = "jko"."id_pasien"
LEFT JOIN "sm_layanan" as "l" ON "l"."id" = "tp"."id_layanan"
LEFT JOIN "sm_layanan" as "ll" ON "ll"."id" = "l"."id_parent"
LEFT JOIN "sm_tim_operasi" as "top" ON "top"."id_jadwal_operasi" = "jko"."id"
LEFT JOIN "sm_icd_ix" as "icd" ON "jko"."id_icd9" = "icd"."id"
WHERE "jko"."layanan" = 'OK'
ORDER BY "jko"."id" DESC, "jko"."waktu" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 10:05:39 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-05-09 10:05:45 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-05-09 10:05:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:06:09 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:06:09 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:06:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:06:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:06:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:06:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:06:13 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:06:13 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:06:13 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:06:13 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:06:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:06:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:06:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:06:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-09 00:00:00' AND '2025-05-09 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A101%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-09 10:06:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (6148426, '1339', 293.04, '25', '20.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:06:34 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (6148426, '1339', 293.04, '25', '20.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6148426, '1339', 293.04, '25', '20.00', 'Ya', 'null')
ERROR - 2025-05-09 10:06:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:06:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:06:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:06:46 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 10:06:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:06:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:07:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:07:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:07:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:07:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250514B311) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:07:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250514B311) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250514B311', '311', 'B311', 'B', '2025-05-14', '0', '2025-05-09 10:07:32', 'Booking', 'APM', 'Asuransi', 0, '2025-05-14  11:00:00', 0, '1701', '00359739', 80, 1814, 37, 'URO', '0895610842797', '3671012309690002', '1969-09-23', 'dr. TAUFIK RAKHMAN TAHER, Sp.U', 1, 'Asuransi', 0, '1', '200', 'Ok.', '0', '56844', '0003634574995', 'JKN', '305955', '0', '37', '022300090425Y001713', 'PUSKESMAS CIKOKOL', '2025-07-18', 'URO', '3', NULL, '0223R0380525V004167', '37', 'Belum', 201, 'Rujukan tidak valid')
ERROR - 2025-05-09 10:07:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:07:52 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 10:08:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:08:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:08:07 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-09 10:08:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:08:15 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 10:08:15 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 10:08:15 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 10:08:15 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 10:08:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:08:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:08:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:08:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:08:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:08:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:08:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:09:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:09:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:09:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:09:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:09:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:46 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%l%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:46 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%la%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:46 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lab%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:47 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%la%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:48 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lan%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:48 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lani%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:48 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lan%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:49 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lano%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:09:50 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00039038' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lanos%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-09 10:09:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:09:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:10:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:10:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:10:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:10:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:10:43 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-09 10:10:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:45 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:45 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:46 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:46 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:51 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:51 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:10:52 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:52 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:53 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:53 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:53 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:53 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:55 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:55 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:57 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:57 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:10:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:10:58 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:10:58 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:01 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:01 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:11:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:08 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:08 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:09 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:09 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:15 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:15 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:16 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:16 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:11:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:40 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:40 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:45 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:45 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:46 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:46 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:11:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:11:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:12:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:12:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:12:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:07 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:07 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:16 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:16 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:12:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:12:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:21 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:21 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:21 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:21 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:22 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:22 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:12:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:12:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:12:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:12:25 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:25 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:25 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:25 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:26 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:12:26 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:12:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6148521, '3747', 440.4, '50', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:12:33 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6148521, '3747', 440.4, '50', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6148521, '3747', 440.4, '50', '10.00', 'Ya', 'null')
ERROR - 2025-05-09 10:12:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:12:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:13:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:13:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:13:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:13:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:14:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:14:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:14:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:14:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:14:29 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-09 10:14:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:14:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:15:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:15:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:15:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:15:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:16:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:17:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 10:17:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:18:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:19:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:19:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:19:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:19:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:19:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:19:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:20:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:20:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:20:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:20:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:21:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:21:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:21:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:21:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:22:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:22:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:22:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:22:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:22:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:22:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:22:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:22:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:22:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:23:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6148735, '291', 1170, '1', '3.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:23:05 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6148735, '291', 1170, '1', '3.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6148735, '291', 1170, '1', '3.00', NULL, 'null')
ERROR - 2025-05-09 10:23:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:23:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:23:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:23:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:23:25 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-05-09 10:23:25 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-05-09 10:23:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:23:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:23:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:23:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:23:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:23:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;40 menit&quot;
LINE 2: ...top_lain&quot;:&quot;&quot;}', &quot;sirs_jam&quot; = NULL, &quot;sirs_menit&quot; = '40 menit'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:23:57 --> Query error: ERROR:  invalid input syntax for type integer: "40 menit"
LINE 2: ...top_lain":""}', "sirs_jam" = NULL, "sirs_menit" = '40 menit'...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '743139', "sirs_diagnosis_masuk" = 'CKR + Open Fracture Digiti III Manus Dx
', "sirs_diagnosis_operasi" = 'R/ Amputasi dig 3 manus dextra', "hbsag" = 'Negatif', "antihcv" = 'Tidak Diperiksa', "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"1","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = NULL, "sirs_menit" = '40 menit', "sirs_drain" = 'Negatif', "sirs_asascore" = '2', "sirs_jenis_operasi" = 'Kotor', "sirs_tindakan_operasi" = 'Elektif', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":"1 gr"}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = NULL, "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = NULL, "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = NULL, "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = NULL, "sirs_ipcn" = NULL, "id_users" = 'Kurnia Indah Ayuningrum, Amd.Kep', "sirs_tanggal_diagnosis" = '2025-05-09', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = NULL, "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = NULL, "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-05-09 10:23:56'
WHERE "id" = '52584'
ERROR - 2025-05-09 10:24:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;40 menit&quot;
LINE 2: ...top_lain&quot;:&quot;&quot;}', &quot;sirs_jam&quot; = NULL, &quot;sirs_menit&quot; = '40 menit'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:24:05 --> Query error: ERROR:  invalid input syntax for type integer: "40 menit"
LINE 2: ...top_lain":""}', "sirs_jam" = NULL, "sirs_menit" = '40 menit'...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '743139', "sirs_diagnosis_masuk" = 'CKR + Open Fracture Digiti III Manus Dx
', "sirs_diagnosis_operasi" = 'R/ Amputasi dig 3 manus dextra', "hbsag" = 'Negatif', "antihcv" = 'Tidak Diperiksa', "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"1","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = NULL, "sirs_menit" = '40 menit', "sirs_drain" = 'Negatif', "sirs_asascore" = '2', "sirs_jenis_operasi" = 'Kotor', "sirs_tindakan_operasi" = 'Elektif', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":"1 gr"}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = NULL, "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = NULL, "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = NULL, "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = NULL, "sirs_ipcn" = NULL, "id_users" = 'Kurnia Indah Ayuningrum, Amd.Kep', "sirs_tanggal_diagnosis" = '2025-05-09', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = NULL, "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = NULL, "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-05-09 10:24:05'
WHERE "id" = '52584'
ERROR - 2025-05-09 10:24:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:24:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:24:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:24:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:24:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:24:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:24:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:24:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:24:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:25:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:25:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:25:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:25:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:25:49 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-09 10:25:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:26:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:26:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:26:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:26:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:27:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:27:15 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11862
ERROR - 2025-05-09 10:27:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843170, '1', '3', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:27:41 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843170, '1', '3', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843170, '1', '3', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 10:27:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:28:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:28:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:28:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:28:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:29:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:29:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:29:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:30:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:30:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:30:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843181, '5', '3', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:30:24 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843181, '5', '3', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843181, '5', '3', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 10:30:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:30:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:30:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843180, '6', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:30:27 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843180, '6', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843180, '6', '', '1', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 10:30:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:30:49 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 10:30:49 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 10:30:49 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 10:30:49 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 10:31:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:31:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:31:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:31:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:31:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:32:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:32:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:32:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:32:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:33:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:33:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:34:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:34:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:34:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 03:34:27 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-05-09 10:34:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:34:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:34:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:35:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:35:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:35:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:35:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:35:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:35:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:35:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:36:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:36:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:36:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843199, '4', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:36:35 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843199, '4', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843199, '4', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 10:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:37:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:37:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:37:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:37:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:38:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:38:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:38:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:39:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:39:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:39:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:39:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:39:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:40:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:40:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:41:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:41:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:41:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:42:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:42:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:42:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12881
ERROR - 2025-05-09 10:42:56 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/medical_check_up/views/printing/cetak_surat_hrm_dompdf.php 1774
ERROR - 2025-05-09 10:42:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:43:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:43:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:44:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843225, '6', '1', '', '1 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:44:42 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843225, '6', '1', '', '1 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843225, '6', '1', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 10:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:45:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:45:22 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 10:45:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 10:45:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843229, '3', '3', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:45:53 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843229, '3', '3', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843229, '3', '3', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 10:46:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:46:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:46:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:46:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:46:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:46:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:46:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:47:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:47:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:47:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:50:18 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 10:50:18 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 10:50:18 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 10:50:18 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 10:50:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:50:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:50:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:50:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:50:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:51:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6149186, '611', 17316, '1', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:51:01 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6149186, '611', 17316, '1', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6149186, '611', 17316, '1', '1.00', 'Ya', 'null')
ERROR - 2025-05-09 10:51:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:51:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:51:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:51:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:51:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:51:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:51:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:52:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:52:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:52:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:53:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:53:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:53:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:53:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:53:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250523B125) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:53:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250523B125) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250523B125', '125', 'B125', 'B', '2025-05-23', '0', '2025-05-09 10:53:49', 'Booking', 'APM', 'Asuransi', 0, '2025-05-23  08:44:00', 0, '1948', '00375849', 676, 479048, 35, 'SAR', '081368788816', '3671015611720001', '1972-11-16', 'dr. Vinnie Juliana Yonatan, Sp.N', 1, 'Asuransi', 34, '60', '200', 'Ok.', '0', '54163', '0001468483075', 'JKN', '306072', '0', '35', '0223U0280425P001685', 'KLINIK ROYAL MEDICAL CENTER', '2025-07-23', 'SAR', '3', NULL, '0223R0380525V004153', '35', 'Belum', 208, 'Terdapat duplikasi Kode Booking')
ERROR - 2025-05-09 10:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:53:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:54:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:54:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:54:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:54:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:54:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:54:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:54:31 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-05-09 10:54:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:54:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:54:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:54:33 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-05-09 10:54:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:54:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:54:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 10:54:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 10:54:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:55:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:56:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:56:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:56:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:57:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 10:57:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 10:57:59 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-05-09 10:58:31 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-05-09 10:58:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 10:59:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:00:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:00:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:00:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:01:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:01:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:02:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:03:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:03:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:03:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:03:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:03:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 11:04:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:05:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 11:05:42 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:05:42 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:05:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:05:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:05:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:05:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:07:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:07:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:07:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:07:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:07:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-09 11:07:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-09 11:07:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-09 11:07:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-09 11:07:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-09 11:07:52 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-09 11:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:08:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:08:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 11:08:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 11:08:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 11:08:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 11:08:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 11:08:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 11:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:09:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:09:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:09:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:10:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:10:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:10:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:10:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:10:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:10:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:10:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:10:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:10:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:10:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:10:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:11:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:11:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:11:01 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:11:01 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:11:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:11:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:11:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:11:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:11:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:11:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:11:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:11:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843283, '6', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:11:19 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843283, '6', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843283, '6', '1', '', '', '', 'PC', '0', '', '0', '', 'oles', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 11:11:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:11:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:11:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:11:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:12:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:12:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:12:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:13:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:13:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:13:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:13:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:13:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 11:13:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:13:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:13:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:14:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:14:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:15:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:15:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:16:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:16:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 11:16:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:16:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:16:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:17:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:17:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:17:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:17:40 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00058832'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-09 11:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:18:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:18:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:18:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 11:18:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:18:17 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-09 11:18:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:18:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('843276', '2', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:18:27 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('843276', '2', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('843276', '2', '', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'NIGHT', NULL, '0', 0, '', NULL, NULL, NULL, NULL, '22:00', NULL, NULL)
ERROR - 2025-05-09 11:18:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:18:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:18:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:18:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:19:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:19:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:19:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:19:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 11:19:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 11:19:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:19:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:19:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:19:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 11:19:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 11:20:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:20:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:20:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:20:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:20:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:20:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:20:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:21:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:21:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:21:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:21:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:21:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:21:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:21:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:22:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:22:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:22:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:22:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:22:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6149704, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:22:12 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6149704, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6149704, '922', 1017.648, '1', '1.00', NULL, 'null')
ERROR - 2025-05-09 11:22:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:22:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:22:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:22:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:22:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:22:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:22:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:23:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:23:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:23:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:23:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:23:49 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-09 11:23:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:24:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843307, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:24:12 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843307, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843307, '2', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 11:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:24:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:24:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:24:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:25:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:25:25 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 11:25:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:27:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 11:27:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:27:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:28:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:28:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:29:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 11:30:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:30:21 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-09 11:30:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:30:50 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-05-09 11:30:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:30:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-05-09 11:32:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:32:28 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 11:32:28 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 11:33:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:33:08 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-05-09 11:33:08 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-05-09 11:33:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-05-09 11:33:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:33:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1679' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-05-09 11:33:18 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-05-09 11:33:18 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-05-09 11:33:18 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-05-09 11:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:33:37 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-05-09 11:33:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:33:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:33:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:33:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1679' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-05-09 11:34:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:35:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:35:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:35:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:35:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:35:49 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-05-09 11:36:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:36:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:37:10 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-05-09 11:38:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:38:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:38:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:38:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6149974, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:38:37 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6149974, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6149974, '237', 9457.2, '1', '1.00', NULL, 'null')
ERROR - 2025-05-09 11:38:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:38:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:38:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:39:07 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-05-09 11:39:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:40:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:40:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-09 12.20&quot;
LINE 1: ...NULL, &quot;perawatt_cpo&quot; = '489', &quot;jam_tanggal_cpo&quot; = '2025-05-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:40:27 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-09 12.20"
LINE 1: ...NULL, "perawatt_cpo" = '489', "jam_tanggal_cpo" = '2025-05-0...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '743164', "id_pendaftaran" = '685961', "id_users" = '2068', "id_data_catatan_perioperatift" = '3700', "suhu_ckp" = '{"suhu_ckp_1":"36.2","suhu_ckp_2":"75","suhu_ckp_3":"20","suhu_ckp_4":"125\/84","suhu_ckp_5":"3\/10","suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":null}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"standar","standar_kewaspadaan_ckp_2":"HIL sinistra reponible"}', "rencana_tindakan_operasi_ckp" = 'hernioraphy', "dokter_operator_ckp" = '67', "rencana_perawatan_pasca_operasi_ckp" = 'ranap jati', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":"1","verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":"1","verifikasi_pasien_7":"1","verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":"1","verifikasi_pasien_11":"1","verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":"1","verifikasi_pasien_15":"1","verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":"1","verifikasi_pasien_23":"1","verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":"1","verifikasi_pasien_27":"1","verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":"1","verifikasi_pasien_31":"1","verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":"1","verifikasi_pasien_35":"1","verifikasi_pasien_36":"thorax"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":"1","persiapan_fisik_pasien_3":"1","persiapan_fisik_pasien_4":"puasa jam 03.00","persiapan_fisik_pasien_5":"1","persiapan_fisik_pasien_6":"1","persiapan_fisik_pasien_7":"1","persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":"1","persiapan_fisik_pasien_10":"1","persiapan_fisik_pasien_11":"1","persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":null,"persiapan_fisik_pasien_22":null,"persiapan_fisik_pasien_23":null,"persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":"1","persiapan_fisik_pasien_30":"1","persiapan_fisik_pasien_31":"1","persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":"1","persiapan_fisik_pasien_39":"1","persiapan_fisik_pasien_40":"ceftriaxone 1 gr","persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":"1","persiapan_fisik_pasien_44":"1","persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = '207', "jam_pfp" = NULL, "perawat_penerima_ot_ppo" = NULL, "jam_ppo" = NULL, "site_marketing" = '{"site_marketing":"1"}', "perawat_ot_po" = '476', "jam_tanggal_po" = '2025-05-09 09:45', "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":"1","asuhan_keperawatan_ak_2":"1","asuhan_keperawatan_ak_3":"1","asuhan_keperawatan_ak_4":"1","asuhan_keperawatan_ak_5":"1","asuhan_keperawatan_ak_6":"1","asuhan_keperawatan_ak_7":"1","asuhan_keperawatan_ak_8":"1","asuhan_keperawatan_ak_9":"1","asuhan_keperawatan_ak_10":null,"asuhan_keperawatan_ak_11":"1","asuhan_keperawatan_ak_12":null,"asuhan_keperawatan_ak_13":null,"asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":null,"asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":"1","asuhan_keperawatan_ak_30":"1","asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":"1","asuhan_keperawatan_ak_33":"1","asuhan_keperawatan_ak_58":"1","asuhan_keperawatan_ak_34":"1","asuhan_keperawatan_ak_35":"1","asuhan_keperawatan_ak_36":"1","asuhan_keperawatan_ak_37":"1","asuhan_keperawatan_ak_38":"1","asuhan_keperawatan_ak_39":"1","asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":null,"asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":null,"asuhan_keperawatan_ak_45":"1","asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":"1","asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":"1","asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":null,"asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = '479', "perawwat_anastesi_pa" = '491', "perawwat_kamar_bedah" = '476', "time_out_ckio" = '{"time_out_ckio_1":"1","time_out_ckio_2":"11:10","time_out_ckio_4":"1","time_out_ckio_5":"11:00","time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":"11:10","time_out_ckio_11":"12:00"}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":"Hernioraphy","catatan_keperawatan_intra_operasi_2":null,"catatan_keperawatan_intra_operasi_3":"1","catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":null,"catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":"1","catatan_keperawatan_intra_operasi_8":"1","catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":"1","catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":"1","catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":"1","catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":"1","catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":"1","catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":null,"catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":"1","catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":"1","catatan_keperawatan_intra_operasi_54":"1","catatan_keperawatan_intra_operasi_55":null,"catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":"1","catatan_keperawatan_intra_operasi_59":null,"catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":null,"catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":"1","catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":"1","catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":null,"catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":"1","catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":null,"catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-05-09 11:00', "perawat_instrument_1" = '634', "perawat_instrument_2" = '479', "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":"1","asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":"1","asuhan_keperawatannnnn_ak_72":"1","asuhan_keperawatannnnn_ak_73":"1","asuhan_keperawatannnnn_ak_74":"1","asuhan_keperawatannnnn_ak_75":"1","asuhan_keperawatannnnn_ak_76":"1","asuhan_keperawatannnnn_ak_77":"1","asuhan_keperawatannnnn_ak_78":"1","asuhan_keperawatannnnn_ak_79":"1","asuhan_keperawatannnnn_ak_80":"1","asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":"1","asuhan_keperawatannnnn_ak_84":"1","asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = '479', "perawwat_anastesi_paa" = '491', "perawwat_kamar_bedahh" = '476', "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":"1","catatan_keperawatan_sesudah_operasi_2":"11:50","catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":"12:20"}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":"1","catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":"1","catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":"3 lpm","catatan_keperawatan_sesudah_op_7":null,"catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":"1","catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":"1","catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":"1","catatan_keperawatan_sesudah_op_21":null,"catatan_keperawatan_sesudah_op_22":"1","catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":null,"catatan_keperawatan_sesudah_op_25":"1","catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":"1","catatan_keperawatan_sesudah_op_30":null,"catatan_keperawatan_sesudah_op_31":"1","catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":"1","catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":"1","catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":null,"catatan_keperawatan_sesudah_op_43":"1","catatan_keperawatan_sesudah_op_44":"Supine"}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":"1","ceklis_persiapan_operasi_2":null,"ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":"1","ceklis_persiapan_operasi_10":"1","ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":null,"ceklis_persiapan_operasiii_2":null,"ceklis_persiapan_operasiii_3":null,"ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":null,"jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = '489', "jam_tanggal_cpo" = '2025-05-09 12.20', "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":"1","asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":"1","asssuhan_keperawatannnnn_ak_49":"1","asssuhan_keperawatannnnn_ak_50":"1","asssuhan_keperawatannnnn_ak_51":"1","asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":"1","asssuhan_keperawatannnnn_ak_55":"1","asssuhan_keperawatannnnn_ak_56":"1","asssuhan_keperawatannnnn_ak_57":"1","asssuhan_keperawatannnnn_ak_58":"1","asssuhan_keperawatannnnn_ak_59":"1","asssuhan_keperawatannnnn_ak_60":"1","asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":"1","asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":"1","asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":"1","asssuhan_keperawatannnnn_ak_70":"1","asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":"1","asssuhan_keperawatannnnn_ak_73":"1","asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":"1","asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = '630', "perawwat_ruangan_prrr" = '479', "perawwat_anastesi_paaa" = '491', "perawwat_kamar_bedahhh" = '476', "updated_at" = '2025-05-09 11:40:27'
WHERE "id_data_catatan_perioperatift" = '3700'
ERROR - 2025-05-09 11:41:02 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-05-09 11:41:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:41:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:42:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:42:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:42:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:42:58 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-09 11:43:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:43:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:43:20 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/medical_check_up/views/printing/cetak_surat_hrm_dompdf.php 1772
ERROR - 2025-05-09 11:43:20 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/medical_check_up/views/printing/cetak_surat_hrm_dompdf.php 1774
ERROR - 2025-05-09 11:43:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:43:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:44:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:44:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:44:58 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-09 11:44:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:44:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:44:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:44:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:44:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:44:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:44:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:45:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:45:40 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-05-09 11:46:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:47:21 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-09 11:47:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:47:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:47:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:47:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:47:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:47:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:47:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-09 11:47:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:48:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:48:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:48:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:48:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:48:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:49:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:49:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:49:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:51:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:52:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:52:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:53:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:55:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:56:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 11:56:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 11:56:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:56:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:57:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:57:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 11:58:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:00:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:00:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843353, '10', '', '', 'N...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:00:52 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (843353, '10', '', '', 'N...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843353, '10', '', '', 'NEBU', '', 'PC', '0', '', '0', 'MORN', 'udd', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 12:01:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:01:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:01:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:02:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:02:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:03:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:03:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:03:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 12:03:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:03:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:03:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:04:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:04:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:05:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:05:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:06:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:06:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:06:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:09:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:10:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:11:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:11:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:11:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:11:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:11:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:11:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:11:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:12:40 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-09 12:13:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:13:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:13:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = ''
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:13:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 9: WHERE "pd"."id" = ''
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = ''
ERROR - 2025-05-09 12:14:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = ''
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:14:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 9: WHERE "pd"."id" = ''
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = ''
ERROR - 2025-05-09 12:14:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 12:14:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:14:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:14:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (862023, 743144, null, 10, sesak dan gelisah, gcs e2m5v1
tidak ada lateralisasi, CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia in..., CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
a..., , 2123, 1, CT scan brain NK&lt;div&gt;inj haloperidol 1 amp IM &lt;/div&gt;&lt;div&gt;fenit..., null, null, 2123, 2025-05-09 12:14:44, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:14:44 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (862023, 743144, null, 10, sesak dan gelisah, gcs e2m5v1
tidak ada lateralisasi, CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia in..., CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
a..., , 2123, 1, CT scan brain NK<div>inj haloperidol 1 amp IM </div><div>fenit..., null, null, 2123, 2025-05-09 12:14:44, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('743144', NULL, '10', 'sesak dan gelisah', 'gcs e2m5v1
tidak ada lateralisasi', 'CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia inflamasi Pneumonia Penkes ec suspek hiperuremikum dd stroke Riw hipoglikemia , hipokalemia', 'CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
asam folat 2x1 ', '', '', '', '', '', '', '', '', '2123', '1', 'CT scan brain NK<div>inj haloperidol 1 amp IM </div><div>fenitoin 2x100mg</div><div>asam folat 2x1Â </div>', NULL, '2123', 0, NULL, '2025-05-09 12:14:44')
ERROR - 2025-05-09 12:15:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (862024, 743144, null, 10, sesak dan gelisah, gcs e2m5v1
tidak ada lateralisasi, CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia in..., CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
a..., , 2123, 1, CT scan brain NK&lt;div&gt;inj haloperidol 1 amp IM &lt;/div&gt;&lt;div&gt;fenit..., null, null, 2123, 2025-05-09 12:15:00, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:15:00 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (862024, 743144, null, 10, sesak dan gelisah, gcs e2m5v1
tidak ada lateralisasi, CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia in..., CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
a..., , 2123, 1, CT scan brain NK<div>inj haloperidol 1 amp IM </div><div>fenit..., null, null, 2123, 2025-05-09 12:15:00, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('743144', NULL, '10', 'sesak dan gelisah', 'gcs e2m5v1
tidak ada lateralisasi', 'CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia inflamasi Pneumonia Penkes ec suspek hiperuremikum dd stroke Riw hipoglikemia , hipokalemia', 'CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
asam folat 2x1 ', '', '', '', '', '', '', '', '', '2123', '1', 'CT scan brain NK<div>inj haloperidol 1 amp IM </div><div>fenitoin 2x100mg</div><div>asam folat 2x1Â </div>', NULL, '2123', 0, NULL, '2025-05-09 12:15:00')
ERROR - 2025-05-09 12:15:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (862025, 743144, null, 10, sesak dan gelisah, gcs e2m5v1
tidak ada lateralisasi, CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia in..., CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
a..., , 2123, 1, CT scan brain NK&lt;div&gt;inj haloperidol 1 amp IM &lt;/div&gt;&lt;div&gt;fenit..., null, null, 2123, 2025-05-09 12:15:03, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:15:03 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (862025, 743144, null, 10, sesak dan gelisah, gcs e2m5v1
tidak ada lateralisasi, CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia in..., CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
a..., , 2123, 1, CT scan brain NK<div>inj haloperidol 1 amp IM </div><div>fenit..., null, null, 2123, 2025-05-09 12:15:03, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('743144', NULL, '10', 'sesak dan gelisah', 'gcs e2m5v1
tidak ada lateralisasi', 'CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia inflamasi Pneumonia Penkes ec suspek hiperuremikum dd stroke Riw hipoglikemia , hipokalemia', 'CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
asam folat 2x1 ', '', '', '', '', '', '', '', '', '2123', '1', 'CT scan brain NK<div>inj haloperidol 1 amp IM </div><div>fenitoin 2x100mg</div><div>asam folat 2x1Â </div>', NULL, '2123', 0, NULL, '2025-05-09 12:15:03')
ERROR - 2025-05-09 12:15:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (862026, 743144, null, 10, sesak dan gelisah, gcs e2m5v1
tidak ada lateralisasi, CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia in..., CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
a..., , 2123, 1, CT scan brain NK&lt;div&gt;inj haloperidol 1 amp IM &lt;/div&gt;&lt;div&gt;fenit..., null, null, 2123, 2025-05-09 12:15:05, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:15:05 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (862026, 743144, null, 10, sesak dan gelisah, gcs e2m5v1
tidak ada lateralisasi, CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia in..., CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
a..., , 2123, 1, CT scan brain NK<div>inj haloperidol 1 amp IM </div><div>fenit..., null, null, 2123, 2025-05-09 12:15:05, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('743144', NULL, '10', 'sesak dan gelisah', 'gcs e2m5v1
tidak ada lateralisasi', 'CKD st 5 Riw HT HHD Efusi pleura sin ec susp TB dd CKD Anemia inflamasi Pneumonia Penkes ec suspek hiperuremikum dd stroke Riw hipoglikemia , hipokalemia', 'CT scan brain NK
inj haloperidol 1 amp IM 
fenitoin 2x100mg
asam folat 2x1 ', '', '', '', '', '', '', '', '', '2123', '1', 'CT scan brain NK<div>inj haloperidol 1 amp IM </div><div>fenitoin 2x100mg</div><div>asam folat 2x1Â </div>', NULL, '2123', 0, NULL, '2025-05-09 12:15:05')
ERROR - 2025-05-09 12:16:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:16:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:16:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:16:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:17:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:17:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:17:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:17:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:18:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:18:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:20:00 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 12:20:00 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 12:20:00 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-09 12:20:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 12:20:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 12:20:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-09 12:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:20:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:20:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:21:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:21:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:21:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:21:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:23:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:23:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:23:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:24:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:26:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:27:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:27:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:27:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843374, '23', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:27:15 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (843374, '23', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843374, '23', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 12:27:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:27:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:31:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:34:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:35:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843386, '13', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:35:00 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (843386, '13', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843386, '13', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 12:35:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:38:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:38:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:38:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 12:38:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('843387', '4', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:38:18 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('843387', '4', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('843387', '4', '', '2', 'Infus', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 12:38:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:38:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:38:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('843387', '4', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:38:56 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('843387', '4', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('843387', '4', '', '2', 'Injeksi', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 12:39:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:39:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:39:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:39:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:40:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:40:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:40:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 12:40:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 12:45:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:45:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:47:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:51:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:51:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 12:51:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 12:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:53:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:53:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:53:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 12:53:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 12:54:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:55:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:57:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 12:58:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 12:58:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 12:58:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 12:59:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:00:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:00:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:00:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380525V003753) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:00:14 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380525V003753) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380525V003753', "no_polish" = '0000040491448'
WHERE "id" = '685902'
ERROR - 2025-05-09 13:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:00:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:00:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:00:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6151126, '417', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:00:22 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6151126, '417', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6151126, '417', 8858.4, '1', '1.00', NULL, 'null')
ERROR - 2025-05-09 13:00:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:00:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:00:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:00:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:00:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:03:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:03:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:03:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:03:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:03:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:03:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:03:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:03:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:04:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:06:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:06:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:06:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-05-097 10:29:05&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-05-097 10:29...
                                                  ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:06:55 --> Query error: ERROR:  date/time field value out of range: "2025-05-097 10:29:05"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-05-097 10:29...
                                                  ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-05-097 10:29:05', "id_dokter_dpjp" = '438', "ttd_dokter_dpjp" = '1'
WHERE "id" = '859746'
ERROR - 2025-05-09 13:07:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:08:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:08:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:08:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:09:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 13:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:10:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:10:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:10:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:10:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:11:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:11:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:11:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:11:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:12:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:12:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:12:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:12:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:12:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:12:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:12:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:13:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:13:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:14:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:14:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:14:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:14:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:14:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:14:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:14:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:14:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:15:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:15:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:15:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:15:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:15:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:15:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:15:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:16:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:16:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:16:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:16:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:16:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:16:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:17:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:17:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:17:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:17:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:17:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:17:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:17:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:17:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:17:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:17:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:17:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:19:46 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-09 13:20:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:20:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:20:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:20:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:20:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:20:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:20:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:23:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:23:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:23:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:23:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:23:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:24:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:24:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:24:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:24:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:24:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:24:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:24:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:25:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:25:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:25:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:25:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:25:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:25:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:25:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:25:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:26:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:26:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:26:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:26:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:26:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:26:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:26:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:26:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:27:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:27:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:27:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:28:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:28:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:28:40 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-09 13:28:40 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-09 13:28:40 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-09 13:28:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:28:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:28:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:28:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:29:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:29:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:29:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:29:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:30:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:30:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:30:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:30:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:30:49 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/medical_check_up/views/printing/cetak_surat_hrm_dompdf.php 1774
ERROR - 2025-05-09 13:30:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:30:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:30:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:30:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:32:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 13:32:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:32:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:32:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:32:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:32:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:32:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:32:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:32:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:33:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:33:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:33:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:33:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:33:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:33:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:33:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:33:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:33:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:33:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:33:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:33:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:33:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:33:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:33:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:34:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:34:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:36:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:36:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:36:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:37:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:37:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:37:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:37:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:37:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:37:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:37:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:37:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:37:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:37:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:38:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:38:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:38:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:38:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:39:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:39:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:39:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:39:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:39:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:39:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:39:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:39:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:39:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:39:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:39:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:39:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:39:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:39:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:40:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:40:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:40:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:40:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:40:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:40:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:41:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:41:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:41:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:42:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:42:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:42:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:42:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:42:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:42:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:42:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:42:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:42:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:42:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:42:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 06:43:14 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-05-09 06:43:25 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-05-09 13:43:41 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-09 13:43:41 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-09 13:43:41 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-09 13:43:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:44:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:44:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:44:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:44:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:44:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:44:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:44:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:44:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:44:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:44:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:44:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:44:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843429, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:44:48 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843429, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843429, '1', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 13:44:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:45:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:45:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:45:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:45:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:46:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:46:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:46:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:46:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:46:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:46:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:46:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:46:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:46:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:46:48 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT "kode_bpjs"
FROM "sm_tenaga_medis"
WHERE "id" = ''
ERROR - 2025-05-09 13:46:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:46:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:46:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:46:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:46:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:46:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:47:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:47:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:47:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:47:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:47:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:47:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:47:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:47:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:47:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:47:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:47:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:47:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:48:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:48:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:48:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:48:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:48:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:48:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:48:41 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-09 13:48:41 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-09 13:48:41 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-09 13:48:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:48:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:49:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:49:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:49:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:49:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:50:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:50:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (720, 741460, 25, dr Pratiwi indar palupi, Istri pasien (dewi) , - Syok hipovolemik - Bacterial infection ec bacterial instestina..., null, Pemeriksaan Fisik dan Laboratorium, null, Transfusi darah PRC`, null, HB 6.8, null, SOP, null, Meningkatkan HB, null, Alergi, null, Bonam, null, tidak ada, null, tidak ada, null, tidak ada, null, tidak ada, null, dewi, 2025-05-09 13:50:33, null, 743, 684381, 2025-05-09 13:50:33, 2025-05-09 09:50:00). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:50:33 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (720, 741460, 25, dr Pratiwi indar palupi, Istri pasien (dewi) , - Syok hipovolemik - Bacterial infection ec bacterial instestina..., null, Pemeriksaan Fisik dan Laboratorium, null, Transfusi darah PRC`, null, HB 6.8, null, SOP, null, Meningkatkan HB, null, Alergi, null, Bonam, null, tidak ada, null, tidak ada, null, tidak ada, null, tidak ada, null, dewi, 2025-05-09 13:50:33, null, 743, 684381, 2025-05-09 13:50:33, 2025-05-09 09:50:00). - Invalid query: INSERT INTO "sm_form_pemberian_informasi" ("id_layanan_pendaftaran", "id_pendaftaran", "is_pasien", "id_dokter_pelaksana_tindakan", "tanggal_jam_pi", "pemberi_informasi", "penerima_informasi", "diagnosis_kerja", "diagnosis_kerja_check", "dasar_diagnosis", "dasar_diagnosis_check", "tindakan_kedokteran", "tindakan_kedokteran_check", "indikasi_tindakan", "indikasi_tindakan_check", "tata_cara", "tata_cara_check", "tujuan", "tujuan_check", "risiko_komplikasi", "risiko_komplikasi_check", "prognosis", "prognosis_check", "alternatif_resiko", "alternatif_resiko_check", "menyelamatkan_pasien", "menyelamatkan_pasien_check", "penggunaan_darah", "penggunaan_darah_check", "analgesia", "analgesia_check", "nama_keluarga", "id_users", "created_date", "updated_on") VALUES ('741460', '684381', NULL, '25', '2025-05-09 09:50', 'dr Pratiwi indar palupi', 'Istri pasien (dewi) ', '- Syok hipovolemik - Bacterial infection ec bacterial instestinal infection - GEA DRS - Hematoschezia ec hemorroid - Anemia sedang ec acute bleeding', NULL, 'Pemeriksaan Fisik dan Laboratorium', NULL, 'Transfusi darah PRC`', NULL, 'HB 6.8', NULL, 'SOP', NULL, 'Meningkatkan HB', NULL, 'Alergi', NULL, 'Bonam', NULL, 'tidak ada', NULL, 'tidak ada', NULL, 'tidak ada', NULL, 'tidak ada', NULL, 'dewi', '743', '2025-05-09 13:50:33', '2025-05-09 13:50:33')
ERROR - 2025-05-09 13:50:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:50:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:50:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (721, 741460, 25, dr Pratiwi indar palupi, Istri pasien (dewi) , - Syok hipovolemik - Bacterial infection ec bacterial instestina..., 1, Pemeriksaan Fisik dan Laboratorium, 1, Transfusi darah PRC`, 1, HB 6.8, 1, SOP, 1, Meningkatkan HB, 1, Alergi, 1, Bonam, 1, tidak ada, 1, tidak ada, 1, tidak ada, 1, tidak ada, 1, dewi, 2025-05-09 13:50:45, null, 743, 684381, 2025-05-09 13:50:45, 2025-05-09 09:50:00). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:50:45 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (721, 741460, 25, dr Pratiwi indar palupi, Istri pasien (dewi) , - Syok hipovolemik - Bacterial infection ec bacterial instestina..., 1, Pemeriksaan Fisik dan Laboratorium, 1, Transfusi darah PRC`, 1, HB 6.8, 1, SOP, 1, Meningkatkan HB, 1, Alergi, 1, Bonam, 1, tidak ada, 1, tidak ada, 1, tidak ada, 1, tidak ada, 1, dewi, 2025-05-09 13:50:45, null, 743, 684381, 2025-05-09 13:50:45, 2025-05-09 09:50:00). - Invalid query: INSERT INTO "sm_form_pemberian_informasi" ("id_layanan_pendaftaran", "id_pendaftaran", "is_pasien", "id_dokter_pelaksana_tindakan", "tanggal_jam_pi", "pemberi_informasi", "penerima_informasi", "diagnosis_kerja", "diagnosis_kerja_check", "dasar_diagnosis", "dasar_diagnosis_check", "tindakan_kedokteran", "tindakan_kedokteran_check", "indikasi_tindakan", "indikasi_tindakan_check", "tata_cara", "tata_cara_check", "tujuan", "tujuan_check", "risiko_komplikasi", "risiko_komplikasi_check", "prognosis", "prognosis_check", "alternatif_resiko", "alternatif_resiko_check", "menyelamatkan_pasien", "menyelamatkan_pasien_check", "penggunaan_darah", "penggunaan_darah_check", "analgesia", "analgesia_check", "nama_keluarga", "id_users", "created_date", "updated_on") VALUES ('741460', '684381', NULL, '25', '2025-05-09 09:50', 'dr Pratiwi indar palupi', 'Istri pasien (dewi) ', '- Syok hipovolemik - Bacterial infection ec bacterial instestinal infection - GEA DRS - Hematoschezia ec hemorroid - Anemia sedang ec acute bleeding', '1', 'Pemeriksaan Fisik dan Laboratorium', '1', 'Transfusi darah PRC`', '1', 'HB 6.8', '1', 'SOP', '1', 'Meningkatkan HB', '1', 'Alergi', '1', 'Bonam', '1', 'tidak ada', '1', 'tidak ada', '1', 'tidak ada', '1', 'tidak ada', '1', 'dewi', '743', '2025-05-09 13:50:45', '2025-05-09 13:50:45')
ERROR - 2025-05-09 13:50:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:50:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:51:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:51:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:51:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:51:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:53:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:53:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:53:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:53:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:53:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:53:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:53:42 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-09 13:53:42 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-09 13:53:42 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-09 13:54:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-05-09 13:54:00 --> Severity: Notice  --> Trying to get property 'success' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-05-09 13:54:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:55:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:55:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:55:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:55:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:55:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:56:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:56:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:56:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:56:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:56:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:56:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:56:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:56:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:56:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:57:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:57:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:57:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:57:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:57:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:57:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:57:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:57:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:57:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:57:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:57:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:57:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:58:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 13:58:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843437, '1', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:58:49 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843437, '1', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843437, '1', '2', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 13:59:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:59:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:59:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:59:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:59:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:59:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 13:59:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 13:59:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:00:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:00:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:00:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:00:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843442, '3', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:00:57 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843442, '3', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843442, '3', '2', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 14:01:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:01:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:02:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843444, '1', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:02:02 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (843444, '1', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843444, '1', '2', '', '', '', 'PC', '0', '', '0', '', '1x2gr', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 14:02:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:02:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:02:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:02:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:02:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:02:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:02:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:02:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:03:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:03:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:03:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6152443, '920', 5478.516, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:03:15 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6152443, '920', 5478.516, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6152443, '920', 5478.516, '1', '1.00', NULL, 'null')
ERROR - 2025-05-09 14:03:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:03:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:03:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:03:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:03:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:03:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:03:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:03:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:03:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:03:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:03:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:03:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:03:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:04:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:04:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:05:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:05:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:05:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:05:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:05:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:05:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:06:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:06:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:07:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:07:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:07:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:07:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:07:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:07:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:07:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:07:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:08:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:08:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:08:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:08:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:09:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:09:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:09:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:09:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:09:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:09:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:09:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:09:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:09:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:09:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:09:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:10:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:10:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:10:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:10:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:10:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:10:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:10:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:10:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:11:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:11:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:11:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:11:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:11:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:11:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:11:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:11:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:11:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:11:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:12:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:12:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:12:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:12:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-05-09 14:12:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:12:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-05-09 14:12:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:12:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:12:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:12:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:12:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:12:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:12:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:12:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:13:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:13:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:13:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:13:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:13:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:13:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:13:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:13:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:13:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:13:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:14:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:14:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:14:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:14:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:14:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:14:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:14:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:14:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:14:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:14:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:14:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:14:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:15:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:15:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:15:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:15:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:15:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:15:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:15:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('843356', '13', '', '3', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:15:34 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('843356', '13', '', '3', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('843356', '13', '', '3', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 14:15:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:15:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:15:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:15:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:16:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:16:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:16:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:16:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:16:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:16:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:17:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:17:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:17:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:17:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:17:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:17:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:17:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:17:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:17:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:17:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:17:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:17:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:18:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:18:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:18:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:19:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:19:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:19:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:19:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 14:20:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:20:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:20:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:20:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:20:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:20:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:20:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:20:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:20:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:20:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:20:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:20:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:20:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:20:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:20:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:20:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:21:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:21:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:21:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:21:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:21:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:21:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:21:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:21:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:21:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:21:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:21:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:21:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:21:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:22:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:22:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:22:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:22:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:22:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:22:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:22:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:22:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:22:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:22:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:22:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:22:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:22:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:22:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:23:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:23:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:23:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:23:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:23:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:23:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:24:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:24:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:24:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 14:24:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:24:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:24:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:24:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:24:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:24:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:24:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:24:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:25:55 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-09 14:25:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:25:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:25:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:26:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 14:26:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 14:26:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:26:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:26:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:26:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:26:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:26:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:26:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:26:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:26:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:26:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:26:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:26:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:27:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:27:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:27:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:29:07 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-05-09 14:29:07 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-05-09 14:30:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:30:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:30:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:30:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:30:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-05-09 14:30:52', 1280933, '172', '', '17916...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:30:53 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-05-09 14:30:52', 1280933, '172', '', '17916...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-05-09 14:30:52', 1280933, '172', '', '179161.00', '214993.20', '1', 214993.2, '259', '2026')
ERROR - 2025-05-09 14:30:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:30:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:31:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:31:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:31:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:31:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:31:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:31:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:31:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:31:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:31:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:31:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:31:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:32:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:32:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:32:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:32:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:32:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:32:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:32:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:32:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:32:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:33:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:33:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:33:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:33:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:33:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:34:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:34:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:34:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:34:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:34:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:34:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:34:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:34:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:35:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:35:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:35:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:35:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:35:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:35:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:36:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:36:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:36:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:36:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:36:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:36:33 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8910
ERROR - 2025-05-09 14:36:33 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12502
ERROR - 2025-05-09 14:36:33 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12506
ERROR - 2025-05-09 14:36:33 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12516
ERROR - 2025-05-09 14:36:33 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12520
ERROR - 2025-05-09 14:36:33 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8925
ERROR - 2025-05-09 14:36:33 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8930
ERROR - 2025-05-09 14:36:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:36:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:36:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:36:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:37:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:37:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:37:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:37:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:37:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:37:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:37:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:37:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:38:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:38:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:38:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:38:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:38:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:38:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:38:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:38:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:38:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:38:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:39:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:39:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:39:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:39:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:39:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:39:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:39:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:39:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:40:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:40:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:40:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:40:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:40:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:40:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:40:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:40:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:41:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:41:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:41:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:41:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:41:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 14:41:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:41:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:41:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:41:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:43:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:43:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:43:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:43:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:43:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:43:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:43:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:43:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:44:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:44:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:44:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:44:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:45:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 14:46:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:46:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:46:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 14:46:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:46:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:46:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:46:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:46:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 14:46:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 14:47:54 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-09 14:49:04 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-09 14:49:17 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-09 14:52:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:55:01 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-05-09 14:55:01 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-05-09 14:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 14:58:29 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_penjualan_obat/export.php 98
ERROR - 2025-05-09 15:00:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:00:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:01:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:02:49 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 15:04:25 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 15:05:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:05:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:05:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:05:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:06:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:06:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:06:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:06:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:06:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:06:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:06:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:06:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:07:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:07:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:07:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:07:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:07:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:08:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:09:12 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-09 15:09:13 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-09 15:09:13 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-09 15:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:15:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:21:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 15:21:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 15:21:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 15:21:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 15:28:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:28:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:28:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:28:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:29:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:29:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:30:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:34:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:35:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:35:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:36:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:36:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:36:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:36:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:36:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:36:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:36:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('843357', '17', '3', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:36:31 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('843357', '17', '3', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('843357', '17', '3', '', '2 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 15:36:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:36:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:36:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:37:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:37:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:37:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:37:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:37:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:37:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:37:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:38:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:38:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:38:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:38:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:38:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:38:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:38:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:39:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:39:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:39:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:39:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:39:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:39:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:39:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:39:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:39:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:40:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:40:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:40:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:40:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:40:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:40:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:40:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:41:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:41:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:41:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:41:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:41:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:41:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:41:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:41:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:41:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:41:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:41:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:41:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:41:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:42:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:43:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:43:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:43:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:43:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:43:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:43:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:43:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:43:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:44:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:44:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:45:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:45:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:45:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:45:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:46:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:46:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:46:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:46:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:47:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:47:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:47:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:47:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:48:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:48:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:49:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:49:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:49:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:49:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 15:49:48 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 15:49:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:49:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:50:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:50:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:50:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:50:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:50:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:51:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:51:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:51:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:51:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:51:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:53:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 4: AND &quot;id_penjamin&quot; = ''
                            ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:53:45 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 4: AND "id_penjamin" = ''
                            ^ - Invalid query: SELECT *
FROM "sm_penjamin_pasien"
WHERE "id_pasien" = '00375212'
AND "id_penjamin" = ''
ERROR - 2025-05-09 15:53:53 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 15:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:55:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 15:55:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:55:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 15:57:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 15:58:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 15:59:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 16:05:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 16:08:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:11:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:16:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 16:29:57 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-05-09 16:30:18 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-05-09 16:34:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 16:35:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 16:35:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 16:37:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 16:39:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:39:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:39:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:40:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:40:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:40:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:41:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:42:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:42:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:43:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:43:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:43:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:44:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:47:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 09:53:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-09 09:53:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-09 16:54:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:54:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 16:59:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 16:59:02 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('743911', '2025-05-09 16:37', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'demam naik tueun', '1 minggu ', '1 minggu', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'demam naik turun dan ada plentingan di tubuh', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', '37', '3.2', '53', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '1', '0', '', '0', '', '', '', '', '', '', '', '', '', '{"cemas":"","takut":"","marah":"","sedih":"1","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'karyawanswasta', 'ibu rumah tangga', 'BPJS', '', '', '', 'Islam', '', 'sholat', 'sholat dan doa', '', '', '', '', 'WNI', 'sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '1', '1', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '111', '72', '112', '38.1', '20', '68', '.', '150', '.', '.', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '-', '-', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', 'Ringan', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"1","lain":"","ket_lain":""}', 'kepala', '121', '3', NULL, '2', NULL, '0', NULL, NULL, '0', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, '4', NULL, NULL, '2', NULL, '2', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '10', NULL, NULL, NULL, NULL, NULL, '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_18', '0_1', '0_1', '0_4', '1_26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terlampir', '-', '-', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"1","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"1","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"1","kriteria_9":"","kriteria_lain":""}}', '411', '674', NULL, '2025-05-10 09:01', '1', '1', '2025-05-09 16:59:02')
ERROR - 2025-05-09 16:59:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 16:59:07 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('743911', '2025-05-09 16:37', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'demam naik tueun', '1 minggu ', '1 minggu', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'demam naik turun dan ada plentingan di tubuh', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', '37', '3.2', '53', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '1', '0', '', '0', '', '', '', '', '', '', '', '', '', '{"cemas":"","takut":"","marah":"","sedih":"1","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'karyawanswasta', 'ibu rumah tangga', 'BPJS', '', '', '', 'Islam', '', 'sholat', 'sholat dan doa', '', '', '', '', 'WNI', 'sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '1', '1', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '111', '72', '112', '38.1', '20', '68', '.', '150', '.', '.', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '-', '-', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', 'Ringan', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"1","lain":"","ket_lain":""}', 'kepala', '121', '3', NULL, '2', NULL, '0', NULL, NULL, '0', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, '4', NULL, NULL, '2', NULL, '2', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '10', NULL, NULL, NULL, NULL, NULL, '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_18', '0_1', '0_1', '0_4', '1_26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terlampir', '-', '-', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"1","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"1","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"1","kriteria_9":"","kriteria_lain":""}}', '411', '674', NULL, '2025-05-10 09:01', '1', '1', '2025-05-09 16:59:07')
ERROR - 2025-05-09 16:59:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 17:00:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:00:37 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('743911', '2025-05-09 16:37', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'demam naik tueun', '1 minggu ', '1 minggu', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'demam naik turun dan ada plentingan di tubuh', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', '37', '3.2', '53', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '1', '0', '', '0', '', '.', '.', '.', '.', '.', '.', '.', '.', '{"cemas":"","takut":"","marah":"","sedih":"1","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'karyawanswasta', 'ibu rumah tangga', 'BPJS', '', '', '', 'Islam', '', 'sholat', 'sholat dan doa', 'Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'sunda', '1', '', '0', '', '0', '0', '', 'SD', '1', '1', '1', '1', '1', '1', '1', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '111', '72', '112', '38.1', '20', '68', '.', '150', '.', '.', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '-', '-', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', 'Ringan', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"1","lain":"","ket_lain":""}', 'kepala', '121', '3', NULL, '2', NULL, '0', NULL, NULL, '0', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, '4', NULL, NULL, '2', NULL, '2', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '10', NULL, NULL, NULL, NULL, NULL, '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_18', '0_1', '0_1', '0_4', '1_26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terlampir', '-', '-', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"1","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"1","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"1","kriteria_9":"","kriteria_lain":""}}', '411', '674', NULL, '2025-05-10 09:01', '1', '1', '2025-05-09 17:00:37')
ERROR - 2025-05-09 17:00:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:00:58 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('743911', '2025-05-09 16:37', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'demam naik tueun', '1 minggu ', '1 minggu', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'demam naik turun dan ada plentingan di tubuh', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', '37', '3.2', '53', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '1', '0', '', '0', '', '.', '.', '.', '.', '.', '.', '.', '.', '{"cemas":"","takut":"","marah":"","sedih":"1","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'karyawanswasta', 'ibu rumah tangga', 'BPJS', '', '', '', 'Islam', '', 'sholat', 'sholat dan doa', 'Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'sunda', '1', '', '0', '', '0', '0', '', 'SD', '1', '1', '1', '1', '1', '1', '1', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '111', '72', '112', '38.1', '20', '68', '.', '150', '.', '.', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '-', '-', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', 'Ringan', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"1","lain":"","ket_lain":""}', 'kepala', '121', '3', NULL, '2', NULL, '0', NULL, NULL, '0', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, '4', NULL, NULL, '2', NULL, '2', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '10', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_18', '0_1', '0_1', '0_4', '1_26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terlampir', '-', '-', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"1","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"1","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"1","kriteria_9":"","kriteria_lain":""}}', '411', '674', NULL, '2025-05-10 09:01', '1', '1', '2025-05-09 17:00:58')
ERROR - 2025-05-09 17:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:01:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 17:01:16 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 17:01:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:01:44 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('743911', '2025-05-09 16:37', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'demam naik tueun', '1 minggu ', '1 minggu', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'demam naik turun dan ada plentingan di tubuh', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', '37', '3.2', '53', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '1', '0', '', '0', '', '.', '.', '.', '.', '.', '.', '.', '.', '{"cemas":"","takut":"","marah":"","sedih":"1","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'karyawanswasta', 'ibu rumah tangga', 'BPJS', '', '', '', 'Islam', '', 'sholat', 'sholat dan doa', 'Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'sunda', '1', '', '0', '', '0', '0', '', 'SD', '1', '1', '1', '1', '1', '1', '1', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '111', '72', '112', '38.1', '20', '68', '.', '150', '.', '.', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '-', '-', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', 'Ringan', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"1","lain":"","ket_lain":""}', 'kepala', '121', '3', NULL, '2', NULL, '0', NULL, NULL, '0', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, '4', NULL, NULL, '2', NULL, '2', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '10', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_18', '0_1', '0_1', '0_4', '1_26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terlampir', '-', '-', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"1","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"1","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"1","kriteria_9":"","kriteria_lain":""}}', '411', '674', NULL, '2025-05-10 09:01', '1', '1', '2025-05-09 17:01:44')
ERROR - 2025-05-09 17:02:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:02:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 17:02:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:02:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 17:03:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:03:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 17:03:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('843499', '5', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:03:55 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('843499', '5', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('843499', '5', '', '', '3 X SEHARI 10 UNIT', '(PAGI 10 UNIT SIANG 10 UNIT SORE 10 UNIT)', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 17:05:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:05:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 17:05:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:05:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 17:12:41 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-09 17:14:44 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-05-09 17:14:44 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-05-09 17:14:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 17:14:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 17:20:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:20:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 17:33:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-09 17:33:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-09 17:33:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 17:37:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 17:39:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:39:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 17:39:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 17:45:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 17:45:45 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-09 17:45:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 17:48:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 17:51:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 17:53:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:53:51 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('743146', '2025-05-09 17:32', '8', '', '', 'BBLR CB KMK Neonatal Pneumonia GIT bleeding ec susp PDVK Sepsis Neonatorum Awitan Dini
', '', '', '', '', '', 'sempat sehabis nangis, pasien langsung biru tubuhnya, saturasi oksigen turun. namun tidak setiap anngis, badannya menjadi biru. pasien sempat apnue 2 x sore ini', 'N : 145 x/menit, rr : 54 x/menit, sp02 : 98» : 1520 gram', 'NKB-SMK, Asfiksia neonatorum, observasi hipoglikemia', 'lapor kondisi pasien ke dr. Angel,Sp. A', '1885', '1', '<p>sudah konfirmasi ulang ke dr. Angel, Sp. A</p><p>advice :</p><p>terapi tambahan</p><p>inj. aminofilin 12 mg loading dose, setelah itu 8 jam berikutnya 2,5 mg/8 jam</p><p>monitor HR</p>', NULL, '1885', '1', NULL, '2025-05-09 17:53:51')
ERROR - 2025-05-09 17:58:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:58:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 17:58:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 17:58:19 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 17:59:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 18:07:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843521, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 18:07:01 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843521, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843521, '1', '', '', '', '', 'null', '0', '', '0', 'MORN', NULL, '1', 1, '1x200 mg', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 18:13:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 18:15:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 18:15:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 18:19:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 18:19:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 18:19:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 18:19:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 18:20:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 18:20:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 18:21:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 18:21:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 18:21:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 18:23:32 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 18:23:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 18:23:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 18:26:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 18:30:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 18:30:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 18:57:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 19:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 19:13:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 19:13:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:13:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 19:13:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:13:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 19:15:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:15:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 19:18:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6154480, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:18:47 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6154480, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6154480, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-05-09 19:20:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843540, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:20:21 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843540, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843540, '3', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 19:21:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843541, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:21:41 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843541, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843541, '3', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 19:28:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:28:30 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('743911', '2025-05-09 19:13', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'demam', '1 minggu', '1 minggu', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'demam, dan muncul plentingan', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', '38', '3.2', '53', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '1', '0', '', '0', '', '', '', '', '', '', '', '', '', '{"cemas":"","takut":"","marah":"","sedih":"1","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'karyawanswasta', 'ibu rumah tangga', 'BPJS', '', '', '', 'Islam', '', 'sholat', 'sholat', 'Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'sunda', '1', '', '0', '', '0', '0', '-', 'SD', '1', '1', '1', '1', '1', '0', '1', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '118', '72', '120', '37.7', '20', '68', '.', '150', '.', '.', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '', '', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', 'Sedang', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"1","lain":"","ket_lain":""}', 'telinga', '120', '3', NULL, '2', NULL, '0', NULL, NULL, '0', NULL, NULL, NULL, '1', NULL, '0', NULL, NULL, '3', NULL, NULL, '2', NULL, '2', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '10', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_18', '0_1', '0_1', '0_4', '1_26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terlampir', '-', '-', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"1","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"1","ket_lain":""}', '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '411', '674', NULL, '2025-05-09 19:30', '1', '1', '2025-05-09 19:28:30')
ERROR - 2025-05-09 19:31:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:31:10 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('743911', '2025-05-09 19:13', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'demam', '1 minggu', '1 minggu', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'demam, dan muncul plentingan', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', '38', '3.2', '53', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '1', '0', '', '0', '', '.', '.', '.', '.', '.', '.', '.', '.', '{"cemas":"","takut":"","marah":"","sedih":"1","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'karyawanswasta', 'ibu rumah tangga', 'BPJS', '', '', '', 'Islam', '', 'sholat', 'sholat', 'Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'sunda', '1', '', '0', '', '0', '0', '-', 'SD', '1', '1', '1', '1', '1', '0', '1', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '118', '72', '120', '37.7', '20', '68', '.', '150', '.', '.', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '-', '-', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', 'Sedang', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"1","lain":"","ket_lain":""}', 'telinga', '120', '3', NULL, '2', NULL, '0', NULL, NULL, '0', NULL, NULL, NULL, '1', NULL, '0', NULL, NULL, '3', NULL, NULL, '2', NULL, '2', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '10', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_18', '0_1', '0_1', '0_4', '1_26', '0_1', '0_3', '0_3', 'Hijau', '2025-05-09', '', 'terlampir', '-', '-', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"1","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"1","ket_lain":""}', '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '411', '674', NULL, '2025-05-09 19:30', '1', '1', '2025-05-09 19:31:10')
ERROR - 2025-05-09 19:33:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:33:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-09 19:33:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:33:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-09 19:48:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:48:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 19:48:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:48:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 19:48:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 19:48:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 19:48:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 19:48:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:48:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 19:48:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 19:48:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 19:48:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 19:48:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 19:48:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 19:52:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:52:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 19:53:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:53:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 19:53:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 19:53:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 20:06:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 20:06:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 20:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 20:14:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 20:14:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 20:21:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 20:22:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 20:22:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 20:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 20:35:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 20:41:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 20:45:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 20:45:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 20:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 20:50:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 20:50:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 20:53:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 20:53:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 20:57:40 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-05-09 20:58:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 21:00:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 21:25:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6154827, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 21:25:02 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6154827, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6154827, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-05-09 14:30:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-09 14:30:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-09 21:35:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-05-09 21:35:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-05-09 21:35:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-05-09 21:36:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-05-09 21:36:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-05-09 21:36:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-05-09 21:41:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (6154851, '619', 1442.556, '30', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 21:41:01 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (6154851, '619', 1442.556, '30', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6154851, '619', 1442.556, '30', '1.00', 'Ya', 'null')
ERROR - 2025-05-09 21:54:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 21:57:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 21:57:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 21:57:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 21:57:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 21:57:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-09 22:00:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (843567, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:00:05 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (843567, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (843567, '3', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-09 22:01:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 22:02:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 22:24:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:24:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:24:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:24:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:31:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 22:33:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 22:34:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:34:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:34:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (6155124, '330', 16045.272, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:34:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (6155124, '330', 16045.272, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6155124, '330', 16045.272, '1', '1.00', NULL, 'null')
ERROR - 2025-05-09 22:34:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:34:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:34:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:34:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:34:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:34:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:34:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:34:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:34:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:34:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:34:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:35:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:35:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:40:24 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-05-09 22:40:24 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-05-09 22:40:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6155206, '60', 130.8, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:40:55 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6155206, '60', 130.8, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6155206, '60', 130.8, '1', '2.00', NULL, 'null')
ERROR - 2025-05-09 22:41:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_laboratorium/models/Order_laboratorium_model.php 508
ERROR - 2025-05-09 22:42:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 22:47:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:47:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:51:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:51:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:53:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:53:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:53:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 22:53:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 22:53:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-09 23:02:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 23:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 23:21:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 23:21:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 23:24:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 23:24:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 23:24:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6155383, '196', 17049.6, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 23:24:49 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6155383, '196', 17049.6, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6155383, '196', 17049.6, '1', '1.00', NULL, 'null')
ERROR - 2025-05-09 23:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 23:26:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 23:26:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 23:26:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 23:26:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-09 23:26:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-09 23:51:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 23:53:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-09 18:14:47 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-05-09 18:14:47 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-05-09 18:14:47 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-05-09 18:14:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-05-09 18:14:47 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-05-09 18:14:47 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-05-09 18:15:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-09 18:15:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
