<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-04-30 00:00:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6078607, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:00:49 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6078607, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6078607, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 00:03:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 00:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:10:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 00:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:10:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 00:15:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 00:24:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (6078673, '554', 5280.048, '1000', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:24:24 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (6078673, '554', 5280.048, '1000', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6078673, '554', 5280.048, '1000', '2.00', 'Ya', 'null')
ERROR - 2025-04-30 00:37:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ..._kdpi_6&quot;:&quot;JERNIH&quot;,&quot;riwayat_kdpi_7&quot;:&quot;TIDAK ADA&quot;}', '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:37:53 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..._kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-3...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_neonatus" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "tanggal_jam_pengkajian", "membawa_obat", "cara_masuk_irj_neonatus", "cara_masuk_igd_neonatus", "cara_masuk_lain_neonatus", "cara_masuk_lain_lain_neonatus", "nama_ayah", "nama_ibu", "riwayat_kehamilan_persalinan", "tanggal_lahir_riwayat", "riwayat_kehamilan_bayi", "riwayat_kehamilan_bayii", "apgar_frekuensi_jantung", "apgar_usaha_nafas", "apgar_tonus_otot", "apgar_refleksi", "apgar_warna", "apgar_skor_1", "apgar_skor_2", "pemeriksaan_fisik_dan_ttv", "neonatusj", "ket_nyerii", "pengkajian_nyeri_kepala", "pengkajian_nyeri_mata", "pengkajian_nyeri_tht", "pengkajian_nyeri_mulut", "pengkajian_nyeri_gigi", "pengkajian_nyeri_leher", "pengkajian_nyeri_dada", "pengkajian_nyeri_paru_paru", "pengkajian_nyeri_jantung", "pengkajian_nyeri_extremitas_atas", "pengkajian_nyeri_abdomen", "pengkajian_nyeri_umbilikal", "pengkajian_nyeri_genetalia", "pengkajian_nyeri_anus", "pengkajian_nyeri_kulit", "pengkajian_nyeri_refleks", "pengkajian_nyeri_otot_tonus", "pengkajian_nyeri_ektremitas_bawah", "pews_pernafasan", "pews_alat_bantu", "pews_saturasi", "pews_nadi", "pews_warna_kulit", "pews_tds", "pews_total", "skrining_usia", "skrining_nafas", "skrining_sepsis", "skrining_multiple", "skrining_stadium", "data_penunjang_tgl_lab", "data_penunjang_tgl_radiologi", "data_penunjang_hasil", "data_penunjang_hasil1", "data_penunjang_lain_lain", "masalah_keperawatann", "kriteria_discharge_planingg", "perencanaan_pulangg", "tanggal_jam_perawat", "id_perawat", "ceklis_ttd_perawat", "tanggal_jam_dokter", "id_dokter", "ceklis_ttd_dokter", "created_date") VALUES ('737382', '680721', '2050', '2025-04-30 00:29', 'tidak', NULL, NULL, NULL, NULL, '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN ","data_ayah_3":"ISLAM","data_ayah_4":"KARYAWAN SWASTA","data_ayah_5":null,"data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006","data_ayah_7":"085697121916"}', '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI","data_ibu_2":"22 THN ","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":null,"data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006","data_ibu_7":"085697121916"}', '{"riwayat_kdpi_1":"G1P0A0 ","riwayat_kdpi_2":"39 MINGGU","riwayat_kdpi_3":"SPONTAN PERVAGINAM","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-30 22.10', '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+","riwayat_kb_10":"SUDAH BAB","riwayat_kb_11":"BELUM BAK "}', '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', '{"ptn_keterangan":"Tidak Nyeri"}', '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', '{"mataa_1":"1","mataa_2":null,"mataa_3":"1","mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":null,"tht_6":null}', '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', '{"leher_1":"1","leher_2":null,"leher_3":null}', '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":"1","ardomen_6":"-","ardomen_7":"1","ardomen_8":"30"}', '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', '{"anus_1":"1"}', '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', '0_3', '0_3', '0_3', '0_1', '0_3', '0_1', 'putih', '0', '0', '0', '0', '0', '1970-01-01', '1970-01-01', '-', '-', '-', '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMI"}', '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', '2025-04-30 00:29', '613', '1', NULL, '56', '1', '2025-04-30 00:37:53')
ERROR - 2025-04-30 00:38:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ..._kdpi_6&quot;:&quot;JERNIH&quot;,&quot;riwayat_kdpi_7&quot;:&quot;TIDAK ADA&quot;}', '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:38:03 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..._kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-3...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_neonatus" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "tanggal_jam_pengkajian", "membawa_obat", "cara_masuk_irj_neonatus", "cara_masuk_igd_neonatus", "cara_masuk_lain_neonatus", "cara_masuk_lain_lain_neonatus", "nama_ayah", "nama_ibu", "riwayat_kehamilan_persalinan", "tanggal_lahir_riwayat", "riwayat_kehamilan_bayi", "riwayat_kehamilan_bayii", "apgar_frekuensi_jantung", "apgar_usaha_nafas", "apgar_tonus_otot", "apgar_refleksi", "apgar_warna", "apgar_skor_1", "apgar_skor_2", "pemeriksaan_fisik_dan_ttv", "neonatusj", "ket_nyerii", "pengkajian_nyeri_kepala", "pengkajian_nyeri_mata", "pengkajian_nyeri_tht", "pengkajian_nyeri_mulut", "pengkajian_nyeri_gigi", "pengkajian_nyeri_leher", "pengkajian_nyeri_dada", "pengkajian_nyeri_paru_paru", "pengkajian_nyeri_jantung", "pengkajian_nyeri_extremitas_atas", "pengkajian_nyeri_abdomen", "pengkajian_nyeri_umbilikal", "pengkajian_nyeri_genetalia", "pengkajian_nyeri_anus", "pengkajian_nyeri_kulit", "pengkajian_nyeri_refleks", "pengkajian_nyeri_otot_tonus", "pengkajian_nyeri_ektremitas_bawah", "pews_pernafasan", "pews_alat_bantu", "pews_saturasi", "pews_nadi", "pews_warna_kulit", "pews_tds", "pews_total", "skrining_usia", "skrining_nafas", "skrining_sepsis", "skrining_multiple", "skrining_stadium", "data_penunjang_tgl_lab", "data_penunjang_tgl_radiologi", "data_penunjang_hasil", "data_penunjang_hasil1", "data_penunjang_lain_lain", "masalah_keperawatann", "kriteria_discharge_planingg", "perencanaan_pulangg", "tanggal_jam_perawat", "id_perawat", "ceklis_ttd_perawat", "tanggal_jam_dokter", "id_dokter", "ceklis_ttd_dokter", "created_date") VALUES ('737382', '680721', '2050', '2025-04-30 00:29', 'tidak', NULL, NULL, NULL, NULL, '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN ","data_ayah_3":"ISLAM","data_ayah_4":"KARYAWAN SWASTA","data_ayah_5":null,"data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006","data_ayah_7":"085697121916"}', '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI","data_ibu_2":"22 THN ","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":null,"data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006","data_ibu_7":"085697121916"}', '{"riwayat_kdpi_1":"G1P0A0 ","riwayat_kdpi_2":"39 MINGGU","riwayat_kdpi_3":"SPONTAN PERVAGINAM","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-30 22.10', '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+","riwayat_kb_10":"SUDAH BAB","riwayat_kb_11":"BELUM BAK "}', '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', '{"ptn_keterangan":"Tidak Nyeri"}', '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', '{"mataa_1":"1","mataa_2":null,"mataa_3":"1","mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":null,"tht_6":null}', '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', '{"leher_1":"1","leher_2":null,"leher_3":null}', '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":"1","ardomen_6":"-","ardomen_7":"1","ardomen_8":"30"}', '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', '{"anus_1":"1"}', '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', '0_3', '0_3', '0_3', '0_1', '0_3', '0_1', 'putih', '0', '0', '0', '0', '0', '1970-01-01', '1970-01-01', '-', '-', '-', '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMI"}', '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', '2025-04-30 00:29', '613', '1', NULL, '56', '1', '2025-04-30 00:38:03')
ERROR - 2025-04-30 00:38:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ..._kdpi_6&quot;:&quot;JERNIH&quot;,&quot;riwayat_kdpi_7&quot;:&quot;TIDAK ADA&quot;}', '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:38:16 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..._kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-3...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_neonatus" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "tanggal_jam_pengkajian", "membawa_obat", "cara_masuk_irj_neonatus", "cara_masuk_igd_neonatus", "cara_masuk_lain_neonatus", "cara_masuk_lain_lain_neonatus", "nama_ayah", "nama_ibu", "riwayat_kehamilan_persalinan", "tanggal_lahir_riwayat", "riwayat_kehamilan_bayi", "riwayat_kehamilan_bayii", "apgar_frekuensi_jantung", "apgar_usaha_nafas", "apgar_tonus_otot", "apgar_refleksi", "apgar_warna", "apgar_skor_1", "apgar_skor_2", "pemeriksaan_fisik_dan_ttv", "neonatusj", "ket_nyerii", "pengkajian_nyeri_kepala", "pengkajian_nyeri_mata", "pengkajian_nyeri_tht", "pengkajian_nyeri_mulut", "pengkajian_nyeri_gigi", "pengkajian_nyeri_leher", "pengkajian_nyeri_dada", "pengkajian_nyeri_paru_paru", "pengkajian_nyeri_jantung", "pengkajian_nyeri_extremitas_atas", "pengkajian_nyeri_abdomen", "pengkajian_nyeri_umbilikal", "pengkajian_nyeri_genetalia", "pengkajian_nyeri_anus", "pengkajian_nyeri_kulit", "pengkajian_nyeri_refleks", "pengkajian_nyeri_otot_tonus", "pengkajian_nyeri_ektremitas_bawah", "pews_pernafasan", "pews_alat_bantu", "pews_saturasi", "pews_nadi", "pews_warna_kulit", "pews_tds", "pews_total", "skrining_usia", "skrining_nafas", "skrining_sepsis", "skrining_multiple", "skrining_stadium", "data_penunjang_tgl_lab", "data_penunjang_tgl_radiologi", "data_penunjang_hasil", "data_penunjang_hasil1", "data_penunjang_lain_lain", "masalah_keperawatann", "kriteria_discharge_planingg", "perencanaan_pulangg", "tanggal_jam_perawat", "id_perawat", "ceklis_ttd_perawat", "tanggal_jam_dokter", "id_dokter", "ceklis_ttd_dokter", "created_date") VALUES ('737382', '680721', '2050', '2025-04-30 00:29', 'tidak', NULL, NULL, NULL, NULL, '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN ","data_ayah_3":"ISLAM","data_ayah_4":"KARYAWAN SWASTA","data_ayah_5":null,"data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006","data_ayah_7":"085697121916"}', '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI","data_ibu_2":"22 THN ","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":null,"data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006","data_ibu_7":"085697121916"}', '{"riwayat_kdpi_1":"G1P0A0 ","riwayat_kdpi_2":"39 MINGGU","riwayat_kdpi_3":"SPONTAN PERVAGINAM","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-30 22.10', '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+","riwayat_kb_10":"SUDAH BAB","riwayat_kb_11":"BELUM BAK "}', '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', '{"ptn_keterangan":"Tidak Nyeri"}', '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', '{"mataa_1":"1","mataa_2":null,"mataa_3":"1","mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":null,"tht_6":null}', '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', '{"leher_1":"1","leher_2":null,"leher_3":null}', '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":"1","ardomen_6":"-","ardomen_7":"1","ardomen_8":"30"}', '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', '{"anus_1":"1"}', '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', '0_3', '0_3', '0_3', '0_1', '0_3', '0_1', 'putih', '0', '0', '0', '0', '0', '1970-01-01', '1970-01-01', '-', '-', '-', '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMI"}', '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', '2025-04-30 00:29', '613', '1', '2025-04-30 00:40', '56', '1', '2025-04-30 00:38:16')
ERROR - 2025-04-30 00:38:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ..._kdpi_6&quot;:&quot;JERNIH&quot;,&quot;riwayat_kdpi_7&quot;:&quot;TIDAK ADA&quot;}', '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:38:43 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..._kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-3...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_neonatus" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "tanggal_jam_pengkajian", "membawa_obat", "cara_masuk_irj_neonatus", "cara_masuk_igd_neonatus", "cara_masuk_lain_neonatus", "cara_masuk_lain_lain_neonatus", "nama_ayah", "nama_ibu", "riwayat_kehamilan_persalinan", "tanggal_lahir_riwayat", "riwayat_kehamilan_bayi", "riwayat_kehamilan_bayii", "apgar_frekuensi_jantung", "apgar_usaha_nafas", "apgar_tonus_otot", "apgar_refleksi", "apgar_warna", "apgar_skor_1", "apgar_skor_2", "pemeriksaan_fisik_dan_ttv", "neonatusj", "ket_nyerii", "pengkajian_nyeri_kepala", "pengkajian_nyeri_mata", "pengkajian_nyeri_tht", "pengkajian_nyeri_mulut", "pengkajian_nyeri_gigi", "pengkajian_nyeri_leher", "pengkajian_nyeri_dada", "pengkajian_nyeri_paru_paru", "pengkajian_nyeri_jantung", "pengkajian_nyeri_extremitas_atas", "pengkajian_nyeri_abdomen", "pengkajian_nyeri_umbilikal", "pengkajian_nyeri_genetalia", "pengkajian_nyeri_anus", "pengkajian_nyeri_kulit", "pengkajian_nyeri_refleks", "pengkajian_nyeri_otot_tonus", "pengkajian_nyeri_ektremitas_bawah", "pews_pernafasan", "pews_alat_bantu", "pews_saturasi", "pews_nadi", "pews_warna_kulit", "pews_tds", "pews_total", "skrining_usia", "skrining_nafas", "skrining_sepsis", "skrining_multiple", "skrining_stadium", "data_penunjang_tgl_lab", "data_penunjang_tgl_radiologi", "data_penunjang_hasil", "data_penunjang_hasil1", "data_penunjang_lain_lain", "masalah_keperawatann", "kriteria_discharge_planingg", "perencanaan_pulangg", "tanggal_jam_perawat", "id_perawat", "ceklis_ttd_perawat", "tanggal_jam_dokter", "id_dokter", "ceklis_ttd_dokter", "created_date") VALUES ('737382', '680721', '2050', '2025-04-30 00:29', 'tidak', NULL, NULL, 'Lain-lain', NULL, '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN ","data_ayah_3":"ISLAM","data_ayah_4":"KARYAWAN SWASTA","data_ayah_5":null,"data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006","data_ayah_7":"085697121916"}', '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI","data_ibu_2":"22 THN ","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":null,"data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006","data_ibu_7":"085697121916"}', '{"riwayat_kdpi_1":"G1P0A0 ","riwayat_kdpi_2":"39 MINGGU","riwayat_kdpi_3":"SPONTAN PERVAGINAM","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-30 22.10', '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+","riwayat_kb_10":"SUDAH BAB","riwayat_kb_11":"BELUM BAK "}', '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', '{"ptn_keterangan":"Tidak Nyeri"}', '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', '{"mataa_1":"1","mataa_2":null,"mataa_3":"1","mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":null,"tht_6":null}', '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', '{"leher_1":"1","leher_2":null,"leher_3":null}', '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":"1","ardomen_6":"-","ardomen_7":"1","ardomen_8":"30"}', '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', '{"anus_1":"1"}', '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', '0_3', '0_3', '0_3', '0_1', '0_3', '0_1', 'putih', '0', '0', '0', '0', '0', '1970-01-01', '1970-01-01', '-', '-', '-', '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMI"}', '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', '2025-04-30 00:29', '613', '1', '2025-04-30 00:40', '56', '1', '2025-04-30 00:38:43')
ERROR - 2025-04-30 00:51:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ...&quot;riwayat_kdpi_7&quot;:&quot;-&quot;}', &quot;tanggal_lahir_riwayat&quot; = '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:51:52 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..."riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-3...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_neonatus" SET "id_layanan_pendaftaran" = '737382', "id_pendaftaran" = '680721', "id_users" = '2050', "tanggal_jam_pengkajian" = '2025-04-30 00:44', "membawa_obat" = 'tidak', "cara_masuk_irj_neonatus" = NULL, "cara_masuk_igd_neonatus" = NULL, "cara_masuk_lain_neonatus" = NULL, "cara_masuk_lain_lain_neonatus" = NULL, "nama_ayah" = '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN","data_ayah_3":"ISLAM","data_ayah_4":"IRT","data_ayah_5":null,"data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ayah_7":"085697131916"}', "nama_ibu" = '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI ","data_ibu_2":"22 THN","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":null,"data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ibu_7":"085697131916"}', "riwayat_kehamilan_persalinan" = '{"riwayat_kdpi_1":"G1P0A0","riwayat_kdpi_2":"39","riwayat_kdpi_3":"SPONTAN PERVAGINAM ","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH ","riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-30 22.10', "riwayat_kehamilan_bayi" = '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL ","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', "riwayat_kehamilan_bayii" = '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+ ADA","riwayat_kb_10":"SUDAH BAK ","riwayat_kb_11":"BELUM BAB"}', "apgar_frekuensi_jantung" = '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', "apgar_usaha_nafas" = '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', "apgar_tonus_otot" = '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', "apgar_refleksi" = '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', "apgar_warna" = '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', "apgar_skor_1" = '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', "apgar_skor_2" = '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', "pemeriksaan_fisik_dan_ttv" = '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', "neonatusj" = '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', "ket_nyerii" = '{"ptn_keterangan":"Tidak Nyeri"}', "pengkajian_nyeri_kepala" = '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', "pengkajian_nyeri_mata" = '{"mataa_1":"1","mataa_2":null,"mataa_3":null,"mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', "pengkajian_nyeri_tht" = '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":"1","tht_6":"-"}', "pengkajian_nyeri_mulut" = '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', "pengkajian_nyeri_gigi" = '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', "pengkajian_nyeri_leher" = '{"leher_1":"1","leher_2":null,"leher_3":null}', "pengkajian_nyeri_dada" = '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', "pengkajian_nyeri_paru_paru" = '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', "pengkajian_nyeri_jantung" = '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', "pengkajian_nyeri_extremitas_atas" = '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', "pengkajian_nyeri_abdomen" = '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":null,"ardomen_6":null,"ardomen_7":"1","ardomen_8":"30"}', "pengkajian_nyeri_umbilikal" = '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', "pengkajian_nyeri_genetalia" = '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', "pengkajian_nyeri_anus" = '{"anus_1":"1"}', "pengkajian_nyeri_kulit" = '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', "pengkajian_nyeri_refleks" = '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', "pengkajian_nyeri_otot_tonus" = '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', "pengkajian_nyeri_ektremitas_bawah" = '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', "pews_pernafasan" = '0_3', "pews_alat_bantu" = '0_3', "pews_saturasi" = '0_3', "pews_nadi" = '0_1', "pews_warna_kulit" = '0_3', "pews_tds" = '0_1', "pews_total" = 'putih', "skrining_usia" = '0', "skrining_nafas" = '0', "skrining_sepsis" = '0', "skrining_multiple" = '0', "skrining_stadium" = '0', "data_penunjang_tgl_lab" = '1970-01-01', "data_penunjang_tgl_radiologi" = '1970-01-01', "data_penunjang_hasil" = '-', "data_penunjang_hasil1" = '-', "data_penunjang_lain_lain" = '-', "masalah_keperawatann" = '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMIA"}', "kriteria_discharge_planingg" = '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', "perencanaan_pulangg" = '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', "tanggal_jam_perawat" = '2025-04-30 00:44', "id_perawat" = '613', "ceklis_ttd_perawat" = '1', "tanggal_jam_dokter" = '2025-04-30 00:46', "id_dokter" = '56', "ceklis_ttd_dokter" = '1', "updated_date" = '2025-04-30 00:51:52'
WHERE "id" = '1475'
ERROR - 2025-04-30 00:52:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ...&quot;riwayat_kdpi_7&quot;:&quot;-&quot;}', &quot;tanggal_lahir_riwayat&quot; = '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:52:14 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..."riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-3...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_neonatus" SET "id_layanan_pendaftaran" = '737382', "id_pendaftaran" = '680721', "id_users" = '2050', "tanggal_jam_pengkajian" = '2025-04-30 00:44', "membawa_obat" = 'tidak', "cara_masuk_irj_neonatus" = NULL, "cara_masuk_igd_neonatus" = NULL, "cara_masuk_lain_neonatus" = NULL, "cara_masuk_lain_lain_neonatus" = NULL, "nama_ayah" = '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN","data_ayah_3":"ISLAM","data_ayah_4":"IRT","data_ayah_5":null,"data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ayah_7":"085697131916"}', "nama_ibu" = '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI ","data_ibu_2":"22 THN","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":null,"data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ibu_7":"085697131916"}', "riwayat_kehamilan_persalinan" = '{"riwayat_kdpi_1":"G1P0A0","riwayat_kdpi_2":"39","riwayat_kdpi_3":"SPONTAN PERVAGINAM ","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH ","riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-30 22.10', "riwayat_kehamilan_bayi" = '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL ","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', "riwayat_kehamilan_bayii" = '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+ ADA","riwayat_kb_10":"SUDAH BAK ","riwayat_kb_11":"BELUM BAB"}', "apgar_frekuensi_jantung" = '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', "apgar_usaha_nafas" = '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', "apgar_tonus_otot" = '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', "apgar_refleksi" = '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', "apgar_warna" = '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', "apgar_skor_1" = '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', "apgar_skor_2" = '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', "pemeriksaan_fisik_dan_ttv" = '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', "neonatusj" = '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', "ket_nyerii" = '{"ptn_keterangan":"Tidak Nyeri"}', "pengkajian_nyeri_kepala" = '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', "pengkajian_nyeri_mata" = '{"mataa_1":"1","mataa_2":null,"mataa_3":null,"mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', "pengkajian_nyeri_tht" = '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":"1","tht_6":"-"}', "pengkajian_nyeri_mulut" = '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', "pengkajian_nyeri_gigi" = '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', "pengkajian_nyeri_leher" = '{"leher_1":"1","leher_2":null,"leher_3":null}', "pengkajian_nyeri_dada" = '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', "pengkajian_nyeri_paru_paru" = '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', "pengkajian_nyeri_jantung" = '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', "pengkajian_nyeri_extremitas_atas" = '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', "pengkajian_nyeri_abdomen" = '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":null,"ardomen_6":null,"ardomen_7":"1","ardomen_8":"30"}', "pengkajian_nyeri_umbilikal" = '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', "pengkajian_nyeri_genetalia" = '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', "pengkajian_nyeri_anus" = '{"anus_1":"1"}', "pengkajian_nyeri_kulit" = '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', "pengkajian_nyeri_refleks" = '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', "pengkajian_nyeri_otot_tonus" = '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', "pengkajian_nyeri_ektremitas_bawah" = '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', "pews_pernafasan" = '0_3', "pews_alat_bantu" = '0_3', "pews_saturasi" = '0_3', "pews_nadi" = '0_1', "pews_warna_kulit" = '0_3', "pews_tds" = '0_1', "pews_total" = 'putih', "skrining_usia" = '0', "skrining_nafas" = '0', "skrining_sepsis" = '0', "skrining_multiple" = '0', "skrining_stadium" = '0', "data_penunjang_tgl_lab" = NULL, "data_penunjang_tgl_radiologi" = NULL, "data_penunjang_hasil" = NULL, "data_penunjang_hasil1" = NULL, "data_penunjang_lain_lain" = NULL, "masalah_keperawatann" = '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMIA"}', "kriteria_discharge_planingg" = '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', "perencanaan_pulangg" = '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', "tanggal_jam_perawat" = '2025-04-30 00:44', "id_perawat" = '613', "ceklis_ttd_perawat" = '1', "tanggal_jam_dokter" = '2025-04-30 00:46', "id_dokter" = '56', "ceklis_ttd_dokter" = '1', "updated_date" = '2025-04-30 00:52:14'
WHERE "id" = '1475'
ERROR - 2025-04-30 00:52:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ...&quot;riwayat_kdpi_7&quot;:&quot;-&quot;}', &quot;tanggal_lahir_riwayat&quot; = '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:52:55 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..."riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-3...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_neonatus" SET "id_layanan_pendaftaran" = '737382', "id_pendaftaran" = '680721', "id_users" = '2050', "tanggal_jam_pengkajian" = '2025-04-30 00:44', "membawa_obat" = 'tidak', "cara_masuk_irj_neonatus" = NULL, "cara_masuk_igd_neonatus" = NULL, "cara_masuk_lain_neonatus" = 'Lain-lain', "cara_masuk_lain_lain_neonatus" = '-', "nama_ayah" = '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN","data_ayah_3":"ISLAM","data_ayah_4":"IRT","data_ayah_5":null,"data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ayah_7":"085697131916"}', "nama_ibu" = '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI ","data_ibu_2":"22 THN","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":null,"data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ibu_7":"085697131916"}', "riwayat_kehamilan_persalinan" = '{"riwayat_kdpi_1":"G1P0A0","riwayat_kdpi_2":"39","riwayat_kdpi_3":"SPONTAN PERVAGINAM ","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH ","riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-30 22.10', "riwayat_kehamilan_bayi" = '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL ","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', "riwayat_kehamilan_bayii" = '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+ ADA","riwayat_kb_10":"SUDAH BAK ","riwayat_kb_11":"BELUM BAB"}', "apgar_frekuensi_jantung" = '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', "apgar_usaha_nafas" = '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', "apgar_tonus_otot" = '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', "apgar_refleksi" = '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', "apgar_warna" = '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', "apgar_skor_1" = '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', "apgar_skor_2" = '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', "pemeriksaan_fisik_dan_ttv" = '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', "neonatusj" = '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', "ket_nyerii" = '{"ptn_keterangan":"Tidak Nyeri"}', "pengkajian_nyeri_kepala" = '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', "pengkajian_nyeri_mata" = '{"mataa_1":"1","mataa_2":null,"mataa_3":null,"mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', "pengkajian_nyeri_tht" = '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":"1","tht_6":"-"}', "pengkajian_nyeri_mulut" = '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', "pengkajian_nyeri_gigi" = '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', "pengkajian_nyeri_leher" = '{"leher_1":"1","leher_2":null,"leher_3":null}', "pengkajian_nyeri_dada" = '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', "pengkajian_nyeri_paru_paru" = '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', "pengkajian_nyeri_jantung" = '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', "pengkajian_nyeri_extremitas_atas" = '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', "pengkajian_nyeri_abdomen" = '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":null,"ardomen_6":null,"ardomen_7":"1","ardomen_8":"30"}', "pengkajian_nyeri_umbilikal" = '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', "pengkajian_nyeri_genetalia" = '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', "pengkajian_nyeri_anus" = '{"anus_1":"1"}', "pengkajian_nyeri_kulit" = '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', "pengkajian_nyeri_refleks" = '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', "pengkajian_nyeri_otot_tonus" = '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', "pengkajian_nyeri_ektremitas_bawah" = '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', "pews_pernafasan" = '0_3', "pews_alat_bantu" = '0_3', "pews_saturasi" = '0_3', "pews_nadi" = '0_1', "pews_warna_kulit" = '0_3', "pews_tds" = '0_1', "pews_total" = 'putih', "skrining_usia" = '0', "skrining_nafas" = '0', "skrining_sepsis" = '0', "skrining_multiple" = '0', "skrining_stadium" = '0', "data_penunjang_tgl_lab" = NULL, "data_penunjang_tgl_radiologi" = NULL, "data_penunjang_hasil" = NULL, "data_penunjang_hasil1" = NULL, "data_penunjang_lain_lain" = NULL, "masalah_keperawatann" = '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMIA"}', "kriteria_discharge_planingg" = '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', "perencanaan_pulangg" = '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', "tanggal_jam_perawat" = '2025-04-30 00:44', "id_perawat" = '613', "ceklis_ttd_perawat" = '1', "tanggal_jam_dokter" = '2025-04-30 00:46', "id_dokter" = '56', "ceklis_ttd_dokter" = '1', "updated_date" = '2025-04-30 00:52:55'
WHERE "id" = '1475'
ERROR - 2025-04-30 00:53:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ...&quot;riwayat_kdpi_7&quot;:&quot;-&quot;}', &quot;tanggal_lahir_riwayat&quot; = '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:53:05 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..."riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-3...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_neonatus" SET "id_layanan_pendaftaran" = '737382', "id_pendaftaran" = '680721', "id_users" = '2050', "tanggal_jam_pengkajian" = '2025-04-30 00:44', "membawa_obat" = 'tidak', "cara_masuk_irj_neonatus" = NULL, "cara_masuk_igd_neonatus" = NULL, "cara_masuk_lain_neonatus" = 'Lain-lain', "cara_masuk_lain_lain_neonatus" = '-', "nama_ayah" = '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN","data_ayah_3":"ISLAM","data_ayah_4":"IRT","data_ayah_5":"-","data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ayah_7":"085697131916"}', "nama_ibu" = '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI ","data_ibu_2":"22 THN","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":"-","data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ibu_7":"085697131916"}', "riwayat_kehamilan_persalinan" = '{"riwayat_kdpi_1":"G1P0A0","riwayat_kdpi_2":"39","riwayat_kdpi_3":"SPONTAN PERVAGINAM ","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH ","riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-30 22.10', "riwayat_kehamilan_bayi" = '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL ","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', "riwayat_kehamilan_bayii" = '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+ ADA","riwayat_kb_10":"SUDAH BAK ","riwayat_kb_11":"BELUM BAB"}', "apgar_frekuensi_jantung" = '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', "apgar_usaha_nafas" = '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', "apgar_tonus_otot" = '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', "apgar_refleksi" = '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', "apgar_warna" = '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', "apgar_skor_1" = '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', "apgar_skor_2" = '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', "pemeriksaan_fisik_dan_ttv" = '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', "neonatusj" = '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', "ket_nyerii" = '{"ptn_keterangan":"Tidak Nyeri"}', "pengkajian_nyeri_kepala" = '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', "pengkajian_nyeri_mata" = '{"mataa_1":"1","mataa_2":null,"mataa_3":null,"mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', "pengkajian_nyeri_tht" = '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":"1","tht_6":"-"}', "pengkajian_nyeri_mulut" = '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', "pengkajian_nyeri_gigi" = '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', "pengkajian_nyeri_leher" = '{"leher_1":"1","leher_2":null,"leher_3":null}', "pengkajian_nyeri_dada" = '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', "pengkajian_nyeri_paru_paru" = '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', "pengkajian_nyeri_jantung" = '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', "pengkajian_nyeri_extremitas_atas" = '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', "pengkajian_nyeri_abdomen" = '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":null,"ardomen_6":null,"ardomen_7":"1","ardomen_8":"30"}', "pengkajian_nyeri_umbilikal" = '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', "pengkajian_nyeri_genetalia" = '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', "pengkajian_nyeri_anus" = '{"anus_1":"1"}', "pengkajian_nyeri_kulit" = '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', "pengkajian_nyeri_refleks" = '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', "pengkajian_nyeri_otot_tonus" = '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', "pengkajian_nyeri_ektremitas_bawah" = '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', "pews_pernafasan" = '0_3', "pews_alat_bantu" = '0_3', "pews_saturasi" = '0_3', "pews_nadi" = '0_1', "pews_warna_kulit" = '0_3', "pews_tds" = '0_1', "pews_total" = 'putih', "skrining_usia" = '0', "skrining_nafas" = '0', "skrining_sepsis" = '0', "skrining_multiple" = '0', "skrining_stadium" = '0', "data_penunjang_tgl_lab" = NULL, "data_penunjang_tgl_radiologi" = NULL, "data_penunjang_hasil" = NULL, "data_penunjang_hasil1" = NULL, "data_penunjang_lain_lain" = NULL, "masalah_keperawatann" = '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMIA"}', "kriteria_discharge_planingg" = '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', "perencanaan_pulangg" = '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', "tanggal_jam_perawat" = '2025-04-30 00:44', "id_perawat" = '613', "ceklis_ttd_perawat" = '1', "tanggal_jam_dokter" = '2025-04-30 00:46', "id_dokter" = '56', "ceklis_ttd_dokter" = '1', "updated_date" = '2025-04-30 00:53:05'
WHERE "id" = '1475'
ERROR - 2025-04-30 00:53:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ...&quot;riwayat_kdpi_7&quot;:&quot;-&quot;}', &quot;tanggal_lahir_riwayat&quot; = '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:53:50 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..."riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-3...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_neonatus" SET "id_layanan_pendaftaran" = '737382', "id_pendaftaran" = '680721', "id_users" = '2050', "tanggal_jam_pengkajian" = '2025-04-30 00:44', "membawa_obat" = 'tidak', "cara_masuk_irj_neonatus" = NULL, "cara_masuk_igd_neonatus" = NULL, "cara_masuk_lain_neonatus" = 'Lain-lain', "cara_masuk_lain_lain_neonatus" = '-', "nama_ayah" = '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN","data_ayah_3":"ISLAM","data_ayah_4":"IRT","data_ayah_5":"-","data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ayah_7":"085697131916"}', "nama_ibu" = '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI ","data_ibu_2":"22 THN","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":"-","data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ibu_7":"085697131916"}', "riwayat_kehamilan_persalinan" = '{"riwayat_kdpi_1":"G1P0A0","riwayat_kdpi_2":"39","riwayat_kdpi_3":"SPONTAN PERVAGINAM ","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH ","riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-30 22.10', "riwayat_kehamilan_bayi" = '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL ","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', "riwayat_kehamilan_bayii" = '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+ ADA","riwayat_kb_10":"SUDAH BAK ","riwayat_kb_11":"BELUM BAB"}', "apgar_frekuensi_jantung" = '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', "apgar_usaha_nafas" = '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', "apgar_tonus_otot" = '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', "apgar_refleksi" = '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', "apgar_warna" = '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', "apgar_skor_1" = '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', "apgar_skor_2" = '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', "pemeriksaan_fisik_dan_ttv" = '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', "neonatusj" = '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', "ket_nyerii" = '{"ptn_keterangan":"Tidak Nyeri"}', "pengkajian_nyeri_kepala" = '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', "pengkajian_nyeri_mata" = '{"mataa_1":"1","mataa_2":null,"mataa_3":null,"mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', "pengkajian_nyeri_tht" = '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":"1","tht_6":"-"}', "pengkajian_nyeri_mulut" = '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', "pengkajian_nyeri_gigi" = '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', "pengkajian_nyeri_leher" = '{"leher_1":"1","leher_2":null,"leher_3":null}', "pengkajian_nyeri_dada" = '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', "pengkajian_nyeri_paru_paru" = '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', "pengkajian_nyeri_jantung" = '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', "pengkajian_nyeri_extremitas_atas" = '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', "pengkajian_nyeri_abdomen" = '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":null,"ardomen_6":null,"ardomen_7":"1","ardomen_8":"30"}', "pengkajian_nyeri_umbilikal" = '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', "pengkajian_nyeri_genetalia" = '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', "pengkajian_nyeri_anus" = '{"anus_1":"1"}', "pengkajian_nyeri_kulit" = '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', "pengkajian_nyeri_refleks" = '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', "pengkajian_nyeri_otot_tonus" = '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', "pengkajian_nyeri_ektremitas_bawah" = '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', "pews_pernafasan" = '0_3', "pews_alat_bantu" = '0_3', "pews_saturasi" = '0_3', "pews_nadi" = '0_1', "pews_warna_kulit" = '0_3', "pews_tds" = '0_1', "pews_total" = 'putih', "skrining_usia" = '0', "skrining_nafas" = '0', "skrining_sepsis" = '0', "skrining_multiple" = '0', "skrining_stadium" = '0', "data_penunjang_tgl_lab" = '1970-01-01', "data_penunjang_tgl_radiologi" = '1970-01-01', "data_penunjang_hasil" = '-', "data_penunjang_hasil1" = '-', "data_penunjang_lain_lain" = '-', "masalah_keperawatann" = '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMIA"}', "kriteria_discharge_planingg" = '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', "perencanaan_pulangg" = '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', "tanggal_jam_perawat" = '2025-04-30 00:44', "id_perawat" = '613', "ceklis_ttd_perawat" = '1', "tanggal_jam_dokter" = '2025-04-30 00:46', "id_dokter" = '56', "ceklis_ttd_dokter" = '1', "updated_date" = '2025-04-30 00:53:49'
WHERE "id" = '1475'
ERROR - 2025-04-30 00:54:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 22.10&quot;
LINE 1: ...&quot;riwayat_kdpi_7&quot;:&quot;-&quot;}', &quot;tanggal_lahir_riwayat&quot; = '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:54:20 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 22.10"
LINE 1: ..."riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-3...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_neonatus" SET "id_layanan_pendaftaran" = '737382', "id_pendaftaran" = '680721', "id_users" = '2050', "tanggal_jam_pengkajian" = '2025-04-30 00:44', "membawa_obat" = 'tidak', "cara_masuk_irj_neonatus" = NULL, "cara_masuk_igd_neonatus" = NULL, "cara_masuk_lain_neonatus" = 'Lain-lain', "cara_masuk_lain_lain_neonatus" = '-', "nama_ayah" = '{"data_ayah_1":"M RIZKY ARDIANSA","data_ayah_2":"22 THN","data_ayah_3":"ISLAM","data_ayah_4":"IRT","data_ayah_5":"-","data_ayah_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ayah_7":"085697131916"}', "nama_ibu" = '{"data_ibu_1":"SHIVA OKTAVIA DIFRIANTI ","data_ibu_2":"22 THN","data_ibu_3":"ISLAM","data_ibu_4":"IRT","data_ibu_5":"-","data_ibu_6":"JL DAHLIA 2 NO 25 RT 001\/006, NUSA JAYA, KARAWACI , KOTA TANGERANG ","data_ibu_7":"085697131916"}', "riwayat_kehamilan_persalinan" = '{"riwayat_kdpi_1":"G1P0A0","riwayat_kdpi_2":"39","riwayat_kdpi_3":"SPONTAN PERVAGINAM ","riwayat_kdpi_4":"HDK","riwayat_kdpi_5":"DR SITI NILA","riwayat_kdpi_6":"JERNIH ","riwayat_kdpi_7":"-"}', "tanggal_lahir_riwayat" = '2025-04-30 22.10', "riwayat_kehamilan_bayi" = '{"riwayat_kb_1":"LAKI LAKI ","riwayat_kb_2":"7\/8","riwayat_kb_3":"TUNGGAL ","riwayat_kb_4":"TIDAK DILAKUKAN ","riwayat_kb_5":"TIDAK DILAKUKAN "}', "riwayat_kehamilan_bayii" = '{"riwayat_kb_6":"3010","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"+ ADA","riwayat_kb_10":"SUDAH BAK ","riwayat_kb_11":"BELUM BAB"}', "apgar_frekuensi_jantung" = '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', "apgar_usaha_nafas" = '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', "apgar_tonus_otot" = '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', "apgar_refleksi" = '{"apgar_refleksi_1":null,"apgar_refleksi_2":null,"apgar_refleksi_3":"2","apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', "apgar_warna" = '{"apgar_warna_1":null,"apgar_warna_2":"1","apgar_warna_3":null,"apgar_warna_4":"1","apgar_warna_6":"1"}', "apgar_skor_1" = '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"2","total_skor_1_1_1_1":"2","total_skor_1_1_1_1_1":"1"}', "apgar_skor_2" = '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"2","total_skor_2_2_2_2_2":"1"}', "pemeriksaan_fisik_dan_ttv" = '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.7","pemeriksaan_fdttl_3":"155","pemeriksaan_fdttl_4":"54"}', "neonatusj" = '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', "ket_nyerii" = '{"ptn_keterangan":"Tidak Nyeri"}', "pengkajian_nyeri_kepala" = '{"kepalaa_1":null,"kepalaa_2":"1","kepalaa_3":null,"kepalaa_4":"1","kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":"1","kepalaa_10":"-","kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":"1","kepalaa_14":null}', "pengkajian_nyeri_mata" = '{"mataa_1":"1","mataa_2":null,"mataa_3":null,"mataa_4":null,"mataa_5":null,"mataa_6":"1","mataa_7":"-","mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', "pengkajian_nyeri_tht" = '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":"1","tht_6":"-"}', "pengkajian_nyeri_mulut" = '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":"1","mulut_7":"-"}', "pengkajian_nyeri_gigi" = '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', "pengkajian_nyeri_leher" = '{"leher_1":"1","leher_2":null,"leher_3":null}', "pengkajian_nyeri_dada" = '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"-","dada_6":"1","dada_7":null}', "pengkajian_nyeri_paru_paru" = '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":"1","paru_10":null,"paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"54","paru_16":"1","paru_17":"-","paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":"1","paru_25":"-"}', "pengkajian_nyeri_jantung" = '{"jantung_1":null,"jantung_2":null,"jantung_3":null,"jantung_4":null}', "pengkajian_nyeri_extremitas_atas" = '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', "pengkajian_nyeri_abdomen" = '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":null,"ardomen_6":null,"ardomen_7":"1","ardomen_8":"30"}', "pengkajian_nyeri_umbilikal" = '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', "pengkajian_nyeri_genetalia" = '{"genetalia_1":null,"genetalia_2":null,"genetalia_3":"1","genetalia_4":"1"}', "pengkajian_nyeri_anus" = '{"anus_1":"1"}', "pengkajian_nyeri_kulit" = '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":"1","kulit_6":null,"kulit_7":null,"kulit_8":null}', "pengkajian_nyeri_refleks" = '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', "pengkajian_nyeri_otot_tonus" = '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', "pengkajian_nyeri_ektremitas_bawah" = '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', "pews_pernafasan" = '0_3', "pews_alat_bantu" = '0_3', "pews_saturasi" = '0_3', "pews_nadi" = '0_1', "pews_warna_kulit" = '0_3', "pews_tds" = '0_1', "pews_total" = 'putih', "skrining_usia" = '0', "skrining_nafas" = '0', "skrining_sepsis" = '0', "skrining_multiple" = '0', "skrining_stadium" = '0', "data_penunjang_tgl_lab" = '1970-01-01', "data_penunjang_tgl_radiologi" = '1970-01-01', "data_penunjang_hasil" = '-', "data_penunjang_hasil1" = '-', "data_penunjang_lain_lain" = '-', "masalah_keperawatann" = '{"masalah_keperawatan_1_neonatus":"1","masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RISIKO HIPOTERMIA"}', "kriteria_discharge_planingg" = '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"0","discharge_planning_noenatus_3":"0","discharge_planning_noenatus_4":"0"}', "perencanaan_pulangg" = '{"kriteria_discharge_noenatus_1":null,"kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":null,"kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":null,"kriteria_discharge_noenatus_10":null}', "tanggal_jam_perawat" = '2025-04-29 23:00', "id_perawat" = '613', "ceklis_ttd_perawat" = '1', "tanggal_jam_dokter" = '2025-04-29 23:00', "id_dokter" = '56', "ceklis_ttd_dokter" = '1', "updated_date" = '2025-04-30 00:54:20'
WHERE "id" = '1475'
ERROR - 2025-04-30 00:54:58 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-30 00:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6078799, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 00:57:36 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6078799, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6078799, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 01:16:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 87
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-04-30 01:18:39 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 91
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 94
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 96
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$nama_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 26
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$id_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 27
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tanggal_lahir_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 28
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$asal_ruangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 41
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 59
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 60
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 65
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 66
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 74
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 75
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 79
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 80
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 84
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 85
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 89
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 90
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 94
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 95
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 99
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 100
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 104
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 105
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 109
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 110
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 114
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 115
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 119
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 120
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 124
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 125
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 130
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 131
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 136
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 137
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 142
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 143
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 148
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 149
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 154
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 155
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 160
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 161
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 169
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 170
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 174
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 175
ERROR - 2025-04-30 01:18:39 --> Severity: Notice  --> Undefined property: stdClass::$updated_on /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 181
ERROR - 2025-04-30 01:22:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 01:22:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 01:32:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 01:37:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 01:37:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 01:42:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 01:51:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 01:51:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 01:51:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 01:51:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 01:51:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 01:51:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 01:58:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 01:58:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 01:58:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 01:58:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 01:58:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 01:58:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:17:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 02:18:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...9', '2025-04-30', '8', '1', '551', '1', '2', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:18:34 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...9', '2025-04-30', '8', '1', '551', '1', '2', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('680725', '737379', '2025-04-30', '8', '1', '551', '1', '2', '1', '', '2', '1', '1', '2025-04-30 02:17:59', '1984')
ERROR - 2025-04-30 02:18:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...9', '2025-04-30', '8', '1', '551', '1', '2', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:18:49 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...9', '2025-04-30', '8', '1', '551', '1', '2', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('680725', '737379', '2025-04-30', '8', '1', '551', '1', '2', '1', '', '2', '1', '1', '2025-04-30 02:17:59', '1984')
ERROR - 2025-04-30 02:19:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 02:20:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202500.-04-30 30&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('737384', '202500.-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:20:10 --> Query error: ERROR:  invalid input syntax for type timestamp: "202500.-04-30 30"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-0...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-04-30 30', '2025-04-30 02:18', 'IGD', 'Cendana 2', 'LBP susp HNP ec fx L4-5 dd radikulopati lumbal + Riw Stroke tidak terkontrol', NULL, '353', '1', NULL, 'Nyeri di punggung bagian bawah menjalar ke bokong hingga ke ujung kaki kanan selama 1 bulan ini, nyeri terasa sangat berat 2 hari ini. ', 'Gonarthrosis knee +', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '118', '70', '36.7', '70', '21', '0', NULL, '0', NULL, '1', 'Sedang', '2', '1', '0', NULL, '1', '2025-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iv line no. 20 metakarpal sinistra', ' ranitidine 50 mg iv 
 ketorolac 30 mg iv', '1', 'DR, GDS ', '1', 'lumbasakral ', NULL, NULL, 'laboratorium 
terapi ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 02:22', NULL, '325', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 02:20:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202500.-04-30 30&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('737384', '202500.-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:20:23 --> Query error: ERROR:  invalid input syntax for type timestamp: "202500.-04-30 30"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-0...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-04-30 30', '2025-04-30 02:18', 'IGD', 'Cendana 2', 'LBP susp HNP ec fx L4-5 dd radikulopati lumbal  Riw Stroke tidak terkontrol', NULL, '353', '1', NULL, 'Nyeri di punggung bagian bawah menjalar ke bokong hingga ke ujung kaki kanan selama 1 bulan ini, nyeri terasa sangat berat 2 hari ini. ', 'Gonarthrosis knee +', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '118', '70', '36.7', '70', '21', '0', NULL, '0', NULL, '1', 'Sedang', '2', '1', '0', NULL, '1', '2025-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iv line no. 20 metakarpal sinistra', ' ranitidine 50 mg iv 
 ketorolac 30 mg iv', '1', 'DR, GDS ', '1', 'lumbasakral ', NULL, NULL, 'laboratorium 
terapi ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 02:22', NULL, '325', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 02:20:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202500.-04-30 30&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('737384', '202500.-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:20:50 --> Query error: ERROR:  invalid input syntax for type timestamp: "202500.-04-30 30"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-0...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-04-30 30', '2025-04-30 02:18', 'IGD', 'Cendana 2', 'LBP susp HNP ec fx L4-5 dd radikulopati lumbal  Riw Stroke tidak terkontrol', NULL, '353', '1', NULL, 'Nyeri di punggung bagian bawah ', 'Gonarthrosis knee +', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '118', '70', '36.7', '70', '21', '0', NULL, '0', NULL, '1', 'Sedang', '2', '1', '0', NULL, '1', '2025-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iv line no. 20 metakarpal sinistra', ' ranitidine 50 mg iv 
 ketorolac 30 mg iv', '1', 'DR, GDS ', '1', 'lumbasakral ', NULL, NULL, 'laboratorium 
terapi ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 02:22', NULL, '325', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 02:20:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202500.-04-30 30&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('737384', '202500.-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:20:59 --> Query error: ERROR:  invalid input syntax for type timestamp: "202500.-04-30 30"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-0...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-04-30 30', '2025-04-30 02:18', 'IGD', 'Cendana 2', 'LBP susp HNP ec fx L4 5 dd radikulopati lumbal  Riw Stroke tidak terkontrol', NULL, '353', '1', NULL, 'Nyeri di punggung bagian bawah ', 'Gonarthrosis knee +', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '118', '70', '36.7', '70', '21', '0', NULL, '0', NULL, '1', 'Sedang', '2', '1', '0', NULL, '1', '2025-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iv line no. 20 metakarpal sinistra', ' ranitidine 50 mg iv 
 ketorolac 30 mg iv', '1', 'DR, GDS ', '1', 'lumbasakral ', NULL, NULL, 'laboratorium 
terapi ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 02:22', NULL, '325', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 02:21:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202500.-04-30 30&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('737384', '202500.-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:21:26 --> Query error: ERROR:  invalid input syntax for type timestamp: "202500.-04-30 30"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-0...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-04-30 30', '2025-04-30 02:18', 'IGD', 'Cendana 2', 'LBP susp HNP ec fx L4 5 dd radikulopati lumbal  ', NULL, '353', '1', NULL, 'Nyeri di punggung bagian bawah ', 'Gonarthrosis knee +', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '118', '70', '36.7', '70', '21', '0', NULL, '0', NULL, '1', 'Sedang', '2', '1', '0', NULL, '1', '2025-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iv line no. 20 metakarpal sinistra', ' ranitidine 50 mg iv 
 ketorolac 30 mg iv', '1', 'DR, GDS ', '1', 'lumbasakral ', NULL, NULL, 'laboratorium 
terapi ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 02:22', NULL, '325', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 02:21:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202500.-04-30 30&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('737384', '202500.-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:21:36 --> Query error: ERROR:  invalid input syntax for type timestamp: "202500.-04-30 30"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-0...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('737384', '202500.-04-30 30', '2025-04-30 02:18', 'IGD', 'Cendana 2', 'LBP susp HNP ec fx L4 5 dd radikulopati lumbal  ', NULL, '353', '1', NULL, 'Nyeri di punggung bagian bawah ', 'Gonarthrosis knee ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', '2', '2', NULL, NULL, '118', '70', '36.7', '70', '21', '0', NULL, '0', NULL, '1', 'Sedang', '2', '1', '0', NULL, '1', '2025-04-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iv line no. 20 metakarpal sinistra', ' ranitidine 50 mg iv 
 ketorolac 30 mg iv', '1', 'DR, GDS ', '1', 'lumbasakral ', NULL, NULL, 'laboratorium 
terapi ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 02:22', NULL, '325', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 02:22:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 02:27:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:27:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:27:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:27:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:28:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:28:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:28:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:28:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:28:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:28:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:28:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:28:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:28:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:28:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 87
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-04-30 02:37:14 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 91
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 94
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 96
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$nama_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 26
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$id_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 27
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tanggal_lahir_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 28
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$asal_ruangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 41
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 59
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 60
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 65
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 66
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 74
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 75
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 79
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 80
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 84
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 85
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 89
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 90
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 94
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 95
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 99
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 100
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 104
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 105
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 109
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 110
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 114
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 115
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 119
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 120
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 124
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 125
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 130
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 131
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 136
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 137
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 142
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 143
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 148
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 149
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 154
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 155
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 160
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 161
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 169
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 170
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 174
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 175
ERROR - 2025-04-30 02:37:14 --> Severity: Notice  --> Undefined property: stdClass::$updated_on /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 181
ERROR - 2025-04-30 02:40:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 03;00&quot;
LINE 1: ...riteria_9&quot;:&quot;&quot;,&quot;kriteria_lain&quot;:&quot;&quot;}}', '574', '70', '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:40:28 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 03;00"
LINE 1: ...riteria_9":"","kriteria_lain":""}}', '574', '70', '2025-04-3...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('737392', '2025-04-30 02:50', 'Kursi Roda', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'sesak nafas', 'pagi ini', '2 hari smrs', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'sesak terasa berat subuh dini hari, pasien nyaman posisi duduk dan sulit beraktifitas. Batuk batuk berdahak sulit dikeluarkan. Nyeri dada sesekali di sebelah kiri seperti ditusuk kadang ada penjalaran. Mual namun tidak muntah. ', '{"asma":"1","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada "}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada ', 'tidak ada ', 'tidak ada ', 'tidak ada ', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '130', '90', '90', '36.5', '20', '155', '70', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"1","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"-"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"1","ket_lain":"tidak ada "}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"1","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada "}', 'Hygiene', 'Lain', 'tidak ada ', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'sholat dan mengaji', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Takdir', '', 'istirahat yang cukup', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'jakarta', 'Normal', '', '0', '', '0', '1', '1', '1', '1', '1', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', '0', NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_4', '', '0_2', '0_4', '0_3', '', '0_3', 'Putih', '{"ket_1":"1","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"1","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '574', '70', '2025-04-30 03;00', '2025-04-30 08:57', '1', '1', '2025-04-30 02:40:28')
ERROR - 2025-04-30 02:40:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-30 03;00&quot;
LINE 1: ...riteria_9&quot;:&quot;&quot;,&quot;kriteria_lain&quot;:&quot;&quot;}}', '574', '70', '2025-04-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:40:33 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-30 03;00"
LINE 1: ...riteria_9":"","kriteria_lain":""}}', '574', '70', '2025-04-3...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('737392', '2025-04-30 02:50', 'Kursi Roda', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'sesak nafas', 'pagi ini', '2 hari smrs', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'sesak terasa berat subuh dini hari, pasien nyaman posisi duduk dan sulit beraktifitas. Batuk batuk berdahak sulit dikeluarkan. Nyeri dada sesekali di sebelah kiri seperti ditusuk kadang ada penjalaran. Mual namun tidak muntah. ', '{"asma":"1","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada "}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada ', 'tidak ada ', 'tidak ada ', 'tidak ada ', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '130', '90', '90', '36.5', '20', '155', '70', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"1","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"-"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"1","ket_lain":"tidak ada "}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"1","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada "}', 'Hygiene', 'Lain', 'tidak ada ', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'sholat dan mengaji', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Takdir', '', 'istirahat yang cukup', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'jakarta', 'Normal', '', '0', '', '0', '1', '1', '1', '1', '1', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', '0', NULL, NULL, '0', '0', NULL, NULL, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_4', '', '0_2', '0_4', '0_3', '', '0_3', 'Putih', '{"ket_1":"1","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"1","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '574', '70', '2025-04-30 03;00', '2025-04-30 08:57', '1', '1', '2025-04-30 02:40:33')
ERROR - 2025-04-30 02:40:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:40:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:41:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:41:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:41:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:41:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:41:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:41:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:41:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:41:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:42:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:42:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:42:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:42:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:42:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:42:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:42:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:42:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:42:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:42:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:43:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:43:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 02:43:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 02:43:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:13:37 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-30 03:13:37 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-30 03:13:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-30 03:14:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 03:17:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:17:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:17:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:17:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:18:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:18:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:18:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:18:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:18:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:18:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:21:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:21:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:21:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:21:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:22:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:22:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:23:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:23:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:23:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:23:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:23:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:23:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:23:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:23:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:26:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:26:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 03:58:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 03:58:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 04:04:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 04:04:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 04:21:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 05:05:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 05:42:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 05:42:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 05:42:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6079144, '923', 1129.536, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 05:42:46 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6079144, '923', 1129.536, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6079144, '923', 1129.536, '1', '1.00', NULL, 'null')
ERROR - 2025-04-30 05:42:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 05:42:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 05:43:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (836437, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 05:43:16 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (836437, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (836437, '3', '', '', '', '', 'PC', '0', '', '0', '', '1', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 05:52:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:20:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:21:19 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-30 06:24:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;undefined&quot;
LINE 5:                 WHERE jd.tanggal='undefined' AND jd.shift_po...
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:24:46 --> Query error: ERROR:  invalid input syntax for type date: "undefined"
LINE 5:                 WHERE jd.tanggal='undefined' AND jd.shift_po...
                                         ^ - Invalid query: SELECT jd.id_poli,  jd.tanggal, jd.nama_poli,jd.shift_poli, array_to_string((string_to_array(jd.nama_dokter, ' '))[1:2], ' ') AS nama_dokter, 
                jd.kuota, jd.jml_kunjung jadwal_jml, vm_jd.jumlah_kunjungan real_kunjungan
                FROM sm_jadwal_dokter jd
                LEFT JOIN vm_jml_jadwal_dokter_2shift vm_jd ON vm_jd.id = jd.id
                WHERE jd.tanggal='undefined' AND jd.shift_poli='undefined'
                ORDER BY jd.nama_poli
ERROR - 2025-04-30 06:24:48 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-30 06:26:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:28:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:31:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:32:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:34:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:35:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300021) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:35:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300021) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300021', '00122513', '2025-04-30 06:35:00', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001259289461', NULL, '0223U1130325Y003370', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Paru', 0, 2, NULL, '20250430A138')
ERROR - 2025-04-30 06:35:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:35:34 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A088%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 06:37:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:38:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:38:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:38:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A041%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 06:38:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300034) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:38:56 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300034) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300034', '00202901', '2025-04-30 06:38:55', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002102904011', NULL, '102504020225Y002616', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250430A092')
ERROR - 2025-04-30 06:39:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:39:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:39:59 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A040%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 06:43:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:46:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:46:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6079267, '692', 20406, '10', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:46:32 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6079267, '692', 20406, '10', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6079267, '692', 20406, '10', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 06:50:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:50:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:50:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A119%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 06:50:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:50:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:51:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:52:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:53:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:54:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:54:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:55:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:55:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:55:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:57:03 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-30 06:57:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:57:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:58:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:58:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:58:56 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-04-30 06:59:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:59:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 06:59:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 06:59:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 06:59:56 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A134%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 07:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:00:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:00:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 07:01:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:01:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:03:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:03:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:04:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 07:05:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:05:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:05:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 07:05:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:05:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 07:06:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300077) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:06:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300077) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300077', '00374099', '2025-04-30 07:06:00', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002097401589', NULL, '022300090425Y001720', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah', 0, 2, NULL, '20250430B075')
ERROR - 2025-04-30 07:07:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:07:34 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A045%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 07:09:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:09:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:10:45 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-30 07:10:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:10:52 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A034%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 07:11:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:11:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A053%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 07:11:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300090) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:11:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300090) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300090', '00370487', '2025-04-30 07:11:52', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001647759352', NULL, '0223R0490225B000065', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250430B043')
ERROR - 2025-04-30 07:12:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (853909, 734888, null, 10, gelisah, meracau
, GCS 11 E4M6V1, kesadaran somnolen TD; 145/92 mmHg, N: 75x/mnt S:..., ACKD, dgn uremic ensepalopati, ADHF, Aritmia, HT, tx lanjut 
inisiasi HD , , 2120, 1, tx lanjut &lt;div&gt;inisiasi HD &lt;/div&gt;, null, null, 2120, 2025-04-30 07:12:10, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:12:10 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (853909, 734888, null, 10, gelisah, meracau
, GCS 11 E4M6V1, kesadaran somnolen TD; 145/92 mmHg, N: 75x/mnt S:..., ACKD, dgn uremic ensepalopati, ADHF, Aritmia, HT, tx lanjut 
inisiasi HD , , 2120, 1, tx lanjut <div>inisiasi HD </div>, null, null, 2120, 2025-04-30 07:12:10, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('734888', NULL, '10', 'gelisah, meracau
', 'GCS 11 E4M6V1, kesadaran somnolen TD; 145/92 mmHg, N: 75x/mnt S: 36.4C RR:20 x/mnt SpO2: 96persen Nasalkanul 2 lpm kreatinin 7.2 mg/dl ureum 240mg/dl
', 'ACKD, dgn uremic ensepalopati, ADHF, Aritmia, HT', 'tx lanjut 
inisiasi HD ', '', '', '', '', '', '', '', '', '2120', '1', 'tx lanjut <div>inisiasi HD </div>', NULL, '2120', 0, NULL, '2025-04-30 07:12:10')
ERROR - 2025-04-30 07:12:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:13:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 07:14:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 07:15:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:16:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:16:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:16:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:18:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:18:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:18:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:18:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:18:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:18:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:19:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:19:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:19:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:20:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:20:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 07:23:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:24:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:24:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 07:24:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:24:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 07:26:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:26:49 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 07:26:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:26:49 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 07:27:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:27:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300132) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:27:23 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300132) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300132', '00151660', '2025-04-30 07:27:21', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001256643099', NULL, '022309070425Y001387', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250430A101')
ERROR - 2025-04-30 07:27:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:28:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:28:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:28:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:28:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:31:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 07:31:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:31:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 07:31:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 07:32:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:32:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:33:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:34:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250430B252) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:34:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250430B252) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250430B252', '252', 'B252', 'B', '2025-04-30', '0', '2025-04-30 07:34:36', 'Booking', 'APM', 'Asuransi', 0, '2025-04-30  07:58:30', 0, '1950', '00338735', 65, 444269, 14, 'BED', '085888404946', '3601055801000004', '2000-01-18', 'dr. SURYANTI LASE, Sp.B', 1, 'Asuransi', 47, '60', '200', 'Ok.', '0', '51718', '0003515158269', 'JKN', NULL, '1', NULL, '0223B1570425P001723', 'KLINIK KF MODERNLAND', '2025-07-27', 'BED', '1', NULL, NULL, '14', 'Sudah', 200, 'Ok.')
ERROR - 2025-04-30 07:34:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:34:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:34:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 07:34:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:34:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 07:35:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:35:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:35:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:35:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:35:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:36:38 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 07:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:37:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:37:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:38:21 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-04-30 07:38:21 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-04-30 07:39:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:40:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:41:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:41:26 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A042%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 07:41:28 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-30 07:41:28 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-30 07:41:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:41:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:41:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:41:42 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A050%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 07:42:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:42:08 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A024%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 07:42:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-04-30 07:42:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-04-30 07:42:14 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-04-30 07:42:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:42:49 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 07:42:49 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 07:42:49 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 07:42:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:43:20 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 07:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:43:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:43:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250430D005) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:43:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250430D005) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create") VALUES ('20250430D005', '005', 'D005', 'D', '2025-04-30', 0, '2025-04-30 07:43:50', 'Booking', 'rsud', 'Informasi', 0, '2025-04-30 07:38:00', 0, '1773')
ERROR - 2025-04-30 07:43:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250430D005) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:43:51 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250430D005) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create") VALUES ('20250430D005', '005', 'D005', 'D', '2025-04-30', 0, '2025-04-30 07:43:51', 'Booking', 'rsud', 'Informasi', 0, '2025-04-30 07:38:00', 0, '1773')
ERROR - 2025-04-30 07:44:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:44:14 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 07:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:45:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:45:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:46:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:46:10 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 07:46:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:46:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:46:56 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 07:47:35 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 07:47:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:48:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:49:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:50:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:50:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:50:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:50:55 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '853759', "id_layanan_pendaftaran" = '736554', "waktu" = '2025-04-30 06:43', "id_profesi" = '18', "subject" = 'Pasien mengatakan lemas
', "objective" = 'KES CM, GCS 15, EWS 2 (H) Akral hangat, Nadi kuat, TD: 196/104mmHg, N:96 x/menit, S:37 *C RR:20 x/menit, SPO2:97 �ngan O2 nasal 4lpm. (Tgl 28/4/25) IVFD RL: Nacl 0,9%.(2:1) 1500cc/24 jam, Theeway Gelofusal 500cc/24 jam (Tgl 25/4/25) CT brain NK, Ro Thorax di radiologi Elek: 142/4.0/104, UR/CR: 36/1.3 (Tgl 26/4/25) HB: 11.7 HT: 34 LEU: 19.0 TROM: 209
', "assessment" = 'Penurunan curah jantung, Intoleransi aktivitas', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '933', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '1733', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-30 07:50:55'
WHERE "id" = '853759'
ERROR - 2025-04-30 07:51:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:51:19 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '853759', "id_layanan_pendaftaran" = '736554', "waktu" = '2025-04-30 06:43', "id_profesi" = '18', "subject" = 'Pasien mengatakan lemas
', "objective" = 'KES CM, GCS 15, EWS 2 (H) Akral hangat, Nadi kuat, TD: 196/104mmHg, N:96 x/menit, S:37 *C RR:20 x/menit, SPO2:97 �ngan O2 nasal 4lpm. (Tgl 28/4/25) IVFD RL: Nacl 0,9%.(2:1) 1500cc/24 jam, Theeway Gelofusal 500cc/24 jam (Tgl 25/4/25) CT brain NK, Ro Thorax di radiologi Elek: 142/4.0/104, UR/CR: 36/1.3 (Tgl 26/4/25) HB: 11.7 HT: 34 LEU: 19.0 TROM: 209
', "assessment" = 'Penurunan curah jantung, Intoleransi aktivitas', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '933', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '1733', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-30 07:51:19'
WHERE "id" = '853759'
ERROR - 2025-04-30 07:52:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:52:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:52:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (853935, 734900, null, 10, demam (-), pusing (-) bab cair (-)


, ku; sedang kes; cmc td; 102/82 nd; 75x rr; 20x trombo; 105rb --&amp;..., DHF dengan warning sign, acc rawat jalan 
PCT 3x500 
omz 2x1
bcom 2x1, , 2120, 1, acc rawat jalan &lt;div&gt;PCT 3x500 &lt;/div&gt;&lt;div&gt;omz 2x1&lt;/div&gt;&lt;div&gt;b..., null, null, 2120, 2025-04-30 07:52:50, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:52:50 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (853935, 734900, null, 10, demam (-), pusing (-) bab cair (-)


, ku; sedang kes; cmc td; 102/82 nd; 75x rr; 20x trombo; 105rb --&..., DHF dengan warning sign, acc rawat jalan 
PCT 3x500 
omz 2x1
bcom 2x1, , 2120, 1, acc rawat jalan <div>PCT 3x500 </div><div>omz 2x1</div><div>b..., null, null, 2120, 2025-04-30 07:52:50, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('734900', NULL, '10', 'demam (-), pusing (-) bab cair (-)


', 'ku; sedang kes; cmc td; 102/82 nd; 75x rr; 20x trombo; 105rb --&gt; 72rb --&gt; 51rb --&gt; 46rb --&gt; 51rb 
', 'DHF dengan warning sign', 'acc rawat jalan 
PCT 3x500 
omz 2x1
bcom 2x1', '', '', '', '', '', '', '', '', '2120', '1', 'acc rawat jalan <div>PCT 3x500 </div><div>omz 2x1</div><div>bcom 2x1</div>', NULL, '2120', 0, NULL, '2025-04-30 07:52:50')
ERROR - 2025-04-30 07:53:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 07:53:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 07:53:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:53:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:54:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:54:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:55:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:55:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:56:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:56:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:56:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:57:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0x8c /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:57:36 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0x8c - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('736541', 'HIPOGLIKEMIA', '674', NULL, '2025-04-30 07:27:00', 'Ketidakstabilan kadar glukosa darah, gangguan ventilasi spontan', 'D 10�c/jam', 'Monitor TTV, ASI adlib, cpap peep 7 fiO2 21 flow 8, monitor kadar gula darah, minum asi /pasi adlib, monitor intake dan output pasien', '274', '278', '1687')
ERROR - 2025-04-30 07:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:57:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:58:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300198) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 07:58:34 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300198) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300198', '00346477', '2025-04-30 07:58:32', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003290898194', NULL, '102501060325Y001106', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Bedah', 0, 2, NULL, '20250430B104')
ERROR - 2025-04-30 07:58:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:58:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:59:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:59:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:59:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 07:59:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:00:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:00:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:00:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:00:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:01:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300205) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:01:00 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300205) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300205', '00316087', '2025-04-30 08:00:59', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000816008073', NULL, '102501020425Y003684', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Bedah', 0, 2, NULL, '20250430B267')
ERROR - 2025-04-30 08:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:01:25 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 08:02:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:02:52 --> Severity: Notice  --> Undefined variable: kategori_barang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-04-30 08:02:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-04-30 08:02:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:02:54 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-30 08:03:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:03:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:03:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:04:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:04:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:04:17 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '739' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-04-30 08:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:05:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:05:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:06:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:06:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:06:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:06:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:07:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:08:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:08:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:08:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:08:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:09:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:09:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 08:09:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:09:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:10:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:11:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:11:37 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A055%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 08:11:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:11:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:12:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:12:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:13:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:14:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:14:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 08:14:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:14:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:15:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:15:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:15:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:15:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:16:12 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-04-30 08:16:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-04-30 08:16:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:17:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:17:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:18:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:18:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:18:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:18:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:19:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:19:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:19:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:19:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:20:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:21:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:21:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:21:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 08:21:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:21:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:21:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 08:21:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:21:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:21:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:22:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:22:15 --> Severity: Notice  --> Undefined property: stdClass::$nrptt_nip /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_skm.php 335
ERROR - 2025-04-30 08:22:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:22:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:23:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300237) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:23:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300237) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300237', '00375043', '2025-04-30 08:23:07', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '7', NULL, NULL, NULL, 'Baru', '0', '1768', 1, 'Belum', 'Laboratorium ', 0, 2, '', NULL)
ERROR - 2025-04-30 08:23:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:23:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:23:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 08:23:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:23:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:23:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:23:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:24:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:24:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:24:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:24:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:24:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:24:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:25:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:25:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:25:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:25:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:25:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 01:25:58 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-04-30 08:26:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:26:08 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun
', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra
', 'Penkes ec shock cardiogenic dd/ , AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP', '743', '1', '<p>Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP</p><p>Advis:</p>', NULL, '743', '1', NULL, '2025-04-30 08:26:08')
ERROR - 2025-04-30 08:26:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:26:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:26:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:26:23 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun
', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra
', 'Penkes ec shock cardiogenic dd/ , AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP', '743', '1', '<p>Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP</p><p>Advis:</p>', NULL, '743', '1', NULL, '2025-04-30 08:26:23')
ERROR - 2025-04-30 08:26:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:26:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 08:26:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:26:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 08:27:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:28:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:28:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:29:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:29:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:29:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:29:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:30:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:30:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:30:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:31:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 08:31:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:31:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 08:31:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:29 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_sessionb0d5cc722a5d0f68568ba363da5549951792db7e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-04-30 08:31:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 08:31:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:31:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:32:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:32:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300275) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:32:07 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300275) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300275', '00372294', '2025-04-30 08:32:06', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002241512302', NULL, '102501100325Y003187', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Anak', 0, '2', '', '20250430F016')
ERROR - 2025-04-30 08:32:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:32:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:32:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:32:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:32:49 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 08:32:50 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 08:32:50 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 08:32:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:33:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:33:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:33:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:33:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:34:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:34:17 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun
', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra
', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP', '743', '1', '<p>Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP</p><p>Advis:</p>', NULL, '743', '1', NULL, '2025-04-30 08:34:17')
ERROR - 2025-04-30 08:34:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:34:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:35:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:35:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 08:35:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:35:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:36:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:36:25 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A047%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 08:36:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:36:34 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:36:34')
ERROR - 2025-04-30 08:36:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:36:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:36:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:36:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-04-30 08:37:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:37:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:37:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:37:14 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:37:14')
ERROR - 2025-04-30 08:37:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:37:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:37:17 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:37:17')
ERROR - 2025-04-30 08:37:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:37:19 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:37:19')
ERROR - 2025-04-30 08:37:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:37:20 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:37:20')
ERROR - 2025-04-30 08:37:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:37:21 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:37:21')
ERROR - 2025-04-30 08:37:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:37:24 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:37:24')
ERROR - 2025-04-30 08:37:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300289) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:37:27 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300289) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300289', '00283996', '2025-04-30 08:37:25', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001335739307', NULL, '0223B1450225Y001633', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Periodonti', 0, 2, NULL, '20250430A060')
ERROR - 2025-04-30 08:37:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:37:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 08:37:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 08:38:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:38:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:38:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:38:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:38:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 08:39:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:39:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:39:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:39:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:40:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:40:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:40:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:40:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:41:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:41:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:41:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:41:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:42:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:42:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:42:04 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:37', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:42:04')
ERROR - 2025-04-30 08:42:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:42:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:42:23 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:37', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 08:42:23')
ERROR - 2025-04-30 08:42:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:42:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:42:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:42:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:43:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:43:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:43:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:43:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:43:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:43:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300307) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:43:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300307) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300307', '00083524', '2025-04-30 08:43:49', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001722095199', NULL, '0223U1170425P001009', 'Lama', NULL, '1768', 0, 'Belum', 'Poliklinik Bedah', 0, '2', '', '20250430C005')
ERROR - 2025-04-30 08:43:59 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-04-30 08:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:44:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:45:23 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11582
ERROR - 2025-04-30 08:45:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:45:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:46:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:46:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:46:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:37', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP

', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div><div><br></div>', NULL, '743', 0, NULL, '2025-04-30 08:46:27')
ERROR - 2025-04-30 08:46:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:46:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:46:34 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:37', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP

', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div><div><br></div>', NULL, '743', 0, NULL, '2025-04-30 08:46:34')
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 352
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 352
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 08:46:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:46:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:46:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:47:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300315) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:47:24 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300315) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300315', '00004749', '2025-04-30 08:47:22', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002048900769', NULL, '102501040425Y003021', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Jantung', 0, '2', '', '20250430C009')
ERROR - 2025-04-30 08:47:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:47:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:48:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:48:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:48:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250430B292) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:48:30 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250430B292) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250430B292', '292', 'B292', 'B', '2025-04-30', '0', '2025-04-30 08:48:28', 'Booking', 'APM', 'Asuransi', 0, '2025-04-30  08:43:30', 0, '1765', '00341861', 56, 252594, 11, 'ANA', '083870701683', '3671111309220004', '2022-09-13', 'dr. SITI NILAWARDHANI, Sp.A', 1, 'Asuransi', 37, '60', '200', 'Ok.', '0', '55528', '0003292115635', 'JKN', NULL, '1', NULL, '102501100425Y003446', 'PUSKESMAS PANUNGGANGAN', '2025-07-23', 'ANA', '1', NULL, NULL, '11', 'Sudah', 200, 'Ok.')
ERROR - 2025-04-30 08:48:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:48:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:48:40 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
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
AND "jko"."status" = 'Confirmed'
ORDER BY "jko"."id" DESC, "jko"."waktu" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 08:48:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:48:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:49:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:49:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:49:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:49:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:50:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:50:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:50:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:50:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:50:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:51:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:51:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:51:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300331) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:51:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300331) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300331', '00352524', '2025-04-30 08:51:14', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '16', NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Cemara', 0, '2', '', '20250430E006')
ERROR - 2025-04-30 08:51:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:52:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:52:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:52:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:52:15 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00374245'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-04-30 08:52:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:52:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300338) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:52:21 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300338) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300338', '00223267', '2025-04-30 08:52:20', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002265296951', NULL, '0223B0740425Y003297', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250430B297')
ERROR - 2025-04-30 08:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:52:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300342) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:52:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300342) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300342', '00375069', '2025-04-30 08:52:55', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003632773331', NULL, '102501100425Y003786', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik Anak', 0, 2, '', '20250430F024')
ERROR - 2025-04-30 08:52:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300343) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:52:59 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300343) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300343', '00375069', '2025-04-30 08:52:58', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003632773331', NULL, '102501100425Y003786', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik Anak', 0, 2, '', '20250430F024')
ERROR - 2025-04-30 08:53:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:53:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:53:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:53:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:53:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:53:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:53:57 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 08:54:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:54:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:54:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:54:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:55:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:55:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:55:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:55:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:56:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:56:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:56:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:56:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:56:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:56:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:56:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:56:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 08:57:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:57:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300356) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 08:57:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300356) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300356', '00317392', '2025-04-30 08:57:39', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000815276316', NULL, '022310050425Y000647', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, 2, NULL, '20250430B298')
ERROR - 2025-04-30 08:57:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 08:57:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 08:57:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 08:58:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:58:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 08:58:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 08:58:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:59:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7043
ERROR - 2025-04-30 08:59:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:59:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:59:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:59:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:59:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:59:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 08:59:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 08:59:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:00:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:00:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:00:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:00:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:00:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:00:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:00:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:00:56 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-30 09:00:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:01:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:01:04 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-30 09:01:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:01:09 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-30 09:01:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:01:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:01:41 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-30 09:01:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:02:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:02:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:02:11 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-30 09:02:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:02:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-04-30 09:02:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:02:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:02:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:02:23 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-30 09:02:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:02:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:03:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:03:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:03:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:03:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:03:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:04:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:04:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:04:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:04:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:04:35 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4489749'
ERROR - 2025-04-30 09:05:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:05:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:06:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:06:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:06:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:06:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:07:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:07:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:07:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 09:07:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:07:50 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 09:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:07:52 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 09:07:52 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 09:08:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:08:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:09:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:09:07 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-30 09:09:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:09:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:10:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:10:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:10:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:10:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:11:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:11:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:12:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:12:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:12:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:12:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:13:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 09:13:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 09:14:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:14:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:14:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:15:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:15:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:15:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:15:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:16:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:16:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:16:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:17:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:17:52 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 09:18:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:18:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:18:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:18:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:19:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:20:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 09:20:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 09:21:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (836637, '6', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:21:13 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (836637, '6', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (836637, '6', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 09:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:22:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:22:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:22:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:24:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:25:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:25:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:25:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 09:25:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:25:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 09:26:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 09:26:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 09:26:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:27:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:27:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:27:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:28:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:30:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:31:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:32:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:33:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:33:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:33:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:35:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:35:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:35:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:35:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:35:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 09:35:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:35:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 09:36:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:36:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 09:36:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:36:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 09:36:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:36:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:37:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:37:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:37:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:37:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 09:37:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:38:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:39:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:39:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:40:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:40:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 09:40:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300450) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:40:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300450) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300450', '00342222', '2025-04-30 09:40:43', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002521350652', NULL, '022309050325P000753', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250430B028')
ERROR - 2025-04-30 09:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:41:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:41:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:42:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:42:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:42:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:42:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:42:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:42:53 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 09:42:53 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 09:42:53 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 09:43:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:43:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:43:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300458) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:43:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300458) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300458', '00146229', '2025-04-30 09:43:54', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002303920214', NULL, '0223B1570325P001747', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250430B057')
ERROR - 2025-04-30 09:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:45:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:45:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:45:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:45:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 09:45:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:45:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 09:46:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:46:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:46:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:47:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:47:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:47:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:48:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:48:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:48:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 09:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:49:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:49:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:50:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:50:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:51:27 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-30 09:51:27 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-30 09:51:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-30 09:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:52:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:52:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:54:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:54:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:55:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 09:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:57:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:57:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:57:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:58:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:59:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 09:59:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 09:59:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 09:59:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:00:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:00:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 10:00:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:00:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 10:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:00:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 10:02:00 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 10:02:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:02:34 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11862
ERROR - 2025-04-30 10:02:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:02:38 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:30', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', 0, NULL, '2025-04-30 10:02:38')
ERROR - 2025-04-30 10:02:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:02:46 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 08:30', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 10:02:46')
ERROR - 2025-04-30 10:02:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:03:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...'20250514B165', '165', 'B165', 'B', '2025-05-14', '', '2025-...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:03:24 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...'20250514B165', '165', 'B165', 'B', '2025-05-14', '', '2025-...
                                                             ^ - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250514B165', '165', 'B165', 'B', '2025-05-14', '', '2025-04-30 10:03:23', 'Booking', 'APM', 'Asuransi', 0, '2025-05-14  07:45:00', 0, '1945', '00210110', 60, 252600, 36, 'THT', '0895369569805', '3671011809050001', '2005-08-18', 'dr. HENDRARTO, Sp.THT-KL', 1, 'Asuransi', 50, '60', '200', 'Ok.', '0', '53823', '0002887543056', 'JKN', '302706', '0', '36', '102501100425Y003539', 'PUSKESMAS PANUNGGANGAN', '2025-07-23', 'THT', '3', NULL, '0223R0380425V013809', '36', 'Sudah', 200, 'Ok.')
ERROR - 2025-04-30 10:03:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:04:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:04:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:04:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 10:04:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:04:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 10:04:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 10:05:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:06:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:07:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:08:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:08:52 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 10:08:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:08:59 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 10:09:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:09:00 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 10:09:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:09:05 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 10:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur, Sp. JP', '743', '1', '<p>Sudah konfirmasi ulang ke dr. Arthur, Sp. JP</p><p>Advis:</p>', NULL, '743', '1', NULL, '2025-04-30 10:09:05')
ERROR - 2025-04-30 10:09:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:09:11 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 10:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur, Sp. JP', '743', '1', '<p>Sudah konfirmasi ulang ke dr. Arthur, Sp. JP</p><p>Advis:</p>', NULL, '743', '1', NULL, '2025-04-30 10:09:11')
ERROR - 2025-04-30 10:09:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:09:20 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 10:03', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur, Sp. JP', '743', '1', '<p>Sudah konfirmasi ulang ke dr. Arthur, Sp. JP</p><p>Advis:</p>', NULL, '743', '1', NULL, '2025-04-30 10:09:20')
ERROR - 2025-04-30 10:10:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:10:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:10:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:11:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:12:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 10:12:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-04-30 10:12:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-04-30 10:12:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-04-30 10:12:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-04-30 10:12:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-04-30 10:12:42 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-04-30 10:12:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:12:56 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 10:12:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 10:12:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 10:13:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:13:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:14:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:15:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:15:23 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 10:11', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 10:15:23')
ERROR - 2025-04-30 10:16:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:16:18 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 10:11', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 10:16:18')
ERROR - 2025-04-30 10:16:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:16:26 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('736581', '2025-04-30 10:11', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran mendadak, tensi sudah menurun, saturasi 90�ngan NRM 12 lpm. Semalam CM pagi ini E1M1V1. Sudah di visite dr. Eko, Sp. N, disarankan untuk konsul kondisi terbaru ke Ts Jantung.  RPD: HT +, Stroke dgn gejala sisa kelemahan anggota gerak sebelah kiri dan sehari-hari aktivitas ditempat tidur dengan bantuan. RPO : Amlodipine 1x10mg. namun pagi ini kesadaran turun', 'Coma E1M1V1. TD 77/44 n 104 RR 30 Spo2 90 on nrm 12 lpm s 36.4 ca -/- pupil asimetris 5mm/3mm, rcl menurun/menurun rctl menurun/menurun, paru vbs +/+, rh +/+ perbaikan di basal wh -/-, cor s1s2 irreguler gallop - murmur - kesan hemiparese sinistra', 'Penkes ec shock cardiogenic dd/ shock sepsis, AF RVR + HHD + Selulitis manus dextra + Susp Pneumonia + stroke berulang', 'Menginformasikan kondisi pasien dan konsul ke dr. Arthur Sp JP
', '743', '1', 'Sudan konfirmasi ulang dan kondisi pasien ke dr. Arthur, Sp. JP<div><br></div><div>Advis:</div><div><br></div>', NULL, '743', '1', NULL, '2025-04-30 10:16:26')
ERROR - 2025-04-30 10:17:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:17:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-30 00:00:00' AND '2025-04-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A165%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 10:17:56 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 10:17:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 10:17:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 10:18:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:18:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:19:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:19:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:20:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:22:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:22:56 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 10:22:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 10:22:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 10:23:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:23:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:23:51 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4489409'
ERROR - 2025-04-30 10:23:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:24:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:24:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:24:22 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4489409'
ERROR - 2025-04-30 10:24:25 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 10:24:59 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 352
ERROR - 2025-04-30 10:24:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:24:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:24:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:24:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:24:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:24:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:24:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 352
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 10:25:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:25:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-04-30 10:25:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:25:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 10:26:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:28:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:28:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 10:28:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 10:28:56 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 10:28:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 10:28:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 10:29:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:29:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:30:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:30:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:30:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:30:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:31:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:31:27 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00034041'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-04-30 10:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:37:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:38:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:39:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:39:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:39:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:41:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:41:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:42:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:42:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 10:42:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:42:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:43:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:43:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:43:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:44:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:44:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:45:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:46:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:47:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:49:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:50:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:52:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504300538) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:52:28 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504300538) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504300538', '00375097', '2025-04-30 10:52:26', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000202578309', NULL, '102503040425Y002194', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik Radiologi Gigi', 0, '2', '', '20250430F054')
ERROR - 2025-04-30 10:53:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:54:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:55:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:55:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:55:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 10:55:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 10:56:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:56:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:56:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:58:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:58:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:59:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 10:59:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:00:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:00:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:00:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:01:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:02:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:02:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:02:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:02:32 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-04-30 11:02:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:02:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:02:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:03:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:03:50 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:03:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:03:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:04:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:04:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:04:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:04:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:05:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:05:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 11:05:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:05:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 11:05:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:06:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:06:06 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00164315'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-04-30 11:06:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:06:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:06:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:06:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:06:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:08:41 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-30 11:08:41 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-30 11:08:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-30 11:08:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:08:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:09:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:09:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:09:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:09:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:10:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:10:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:10:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:10:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:10:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:10:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:10:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:10:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:10:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:10:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:11:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:11:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:11:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 11:11:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:11:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 11:11:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:11:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:11:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:13:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:13:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:13:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 11:14:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:14:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:14:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:15:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:16:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:16:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:17:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:17:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:18:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:18:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:19:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:20:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:21:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:21:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:21:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:22:59 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 11:22:59 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 11:22:59 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 11:23:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:23:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:23:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:26:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:26:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:27:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:27:59 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 11:27:59 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 11:27:59 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 11:28:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:28:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:28:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:29:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:30:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:30:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:30:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:30:09 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8390
ERROR - 2025-04-30 11:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:31:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:31:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:31:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 11:31:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:31:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 11:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:33:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:34:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:34:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
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
AND "jko"."status" = 'Confirmed'
ORDER BY "jko"."id" DESC, "jko"."waktu" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-30 11:36:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:36:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:37:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:37:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:37:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:37:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:37:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:38:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:39:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:39:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:40:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:40:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:41:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:42:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:43:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:44:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:45:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:46:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:47:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:47:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:47:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:47:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:48:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:48:25 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-04-30 11:48:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:48:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:48:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-04-30 11:48:33 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 11:48:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:48:46 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-04-30 11:49:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:49:25 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-04-30 11:49:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:49:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-04-30 11:49:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:49:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 11:50:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:50:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:51:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:53:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:53:45 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('737359', '2025-04-30 10:53', '11', '', '', '', '', 'BB = 15,8 kg; TB = 115 cm; BB/U = &lt;p5 (68,7%); TB/U = p5-p10 (93,5%); BB/TB = 79%; HA = 6 tahun; BBI = 20 kg; KESAN = Status gizi kurang, perawakan pendek dan BB kurang. Asupan makan 1/2 porsi. Tidak ada alergi makanan. SpO2 98%, N: 100 x/menit S: 37.2oC P: 24x/menit. tgl 29/4/25 HB 11.9 HT 35 Leuko 18.0 Tromb 413 Ro thorax exp di radiologi. Pasien Riw. Asma (+) terakhir kambuh 2 bulan lalu. Kebiasaan makan SMRS: nasi 3x/hari, lauk ayam, telur dadar, sayur bayam wortel, buah pisang stroberi. cemilan jelly drink, kiko, minuman es manis.', 'Status gizi kurang berkaitan dengan KEP ditandai dengan BB/TB 79�n perkiraan asupan 50% kebutuhan', 'Diet Gizi Optimal; E = 1800 kkal; P = 67,5 gr; L = 60 gr; KH = 247,5 gr; Cairan = 1290 ml; Bentuk makanan biasa, jalur oral, frekuensi 3x makan 2x snack. Edukasi gizi', 'Asupan oral memenuhi >=90% kebutuhan', '', '', '', '', '1865', '1', 'Diet NB 1800 kkal. Edukasi gizi', NULL, '1865', 0, NULL, '2025-04-30 11:53:45')
ERROR - 2025-04-30 11:53:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:53:57 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_gizi_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "ga_ruang", "ga_tgl_masuk", "ga_tgl_skrining", "ga_usia", "ga_diagnosa_medis", "ga_risiko", "ga_bb", "ga_bbu", "ga_kesan", "ga_pb", "ga_pbu", "ga_bbi", "ga_bbpb", "ga_lla", "ga_ha", "ga_biokimia", "ga_klinis", "ga_telur", "ga_udang", "ga_sapi", "ga_ikan", "ga_kedelai", "ga_almond", "ga_gandum", "ga_alergi_lainnya", "ga_pola_makan", "ga_tindak", "ga_problem", "ga_etiologi", "ga_gejala", "ga_preskripsi", "ga_energi", "ga_lemak", "ga_protein", "ga_karbohidrat", "ga_cairan", "ga_makanan", "ga_route", "ga_cara_makan", "ga_frekuensi", "ga_monitoring", "ga_tgl_monev_1", "ga_tgl_monev_2", "ga_tgl_monev_3", "ga_tgl_monev_4", "ga_antropometri_1", "ga_antropometri_2", "ga_antropometri_3", "ga_antropometri_4", "ga_biokimia_1", "ga_biokimia_2", "ga_biokimia_3", "ga_biokimia_4", "ga_klinis_1", "ga_klinis_2", "ga_klinis_3", "ga_klinis_4", "ga_asupan_1", "ga_asupan_2", "ga_asupan_3", "ga_asupan_4", "ga_monitoring_lain", "ga_monitoring_lain_1", "ga_monitoring_lain_2", "ga_monitoring_lain_3", "ga_monitoring_lain_4", "ga_tgl_petugas", "ga_petugas", "ga_ttd", "ga_dokter", "ga_ttd_dokter", "created_at") VALUES ('680703', '737359', '00337571', '1865', 'Eboni kelas III ruang 605 No. Bed 5', '2025-04-29', '2025-04-30', '7 Tahun 3 Bulan 22 Hari', 'Asma eksaserbasi akut ', '2', '15,8', '&lt;p5 (68,7%)', 'Status gizi kurang, perawakan pendek dan BB kurang', '115', 'p5-p10 (93,5%)', '20', '79%', NULL, '6 tahun', ' tgl 29/4/25 HB 11.9 HT 35 Leuko 18.0 Tromb 413 Ro thorax exp di radiologi. ', 'Asupan makan 1/2 porsi. Tidak ada alergi makanan. SpO2 98%, N: 100 x/menit S: 37.2oC P: 24x/menit. Pasien Riw. Asma (+) terakhir kambuh 2 bulan lalu. ', '2', '2', '2', '2', '2', '2', '2', NULL, 'Kebiasaan makan SMRS: nasi 3x/hari, lauk ayam, telur dadar, sayur bayam wortel, buah pisang stroberi. cemilan jelly drink, kiko, minuman es manis.', '1', 'Status gizi kurang ', 'KEP', 'BB/TB 79�n perkiraan asupan 50% kebutuhan', 'Diet Gizi Optimal', '1800 kkal', '60 gr', '67,5 gr', '247,5 gr', '1290 ml', '4', NULL, '1', '3x makan utama 2x selingan', 'Asupan oral memenuhi >=90% kebutuhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 11:55', '1865', '1', '440', '1', '2025-04-30 11:53:57')
ERROR - 2025-04-30 11:54:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:54:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 11:54:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('737359', '2025-04-30 10:53', '11', '', '', '', '', 'BB = 15,8 kg; TB = 115 cm; BB/U = &lt;p5 (68,7%); TB/U = p5-p10 (93,5%); BB/TB = 79%; HA = 6 tahun; BBI = 20 kg; KESAN = Status gizi kurang, perawakan pendek dan BB kurang. Asupan makan 1/2 porsi. Tidak ada alergi makanan. SpO2 98%, N: 100 x/menit S: 37.2oC P: 24x/menit. tgl 29/4/25 HB 11.9 HT 35 Leuko 18.0 Tromb 413 Ro thorax exp di radiologi. Pasien Riw. Asma (+) terakhir kambuh 2 bulan lalu. Kebiasaan makan SMRS: nasi 3x/hari, lauk ayam, telur dadar, sayur bayam wortel, buah pisang stroberi. cemilan jelly drink, kiko, minuman es manis.', 'Status gizi kurang berkaitan dengan KEP ditandai dengan BB/TB 79�n perkiraan asupan 50% kebutuhan', 'Diet Gizi Optimal; E = 1800 kkal; P = 67,5 gr; L = 60 gr; KH = 247,5 gr; Cairan = 1290 ml; Bentuk makanan biasa, jalur oral, frekuensi 3x makan 2x snack. Edukasi gizi', 'Asupan oral memenuhi >=90% kebutuhan', '', '', '', '', '1865', '1', 'Diet NB 1800 kkal. Edukasi gizi', NULL, '1865', 0, NULL, '2025-04-30 11:54:27')
ERROR - 2025-04-30 11:55:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:55:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 11:55:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:57:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:58:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 11:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:01:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (836929, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:01:12 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (836929, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (836929, '3', '', '', '', '', 'PC', '0', '', '0', 'MORN', NULL, '1', 1, '1x1 pulv', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 12:03:08 --> Severity: Notice  --> Undefined offset: -27 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 1115
ERROR - 2025-04-30 12:03:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 12:03:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 12:03:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 12:03:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 12:03:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:03:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:03:31 --> Severity: Notice  --> Undefined offset: -27 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 1115
ERROR - 2025-04-30 12:03:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:03:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:05:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 12:05:23 --> Severity: Notice  --> Undefined offset: -27 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 1115
ERROR - 2025-04-30 12:06:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:07:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:07:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:07:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:07:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:07:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:08:25 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:08:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:08:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:08:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 12:09:00 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:09:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:10:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:12:04 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-30 12:13:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:13:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 12:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:14:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:14:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:14:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:15:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:15:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:15:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:16:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 12:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:16:59 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:17:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 12:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:18:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:18:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 12:19:00 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:19:17 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:19:36 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:19:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:25:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:26:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:26:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:26:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:26:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:26:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:27:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:27:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:29:14 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:29:19 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:29:54 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:30:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:30:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:31:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:31:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:32:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:33:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:33:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:33:31 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:33:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:33:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:34:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:35:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:35:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:36:05 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 352
ERROR - 2025-04-30 12:36:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:36:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:36:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:36:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:36:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:36:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:36:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:36:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:36:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:37:01 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 12:37:01 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 12:37:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 12:37:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:38:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 12:38:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 12:38:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:39:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:39:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:39:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:40:15 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 352
ERROR - 2025-04-30 12:40:15 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:40:15 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:40:15 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:40:15 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:40:15 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:40:15 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 12:40:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 12:41:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 12:41:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 12:42:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:42:13 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-04-30 12:42:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:44:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:44:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:44:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:44:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:44:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:45:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:45:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:45:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:45:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:45:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-30 12:45:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:45:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:45:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:45:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:45:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:45:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:45:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:46:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:46:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:49:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:51:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 12:52:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:52:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:52:11 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:52:22 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 12:52:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:52:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:53:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:53:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:53:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:53:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:54:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:54:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:54:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:54:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:54:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:54:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:55:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:55:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:55:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:55:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:56:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:56:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:57:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:57:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 12:57:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 12:57:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:00:13 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 13:01:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:01:50 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 13:02:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:02:09 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-04-30 13:02:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:04:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:04:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 13:04:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 13:05:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:05:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:05:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:05:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:05:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:06:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:09:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:09:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:09:41 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-30 13:09:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:10:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:10:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:12:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_kesulitan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_setengah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_tigaperempat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_penurunan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_perubahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_mual' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_muntah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_gangguan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_perlu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_masalah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_diare' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_konstipati' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_pendarahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_bersendawa' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_intoleransi' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_diet' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_ngt' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_lemah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_dirawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_tigakg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_enamkg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-04-30 13:12:45 --> Severity: Notice  --> Trying to get property 'gd_monitoring' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-04-30 13:12:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:12:53 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-04-30 06:13:42 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-04-30 13:13:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:13:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:14:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:14:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:15:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:15:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:15:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:16:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:16:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:16:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:16:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:17:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:17:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:17:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:17:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:17:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:17:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:18:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:18:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:19:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:19:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:19:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:21:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:21:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:22:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:23:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:23:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:23:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:23:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:24:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:24:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:25:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:25:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:29:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:30:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:30:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:30:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:30:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:30:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:30:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:30:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:31:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:31:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:31:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:31:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:31:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:31:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:31:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:31:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-04-30 13:31:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:31:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-04-30 13:31:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:31:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:31:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:31:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:31:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:31:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:32:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:32:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:32:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 13:32:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 13:32:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 13:32:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:32:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:32:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('836981', '1', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:32:49 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('836981', '1', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('836981', '1', '', '', '3 X SEHARI 1 BUNGKUS', '', 'PC', '0', '', '0', '', '3x1( salbu 1mg+acetyl 50mg+dexa 0,25mg)', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 13:33:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:33:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:33:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:33:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:34:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:35:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:35:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:35:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:35:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:35:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:35:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:35:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:36:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:36:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:36:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:36:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:36:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:36:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:37:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:37:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:37:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:37:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:37:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:37:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:37:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:37:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:38:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:38:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:38:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:38:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:38:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:38:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:38:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:38:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:38:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:38:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:38:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:38:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:39:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:39:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:39:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:39:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:39:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:39:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:39:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:39:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:40:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:40:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:40:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:40:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:40:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:40:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:40:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:40:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:41:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:41:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:41:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:41:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:41:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:41:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:41:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:41:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:41:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:41:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:42:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:43:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:43:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:43:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:43:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:43:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:44:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:44:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:44:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:44:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:44:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:45:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:45:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:45:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:45:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:45:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:45:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:45:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:45:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:46:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:46:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:46:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:46:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:46:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:46:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:47:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:48:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:48:14 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-30 13:48:18 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-30 13:48:18 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-30 13:49:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:49:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:49:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:49:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:49:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:49:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:50:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:50:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:50:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:50:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:50:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:51:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:51:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:51:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:51:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:51:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:51:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:51:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 13:52:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:52:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:52:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:52:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:53:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:53:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:53:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:53:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:53:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:53:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:54:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:54:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:54:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:54:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:55:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:55:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:55:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:55:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:55:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:55:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:55:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:56:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:56:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:56:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:56:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:56:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:56:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:57:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:57:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:57:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:57:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:57:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:57:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 13:58:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:58:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:58:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:58:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:58:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:58:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:58:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:58:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:59:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:59:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:59:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:59:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 13:59:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 13:59:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:00:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:00:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:01:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:01:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:01:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:01:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:01:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:01:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:01:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:01:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:01:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:01:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:01:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:01:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:01:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:01:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:01:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:01:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:01:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:02:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 14:02:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:02:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:02:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:02:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:03:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 14:03:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:03:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:03:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:03:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:03:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:03:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:04:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:04:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:04:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:04:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:04:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:04:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:05:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:05:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:05:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:05:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:05:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:05:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:05:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:05:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:05:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 14:06:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:10:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 14:10:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:10:40 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 765
ERROR - 2025-04-30 14:10:40 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 765
ERROR - 2025-04-30 14:10:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 767
ERROR - 2025-04-30 14:10:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 14:12:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 14:14:51 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 765
ERROR - 2025-04-30 14:14:51 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 765
ERROR - 2025-04-30 14:14:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 767
ERROR - 2025-04-30 14:15:57 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 765
ERROR - 2025-04-30 14:15:57 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 765
ERROR - 2025-04-30 14:15:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 767
ERROR - 2025-04-30 14:16:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:16:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:16:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:16:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:17:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:17:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:17:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:17:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:18:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:18:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:18:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:18:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:18:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:18:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:19:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:19:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:19:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:19:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:19:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:19:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:19:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:19:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:19:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:19:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:19:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:19:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:20:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:20:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:20:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:20:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:20:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:20:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:20:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:20:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:20:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:20:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:20:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:21:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:21:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:21:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:21:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:21:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:21:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:22:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:22:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:27:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 14:28:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6084288, '549', 780.552, '100', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:28:00 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6084288, '549', 780.552, '100', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6084288, '549', 780.552, '100', '10.00', 'Ya', 'null')
ERROR - 2025-04-30 14:28:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-04-30 14:28:08 --> Severity: Notice  --> Trying to get property 'success' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-04-30 14:31:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:31:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:31:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:31:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:31:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 14:34:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:34:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:36:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:36:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:41:35 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:41:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:43:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:44:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:44:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:44:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:44:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:44:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:44:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:44:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:44:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:44:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:45:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:45:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:45:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:46:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:46:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:46:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:46:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:46:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:46:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:46:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:46:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:46:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:46:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:46:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:46:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:46:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:46:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:48:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:48:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:48:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:48:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:48:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:48:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:49:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:49:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:49:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:49:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:49:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:49:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:49:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:49:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:49:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:49:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:49:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:49:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:50:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:50:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:50:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:50:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:50:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:50:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:50:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:50:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:51:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:51:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:51:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:51:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:52:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:52:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:52:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:52:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:52:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:52:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:52:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:52:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 14:52:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 14:52:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:52:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:53:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:53:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:55:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:55:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:55:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:55:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:55:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:55:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 14:55:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:55:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 14:55:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:56:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:56:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:56:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:56:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:56:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:56:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:56:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:56:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:57:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 14:58:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:58:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 14:59:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 14:59:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:00:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:00:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:00:23 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 08:00:26 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 14325
ERROR - 2025-04-30 15:01:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:01:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:01:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:01:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:01:42 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8390
ERROR - 2025-04-30 15:02:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...wat_menerima_sore&quot;, &quot;id_users&quot;) VALUES ('736497', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:02:37 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...wat_menerima_sore", "id_users") VALUES ('736497', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_sore" ("id_layanan_pendaftaran", "dokter_dpjp_sore", "konsulen_sore", "tanggal_waktu_sore", "diagnosa_keperawatan_sore", "infus_sore", "rencana_tindakan_sore", "perawat_mengover_sore", "perawat_menerima_sore", "id_users") VALUES ('736497', '', NULL, '2025-04-30 14:00:00', 'Hipervolemia, Nausea', 'Kidmin/ 24 jam', 'R/ Cek GDS/Hari Apidra 3x10, Levemir 1x12 R/ nebu combivent 4 x', '546', '412', '1609')
ERROR - 2025-04-30 15:02:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-04-30 15:03:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-04-30 15:03:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-04-30 15:03:24 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-04-30 15:03:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:03:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:04:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:04:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:04:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:04:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:04:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:04:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:04:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:04:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:04:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:04:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:05:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:05:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:05:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:05:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:05:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:05:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:05:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:05:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:05:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:05:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:06:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 15:06:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:06:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:06:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:06:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:06:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:06:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:06:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 15:06:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:06:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:06:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:06:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:06:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:06:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:06:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:06:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:06:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 15:07:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 15:07:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 15:07:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 15:08:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 15:08:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:08:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:10:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:10:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:10:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:10:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 352
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:11:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 445
ERROR - 2025-04-30 15:12:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:12:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:12:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:12:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:12:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:12:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:12:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:12:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:12:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:12:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:12:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:12:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:13:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:13:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:13:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:13:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:13:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:13:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:13:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:13:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:14:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:14:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:14:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:14:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:14:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:14:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:14:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:14:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:14:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:14:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:14:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:14:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:15:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:15:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:15:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:15:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:16:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:16:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:16:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:16:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:16:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:16:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:16:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:16:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:16:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:16:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:16:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:16:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:16:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:16:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:16:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:16:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:17:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:17:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:17:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:17:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:17:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:17:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:17:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:17:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:17:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:17:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:18:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:18:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:18:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:18:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:19:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:19:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:19:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:19:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:19:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:19:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:20:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:20:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:20:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:20:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:20:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:20:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:21:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:21:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:21:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:21:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:21:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:21:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:21:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:21:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:21:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:21:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:21:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:21:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:21:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:21:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:21:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:21:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:24:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:24:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:24:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:24:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:24:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:24:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:24:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:25:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:25:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:25:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:25:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:25:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:25:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:25:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:25:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:25:55 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:25:55 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:25:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-04-30 15:26:06 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:26:06 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:26:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-04-30 15:26:16 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:26:16 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:26:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-04-30 15:26:28 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:26:28 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:26:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-04-30 15:26:51 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:26:51 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-30 15:26:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-04-30 15:26:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:26:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:27:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:27:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:27:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:27:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:28:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:28:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:28:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:28:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:28:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:28:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:28:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:28:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:29:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:29:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:29:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:29:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:29:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:29:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:30:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:30:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:30:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:30:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:31:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:31:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:31:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:31:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:31:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:31:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:32:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:32:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:32:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:32:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:34:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:34:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:35:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 15:35:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:35:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:35:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:35:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:35:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:35:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:36:12 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-30 15:36:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:36:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:40:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:40:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:40:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:40:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:41:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:41:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:41:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:41:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:41:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:41:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:44:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:44:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:44:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:44:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:44:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:44:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:45:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:45:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:45:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:45:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:45:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-30 15:46:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:46:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:46:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:46:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:47:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:47:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:47:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:47:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:47:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 15:48:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:48:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:48:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 15:48:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:48:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:48:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:48:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:49:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:49:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:49:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:49:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:50:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:50:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:51:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:51:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:51:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 15:51:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:51:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:52:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:52:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:52:14 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-04-30 15:52:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  time zone displacement out of range: &quot;-052025-02 10:53&quot;
LINE 1: ...ia_lain&quot;:&quot;&quot;}}', '412', '657', '2025-04-30 15:47', '-052025-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:52:14 --> Query error: ERROR:  time zone displacement out of range: "-052025-02 10:53"
LINE 1: ...ia_lain":""}}', '412', '657', '2025-04-30 15:47', '-052025-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('738039', '2025-04-30 15:47', 'Brankar', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Pasien mengatakan lemas', '1 bulan SMRS', '1 bulan SMRS', '{"infeksi":"","lain":"","ket_lain":""}', '', 'Pasien merupakan pasien rujuk lepas dari RS sari asih, keluhan saat datang lemas, lemas memberat saat aktivitas, riwayat minum natrium diclofenac sudah satu tahun terakhir beli sendiri di apotek', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"Anemia sempat transfusi PRC  5 kantong 1 tahun yll"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"Tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '132', '76', '82', '36', '20', NULL, NULL, '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"Tidak ada"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"Tidak ada"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"","sedang":"1","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"Tidak ada"}', 'Simetris', 'Lain', 'Tidak ada', '{"cemas":"1","takut":"1","marah":"","sedih":"1","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'Sholat, Mengaji', 'Baligh', '', 'Tayamum', 'Duduk', 'Ujian', '', 'Istirahat', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Sunda', 'Normal', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', 'Ringan', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', '0', NULL, NULL, '20', '0', NULL, NULL, '0', NULL, '20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_4', '', '0_2', '0_4', '0_3', '0_1', '0_3', 'Putih', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"1","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '412', '657', '2025-04-30 15:47', '-052025-02 10:53', '1', '1', '2025-04-30 15:52:14')
ERROR - 2025-04-30 15:52:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:52:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:52:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:52:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:53:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:53:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:53:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:53:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:54:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 15:54:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:54:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:54:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:54:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 15:58:14 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-04-30 15:58:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 15:58:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 16:02:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:02:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:03:53 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-30 16:04:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:04:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:05:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:10:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:10:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 16:14:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 16:17:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 16:22:54 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-30 16:24:40 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-30 16:28:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:28:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 16:34:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:34:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 16:35:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 16:38:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:43:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:43:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 16:43:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6085785, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:43:33 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6085785, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6085785, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-30 16:50:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:50:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 16:50:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:50:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 16:53:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-1 10&quot;
LINE 1: ...ia_lain&quot;:&quot;&quot;}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:53:23 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-1 10"
LINE 1: ...ia_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('738042', '2025-04-30 16:46', '', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Nyeri Dada ', 'Nyeri Dada di rasakan sejak 5 jam SMRS ', '1 BULAN SMRS ', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'Nyeri dada hilang timbul, sesak, nyeri ulu hati, ', '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '128', '78', '76', '36.3', '20', NULL, NULL, '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"1","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'Berdoa, Menerima ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Sunds ', 'Normal', '', '0', '', '0', '1', '0', '0', '0', '0', '0', '1', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Sedang', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, '15', '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1 10', '1', '1', '2025-04-30 16:53:23')
ERROR - 2025-04-30 16:53:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-1 10&quot;
LINE 1: ...ia_lain&quot;:&quot;&quot;}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:53:29 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-1 10"
LINE 1: ...ia_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('738042', '2025-04-30 16:46', '', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Nyeri Dada ', 'Nyeri Dada di rasakan sejak 5 jam SMRS ', '1 BULAN SMRS ', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'Nyeri dada hilang timbul, sesak, nyeri ulu hati, ', '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '128', '78', '76', '36.3', '20', NULL, NULL, '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"1","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'Berdoa, Menerima ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Sunds ', 'Normal', '', '0', '', '0', '1', '0', '0', '0', '0', '0', '1', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Sedang', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, '15', '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1 10', '1', '1', '2025-04-30 16:53:29')
ERROR - 2025-04-30 16:53:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:53:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-1 10&quot;
LINE 1: ...ia_lain&quot;:&quot;&quot;}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:53:36 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-1 10"
LINE 1: ...ia_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('738042', '2025-04-30 16:46', '', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Nyeri Dada ', 'Nyeri Dada di rasakan sejak 5 jam SMRS ', '1 BULAN SMRS ', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'Nyeri dada hilang timbul, sesak, nyeri ulu hati, ', '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '128', '78', '76', '36.3', '20', NULL, NULL, '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"1","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'Berdoa, Menerima ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Sunds ', 'Normal', '', '0', '', '0', '1', '0', '0', '0', '0', '0', '1', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Sedang', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, '15', '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1 10', '1', '1', '2025-04-30 16:53:36')
ERROR - 2025-04-30 16:56:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 16:58:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-1 10&quot;
LINE 1: ...ia_lain&quot;:&quot;&quot;}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 16:58:05 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-1 10"
LINE 1: ...ia_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('738042', '2025-04-30 16:46', '', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Nyeri Dada ', 'Nyeri Dada di rasakan sejak 5 jam SMRS ', '1 BULAN SMRS ', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'Nyeri dada hilang timbul, sesak, nyeri ulu hati, ', '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '128', '78', '76', '36.3', '20', NULL, NULL, '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"1","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'Berdoa, Menerima ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Sunds ', 'Normal', '', '0', '', '0', '1', '0', '0', '0', '0', '0', '1', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Sedang', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, '15', '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1 10', '1', '1', '2025-04-30 16:58:05')
ERROR - 2025-04-30 17:02:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-1 10&quot;
LINE 1: ...ia_lain&quot;:&quot;&quot;}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:02:10 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-1 10"
LINE 1: ...ia_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('738042', '2025-04-30 16:46', '', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Nyeri Dada ', 'Nyeri Dada di rasakan sejak 5 jam SMRS ', '1 BULAN SMRS ', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'Nyeri dada hilang timbul, sesak, nyeri ulu hati, ', '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '128', '78', '76', '36.3', '20', NULL, NULL, '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"1","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'Berdoa, Menerima ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Sunds ', 'Normal', '', '0', '', '0', '1', '0', '0', '0', '0', '0', '1', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Sedang', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, '15', '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1 10', '1', '1', '2025-04-30 17:02:10')
ERROR - 2025-04-30 17:03:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-1 10&quot;
LINE 1: ...ia_lain&quot;:&quot;&quot;}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:03:37 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-1 10"
LINE 1: ...ia_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('738042', '2025-04-30 16:46', '', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Nyeri Dada ', 'Nyeri Dada di rasakan sejak 5 jam SMRS ', '1 BULAN SMRS ', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'Nyeri dada hilang timbul, sesak, nyeri ulu hati, ', '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '128', '78', '76', '36.3', '20', NULL, NULL, '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"1","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'Berdoa, Menerima ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Sunds ', 'Normal', '', '0', '', '0', '1', '0', '0', '0', '0', '0', '1', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Sedang', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, '15', '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1 10', '1', '1', '2025-04-30 17:03:37')
ERROR - 2025-04-30 17:05:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:05:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 17:05:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:05:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 17:05:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:05:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 17:08:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 17:14:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-01 10&quot;
LINE 1: ...4-30 17:08', &quot;waktu_ttd_verifikasi_dokter_dpjp&quot; = '2025-05-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:14:13 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-01 10"
LINE 1: ...4-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-0...
                                                             ^ - Invalid query: UPDATE "sm_kajian_keperawatan_ranap" SET "id_layanan_pendaftaran" = '738042', "cara_tiba_diruangan" = '', "informasi_dari" = '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', "keluhan_utama" = 'Nyeri Dada', "timbul_keluhan" = 'Nyeri di rasakan 5 jam SMRS ', "lama_keluhan" = '1 Bulan Smrs ', "faktor_pencetus" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan" = '', "rps" = 'Nyeri dada, sesak nafas, nyeri ulu hati, keluhan nyeri dada sudah hilang timbul sejak 1 bulan terakhir,', "rpd" = '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "rpk" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "pernah_dirawat" = '{"dirawat":"0","kapan":"","dimana":""}', "kebiasaan" = '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', "riwayat_operasi" = '{"operasi":"0","kapan":"","dimana":""}', "obat_dari_luar" = '0', "alergi" = '0', "alergi_obat" = '', "alergi_obat_reaksi" = '', "alergi_makanan" = '', "alergi_makanan_reaksi" = '', "keadaan_hamil" = '0', "sedang_menyusui" = '0', "riwayat_kelahiran" = '', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', "tensi_sistolik_awal" = '126', "tensi_diastolik_awal" = '78', "nadi_awal" = '68', "suhu_awal" = '36.2', "nafas_awal" = '', "tinggi_badan" = NULL, "berat_badan" = NULL, "suara_nafas" = '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', "pola_nafas" = '{"normal":"1","bradipnea":"","tachipnea":""}', "jenis_pernafasan" = '{"dada":"","perut":"1","cuping_hidung":""}', "otot_bantu_nafas" = '0', "irama_nafas" = '1', "batuk_sekresi" = '0', "ket_batuk_sekresi" = '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', "warna_kulit" = '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', "nyeri_dada" = '0', "ket_nyeri_dada" = '', "denyut_nadi" = '1', "sirkulasi" = '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', "pulsasi" = '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', "mulut" = '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', "gigi" = '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', "lidah" = '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', "tenggorokan" = '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', "abdomen" = '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', "nafsu_makan" = 'Tetap', "mual" = '0', "muntah" = '0', "kesulitan_menelan" = '0', "eleminasi_bab" = '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', "eleminasi_bak" = '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', "tulang" = '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', "sendi" = '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', "integumen_warna" = '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', "integumen_turgor" = '{"baik":"1","sedang":"","buruk":""}', "integumen_kulit" = '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', "penglihatan" = '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', "penciuman" = '{"sekresi":"","polip":"","gangguan":""}', "pendengaran" = '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', "pengecap" = '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', "persyarafan" = '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada keluhan "}', "reproduksi_alat" = '', "reproduksi_payudara" = '', "ket_reproduksi_payudara" = '', "status_psikologis" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "status_mental" = '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', "status_keluarga" = 'Serumah', "ket_status_keluarga" = '', "tempat_tinggal" = 'Serumah', "ket_tempat_tinggal" = '', "status_hubungan_pasien" = '1', "keyakinan" = '0', "ket_keyakinan" = '', "nilai_kepercayaan" = '0', "ket_nilai_kepercayaan" = '', "kebiasaan_keagamaan" = '', "wajib_ibadah" = 'Baligh', "ket_wajib_ibadah_halangan" = '', "thaharoh" = 'Berwudhu', "sholat" = 'Berdiri', "nilai_budaya" = 'Ujian', "ket_nilai_budaya" = '', "budaya_pola_aktivitas" = 'Berdoa, Menerima', "pola_komunikasi" = 'Normal', "ket_pola_komunikasi" = '', "pola_makan" = 'Sehat', "makanan_pokok" = 'Nasi', "ket_makanan_pokok" = '', "pantang_makanan" = '0', "ket_pantang_makanan" = '', "konsumsi_makanan_luar" = '0', "ket_konsumsi_makanan_luar" = '', "kepercayaan_penyakit" = '0', "ket_kepercayaan_penyakit" = '', "kewarganegaraan" = 'WNI', "suku_bangsa" = 'Sunda ', "bicara" = 'Normal', "ket_bicara" = '', "perlu_penterjemah" = '0', "perlu_penterjemah_bahasa" = '', "bahasa_isyarat" = '0', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '0', "pemahaman_nutrisi_diet" = '0', "pemahaman_spiritual" = '0', "pemahaman_peralatan_medis" = '0', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '1', "hambatan_menerima_edukasi" = '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', "sn_penurunan_bb" = '1', "sn_penurunan_bb_on" = NULL, "sn_asupan_makan" = '0', "sn_total" = '0', "nilai_fungsi_makan" = '5', "nilai_fungsi_mandi" = '5', "nilai_fungsi_personal" = '5', "nilai_fungsi_berpakaian" = '5', "nilai_fungsi_bab" = '10', "nilai_fungsi_bak" = '10', "nilai_fungsi_berpindah" = '10', "nilai_fungsi_toiletting" = '5', "nilai_fungsi_mobilisasi" = '10', "nilai_fungsi_naik_turun_tangga" = '5', "nilai_fungsi_total" = '70', "nilai_tingkat_nyeri" = 'Sedang', "nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', "prjd_riwayat_jatuh" = '0', "prjd_diagnosis_sekunder" = '0', "prjd_alat_bantu_jalan_1" = NULL, "prjd_alat_bantu_jalan_2" = '15', "prjd_alat_bantu_jalan_3" = '30', "prjd_terpasang_infus" = '20', "prjd_cara_berjalan_1" = NULL, "prjd_cara_berjalan_2" = NULL, "prjd_cara_berjalan_3" = '20', "prjd_status_mental_1" = '0', "prjd_status_mental_2" = NULL, "prjd_nilai_total" = '85', "prjl_riwayat_jatuh" = '0', "prjl_riwayat_jatuh_opt" = '0', "prjl_status_mental" = '0', "prjl_status_mental_opt_1" = '0', "prjl_status_mental_opt_2" = '0', "prjl_penglihatan" = '0', "prjl_penglihatan_opt_1" = '0', "prjl_penglihatan_opt_2" = '0', "prjl_berkemih" = '0', "prjl_transfer" = '0', "prjl_mobilitas" = '0', "prjl_nilai_total" = '0', "skrining_pasien_akhir_kehidupan" = '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', "pk_geriatri" = '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', "pk_pasien_ketergantungan" = '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', "sew_laju_respirasi" = '', "sew_saturasi" = '', "sew_suplemen" = '', "sew_temperatur" = '', "sew_tds" = '', "sew_laju_jantung" = '', "sew_kesadaran" = '', "suhunewst" = '', "sew_total" = '', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '198', "id_verifikasi_dokter_dpjp" = '358', "waktu_ttd_perawat" = '2025-04-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-01 10', "ttd_perawat" = '1', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-04-30 17:14:13'
WHERE "id" = '33342'
ERROR - 2025-04-30 17:14:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-01 10&quot;
LINE 1: ...4-30 17:08', &quot;waktu_ttd_verifikasi_dokter_dpjp&quot; = '2025-05-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:14:18 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-01 10"
LINE 1: ...4-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-0...
                                                             ^ - Invalid query: UPDATE "sm_kajian_keperawatan_ranap" SET "id_layanan_pendaftaran" = '738042', "cara_tiba_diruangan" = '', "informasi_dari" = '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', "keluhan_utama" = 'Nyeri Dada', "timbul_keluhan" = 'Nyeri di rasakan 5 jam SMRS ', "lama_keluhan" = '1 Bulan Smrs ', "faktor_pencetus" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan" = '', "rps" = 'Nyeri dada, sesak nafas, nyeri ulu hati, keluhan nyeri dada sudah hilang timbul sejak 1 bulan terakhir,', "rpd" = '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "rpk" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "pernah_dirawat" = '{"dirawat":"0","kapan":"","dimana":""}', "kebiasaan" = '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', "riwayat_operasi" = '{"operasi":"0","kapan":"","dimana":""}', "obat_dari_luar" = '0', "alergi" = '0', "alergi_obat" = '', "alergi_obat_reaksi" = '', "alergi_makanan" = '', "alergi_makanan_reaksi" = '', "keadaan_hamil" = '0', "sedang_menyusui" = '0', "riwayat_kelahiran" = '', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', "tensi_sistolik_awal" = '126', "tensi_diastolik_awal" = '78', "nadi_awal" = '68', "suhu_awal" = '36.2', "nafas_awal" = '', "tinggi_badan" = NULL, "berat_badan" = NULL, "suara_nafas" = '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', "pola_nafas" = '{"normal":"1","bradipnea":"","tachipnea":""}', "jenis_pernafasan" = '{"dada":"","perut":"1","cuping_hidung":""}', "otot_bantu_nafas" = '0', "irama_nafas" = '1', "batuk_sekresi" = '0', "ket_batuk_sekresi" = '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', "warna_kulit" = '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', "nyeri_dada" = '0', "ket_nyeri_dada" = '', "denyut_nadi" = '1', "sirkulasi" = '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', "pulsasi" = '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', "mulut" = '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', "gigi" = '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', "lidah" = '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', "tenggorokan" = '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', "abdomen" = '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', "nafsu_makan" = 'Tetap', "mual" = '0', "muntah" = '0', "kesulitan_menelan" = '0', "eleminasi_bab" = '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', "eleminasi_bak" = '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', "tulang" = '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', "sendi" = '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', "integumen_warna" = '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', "integumen_turgor" = '{"baik":"1","sedang":"","buruk":""}', "integumen_kulit" = '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', "penglihatan" = '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', "penciuman" = '{"sekresi":"","polip":"","gangguan":""}', "pendengaran" = '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', "pengecap" = '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', "persyarafan" = '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada keluhan "}', "reproduksi_alat" = '', "reproduksi_payudara" = '', "ket_reproduksi_payudara" = '', "status_psikologis" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "status_mental" = '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', "status_keluarga" = 'Serumah', "ket_status_keluarga" = '', "tempat_tinggal" = 'Serumah', "ket_tempat_tinggal" = '', "status_hubungan_pasien" = '1', "keyakinan" = '0', "ket_keyakinan" = '', "nilai_kepercayaan" = '0', "ket_nilai_kepercayaan" = '', "kebiasaan_keagamaan" = '', "wajib_ibadah" = 'Baligh', "ket_wajib_ibadah_halangan" = '', "thaharoh" = 'Berwudhu', "sholat" = 'Berdiri', "nilai_budaya" = 'Ujian', "ket_nilai_budaya" = '', "budaya_pola_aktivitas" = 'Berdoa, Menerima', "pola_komunikasi" = 'Normal', "ket_pola_komunikasi" = '', "pola_makan" = 'Sehat', "makanan_pokok" = 'Nasi', "ket_makanan_pokok" = '', "pantang_makanan" = '0', "ket_pantang_makanan" = '', "konsumsi_makanan_luar" = '0', "ket_konsumsi_makanan_luar" = '', "kepercayaan_penyakit" = '0', "ket_kepercayaan_penyakit" = '', "kewarganegaraan" = 'WNI', "suku_bangsa" = 'Sunda ', "bicara" = 'Normal', "ket_bicara" = '', "perlu_penterjemah" = '0', "perlu_penterjemah_bahasa" = '', "bahasa_isyarat" = '0', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '0', "pemahaman_nutrisi_diet" = '0', "pemahaman_spiritual" = '0', "pemahaman_peralatan_medis" = '0', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '1', "hambatan_menerima_edukasi" = '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', "sn_penurunan_bb" = '1', "sn_penurunan_bb_on" = NULL, "sn_asupan_makan" = '0', "sn_total" = '0', "nilai_fungsi_makan" = '5', "nilai_fungsi_mandi" = '5', "nilai_fungsi_personal" = '5', "nilai_fungsi_berpakaian" = '5', "nilai_fungsi_bab" = '10', "nilai_fungsi_bak" = '10', "nilai_fungsi_berpindah" = '10', "nilai_fungsi_toiletting" = '5', "nilai_fungsi_mobilisasi" = '10', "nilai_fungsi_naik_turun_tangga" = '5', "nilai_fungsi_total" = '70', "nilai_tingkat_nyeri" = 'Sedang', "nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', "prjd_riwayat_jatuh" = '0', "prjd_diagnosis_sekunder" = '0', "prjd_alat_bantu_jalan_1" = NULL, "prjd_alat_bantu_jalan_2" = '15', "prjd_alat_bantu_jalan_3" = '30', "prjd_terpasang_infus" = '20', "prjd_cara_berjalan_1" = NULL, "prjd_cara_berjalan_2" = NULL, "prjd_cara_berjalan_3" = '20', "prjd_status_mental_1" = '0', "prjd_status_mental_2" = NULL, "prjd_nilai_total" = '85', "prjl_riwayat_jatuh" = '0', "prjl_riwayat_jatuh_opt" = '0', "prjl_status_mental" = '0', "prjl_status_mental_opt_1" = '0', "prjl_status_mental_opt_2" = '0', "prjl_penglihatan" = '0', "prjl_penglihatan_opt_1" = '0', "prjl_penglihatan_opt_2" = '0', "prjl_berkemih" = '0', "prjl_transfer" = '0', "prjl_mobilitas" = '0', "prjl_nilai_total" = '0', "skrining_pasien_akhir_kehidupan" = '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', "pk_geriatri" = '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', "pk_pasien_ketergantungan" = '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', "sew_laju_respirasi" = '', "sew_saturasi" = '', "sew_suplemen" = '', "sew_temperatur" = '', "sew_tds" = '', "sew_laju_jantung" = '', "sew_kesadaran" = '', "suhunewst" = '', "sew_total" = '', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '198', "id_verifikasi_dokter_dpjp" = '358', "waktu_ttd_perawat" = '2025-04-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-01 10', "ttd_perawat" = '1', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-04-30 17:14:18'
WHERE "id" = '33342'
ERROR - 2025-04-30 17:14:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-1 10&quot;
LINE 1: ...ia_lain&quot;:&quot;&quot;}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:14:29 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-1 10"
LINE 1: ...ia_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('738042', '2025-04-30 16:46', '', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Nyeri Dada ', 'Nyeri Dada di rasakan sejak 5 jam SMRS ', '1 BULAN SMRS ', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'Nyeri dada hilang timbul, sesak, nyeri ulu hati, ', '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '128', '78', '76', '36.3', '20', NULL, NULL, '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"1","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Tetap', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'Berdoa, Menerima ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Sunds ', 'Normal', '', '0', '', '0', '1', '0', '0', '0', '0', '0', '1', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Sedang', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, '15', '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '198', '358', '2025-04-30 16:46', '2025-05-1 10', '1', '1', '2025-04-30 17:14:29')
ERROR - 2025-04-30 17:15:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 17:18:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-01 10&quot;
LINE 1: ...4-30 17:08', &quot;waktu_ttd_verifikasi_dokter_dpjp&quot; = '2025-05-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:18:47 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-01 10"
LINE 1: ...4-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-0...
                                                             ^ - Invalid query: UPDATE "sm_kajian_keperawatan_ranap" SET "id_layanan_pendaftaran" = '738042', "cara_tiba_diruangan" = '', "informasi_dari" = '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', "keluhan_utama" = 'Nyeri Dada', "timbul_keluhan" = 'Nyeri di rasakan 5 jam SMRS ', "lama_keluhan" = '1 Bulan Smrs ', "faktor_pencetus" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan" = '', "rps" = 'Nyeri dada, sesak nafas, nyeri ulu hati, keluhan nyeri dada sudah hilang timbul sejak 1 bulan terakhir,', "rpd" = '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "rpk" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "pernah_dirawat" = '{"dirawat":"0","kapan":"","dimana":""}', "kebiasaan" = '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', "riwayat_operasi" = '{"operasi":"0","kapan":"","dimana":""}', "obat_dari_luar" = '0', "alergi" = '0', "alergi_obat" = '', "alergi_obat_reaksi" = '', "alergi_makanan" = '', "alergi_makanan_reaksi" = '', "keadaan_hamil" = '0', "sedang_menyusui" = '0', "riwayat_kelahiran" = '', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', "tensi_sistolik_awal" = '126', "tensi_diastolik_awal" = '78', "nadi_awal" = '68', "suhu_awal" = '36.2', "nafas_awal" = '', "tinggi_badan" = NULL, "berat_badan" = NULL, "suara_nafas" = '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', "pola_nafas" = '{"normal":"1","bradipnea":"","tachipnea":""}', "jenis_pernafasan" = '{"dada":"","perut":"1","cuping_hidung":""}', "otot_bantu_nafas" = '0', "irama_nafas" = '1', "batuk_sekresi" = '0', "ket_batuk_sekresi" = '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', "warna_kulit" = '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', "nyeri_dada" = '0', "ket_nyeri_dada" = '', "denyut_nadi" = '1', "sirkulasi" = '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', "pulsasi" = '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', "mulut" = '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', "gigi" = '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', "lidah" = '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', "tenggorokan" = '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', "abdomen" = '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', "nafsu_makan" = 'Tetap', "mual" = '0', "muntah" = '0', "kesulitan_menelan" = '0', "eleminasi_bab" = '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', "eleminasi_bak" = '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', "tulang" = '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', "sendi" = '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', "integumen_warna" = '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', "integumen_turgor" = '{"baik":"1","sedang":"","buruk":""}', "integumen_kulit" = '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', "penglihatan" = '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', "penciuman" = '{"sekresi":"","polip":"","gangguan":""}', "pendengaran" = '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', "pengecap" = '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', "persyarafan" = '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada keluhan "}', "reproduksi_alat" = '', "reproduksi_payudara" = '', "ket_reproduksi_payudara" = '', "status_psikologis" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "status_mental" = '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', "status_keluarga" = 'Serumah', "ket_status_keluarga" = '', "tempat_tinggal" = 'Serumah', "ket_tempat_tinggal" = '', "status_hubungan_pasien" = '1', "keyakinan" = '0', "ket_keyakinan" = '', "nilai_kepercayaan" = '0', "ket_nilai_kepercayaan" = '', "kebiasaan_keagamaan" = '', "wajib_ibadah" = 'Baligh', "ket_wajib_ibadah_halangan" = '', "thaharoh" = 'Berwudhu', "sholat" = 'Berdiri', "nilai_budaya" = 'Ujian', "ket_nilai_budaya" = '', "budaya_pola_aktivitas" = 'Berdoa , Menerima', "pola_komunikasi" = 'Normal', "ket_pola_komunikasi" = '', "pola_makan" = 'Sehat', "makanan_pokok" = 'Nasi', "ket_makanan_pokok" = '', "pantang_makanan" = '0', "ket_pantang_makanan" = '', "konsumsi_makanan_luar" = '0', "ket_konsumsi_makanan_luar" = '', "kepercayaan_penyakit" = '0', "ket_kepercayaan_penyakit" = '', "kewarganegaraan" = 'WNI', "suku_bangsa" = 'sunda', "bicara" = 'Normal', "ket_bicara" = '', "perlu_penterjemah" = '0', "perlu_penterjemah_bahasa" = '', "bahasa_isyarat" = '0', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '0', "pemahaman_nutrisi_diet" = '0', "pemahaman_spiritual" = '0', "pemahaman_peralatan_medis" = '0', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '1', "hambatan_menerima_edukasi" = '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', "sn_penurunan_bb" = '1', "sn_penurunan_bb_on" = NULL, "sn_asupan_makan" = '0', "sn_total" = '0', "nilai_fungsi_makan" = NULL, "nilai_fungsi_mandi" = NULL, "nilai_fungsi_personal" = NULL, "nilai_fungsi_berpakaian" = NULL, "nilai_fungsi_bab" = NULL, "nilai_fungsi_bak" = NULL, "nilai_fungsi_berpindah" = NULL, "nilai_fungsi_toiletting" = NULL, "nilai_fungsi_mobilisasi" = NULL, "nilai_fungsi_naik_turun_tangga" = NULL, "nilai_fungsi_total" = '0', "nilai_tingkat_nyeri" = 'Sedang', "nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', "prjd_riwayat_jatuh" = '0', "prjd_diagnosis_sekunder" = '0', "prjd_alat_bantu_jalan_1" = NULL, "prjd_alat_bantu_jalan_2" = '15', "prjd_alat_bantu_jalan_3" = '30', "prjd_terpasang_infus" = '20', "prjd_cara_berjalan_1" = NULL, "prjd_cara_berjalan_2" = NULL, "prjd_cara_berjalan_3" = '20', "prjd_status_mental_1" = '0', "prjd_status_mental_2" = NULL, "prjd_nilai_total" = '85', "prjl_riwayat_jatuh" = '0', "prjl_riwayat_jatuh_opt" = '0', "prjl_status_mental" = '0', "prjl_status_mental_opt_1" = '0', "prjl_status_mental_opt_2" = '0', "prjl_penglihatan" = '0', "prjl_penglihatan_opt_1" = '0', "prjl_penglihatan_opt_2" = '0', "prjl_berkemih" = '0', "prjl_transfer" = '0', "prjl_mobilitas" = '0', "prjl_nilai_total" = '0', "skrining_pasien_akhir_kehidupan" = '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', "pk_geriatri" = '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', "pk_pasien_ketergantungan" = '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', "sew_laju_respirasi" = '', "sew_saturasi" = '', "sew_suplemen" = '', "sew_temperatur" = '', "sew_tds" = '', "sew_laju_jantung" = '', "sew_kesadaran" = '', "suhunewst" = '', "sew_total" = '', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '198', "id_verifikasi_dokter_dpjp" = '358', "waktu_ttd_perawat" = '2025-04-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-01 10', "ttd_perawat" = '1', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-04-30 17:18:47'
WHERE "id" = '33342'
ERROR - 2025-04-30 17:20:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-01 10&quot;
LINE 1: ...4-30 17:08', &quot;waktu_ttd_verifikasi_dokter_dpjp&quot; = '2025-05-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:20:08 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-01 10"
LINE 1: ...4-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-0...
                                                             ^ - Invalid query: UPDATE "sm_kajian_keperawatan_ranap" SET "id_layanan_pendaftaran" = '738042', "cara_tiba_diruangan" = '', "informasi_dari" = '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', "keluhan_utama" = 'Nyeri Dada', "timbul_keluhan" = 'Nyeri di rasakan 5 jam SMRS ', "lama_keluhan" = '1 Bulan Smrs ', "faktor_pencetus" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan" = '', "rps" = 'Nyeri dada, sesak nafas, nyeri ulu hati, keluhan nyeri dada sudah hilang timbul sejak 1 bulan terakhir,', "rpd" = '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "rpk" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "pernah_dirawat" = '{"dirawat":"0","kapan":"","dimana":""}', "kebiasaan" = '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', "riwayat_operasi" = '{"operasi":"0","kapan":"","dimana":""}', "obat_dari_luar" = '0', "alergi" = '0', "alergi_obat" = '', "alergi_obat_reaksi" = '', "alergi_makanan" = '', "alergi_makanan_reaksi" = '', "keadaan_hamil" = '0', "sedang_menyusui" = '0', "riwayat_kelahiran" = '', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', "tensi_sistolik_awal" = '126', "tensi_diastolik_awal" = '78', "nadi_awal" = '68', "suhu_awal" = '36.2', "nafas_awal" = '', "tinggi_badan" = NULL, "berat_badan" = NULL, "suara_nafas" = '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', "pola_nafas" = '{"normal":"1","bradipnea":"","tachipnea":""}', "jenis_pernafasan" = '{"dada":"","perut":"1","cuping_hidung":""}', "otot_bantu_nafas" = '0', "irama_nafas" = '1', "batuk_sekresi" = '0', "ket_batuk_sekresi" = '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', "warna_kulit" = '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', "nyeri_dada" = '0', "ket_nyeri_dada" = '', "denyut_nadi" = '1', "sirkulasi" = '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', "pulsasi" = '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', "mulut" = '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', "gigi" = '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', "lidah" = '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', "tenggorokan" = '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', "abdomen" = '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', "nafsu_makan" = 'Tetap', "mual" = '0', "muntah" = '0', "kesulitan_menelan" = '0', "eleminasi_bab" = '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', "eleminasi_bak" = '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', "tulang" = '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', "sendi" = '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', "integumen_warna" = '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', "integumen_turgor" = '{"baik":"1","sedang":"","buruk":""}', "integumen_kulit" = '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', "penglihatan" = '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', "penciuman" = '{"sekresi":"","polip":"","gangguan":""}', "pendengaran" = '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', "pengecap" = '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', "persyarafan" = '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada keluhan "}', "reproduksi_alat" = '', "reproduksi_payudara" = '', "ket_reproduksi_payudara" = '', "status_psikologis" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "status_mental" = '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', "status_keluarga" = 'Serumah', "ket_status_keluarga" = '', "tempat_tinggal" = 'Serumah', "ket_tempat_tinggal" = '', "status_hubungan_pasien" = '1', "keyakinan" = '0', "ket_keyakinan" = '', "nilai_kepercayaan" = '0', "ket_nilai_kepercayaan" = '', "kebiasaan_keagamaan" = '', "wajib_ibadah" = 'Baligh', "ket_wajib_ibadah_halangan" = '', "thaharoh" = 'Berwudhu', "sholat" = 'Berdiri', "nilai_budaya" = 'Ujian', "ket_nilai_budaya" = '', "budaya_pola_aktivitas" = 'Berdoa, Menerima', "pola_komunikasi" = 'Normal', "ket_pola_komunikasi" = '', "pola_makan" = 'Sehat', "makanan_pokok" = 'Nasi', "ket_makanan_pokok" = '', "pantang_makanan" = '0', "ket_pantang_makanan" = '', "konsumsi_makanan_luar" = '0', "ket_konsumsi_makanan_luar" = '', "kepercayaan_penyakit" = '0', "ket_kepercayaan_penyakit" = '', "kewarganegaraan" = 'WNI', "suku_bangsa" = 'Sunda ', "bicara" = 'Normal', "ket_bicara" = '', "perlu_penterjemah" = '0', "perlu_penterjemah_bahasa" = '', "bahasa_isyarat" = '0', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '0', "pemahaman_nutrisi_diet" = '0', "pemahaman_spiritual" = '0', "pemahaman_peralatan_medis" = '0', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '1', "hambatan_menerima_edukasi" = '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', "sn_penurunan_bb" = '1', "sn_penurunan_bb_on" = NULL, "sn_asupan_makan" = '0', "sn_total" = '0', "nilai_fungsi_makan" = '5', "nilai_fungsi_mandi" = '5', "nilai_fungsi_personal" = '5', "nilai_fungsi_berpakaian" = '5', "nilai_fungsi_bab" = '10', "nilai_fungsi_bak" = '10', "nilai_fungsi_berpindah" = '10', "nilai_fungsi_toiletting" = '5', "nilai_fungsi_mobilisasi" = '10', "nilai_fungsi_naik_turun_tangga" = '5', "nilai_fungsi_total" = '70', "nilai_tingkat_nyeri" = 'Sedang', "nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', "prjd_riwayat_jatuh" = '0', "prjd_diagnosis_sekunder" = '0', "prjd_alat_bantu_jalan_1" = NULL, "prjd_alat_bantu_jalan_2" = '15', "prjd_alat_bantu_jalan_3" = '30', "prjd_terpasang_infus" = '20', "prjd_cara_berjalan_1" = NULL, "prjd_cara_berjalan_2" = NULL, "prjd_cara_berjalan_3" = '20', "prjd_status_mental_1" = '0', "prjd_status_mental_2" = NULL, "prjd_nilai_total" = '85', "prjl_riwayat_jatuh" = '0', "prjl_riwayat_jatuh_opt" = '0', "prjl_status_mental" = '0', "prjl_status_mental_opt_1" = '0', "prjl_status_mental_opt_2" = '0', "prjl_penglihatan" = '0', "prjl_penglihatan_opt_1" = '0', "prjl_penglihatan_opt_2" = '0', "prjl_berkemih" = '0', "prjl_transfer" = '0', "prjl_mobilitas" = '0', "prjl_nilai_total" = '0', "skrining_pasien_akhir_kehidupan" = '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', "pk_geriatri" = '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', "pk_pasien_ketergantungan" = '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', "sew_laju_respirasi" = '', "sew_saturasi" = '', "sew_suplemen" = '', "sew_temperatur" = '', "sew_tds" = '', "sew_laju_jantung" = '', "sew_kesadaran" = '', "suhunewst" = '', "sew_total" = '', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '198', "id_verifikasi_dokter_dpjp" = '358', "waktu_ttd_perawat" = '2025-04-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-01 10', "ttd_perawat" = '1', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-04-30 17:20:08'
WHERE "id" = '33342'
ERROR - 2025-04-30 17:26:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:26:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 17:26:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:26:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 17:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 17:31:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:31:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 17:31:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 17:31:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 17:33:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 18:13:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:13:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:13:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6085989, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:13:46 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6085989, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6085989, '393', 6526.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-30 18:14:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:14:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:15:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:15:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:15:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:15:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:15:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:15:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:16:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:16:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:16:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:16:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:16:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:16:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:16:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:16:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:17:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:17:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:20:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:20:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ES (6086047, '1133', 19199.448, '125', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:20:07 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ES (6086047, '1133', 19199.448, '125', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086047, '1133', 19199.448, '125', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 18:20:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:20:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:21:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:21:10 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '854568', "id_layanan_pendaftaran" = '736554', "waktu" = '2025-04-30 18:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan lemas, demam
', "objective" = 'KES CM, GCS 15, EWS 3 (H) Akral hangat, Nadi kuat, TD: 166/94mmHg, N: 92x/menit, S: 37.9*C RR:20 x/menit, SPO2: 98�ngan O2 nasal 4lpm. (Tgl 28/4/25) IVFD RL: Nacl 0,9%.(2:1) 1500cc/24 jam, Theeway Gelofusal 500cc/24 jam (Tgl 25/4/25) CT brain NK, Ro Thorax di radiologi Elek: 142/4.0/104, UR/CR: 36/1.3 (Tgl 26/4/25) HB: 11.7 HT: 34 LEU: 19.0 TROM: 209', "assessment" = 'Penurunan curah jantung, Intoleransi aktivitas, Hipertermia', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '936', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '936', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-30 18:21:10'
WHERE "id" = '854568'
ERROR - 2025-04-30 18:21:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:21:14 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '854568', "id_layanan_pendaftaran" = '736554', "waktu" = '2025-04-30 18:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan lemas, demam
', "objective" = 'KES CM, GCS 15, EWS 3 (H) Akral hangat, Nadi kuat, TD: 166/94mmHg, N: 92x/menit, S: 37.9*C RR:20 x/menit, SPO2: 98�ngan O2 nasal 4lpm. (Tgl 28/4/25) IVFD RL: Nacl 0,9%.(2:1) 1500cc/24 jam, Theeway Gelofusal 500cc/24 jam (Tgl 25/4/25) CT brain NK, Ro Thorax di radiologi Elek: 142/4.0/104, UR/CR: 36/1.3 (Tgl 26/4/25) HB: 11.7 HT: 34 LEU: 19.0 TROM: 209', "assessment" = 'Penurunan curah jantung, Intoleransi aktivitas, Hipertermia', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '936', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '936', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-30 18:21:14'
WHERE "id" = '854568'
ERROR - 2025-04-30 18:21:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:21:22 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '854568', "id_layanan_pendaftaran" = '736554', "waktu" = '2025-04-30 18:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan lemas, demam', "objective" = 'KES CM, GCS 15, EWS 3 (H) Akral hangat, Nadi kuat, TD: 166/94mmHg, N: 92x/menit, S: 37.9*C RR:20 x/menit, SPO2: 98�ngan O2 nasal 4lpm. (Tgl 28/4/25) IVFD RL: Nacl 0,9%.(2:1) 1500cc/24 jam, Theeway Gelofusal 500cc/24 jam (Tgl 25/4/25) CT brain NK, Ro Thorax di radiologi Elek: 142/4.0/104, UR/CR: 36/1.3 (Tgl 26/4/25) HB: 11.7 HT: 34 LEU: 19.0 TROM: 209', "assessment" = 'Penurunan curah jantung, Intoleransi aktivitas, Hipertermia', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '936', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '936', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-30 18:21:22'
WHERE "id" = '854568'
ERROR - 2025-04-30 18:21:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 18:30:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-1 10&quot;
LINE 1: ...4-30 17:08', &quot;waktu_ttd_verifikasi_dokter_dpjp&quot; = '2025-05-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:30:01 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-1 10"
LINE 1: ...4-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-1...
                                                             ^ - Invalid query: UPDATE "sm_kajian_keperawatan_ranap" SET "id_layanan_pendaftaran" = '738042', "cara_tiba_diruangan" = '', "informasi_dari" = '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', "keluhan_utama" = 'Nyeri Dada', "timbul_keluhan" = 'Nyeri di rasakan 5 jam SMRS ', "lama_keluhan" = '1 Bulan Smrs ', "faktor_pencetus" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan" = '', "rps" = 'Nyeri dada, sesak nafas, nyeri ulu hati, keluhan nyeri dada sudah hilang timbul sejak 1 bulan terakhir,', "rpd" = '{"asma":"","hipertensi":"","jantung":"1","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "rpk" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', "pernah_dirawat" = '{"dirawat":"0","kapan":"","dimana":""}', "kebiasaan" = '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', "riwayat_operasi" = '{"operasi":"0","kapan":"","dimana":""}', "obat_dari_luar" = '0', "alergi" = '0', "alergi_obat" = '', "alergi_obat_reaksi" = '', "alergi_makanan" = '', "alergi_makanan_reaksi" = '', "keadaan_hamil" = '0', "sedang_menyusui" = '0', "riwayat_kelahiran" = '', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', "tensi_sistolik_awal" = '126', "tensi_diastolik_awal" = '78', "nadi_awal" = '68', "suhu_awal" = '36.2', "nafas_awal" = '', "tinggi_badan" = NULL, "berat_badan" = NULL, "suara_nafas" = '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', "pola_nafas" = '{"normal":"1","bradipnea":"","tachipnea":""}', "jenis_pernafasan" = '{"dada":"","perut":"1","cuping_hidung":""}', "otot_bantu_nafas" = '0', "irama_nafas" = '1', "batuk_sekresi" = '0', "ket_batuk_sekresi" = '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', "warna_kulit" = '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', "nyeri_dada" = '0', "ket_nyeri_dada" = '', "denyut_nadi" = '1', "sirkulasi" = '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', "pulsasi" = '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', "mulut" = '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', "gigi" = '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', "lidah" = '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', "tenggorokan" = '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', "abdomen" = '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', "nafsu_makan" = 'Tetap', "mual" = '0', "muntah" = '0', "kesulitan_menelan" = '0', "eleminasi_bab" = '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', "eleminasi_bak" = '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', "tulang" = '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', "sendi" = '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', "integumen_warna" = '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', "integumen_turgor" = '{"baik":"1","sedang":"","buruk":""}', "integumen_kulit" = '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', "penglihatan" = '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', "penciuman" = '{"sekresi":"","polip":"","gangguan":""}', "pendengaran" = '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', "pengecap" = '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', "persyarafan" = '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada keluhan "}', "reproduksi_alat" = '', "reproduksi_payudara" = '', "ket_reproduksi_payudara" = '', "status_psikologis" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "status_mental" = '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', "status_keluarga" = 'Serumah', "ket_status_keluarga" = '', "tempat_tinggal" = 'Serumah', "ket_tempat_tinggal" = '', "status_hubungan_pasien" = '1', "keyakinan" = '0', "ket_keyakinan" = '', "nilai_kepercayaan" = '0', "ket_nilai_kepercayaan" = '', "kebiasaan_keagamaan" = '', "wajib_ibadah" = 'Baligh', "ket_wajib_ibadah_halangan" = '', "thaharoh" = 'Berwudhu', "sholat" = 'Berdiri', "nilai_budaya" = 'Ujian', "ket_nilai_budaya" = '', "budaya_pola_aktivitas" = 'Berdoa, Menerima', "pola_komunikasi" = 'Normal', "ket_pola_komunikasi" = '', "pola_makan" = 'Sehat', "makanan_pokok" = 'Nasi', "ket_makanan_pokok" = '', "pantang_makanan" = '0', "ket_pantang_makanan" = '', "konsumsi_makanan_luar" = '0', "ket_konsumsi_makanan_luar" = '', "kepercayaan_penyakit" = '0', "ket_kepercayaan_penyakit" = '', "kewarganegaraan" = 'WNI', "suku_bangsa" = 'Sunda ', "bicara" = 'Normal', "ket_bicara" = '', "perlu_penterjemah" = '0', "perlu_penterjemah_bahasa" = '', "bahasa_isyarat" = '0', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '0', "pemahaman_nutrisi_diet" = '0', "pemahaman_spiritual" = '0', "pemahaman_peralatan_medis" = '0', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '1', "hambatan_menerima_edukasi" = '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', "sn_penurunan_bb" = '1', "sn_penurunan_bb_on" = NULL, "sn_asupan_makan" = '0', "sn_total" = '0', "nilai_fungsi_makan" = '5', "nilai_fungsi_mandi" = '5', "nilai_fungsi_personal" = '5', "nilai_fungsi_berpakaian" = '5', "nilai_fungsi_bab" = '10', "nilai_fungsi_bak" = '10', "nilai_fungsi_berpindah" = '10', "nilai_fungsi_toiletting" = '5', "nilai_fungsi_mobilisasi" = '10', "nilai_fungsi_naik_turun_tangga" = '5', "nilai_fungsi_total" = '70', "nilai_tingkat_nyeri" = 'Sedang', "nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"1","berubah_posisi":"","lain":"","ket_lain":""}', "prjd_riwayat_jatuh" = '0', "prjd_diagnosis_sekunder" = '0', "prjd_alat_bantu_jalan_1" = NULL, "prjd_alat_bantu_jalan_2" = '15', "prjd_alat_bantu_jalan_3" = '30', "prjd_terpasang_infus" = '0', "prjd_cara_berjalan_1" = NULL, "prjd_cara_berjalan_2" = NULL, "prjd_cara_berjalan_3" = '20', "prjd_status_mental_1" = NULL, "prjd_status_mental_2" = NULL, "prjd_nilai_total" = '65', "prjl_riwayat_jatuh" = '0', "prjl_riwayat_jatuh_opt" = '0', "prjl_status_mental" = '0', "prjl_status_mental_opt_1" = '0', "prjl_status_mental_opt_2" = '0', "prjl_penglihatan" = '0', "prjl_penglihatan_opt_1" = '0', "prjl_penglihatan_opt_2" = '0', "prjl_berkemih" = '0', "prjl_transfer" = '0', "prjl_mobilitas" = '0', "prjl_nilai_total" = '0', "skrining_pasien_akhir_kehidupan" = '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', "pk_geriatri" = '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', "pk_pasien_ketergantungan" = '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', "sew_laju_respirasi" = '', "sew_saturasi" = '', "sew_suplemen" = '', "sew_temperatur" = '', "sew_tds" = '', "sew_laju_jantung" = '', "sew_kesadaran" = '', "suhunewst" = '', "sew_total" = '', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"1","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"1","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '198', "id_verifikasi_dokter_dpjp" = '358', "waktu_ttd_perawat" = '2025-04-30 17:08', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-05-1 10', "ttd_perawat" = '1', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-04-30 18:30:01'
WHERE "id" = '33342'
ERROR - 2025-04-30 18:34:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 18:39:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 18:49:47 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-04-30 18:50:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:50:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:50:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:50:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 18:51:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 18:51:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:02:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (687, 738002, 436, dr fauzia citra dyanti, null, Stroke iskemik dd Haemoragic + Hiperglikemia reaktif, 1, pf, lab, 1, Pemasanagan DC/Kateter, 1, hiperglikemia, 1, sesuai SPO, 1, kuratif, 1, pendarahan, infeksi , 1, dubia ad bonam , 1, tidak ada, 1, KONSULTASI, 1, sesuai indikasi , 1, sesuai indikasi , 1, null, 2025-04-30 19:02:22, null, 1885, 681284, 2025-04-30 19:02:22, 2025-04-30 19:03:00). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:02:22 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (687, 738002, 436, dr fauzia citra dyanti, null, Stroke iskemik dd Haemoragic + Hiperglikemia reaktif, 1, pf, lab, 1, Pemasanagan DC/Kateter, 1, hiperglikemia, 1, sesuai SPO, 1, kuratif, 1, pendarahan, infeksi , 1, dubia ad bonam , 1, tidak ada, 1, KONSULTASI, 1, sesuai indikasi , 1, sesuai indikasi , 1, null, 2025-04-30 19:02:22, null, 1885, 681284, 2025-04-30 19:02:22, 2025-04-30 19:03:00). - Invalid query: INSERT INTO "sm_form_pemberian_informasi" ("id_layanan_pendaftaran", "id_pendaftaran", "is_pasien", "id_dokter_pelaksana_tindakan", "tanggal_jam_pi", "pemberi_informasi", "penerima_informasi", "diagnosis_kerja", "diagnosis_kerja_check", "dasar_diagnosis", "dasar_diagnosis_check", "tindakan_kedokteran", "tindakan_kedokteran_check", "indikasi_tindakan", "indikasi_tindakan_check", "tata_cara", "tata_cara_check", "tujuan", "tujuan_check", "risiko_komplikasi", "risiko_komplikasi_check", "prognosis", "prognosis_check", "alternatif_resiko", "alternatif_resiko_check", "menyelamatkan_pasien", "menyelamatkan_pasien_check", "penggunaan_darah", "penggunaan_darah_check", "analgesia", "analgesia_check", "nama_keluarga", "id_users", "created_date", "updated_on") VALUES ('738002', '681284', NULL, '436', '2025-04-30 19:03', 'dr fauzia citra dyanti', NULL, 'Stroke iskemik dd Haemoragic + Hiperglikemia reaktif', '1', 'pf, lab', '1', 'Pemasanagan DC/Kateter', '1', 'hiperglikemia', '1', 'sesuai SPO', '1', 'kuratif', '1', 'pendarahan, infeksi ', '1', 'dubia ad bonam ', '1', 'tidak ada', '1', 'KONSULTASI', '1', 'sesuai indikasi ', '1', 'sesuai indikasi ', '1', NULL, '1885', '2025-04-30 19:02:22', '2025-04-30 19:02:22')
ERROR - 2025-04-30 19:02:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (688, 738002, 436, dr fauzia citra dyanti, null, Stroke iskemik dd Haemoragic + Hiperglikemia reaktif, 1, pf, lab, 1, Pemasanagan DC/Kateter, 1, hiperglikemia, 1, sesuai SPO, 1, kuratif, 1, pendarahan, infeksi , 1, dubia ad bonam , 1, tidak ada, 1, KONSULTASI, 1, sesuai indikasi , 1, sesuai indikasi , 1, null, 2025-04-30 19:02:33, null, 1885, 681284, 2025-04-30 19:02:33, 2025-04-30 19:03:00). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:02:33 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (688, 738002, 436, dr fauzia citra dyanti, null, Stroke iskemik dd Haemoragic + Hiperglikemia reaktif, 1, pf, lab, 1, Pemasanagan DC/Kateter, 1, hiperglikemia, 1, sesuai SPO, 1, kuratif, 1, pendarahan, infeksi , 1, dubia ad bonam , 1, tidak ada, 1, KONSULTASI, 1, sesuai indikasi , 1, sesuai indikasi , 1, null, 2025-04-30 19:02:33, null, 1885, 681284, 2025-04-30 19:02:33, 2025-04-30 19:03:00). - Invalid query: INSERT INTO "sm_form_pemberian_informasi" ("id_layanan_pendaftaran", "id_pendaftaran", "is_pasien", "id_dokter_pelaksana_tindakan", "tanggal_jam_pi", "pemberi_informasi", "penerima_informasi", "diagnosis_kerja", "diagnosis_kerja_check", "dasar_diagnosis", "dasar_diagnosis_check", "tindakan_kedokteran", "tindakan_kedokteran_check", "indikasi_tindakan", "indikasi_tindakan_check", "tata_cara", "tata_cara_check", "tujuan", "tujuan_check", "risiko_komplikasi", "risiko_komplikasi_check", "prognosis", "prognosis_check", "alternatif_resiko", "alternatif_resiko_check", "menyelamatkan_pasien", "menyelamatkan_pasien_check", "penggunaan_darah", "penggunaan_darah_check", "analgesia", "analgesia_check", "nama_keluarga", "id_users", "created_date", "updated_on") VALUES ('738002', '681284', NULL, '436', '2025-04-30 19:03', 'dr fauzia citra dyanti', NULL, 'Stroke iskemik dd Haemoragic + Hiperglikemia reaktif', '1', 'pf, lab', '1', 'Pemasanagan DC/Kateter', '1', 'hiperglikemia', '1', 'sesuai SPO', '1', 'kuratif', '1', 'pendarahan, infeksi ', '1', 'dubia ad bonam ', '1', 'tidak ada', '1', 'KONSULTASI', '1', 'sesuai indikasi ', '1', 'sesuai indikasi ', '1', NULL, '1885', '2025-04-30 19:02:33', '2025-04-30 19:02:33')
ERROR - 2025-04-30 19:06:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 19:10:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:10:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:11:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6086200, '418', 20959.02, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:11:35 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6086200, '418', 20959.02, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086200, '418', 20959.02, '1', '1.00', NULL, 'null')
ERROR - 2025-04-30 19:12:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:12:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:16:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:16:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:17:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 19:22:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:22:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:22:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6086222, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:22:23 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6086222, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086222, '1264', 28061.244, '1', '1.00', NULL, 'null')
ERROR - 2025-04-30 19:22:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:22:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:23:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:23:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:23:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:23:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:23:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:23:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:24:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:24:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:25:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:25:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:26:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:26:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:40:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 19:45:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:45:05 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '675306'
AND "lp"."id_pendaftaran" = '675306'
ORDER BY "lp"."id" ASC
ERROR - 2025-04-30 19:46:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:46:56 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '671292'
AND "lp"."id_pendaftaran" = '671292'
ORDER BY "lp"."id" ASC
ERROR - 2025-04-30 19:47:23 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-04-30 19:47:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:47:30 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '679964'
AND "lp"."id_pendaftaran" = '679964'
ORDER BY "lp"."id" ASC
ERROR - 2025-04-30 19:47:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type time: &quot;&quot;
LINE 1: ...&quot;tlp_pj&quot;, &quot;kelamin_pj&quot;) VALUES ('738055', '1785', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:47:53 --> Query error: ERROR:  invalid input syntax for type time: ""
LINE 1: ..."tlp_pj", "kelamin_pj") VALUES ('738055', '1785', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_pemulasaran_jenazah" ("id_layanan_pendaftaran", "id_staff_ipj", "waktu_panggilan", "waktu_meninggal", "waktu_masuk_ruang_jenazah", "waktu_pengantaran", "id_supir_mobil_jenazah", "jam_tugas", "surat_kematian", "hubungan_keluarga", "penyerahan_jenazah", "no_mobil", "created_at", "is_ttd_supir_ambulan", "is_ttd_kerabat_almarhum", "is_ttd_ka_ipj", "is_pemulasaran_jenazah", "is_pengantaran_jenazah", "is_pengawetan_jenazah", "is_lainnya", "keterangan_lainnya", "alasan_tidak_bersedia", "umur_tanggal_lahir_pj", "tempat_lahir_pj", "agama_pj", "nama_penanggung_jawab", "no_ktp_pj", "alamat_pj", "tlp_pj", "kelamin_pj") VALUES ('738055', '1785', '', '', '', '', '1785', '19:47:53', '', 'ANAK', 'Keluarga', '', '2025-04-30 19:47:53', '0', '0', '0', '0', '0', '0', '0', '', '', '48 Tahun 1 Bulan 27 Hari / 1977-03-03', '', '', 'ROYANIH', '3671054303770008', 'BLOK MANDALA RT. 01/03 KENANGA CIPONDOH KOTA TANGERANG BANTEN 15148', '081213502989', 'Laki-laki')
ERROR - 2025-04-30 19:48:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type time: &quot;&quot;
LINE 1: ...&quot;tlp_pj&quot;, &quot;kelamin_pj&quot;) VALUES ('738055', '1785', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:48:03 --> Query error: ERROR:  invalid input syntax for type time: ""
LINE 1: ..."tlp_pj", "kelamin_pj") VALUES ('738055', '1785', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_pemulasaran_jenazah" ("id_layanan_pendaftaran", "id_staff_ipj", "waktu_panggilan", "waktu_meninggal", "waktu_masuk_ruang_jenazah", "waktu_pengantaran", "id_supir_mobil_jenazah", "jam_tugas", "surat_kematian", "hubungan_keluarga", "penyerahan_jenazah", "no_mobil", "created_at", "is_ttd_supir_ambulan", "is_ttd_kerabat_almarhum", "is_ttd_ka_ipj", "is_pemulasaran_jenazah", "is_pengantaran_jenazah", "is_pengawetan_jenazah", "is_lainnya", "keterangan_lainnya", "alasan_tidak_bersedia", "umur_tanggal_lahir_pj", "tempat_lahir_pj", "agama_pj", "nama_penanggung_jawab", "no_ktp_pj", "alamat_pj", "tlp_pj", "kelamin_pj") VALUES ('738055', '1785', '', '', '', '', '1781', '19:48:03', '', 'ANAK', 'Keluarga', '', '2025-04-30 19:48:03', '0', '0', '0', '0', '0', '0', '0', '', '', '48 Tahun 1 Bulan 27 Hari / 1977-03-03', '', '', 'ROYANIH', '3671054303770008', 'BLOK MANDALA RT. 01/03 KENANGA CIPONDOH KOTA TANGERANG BANTEN 15148', '081213502989', 'Laki-laki')
ERROR - 2025-04-30 19:53:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-30 19:57:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:57:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:57:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:57:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:57:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:57:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-30 19:57:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:57:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-30 19:58:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:58:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:58:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6086312, '567', 710.4, '75', '4.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:58:36 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6086312, '567', 710.4, '75', '4.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086312, '567', 710.4, '75', '4.00', 'Ya', 'null')
ERROR - 2025-04-30 19:58:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:58:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:59:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:59:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 19:59:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 19:59:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 20:51:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 20:51:24 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('738049', '2025-05-01 06:00', '18', 'orang tua pasien mengatakan anaknya demam naik turun, batuk berdahak dan sesak', 'kesadaran composmentis, GCS 15, akral hangat, nadi kuat, mukosa bibir lembab, turgor kulit elastis, tampak retraksi (+), tampak batuk, produksi sputum (+), terpasang IVFD RL 7 tpm di TAKA tanggal 30/4. TTV: N: 100x/mnt, S: 36.6oC, P: 35x/mnt, SpO2 95-96�ngan O2 nasal canul 2 lpm. 30/4/2025 Hasil lab Hb 10.2/ Ht 31/ Leu 9.1/ Trom 453. RO thorax sdg exp. ', 'hipertermi, bersihan jalan napas tidak efektif', '', '', '', '', '', '', '', '', '', '2041', '1', '&nbsp;', NULL, '2041', 0, NULL, '2025-04-30 20:51:24')
ERROR - 2025-04-30 20:51:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 20:51:32 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('738049', '2025-05-01 06:00', '18', 'orang tua pasien mengatakan anaknya demam naik turun, batuk berdahak dan sesak', 'kesadaran composmentis, GCS 15, akral hangat, nadi kuat, mukosa bibir lembab, turgor kulit elastis, tampak retraksi (+), tampak batuk, produksi sputum (+), terpasang IVFD RL 7 tpm di TAKA tanggal 30/4. TTV: N: 100x/mnt, S: 36.6oC, P: 35x/mnt, SpO2 95-96�ngan O2 nasal canul 2 lpm. 30/4/2025 Hasil lab Hb 10.2/ Ht 31/ Leu 9.1/ Trom 453. RO thorax sdg exp. ', 'hipertermi, bersihan jalan napas tidak efektif', '', '', '', '', '', '', '', '', '', '2041', '1', '&nbsp;&nbsp;', NULL, '2041', 0, NULL, '2025-04-30 20:51:32')
ERROR - 2025-04-30 20:52:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (837083, '7', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 20:52:11 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (837083, '7', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (837083, '7', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-30 20:52:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 20:52:31 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('738049', '2025-05-01 06:00', '18', 'orang tua pasien mengatakan anaknya demam naik turun, batuk berdahak dan sesak', 'Kesadaran composmentis, GCS 15, PEWS 0 (hijau) akral hangat, nadi kuat, mukosa bibir lembab, turgor kulit elastis, tampak retraksi (+), tampak batuk, produksi sputum (+), terpasang IVFD RL 7 tpm di TAKA tanggal 30/4. TTV: N: 100x/mnt, S: 36.6oC, P: 35x/mnt, SpO2 95-96�ngan O2 nasal canul 2 lpm. 30/4/2025 Hasil lab Hb 10.2/ Ht 31/ Leu 9.1/ Trom 453. RO thorax sdg exp. ', 'hipertermi, bersihan jalan napas tidak efektif', '', '', '', '', '', '', '', '', '', '2041', '1', '&nbsp;', NULL, '2041', 0, NULL, '2025-04-30 20:52:31')
ERROR - 2025-04-30 20:52:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 20:52:50 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('738049', '2025-05-01 06:00', '18', 'orang tua pasien mengatakan anaknya demam naik turun, batuk berdahak dan sesak', 'Kesadaran composmentis, GCS 15, PEWS 0 (hijau) akral hangat, nadi kuat, mukosa bibir lembab, turgor kulit elastis, tampak retraksi (+), tampak batuk, produksi sputum (+), terpasang IVFD RL 7 tpm di TAKA tanggal 30/4. TTV: N: 100x/mnt, S: 36.6oC, P: 35x/mnt, SpO2 95-96�ngan O2 nasal canul 2 lpm. 30/4/2025 Hasil lab Hb 10.2/ Ht 31/ Leu 9.1/ Trom 453. RO thorax sdg exp. ', 'hipertermi, bersihan jalan napas tidak efektif', '', '', '', '', '', '', '', '', '', '2041', '1', '-', NULL, '2041', 0, NULL, '2025-04-30 20:52:50')
ERROR - 2025-04-30 20:54:27 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 20:54:27 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 20:54:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 20:54:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 21:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 21:00:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 21:02:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...sa&quot;, &quot;ruang&quot;) VALUES ('734888', '678426', '1634', '', 'SAMAN...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:02:26 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...sa", "ruang") VALUES ('734888', '678426', '1634', '', 'SAMAN...
                                                             ^ - Invalid query: INSERT INTO "sm_indikasi_pasien_icu_tambahan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_user", "tanggal_ipi", "nama_pasien", "diagnosa", "ruang") VALUES ('734888', '678426', '1634', '', 'SAMAN', 'Dyspnoea |  (Utama).', 'Ulin 2')
ERROR - 2025-04-30 21:02:34 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-30 21:02:34 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-30 21:07:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:07:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:07:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6086420, '682', 159.6, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:07:57 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6086420, '682', 159.6, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086420, '682', 159.6, '500', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 21:08:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:08:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:09:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:09:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:11:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:11:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:20:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 21:20:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:20:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:20:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:20:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:20:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:20:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:20:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:20:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:21:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:21:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:21:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6086483, '687', 5296.8, '10', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:21:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6086483, '687', 5296.8, '10', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086483, '687', 5296.8, '10', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 21:23:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:23:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:23:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:23:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:23:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:23:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:24:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:24:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:45:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 21:47:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:47:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:47:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6086528, '641', 1524, '10', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:47:31 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6086528, '641', 1524, '10', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086528, '641', 1524, '10', '10.00', 'Ya', 'null')
ERROR - 2025-04-30 21:47:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:47:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:51:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 21:54:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 21:56:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:56:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:56:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6086557, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:56:21 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6086557, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086557, '701', 1598.4, '25', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 21:57:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-04-30 21:58:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:58:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 21:58:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6086570, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:58:04 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6086570, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086570, '701', 1598.4, '25', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 21:58:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 21:58:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 22:08:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-30 22:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 22:12:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 22:12:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 22:12:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 22:12:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 22:14:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ES (6086680, '3568', 3585.744, '625', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 22:14:20 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ES (6086680, '3568', 3585.744, '625', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086680, '3568', 3585.744, '625', '10.00', 'Ya', 'null')
ERROR - 2025-04-30 22:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 22:20:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6086694, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 22:20:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6086694, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086694, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-04-30 22:21:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 22:21:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 22:21:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 22:21:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 22:21:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 22:21:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 22:21:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 22:21:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 22:30:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 22:30:50 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-30 22:30:50 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-30 22:38:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-30 23:17:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:17:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:18:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:18:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:18:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:18:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:19:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:19:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:20:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:20:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:20:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 17: AND &quot;b&quot;.&quot;id&quot; = 'undefined'
                        ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:20:07 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 17: AND "b"."id" = 'undefined'
                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, date(pd.tanggal_daftar) as tanggal_daftar, "pd"."tanggal_keluar", "pd"."id_pasien", "pjl"."id_resep", "pjl"."id_resep_tebus", "pd"."no_register", CONCAT_WS(' ', "p"."nama", COALESCE(p.status_pasien, '')) as nama, "p"."tanggal_lahir", "p"."alamat", COALESCE(pj.nama, '') as penjamin, "p"."telp", COALESCE(sp.nama, '') as layanan, COALESCE(pg.nama, '') as dokter, COALESCE(lp.no_antrian, 0) as no_antrian, CONCAT_WS(' ', "b"."nama", 'Bed', ri.no_bed) as bed, "pjl"."id" as "id_penjualan", "pd"."jenis_igd"
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_penjualan" as "pjl" ON "pjl"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "d" ON "d"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "d"."id_pegawai"
LEFT JOIN "sm_intensive_care" as "ri" ON "ri"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_bangsal" as "b" ON "b"."id" = "ri"."id_bangsal"
LEFT JOIN "sm_kelas" as "k" ON "k"."id" = "ri"."id_kelas"
LEFT JOIN "sm_penjamin" as "pj" ON "lp"."id_penjamin" = "pj"."id"
WHERE p.id ilike '%undefined%' or p.nama ilike '%undefined%'
AND "lp"."tanggal_layanan" BETWEEN '2025-04-01 00:00:00' AND '2025-04-30 23:59:59'
AND "lp"."id" = '738070'
AND ("lp"."jenis_layanan" = 'Intensive Care' and "pd"."tanggal_keluar" is NULL)
AND "b"."id" = 'undefined'
AND "pd"."no_register" IS NULL
AND  "p"."id" LIKE '%' ESCAPE '!'
AND p.nama ilike '%%'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-04-30 23:23:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:23:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:24:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:24:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:37:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:37:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:39:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:39:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:42:40 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_sessionb4851cc7229d792e3afc8fa0a8e6a81744d99678 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-04-30 23:54:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:54:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-30 23:54:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6086863, '536', 239.76, '5', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:54:14 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6086863, '536', 239.76, '5', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6086863, '536', 239.76, '5', '2.00', 'Ya', 'null')
ERROR - 2025-04-30 23:54:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-30 23:54:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
