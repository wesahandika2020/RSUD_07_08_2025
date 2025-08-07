<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-07-11 00:04:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 00:20:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 00:27:10 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 00:27:10 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 00:27:10 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 00:27:10 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 00:27:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:27:10 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('784382', '2025-07-11 00:27:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 00:39:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 00:39:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 00:39:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 00:39:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 00:40:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:40:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:40:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 00:40:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 00:40:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 00:40:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 00:40:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:40:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:41:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('886434', '4', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:41:06 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('886434', '4', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('886434', '4', '', '1', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 00:41:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:41:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:41:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:41:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:42:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:42:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:42:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:42:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:42:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:42:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:42:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:42:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:42:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:42:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:42:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:42:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 00:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 00:50:37 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-07-11 00:58:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 00:58:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 01:07:09 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 01:07:09 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 01:07:09 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 01:07:09 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 01:07:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 01:07:09 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('784384', '2025-07-11 01:07:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 01:08:35 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 01:08:35 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 01:08:35 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 01:08:35 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 01:08:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 01:08:35 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('784384', '2025-07-11 01:08:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 01:24:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 01:24:50 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('783379', '2025-07-11 06:18', '18', 'Pasien mengatakan  lemas, sesak yang memberat saat posisi berbating', 'Kesadaran CM, GCS 15, EWS : (). Akral hangat, nadi kuat, tampak sesak, TD: mmHg, N: x/mnit, RR: 22 x/mnit, T: *C, Sat: �ngan NK 3lpm. (Tgl 9/7/25)Terpasang NGT, Terpasang DC no. 16 dengan pengunci 20cc, IVFD di Taki :furosemid 5mg/jam. EKG di IGD, Thorax di radiologi, AGD : PH 7,3, PO2: 117, PcO2: 12,3. Hb: 13, Ht: 39, L:26.9, Tr: 109, Na/K: 137/5.2 UR/CR: 319/15,6. GDS di IGD: 129. Tgl 9/7/2025 Kultur darah TH.Tgl 10/7/2025 DR (hb: 12.4, ht: 36, leu: 29.6, tromb: 94) , DP: intake: 300 output: 1500, BC: +1200. (Tgl 11/7/25) intaks: output:, DR OTPT URCR TH', 'pola nafas tidak efektif, hipervolemia', '', '', '', '', '', '', '', '', '', '1978', '1', '<b>Follow up hasil DR OTPT URCR</b>', NULL, '1978', 0, NULL, '2025-07-11 01:24:50')
ERROR - 2025-07-11 02:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:04:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 02:04:56 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 02:04:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 02:04:56 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 02:04:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 02:04:56 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 02:39:05 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-07-11 02:46:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 02:46:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 03:13:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 03:13:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 03:45:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 04:19:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 05:09:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 05:22:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 05:22:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 05:42:21 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-07-11 06:03:25 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-07-11 06:08:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:09:00 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 06:10:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 06:15:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:16:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 06:29:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:31:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:33:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:34:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:35:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:37:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 06:37:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 06:37:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 06:37:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 06:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:41:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:42:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:43:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:43:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:44:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:44:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110019) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 06:44:32 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110019) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110019', '00278172', '2025-07-11 06:44:31', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 9, '0002048247325', NULL, NULL, 'Lama', NULL, 1945, 1, 'Belum', 'Poliklinik Medical Check Up', 0, 2, NULL, '20250711C001')
ERROR - 2025-07-11 06:44:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110020) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 06:44:35 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110020) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110020', '00278172', '2025-07-11 06:44:34', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 9, '0002048247325', NULL, NULL, 'Lama', NULL, 1945, 1, 'Belum', 'Poliklinik Medical Check Up', 0, 2, NULL, '20250711C001')
ERROR - 2025-07-11 06:45:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:46:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:47:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:48:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:48:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id_layanan_pendaftaran&quot; = ''
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 06:48:14 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id_layanan_pendaftaran" = ''
                                         ^ - Invalid query: SELECT *
FROM "sm_order_laboratorium"
WHERE "id_layanan_pendaftaran" = ''
AND "status" != 'batal'
ERROR - 2025-07-11 06:48:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id_layanan_pendaftaran&quot; = ''
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 06:48:31 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id_layanan_pendaftaran" = ''
                                         ^ - Invalid query: SELECT *
FROM "sm_order_laboratorium"
WHERE "id_layanan_pendaftaran" = ''
AND "status" != 'batal'
ERROR - 2025-07-11 06:48:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:48:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:48:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:49:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:49:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:50:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:52:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 06:52:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110044) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 06:52:26 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110044) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110044', '00277304', '2025-07-11 06:52:26', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001435821974', NULL, '102501100625Y004325', 'Lama', NULL, '1975', 0, 'Belum', 'Poliklinik Rehab Medik', 0, '2', '', '20250711A142')
ERROR - 2025-07-11 06:52:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:52:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:53:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:53:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:54:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:54:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:54:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:54:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:55:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:56:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 06:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:58:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:58:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:58:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:58:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:58:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 06:59:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 06:59:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110066) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 06:59:25 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110066) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110066', '00236617', '2025-07-11 06:59:08', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001079101833', NULL, '102501020625Y000220', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250711B128')
ERROR - 2025-07-11 06:59:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 00:00:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 00:00:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:00:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:00:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:00:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110074) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:00:40 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110074) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110074', '00328988', '2025-07-11 07:00:39', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001463165199', NULL, '102501090725Y001034', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Obgyn', 0, '2', '', '20250711F001')
ERROR - 2025-07-11 07:00:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:00:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:01:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:01:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:01:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:02:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:02:00 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '910677', "id_layanan_pendaftaran" = '783818', "waktu" = '2025-07-11 06:06', "id_profesi" = '18', "subject" = 'Pasien mengatakan sesak napas disertai batuk kering
', "objective" = 'gcs 15, kesadaran CM EWS Hijau (3), akral hangat, nadi teraba kuat, tampak sesak napas suara paru ronki +/+, wheazing +/+, TD: 149/86 mmHg nadi: 100  x/menit, suhu: 36.3 C, RR: 20 xmenit Spo2: 95% 
 room air. 99 �ngan nasal canul 2 lpm, tanggal 10/7/25 RL 500cc + Drip aminofilin 1 amp/12 jam, ro thorax Tidak tampak infiltrat paru, Tidak tampak kardiomegali, HB 13,9 HT 39, trombosit 215, leukosit 9,0, gds 180
', "assessment" = 'Bersihan jalan napas tidak efektif', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1633', "ttd_nadis" = NULL, "instruksi_ppa" = '-_-', "id_dokter_dpjp" = NULL, "id_user" = '1627', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-07-11 07:02:00'
WHERE "id" = '910677'
ERROR - 2025-07-11 07:03:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 07:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:04:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:04:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:04:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:05:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:06:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110098) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:06:49 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110098) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110098', '00374492', '2025-07-11 07:06:49', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000172076646', NULL, '0221B1230425Y001419', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250711C036')
ERROR - 2025-07-11 07:06:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:06:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110099) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:06:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110099) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110099', '00374492', '2025-07-11 07:06:53', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000172076646', NULL, '0221B1230425Y001419', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250711C036')
ERROR - 2025-07-11 07:07:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110104) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:07:23 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110104) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110104', '00374517', '2025-07-11 07:07:21', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002479166752', NULL, '0496B0210425Y000259', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250711B239')
ERROR - 2025-07-11 07:07:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 07:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:08:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 07:08:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:09:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:10:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:10:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:10:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:13:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110132) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:13:05 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110132) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110132', '00244881', '2025-07-11 07:13:04', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049333724', NULL, '102501040425Y002206', 'Lama', NULL, 1773, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250711A126')
ERROR - 2025-07-11 07:13:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:14:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:14:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:14:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:14:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:14:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:14:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:14:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:14:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110139) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:14:35 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110139) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110139', '00381760', '2025-07-11 07:14:34', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000036839799', NULL, '0223R0110725B000464', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik Mata', 0, '2', '', '20250711F004')
ERROR - 2025-07-11 07:14:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:14:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:14:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:14:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:14:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:14:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:14:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:14:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:14:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:15:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:15:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:15:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:15:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:15:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:15:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:16:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:16:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:17:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:17:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 07:17:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:18:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 07:18:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110151) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:18:05 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110151) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110151', '00045129', '2025-07-11 07:18:04', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001959830054', NULL, '102501090725Y000911', 'Lama', NULL, '1975', 0, 'Belum', 'Poliklinik Jiwa', 0, '2', '', '20250711C049')
ERROR - 2025-07-11 07:18:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 07:19:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:19:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110161) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:19:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110161) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110161', '00380646', '2025-07-11 07:19:40', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001187306919', NULL, '0223R0650725B000181', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik THT', 0, 2, NULL, '20250711B356')
ERROR - 2025-07-11 07:20:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:20:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 07:20:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:20:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 07:21:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:21:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:22:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:22:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:22:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:22:36 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 07:22:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:22:36 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 07:22:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:23:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 07:23:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:23:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 07:24:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:25:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:25:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:26:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:26:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:27:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:28:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:29:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:31:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:32:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:35:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:35:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:36:21 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-07-11 07:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:37:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 07:37:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110214) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:37:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110214) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110214', '00064352', '2025-07-11 07:37:38', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002753790568', NULL, '102501090725Y000181', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250711A136')
ERROR - 2025-07-11 07:37:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110214) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:37:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110214) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110214', '00287917', '2025-07-11 07:37:38', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002379627336', NULL, '0223B1340725P000201', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250711A176')
ERROR - 2025-07-11 07:37:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 07:38:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:38:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:38:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:38:38 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 07:39:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:40:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 00:40:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 00:40:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:40:31 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-11 07:40:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:41:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:41:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110226) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:41:20 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110226) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110226', '00134045', '2025-07-11 07:41:18', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001483060487', NULL, '102501040625Y003361', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250711A133')
ERROR - 2025-07-11 07:41:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:41:55 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-11 07:42:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:42:01 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-11 00:00:00' AND '2025-07-11 23:59:59'
AND "ab"."no_kartu" = '0000805000443'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-11 07:42:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:42:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:43:38 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-11 07:44:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:44:34 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-11 07:45:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:45:07 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-11 07:46:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:47:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:47:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:47:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:48:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:48:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:49:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:49:21 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4794980'
ERROR - 2025-07-11 07:49:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:49:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:49:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:49:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:49:57 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 07:50:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:50:07 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 07:50:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:50:15 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-07-11 07:50:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:50:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:51:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:51:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:52:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:52:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:52:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:52:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:52:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:53:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:53:52 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 07:54:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:54:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:54:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:55:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110262) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:55:05 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110262) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110262', '00356684', '2025-07-11 07:55:03', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001740871236', NULL, '102501090625Y000611', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Paru', 0, 2, NULL, '20250711B078')
ERROR - 2025-07-11 07:55:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:55:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AN...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 07:55:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1852' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AND lp.tindak_lanjut is null order by ri.id desc  limit 10 offset 0
ERROR - 2025-07-11 07:55:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:56:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:56:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:57:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:57:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:57:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:58:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:58:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:58:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:58:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:59:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:00:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 01:00:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 01:00:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 08:00:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:01:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:01:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:01:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:01:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:02:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:02:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:02:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:02:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:03:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:03:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:04:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:04:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:05:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:05:35 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-11 00:00:00' AND '2025-07-11 23:59:59'
AND "ab"."no_kartu" = '0001408609664'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-11 08:05:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:05:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:05:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:06:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:07:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 08:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:08:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 9: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:08:02 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 9: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."kode_bpjs_dokter" IS NOT NULL
AND "jd"."kode_bpjs_dokter" != ''
AND "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-07-11 08:09:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:09:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:09:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:09:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:10:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:10:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:10:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:11:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:11:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:11:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:11:18 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-11 00:00:00' AND '2025-07-11 23:59:59'
AND "ab"."no_kartu" = '0002096045122'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-11 08:11:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 08:11:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 08:11:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 08:11:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 08:12:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:12:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:12:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 5: AND &quot;NO_KEC&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:12:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 5: AND "NO_KEC" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = '71'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 08:12:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:12:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:13:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:13:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:13:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:13:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:13:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:14:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:14:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:14:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:14:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:15:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:15:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:15:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:15:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110314) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:15:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110314) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110314', '00332684', '2025-07-11 08:15:41', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003579772465', NULL, '102501100625Y000426', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Anak', 0, '2', '', '20250711F014')
ERROR - 2025-07-11 08:16:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:16:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:17:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:17:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:17:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:17:37 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'malihaturosyidah', '2025-07-11 08:17:37')
ERROR - 2025-07-11 08:17:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:17:48 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'malihaturosyidah', '2025-07-11 08:17:48')
ERROR - 2025-07-11 08:18:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:18:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:18:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:19:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:19:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:19:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:20:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:21:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:22:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:22:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:22:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:22:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:22:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:22:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:22:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:23:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:23:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:23:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:23:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:24:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:24:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:24:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:25:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:25:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:25:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:25:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:26:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:26:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110347) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:26:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110347) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110347', '00320483', '2025-07-11 08:26:00', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000815858471', NULL, '022300090625Y000699', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250711A062')
ERROR - 2025-07-11 08:26:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:27:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:27:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:27:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:27:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:27:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:27:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:27:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:27:55 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 08:27:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:27:55 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 08:28:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:28:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:28:18 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:28:25 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:28:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:28:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:29:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:29:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:29:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:29:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:29:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:30:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:30:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:31:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:32:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 01:32:42 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 01:32:42 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 01:32:52 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 01:32:52 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 08:32:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:33:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110368) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:33:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110368) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:33:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110368) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110368', '00207649', '2025-07-11 08:32:33', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002285620209', NULL, '102501010525Y000940', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik THT', 0, 2, NULL, '20250711B328')
ERROR - 2025-07-11 08:33:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110368) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110368', '00027566', '2025-07-11 08:32:50', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049264558', NULL, '102501020725Y000226', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Orthopaedi', 0, 2, NULL, '20250711A099')
ERROR - 2025-07-11 08:33:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:33:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:34:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:35:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:35:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:35:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:35:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:35:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:36:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:36:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:36:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:36:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:36:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:36:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:36:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:36:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:45 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-11 08:37:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:37:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:37:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:37:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:37:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:37:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 08:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:37:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:38:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:38:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:38:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:38:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:38:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110382) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:38:17 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110382) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110382', '00088546', '2025-07-11 08:38:15', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049300503', NULL, '0223B1570725P000454', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250711A223')
ERROR - 2025-07-11 08:38:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110384) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:38:23 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110384) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110384', '00381786', '2025-07-11 08:38:22', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003539830915', NULL, '1025R0050725B000219', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik THT', 0, '2', '', '20250711F023')
ERROR - 2025-07-11 08:38:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:38:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:39:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:39:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:39:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:39:35 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-07-11 08:39:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:39:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:40:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:40:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:40:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:40:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:40:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:41:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:41:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:41:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:41:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:41:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:41:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110394) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:41:33 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110394) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110394', '00024745', '2025-07-11 08:41:32', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000036893463', NULL, '102501040725Y001620', 'Lama', NULL, '1768', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250711A007')
ERROR - 2025-07-11 08:41:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:41:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:41:55 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 08:41:55 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 08:41:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 08:41:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 08:42:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:42:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:42:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:43:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:43:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:43:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:43:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:43:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:43:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:44:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:44:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:44:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:44:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:44:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:44:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:44:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:44:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:44:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:44:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:45:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:45:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:45:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:45:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:45:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:45:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:45:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:46:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:46:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:46:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:46:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:47:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:47:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:47:18 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 08:47:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:47:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:47:44 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-11 08:47:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110412) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:47:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110412) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110412', '00313166', '2025-07-11 08:47:51', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000049070428', NULL, '102504020725Y001669', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Paru', 0, '2', '', '20250711B079')
ERROR - 2025-07-11 08:48:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:48:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:48:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 08:48:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:48:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 08:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 01:48:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 01:48:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 08:49:01 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8108
ERROR - 2025-07-11 08:49:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110415) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:49:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110415) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110415', '00364865', '2025-07-11 08:49:06', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001657398745', NULL, '049610090625Y000684', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250711A073')
ERROR - 2025-07-11 08:49:12 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8108
ERROR - 2025-07-11 08:49:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110416) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:49:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110416) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:49:13 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110416) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110416', '00364865', '2025-07-11 08:49:12', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001657398745', NULL, '049610090625Y000684', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250711A073')
ERROR - 2025-07-11 08:49:13 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110416) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110416', '00381792', '2025-07-11 08:49:12', 'IGD', 'IGD', 'KELAS III', 'Jalan', '1', NULL, NULL, '3671124706920002', 'LANA LARASATI', 'P', '08989728151', 'PONDOK BAHAR PERMAI S/7-8-9 RT. 05/06 PONDOK BAHAR KARANG TENGAH', '1992-06-07', 'ISTRI', '3671124706920002', 'LANA LARASATI', 'P', '08989728151', 'PONDOK BAHAR PERMAI S/7-8-9 RT. 05/06 PONDOK BAHAR KARANG TENGAH', '1', '0001718461631', NULL, NULL, 'Baru', '0', '1800', 0, 'Belum', 'IGD ', 0, 2, '', NULL)
ERROR - 2025-07-11 08:49:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110417) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:49:17 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110417) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110417', '00381792', '2025-07-11 08:49:16', 'IGD', 'IGD', 'KELAS III', 'Jalan', '1', NULL, NULL, '3671124706920002', 'LANA LARASATI', 'P', '08989728151', 'PONDOK BAHAR PERMAI S/7-8-9 RT. 05/06 PONDOK BAHAR KARANG TENGAH', '1992-06-07', 'ISTRI', '3671124706920002', 'LANA LARASATI', 'P', '08989728151', 'PONDOK BAHAR PERMAI S/7-8-9 RT. 05/06 PONDOK BAHAR KARANG TENGAH', '1', '0001718461631', NULL, NULL, 'Baru', '0', '1800', 0, 'Belum', 'IGD ', 0, 2, '', NULL)
ERROR - 2025-07-11 08:49:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:49:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:49:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:49:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 8870
ERROR - 2025-07-11 08:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:50:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:50:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:50:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:50:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:50:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:50:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:50:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:50:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:50:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:50:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:50:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:50:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:51:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:51:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:51:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:51:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:51:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:52:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:52:29 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 08:52:29 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 08:52:29 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 08:52:29 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 08:52:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:52:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:52:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:52:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:53:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:53:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:53:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:53:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:54:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:54:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:54:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:55:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:55:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:55:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (886604, '15', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:55:18 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (886604, '15', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (886604, '15', '', '2', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 08:55:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:55:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:56:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 08:56:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:56:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:56:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:56:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:56:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:56:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110440) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:56:29 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110440) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110440', '00378703', '2025-07-11 08:56:28', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '16', NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250711C072')
ERROR - 2025-07-11 08:56:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:56:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:56:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:56:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:56:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:56:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:57:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:57:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:57:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:57:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:57:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:57:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:58:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:58:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:58:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 08:58:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 08:58:31 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 19
ERROR - 2025-07-11 08:58:31 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-07-11 08:58:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-07-11 08:58:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 27
ERROR - 2025-07-11 08:58:31 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 19
ERROR - 2025-07-11 08:58:31 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-07-11 08:58:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-07-11 08:58:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 27
ERROR - 2025-07-11 08:58:32 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 19
ERROR - 2025-07-11 08:58:32 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-07-11 08:58:32 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-07-11 08:58:32 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 27
ERROR - 2025-07-11 08:58:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:58:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:58:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:58:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:59:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:59:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:59:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:59:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:59:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:59:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 08:59:50 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 08:59:50 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 08:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:59:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:00:24 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:00:24 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:00:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:00:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:00:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:01:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:01:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:01:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:01:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:01:23 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-07-11 09:01:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:01:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:01:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:01:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:01:36 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-07-11 09:02:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:02:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:02:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:02:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:02:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:02:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:02:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:03:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8108
ERROR - 2025-07-11 09:03:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:03:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:03:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:03:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:03:20 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 8870
ERROR - 2025-07-11 09:03:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:03:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:03:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:03:34 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 8870
ERROR - 2025-07-11 09:04:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:04:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:04:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:04:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:04:58 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '2121' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-07-11 09:04:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:05:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:05:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:05:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:05:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '2121' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-07-11 09:05:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:05:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:05:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '69', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-07-11 09:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:05:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:05:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:05:55 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '2121' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-07-11 09:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:06:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:06:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:06:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:07:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:07:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:07:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 09:07:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:08:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:08:10 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'malihaturosyidah', '2025-07-11 09:08:10')
ERROR - 2025-07-11 09:08:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:09:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:09:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:09:07 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'malihaturosyidah', '2025-07-11 09:09:07')
ERROR - 2025-07-11 09:09:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:09:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:09:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:09:29 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-07-11 09:09:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:09:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:09:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 09:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:09:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 09:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:10:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (886647, '12', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:10:18 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (886647, '12', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (886647, '12', '', '2', '', '', 'AC', '0', '', '0', 'MORN', NULL, '0', 1, '2x40mg', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 09:10:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:10:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 09:11:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 09:11:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:11:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:11:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:11:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:11:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:12:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-07-11 09:12:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:12:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:12:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:12:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:12:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:12:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:12:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:13:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:13:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:13:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:13:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:13:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:13:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:13:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:13:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:13:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:13:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:13:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 02:13:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:13:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:13:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:13:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:57 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 09:13:57 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:14:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13013
ERROR - 2025-07-11 09:14:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:14:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:14:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:14:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:14:53 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 09:15:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:15:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:15:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:15:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:15:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:16:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:16:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:16:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:17:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:17:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:17:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:18:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:18:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:18:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:18:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:19:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:19:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:19:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:19:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:19:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:19:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:19:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:19:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:19:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:19:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:19:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:19:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:19:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:19:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:19:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:20:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:20:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:20:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:20:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:20:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:20:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:20:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:20:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:20:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:20:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:20:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:20:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:21:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:21:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:21:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:21:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:21:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:23:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:23:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:23:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:23:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 09:23:51 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-07-11 09:23:51 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-07-11 09:23:51 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 09:23:51 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:23:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:24:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:24:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:24:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:24:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 09:24:21 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-11 09:24:21 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-11 09:24:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-07-11 09:24:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:24:29 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-11 09:24:29 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-11 09:24:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-07-11 09:24:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:24:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:25:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:25:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:25:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:25:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:25:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:16 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-07-11 09:26:16 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-07-11 09:26:16 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 09:26:16 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:26:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:26:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:27:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:27:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:27:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:27:26 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
LINE 11: WHERE "pd"."id" = 'null'
                           ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah", "ab"."id" as "id_antrian_bpjs", "ab"."no_rm" "id_pasien_antrian_bpjs", "ab"."kode_booking" "kode_booking_antrian_bpjs", "ab"."no_kartu" "no_kartu_antrian_bpjs", "ab"."no_referensi", "ab"."id_jadwal_dokter", "jd"."tanggal" "tanggal_jadwal", "jd"."nama_poli" "nama_poli_jadwal", "jd"."shift_poli", "jd"."nama_dokter" "nama_dokter_jadwal"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
LEFT JOIN "sm_antrian_bpjs" "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "pd"."id" = 'null'
ERROR - 2025-07-11 09:27:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:27:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:27:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:27:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:28:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:28:39 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:28:39 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:28:39 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:28:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:28:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:28:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:28:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:28:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (886703, '12', '', '3', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:28:55 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (886703, '12', '', '3', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (886703, '12', '', '3', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 09:29:02 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 09:29:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 09:29:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 09:29:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:29:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:29:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 09:29:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 09:29:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 09:29:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:29:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:29:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:29:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:29:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:29:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:30:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:30:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:30:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:30:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11781
ERROR - 2025-07-11 09:30:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:30:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:30:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:30:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:31:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:31:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:31:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:32:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:32:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:32:24 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-11 09:32:24 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:32:59 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-11 09:32:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:33:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:33:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:33:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:33:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:33:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:33:50 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-11 09:33:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:33:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:33:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:33:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:34:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:35:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:35:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:35:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:35:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110523) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:35:57 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110523) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110523', '00381809', '2025-07-11 09:35:56', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000648473152', NULL, '0496U0010725Y001042', 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250711A110')
ERROR - 2025-07-11 09:36:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:36:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:36:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:36:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:37:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:37:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:37:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:37:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:37:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:38:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:38:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:39:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:39:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:40:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:40:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:40:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:40:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:40:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:40:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:40:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:40:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:40:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:40:55 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4798922'
ERROR - 2025-07-11 02:40:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:40:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:41:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:41:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:41:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:41:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:41:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:41:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 02:41:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:41:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 09:41:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 09:41:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:41:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:41:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:41:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:41:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 09:41:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:41:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:41:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 09:41:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:41:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:42:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:42:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:43:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:43:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:43:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:43:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:43:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:44:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:44:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:45:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:45:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110549) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:45:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110549) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110549', '00381811', '2025-07-11 09:45:09', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003303943986', NULL, '102501090625Y002790', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik Obgyn', 0, '2', '', '20250711F045')
ERROR - 2025-07-11 09:45:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:45:41 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-11 09:45:41 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:45:41 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:45:41 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:45:41 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:45:41 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:45:41 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:45:41 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 09:46:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:46:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:46:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id_layanan_pendaftaran&quot; = ''
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:46:53 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id_layanan_pendaftaran" = ''
                                         ^ - Invalid query: SELECT *
FROM "sm_order_laboratorium"
WHERE "id_layanan_pendaftaran" = ''
AND "status" != 'batal'
ERROR - 2025-07-11 02:46:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 02:46:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:47:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:47:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '69', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-07-11 09:47:13 --> Severity: Notice  --> Trying to get property 'metaData' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 292
ERROR - 2025-07-11 09:47:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 292
ERROR - 2025-07-11 09:47:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:47:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:48:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:48:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:48:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:48:45 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00134564'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-07-11 09:49:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:49:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:49:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 02:49:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:49:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:49:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:50:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:50:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:51:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:51:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110565) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:51:10 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110565) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110565', '00108630', '2025-07-11 09:51:08', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000815372381', NULL, '0223R0380725V001153', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250711A121')
ERROR - 2025-07-11 09:51:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:51:27 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-07-11 09:51:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:51:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:51:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-07-11 09:51:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:51:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 09:51:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:51:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:51:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '69', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-07-11 09:52:06 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2238
ERROR - 2025-07-11 09:52:06 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2282
ERROR - 2025-07-11 09:52:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:52:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:52:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 02:53:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 02:53:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:53:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:53:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:53:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '69', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-07-11 09:53:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:54:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:54:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:54:34 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2574
ERROR - 2025-07-11 09:54:34 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2576
ERROR - 2025-07-11 02:54:34 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2769
ERROR - 2025-07-11 02:54:34 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2770
ERROR - 2025-07-11 02:54:34 --> Severity: Notice  --> Trying to get property 'noKartu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2772
ERROR - 2025-07-11 02:54:34 --> Severity: Notice  --> Trying to get property 'noSuratKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2773
ERROR - 2025-07-11 02:54:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(45) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 02:54:34 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(45) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_surat_kontrol" ("id_pendaftaran", "id_layanan_pendaftaran", "id_jadwal_dokter", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "created_date", "updated_date", "id_dokter_asal", "id_dokter_tujuan", "id_skb") VALUES ('722707', '782627', '45', '2025-07-11', '26', '763', 'Surat Kontrol', NULL, '00380133', '1', NULL, NULL, '{"konsul":null,"raber":null,"alih":null}', NULL, NULL, NULL, '2025-07-11 09:54:34', '2025-07-11 09:54:34', NULL, NULL, 198871)
ERROR - 2025-07-11 09:54:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:55:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:55:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110573) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 09:55:30 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110573) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110573', '00309358', '2025-07-11 09:55:28', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002081505879', NULL, '022300090525Y000455', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250711A005')
ERROR - 2025-07-11 09:55:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:56:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:57:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:57:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:57:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:57:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:58:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:58:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:59:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:59:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:59:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:59:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-07-11 09:59:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:59:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:59:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:00:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:00:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:00:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:00:51 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4799781'
ERROR - 2025-07-11 10:01:06 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:01:06 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:01:06 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:01:06 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:01:06 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:01:06 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:01:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:01:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 10:01:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:01:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:01:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 10:01:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:01:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:01:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:01:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:01:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:02:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:03:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:03:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:04:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:04:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:04:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:04:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:04:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:04:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:04:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:04:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:05:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:05:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:05:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:05:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:05:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:05:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:05:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:06:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:06:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:06:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '69', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-07-11 10:06:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:06:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 10:06:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 10:06:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 10:06:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 10:06:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:07:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:07:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:07:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:07:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:07:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:07:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:07:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:08:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:08:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:08:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:08:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:08:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:08:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:08:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:08:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:09:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:09:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:09:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:09:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:09:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110599) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:09:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110599) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110599', '00072230', '2025-07-11 10:09:53', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000815426548', NULL, '022300090425Y002087', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250711A144')
ERROR - 2025-07-11 10:09:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:10:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:10:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:10:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:10:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:11:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:11:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:11:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 10:11:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:11:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:12:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:12:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:12:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:12:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:12:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:12:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:12:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:12:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:13:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:13:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:13:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:13:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:13:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:14:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:14:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:14:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:14:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:14:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:14:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:14:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:15:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:15:42 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:15:42 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:15:42 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:15:42 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:15:42 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:15:42 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:15:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:15:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:15:51 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00296541'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-07-11 10:16:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:16:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:16:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (886869, '12', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:16:52 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (886869, '12', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (886869, '12', '', '2', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 10:16:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:17:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:17:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:17:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:17:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:18:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:18:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:18:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:18:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:18:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('886669', '3', '', '28', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:18:26 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('886669', '3', '', '28', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('886669', '3', '', '28', '1 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 10:19:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:19:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:19:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:19:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:20:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:20:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:20:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:20:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:21:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:21:14 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4799957'
ERROR - 2025-07-11 10:21:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:21:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:21:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:22:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:22:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:22:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:22:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:23:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:23:06 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-11 00:00:00' AND '2025-07-11 23:59:59'
AND "ab"."no_kartu" = '0002048545192'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-11 10:23:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:24:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:24:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:24:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 03:24:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 03:24:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:25:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:25:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:25:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:25:41 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:25:41 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:25:41 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:25:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:25:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:25:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:26:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:26:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:26:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:26:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:27:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:27:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 10:27:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:28:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:28:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:28:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:28:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:28:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 10:28:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:28:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:28:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:29:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (936, 783415, 112, dr. Nur Arafah Pane, SE, Sp.An,M.Kes , null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 2025-07-11 10:29:02, null, 814, 723443, 2025-07-11 10:29:02, 2025-07-11 10:32:00). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:29:02 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (936, 783415, 112, dr. Nur Arafah Pane, SE, Sp.An,M.Kes , null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 2025-07-11 10:29:02, null, 814, 723443, 2025-07-11 10:29:02, 2025-07-11 10:32:00). - Invalid query: INSERT INTO "sm_form_pemberian_informasi" ("id_pendaftaran", "id_layanan_pendaftaran", "is_pasien", "id_dokter_pelaksana_tindakan", "tanggal_jam_pi", "pemberi_informasi", "penerima_informasi", "diagnosis_kerja", "diagnosis_kerja_check", "dasar_diagnosis", "dasar_diagnosis_check", "tindakan_kedokteran", "tindakan_kedokteran_check", "indikasi_tindakan", "indikasi_tindakan_check", "tata_cara", "tata_cara_check", "tujuan", "tujuan_check", "risiko_komplikasi", "risiko_komplikasi_check", "prognosis", "prognosis_check", "alternatif_resiko", "alternatif_resiko_check", "menyelamatkan_pasien", "menyelamatkan_pasien_check", "penggunaan_darah", "penggunaan_darah_check", "analgesia", "analgesia_check", "nama_keluarga", "id_users", "created_date", "updated_on") VALUES ('723443', '783415', NULL, '112', '2025-07-11 10:32', 'dr. Nur Arafah Pane, SE, Sp.An,M.Kes ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '814', '2025-07-11 10:29:02', '2025-07-11 10:29:02')
ERROR - 2025-07-11 10:29:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:29:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:29:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:30:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:30:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:30:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:30:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:30:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:30:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:30:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:32:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:32:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:32:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:32:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:32:37 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-11 00:00:00' AND '2025-07-11 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A191%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-11 10:32:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:32:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:32:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110633) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:32:58 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110633) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110633', '00341758', '2025-07-11 10:32:57', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003575750051', NULL, '0223B1570725P000687', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250711A191')
ERROR - 2025-07-11 10:33:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:34:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:35:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:36:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:36:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:36:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:36:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:36:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:37:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:37:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (886933, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:37:29 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (886933, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (886933, '1', '', '', '', '', 'PC', '0', '', '0', 'MORN', '1xpulv1', '1', 1, '1x10mg', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 10:38:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:38:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:38:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:39:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:39:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:39:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:39:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:40:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:40:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:40:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:40:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:40:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:40:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:40:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:41:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:41:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 10:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 10:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:41:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:41:39 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%A%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 10:41:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:41:40 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%AZ%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 10:41:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:41:40 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%AZI%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 10:41:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:41:40 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00062829' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%AZIT%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 03:42:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 03:42:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 03:42:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 03:42:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 03:42:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 03:42:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:42:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:42:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 03:42:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 03:42:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:42:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:42:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:43:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:43:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:44:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:44:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:44:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:44:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:44:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
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
ERROR - 2025-07-11 10:44:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:44:55 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 10:45:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:45:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:45:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:45:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:45:28 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 10:45:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:46:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:46:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:46:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:46:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:46:54 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:46:54 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:46:54 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:46:54 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:46:54 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:46:54 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:47:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:47:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:47:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:47:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110655) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:47:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110655) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110655', '00373758', '2025-07-11 10:47:36', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001369597375', NULL, '022300090625Y000374', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250711B283')
ERROR - 2025-07-11 10:48:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:48:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:48:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:49:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:49:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:49:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:49:31 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 10:49:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:50:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:50:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:50:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:50:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507110659) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:50:58 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507110659) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507110659', '00276486', '2025-07-11 10:50:57', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Jiwa', 0, '2', '', '20250711C120')
ERROR - 2025-07-11 10:50:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:50:58 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4800055'
ERROR - 2025-07-11 10:51:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:51:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-11 00:00:00' AND '2025-07-11 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A186%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-11 10:51:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:51:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:51:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:52:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:52:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:52:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:52:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:53:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:53:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:53:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:53:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:53:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:54:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:54:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:54:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:55:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:56:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:56:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:56:25 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('724299', '784332', '00340941', '1994', 'Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin ', '2', '1', NULL, NULL, '2', '2', '36', NULL, '160', NULL, '14.06', 'malnutrisi berat', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '1', '2', '2', '1', NULL, '2', NULL, 'Tanggal 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 GDS 165 mg/dl Ro. Tgl 10/7/2025', 'BB 36 kg, TB 160 cm, IMT 14.06 kg/m2 (status gizi malnutrisi berat) TD: 96/ 66mmHg Nadi : 78 x/menit RR: 20 x/menit Suhu : 36.2 c Spo2: 100 persen dengan nasl kanul 1 LPM. Tgl 10/7/2025 IVFD Nacl 3 P0ml/24 jam. Tgl 10/7/2025 terpasang DC No 16 pengunci 20 cc.  Thorax di Radiologi. OAT 4FDC 1x3 tablet mulai 10/7/2025, sesak, batuk, asupan makan pagi dihabiskan. tidak ada riwayat alergi makanan.', 'Perubahan nilai lab terkait gizi

Malnutrisi berat 

Inadekuat asupan', ' berkaitan dengan KEP, Malnutrisi, geriatri dan penyakit infeksi paru 

berkaitan dengan Kep dan penyakit infeksi paru-paru, 

 berkaitan dengan penurunan daya terima makanan ', 'ditandai dengan hasil lab 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 albumin 1.6 IMT 14.06 

ditandai dengan IMT 14.06 

ditandai dengan asupan makan pagi 3 suap , asupan 2 bulan terakhir 3x 3-5 suap , perkiraan asupan &lt;30% kebutuhan', 'BB DJ RG T.kal ex Putel snack cair Entramix 2x200cc', '2', '1446 kkal', '54 gr', '40 gr', '217 gr', '1820 ml', NULL, '1', '3x makan 2x snack', 'Hasil lab dan klinis terkait gizi target mendekati normal Perbaikan dan peningkatan asupan bertahap >80% kebutuhan"', '2025-07-11 10:59', '1994', '1', '440', '1', '2025-07-11 10:56:25')
ERROR - 2025-07-11 10:56:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:56:36 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('724299', '784332', '00340941', '1994', 'Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin ', '2', '1', NULL, NULL, '2', '2', '36', NULL, '160', NULL, '14.06', 'malnutrisi berat', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '1', '2', '2', '1', NULL, '2', NULL, 'Tanggal 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 GDS 165 mg/dl Ro. Tgl 10/7/2025', 'BB 36 kg, TB 160 cm, IMT 14.06 kg/m2 (status gizi malnutrisi berat) TD: 96/ 66mmHg Nadi : 78 x/menit RR: 20 x/menit Suhu : 36.2 c Spo2: 100 persen dengan nasl kanul 1 LPM. Tgl 10/7/2025 IVFD Nacl 3 P0ml/24 jam. Tgl 10/7/2025 terpasang DC No 16 pengunci 20 cc.  Thorax di Radiologi. OAT 4FDC 1x3 tablet mulai 10/7/2025, sesak, batuk, asupan makan pagi dihabiskan. tidak ada riwayat alergi makanan.', 'Perubahan nilai lab terkait gizi

Malnutrisi berat 

Inadekuat asupan', ' berkaitan dengan KEP, Malnutrisi, geriatri dan penyakit infeksi paru 

berkaitan dengan Kep dan penyakit infeksi paru-paru, 

 berkaitan dengan penurunan daya terima makanan ', 'ditandai dengan hasil lab 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 albumin 1.6 IMT 14.06 

ditandai dengan IMT 14.06 

ditandai dengan asupan makan pagi 3 suap , asupan 2 bulan terakhir 3x 3-5 suap , perkiraan asupan &lt;30% kebutuhan', 'BB DJ RG T.kal ex Putel snack cair Entramix 2x200cc', '2', '1446 kkal', '54 gr', '40 gr', '217 gr', '1820 ml', NULL, '1', '3x makan 2x snack', 'Hasil lab dan klinis terkait gizi target mendekati normal Perbaikan dan peningkatan asupan bertahap >80% kebutuhan"', '2025-07-11 10:59', '1994', '1', '440', '1', '2025-07-11 10:56:36')
ERROR - 2025-07-11 10:56:39 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-11 10:56:39 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-11 10:56:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:56:46 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-11 10:56:46 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-11 10:56:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:56:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202-07-11 12.30&quot;
LINE 1: ..., NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202-07-11...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:56:51 --> Query error: ERROR:  invalid input syntax for type timestamp: "202-07-11 12.30"
LINE 1: ..., NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202-07-11...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('785028', '2025-07-11 10:30', '2025-07-11 12:30', 'IGD. MATERNAL', 'ok', 'g3p2a0 hamil aterm dengan oligohidramnion', NULL, '50', NULL, NULL, 'Rencana SC', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '140', NULL, NULL, NULL, NULL, NULL, NULL, '131', '84', '36.5', '85', '20', '0', NULL, '1', '3/10', '1', 'sedang', '1', '1', '0', NULL, '1', '2025-07-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rl 20 tpm jam 10.30', 'ceftriaxon 2x1 jam 11.00', '1', 'dr,gds,goldar,triple e, btct', NULL, NULL, NULL, NULL, 'pasang infus. ctg, mengambil darah vena, cek lab ', 'rencana sc cito jam 13.00', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'djj 140x/m ', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202-07-11 12.30', NULL, '319', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 10:57:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202-07-11 12.30&quot;
LINE 1: ..., NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202-07-11...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:57:03 --> Query error: ERROR:  invalid input syntax for type timestamp: "202-07-11 12.30"
LINE 1: ..., NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202-07-11...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('785028', '2025-07-11 10:30', '2025-07-11 12:30', 'IGD. MATERNAL', 'ok', 'g3p2a0 hamil aterm dengan oligohidramnion', NULL, '50', NULL, NULL, 'Rencana SC', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '140', NULL, NULL, NULL, NULL, NULL, NULL, '131', '84', '36.5', '85', '20', '0', NULL, '1', '3/10', '1', 'sedang', '1', '1', '0', NULL, '1', '2025-07-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rl 20 tpm jam 10.30', 'ceftriaxon 2x1 jam 11.00', '1', 'dr,gds,goldar,triple e, btct', NULL, NULL, NULL, NULL, 'pasang infus. ctg, mengambil darah vena, cek lab ', 'rencana sc cito jam 13.00', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'djj 140x/m ', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202-07-11 12.30', NULL, '319', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 10:57:05 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-11 10:57:05 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-11 10:57:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:57:11 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('724299', '784332', '00340941', '1994', 'Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin ', '2', '1', NULL, NULL, '2', '2', '36', NULL, '160', NULL, '14.06', 'malnutrisi berat', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '1', '2', '2', '1', NULL, '2', NULL, 'Tanggal 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 GDS 165 mg/dl Ro. Tgl 10/7/2025', 'BB 36 kg, TB 160 cm, IMT 14.06 kg/m2 (status gizi malnutrisi berat) TD: 96/ 66mmHg Nadi : 78 x/menit RR: 20 x/menit Suhu : 36.2 c Spo2: 100 persen dengan nasl kanul 1 LPM. Tgl 10/7/2025 IVFD Nacl 3 P0ml/24 jam. Tgl 10/7/2025 terpasang DC No 16 pengunci 20 cc.  Thorax di Radiologi. OAT 4FDC 1x3 tablet mulai 10/7/2025, sesak, batuk, asupan makan pagi dihabiskan. tidak ada riwayat alergi makanan.', 'Perubahan nilai lab terkait gizi

Malnutrisi berat 

Inadekuat asupan', ' berkaitan dengan KEP, Malnutrisi, geriatri dan penyakit infeksi paru 

berkaitan dengan Kep dan penyakit infeksi paru-paru, 

 berkaitan dengan penurunan daya terima makanan ', 'ditandai dengan hasil lab 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 albumin 1.6 IMT 14.06 

ditandai dengan IMT 14.06 

ditandai dengan asupan makan pagi 3 suap , asupan 2 bulan terakhir 3x 3-5 suap , perkiraan asupan &lt;30% kebutuhan', 'BB DJ RG T.kal ex Putel snack cair Entramix 2x200cc', '2', '1446 kkal', '54 gr', '40 gr', '217 gr', '1820 ml', NULL, '1', '3x makan 2x snack', 'Hasil lab dan klinis terkait gizi target mendekati normal Perbaikan dan peningkatan asupan bertahap >80% kebutuhan"', '2025-07-11 10:59', '1994', '1', '440', '1', '2025-07-11 10:57:11')
ERROR - 2025-07-11 10:57:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:57:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:57:13 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('724299', '784332', '00340941', '1994', 'Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin ', '2', '1', NULL, NULL, '2', '2', '36', NULL, '160', NULL, '14.06', 'malnutrisi berat', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '1', '2', '2', '1', NULL, '2', NULL, 'Tanggal 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 GDS 165 mg/dl Ro. Tgl 10/7/2025', 'BB 36 kg, TB 160 cm, IMT 14.06 kg/m2 (status gizi malnutrisi berat) TD: 96/ 66mmHg Nadi : 78 x/menit RR: 20 x/menit Suhu : 36.2 c Spo2: 100 persen dengan nasl kanul 1 LPM. Tgl 10/7/2025 IVFD Nacl 3 P0ml/24 jam. Tgl 10/7/2025 terpasang DC No 16 pengunci 20 cc.  Thorax di Radiologi. OAT 4FDC 1x3 tablet mulai 10/7/2025, sesak, batuk, asupan makan pagi dihabiskan. tidak ada riwayat alergi makanan.', 'Perubahan nilai lab terkait gizi

Malnutrisi berat 

Inadekuat asupan', ' berkaitan dengan KEP, Malnutrisi, geriatri dan penyakit infeksi paru 

berkaitan dengan Kep dan penyakit infeksi paru-paru, 

 berkaitan dengan penurunan daya terima makanan ', 'ditandai dengan hasil lab 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 albumin 1.6 IMT 14.06 

ditandai dengan IMT 14.06 

ditandai dengan asupan makan pagi 3 suap , asupan 2 bulan terakhir 3x 3-5 suap , perkiraan asupan &lt;30% kebutuhan', 'BB DJ RG T.kal ex Putel snack cair Entramix 2x200cc', '2', '1446 kkal', '54 gr', '40 gr', '217 gr', '1820 ml', NULL, '1', '3x makan 2x snack', 'Hasil lab dan klinis terkait gizi target mendekati normal Perbaikan dan peningkatan asupan bertahap >80% kebutuhan"', '2025-07-11 10:59', '1994', '1', '440', '1', '2025-07-11 10:57:13')
ERROR - 2025-07-11 10:57:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:57:14 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('724299', '784332', '00340941', '1994', 'Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin ', '2', '1', NULL, NULL, '2', '2', '36', NULL, '160', NULL, '14.06', 'malnutrisi berat', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '1', '2', '2', '1', NULL, '2', NULL, 'Tanggal 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 GDS 165 mg/dl Ro. Tgl 10/7/2025', 'BB 36 kg, TB 160 cm, IMT 14.06 kg/m2 (status gizi malnutrisi berat) TD: 96/ 66mmHg Nadi : 78 x/menit RR: 20 x/menit Suhu : 36.2 c Spo2: 100 persen dengan nasl kanul 1 LPM. Tgl 10/7/2025 IVFD Nacl 3 P0ml/24 jam. Tgl 10/7/2025 terpasang DC No 16 pengunci 20 cc.  Thorax di Radiologi. OAT 4FDC 1x3 tablet mulai 10/7/2025, sesak, batuk, asupan makan pagi dihabiskan. tidak ada riwayat alergi makanan.', 'Perubahan nilai lab terkait gizi

Malnutrisi berat 

Inadekuat asupan', ' berkaitan dengan KEP, Malnutrisi, geriatri dan penyakit infeksi paru 

berkaitan dengan Kep dan penyakit infeksi paru-paru, 

 berkaitan dengan penurunan daya terima makanan ', 'ditandai dengan hasil lab 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 albumin 1.6 IMT 14.06 

ditandai dengan IMT 14.06 

ditandai dengan asupan makan pagi 3 suap , asupan 2 bulan terakhir 3x 3-5 suap , perkiraan asupan &lt;30% kebutuhan', 'BB DJ RG T.kal ex Putel snack cair Entramix 2x200cc', '2', '1446 kkal', '54 gr', '40 gr', '217 gr', '1820 ml', NULL, '1', '3x makan 2x snack', 'Hasil lab dan klinis terkait gizi target mendekati normal Perbaikan dan peningkatan asupan bertahap >80% kebutuhan"', '2025-07-11 10:59', '1994', '1', '440', '1', '2025-07-11 10:57:14')
ERROR - 2025-07-11 10:57:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:57:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:57:20 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('724299', '784332', '00340941', '1994', 'Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin ', '2', '1', NULL, NULL, '2', '2', '36', NULL, '160', NULL, '14.06', 'malnutrisi berat', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '1', '2', '2', '1', NULL, '2', NULL, 'Tanggal 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 GDS 165 mg/dl Ro. Tgl 10/7/2025', 'BB 36 kg, TB 160 cm, IMT 14.06 kg/m2 (status gizi malnutrisi berat) TD: 96/ 66mmHg Nadi : 78 x/menit RR: 20 x/menit Suhu : 36.2 c Spo2: 100 persen dengan nasl kanul 1 LPM. Tgl 10/7/2025 IVFD Nacl 3 P0ml/24 jam. Tgl 10/7/2025 terpasang DC No 16 pengunci 20 cc.  Thorax di Radiologi. OAT 4FDC 1x3 tablet mulai 10/7/2025, sesak, batuk, asupan makan pagi dihabiskan. tidak ada riwayat alergi makanan.', 'Perubahan nilai lab terkait gizi

Malnutrisi berat 

Inadekuat asupan', ' berkaitan dengan KEP, Malnutrisi, geriatri dan penyakit infeksi paru 

berkaitan dengan Kep dan penyakit infeksi paru-paru, 

 berkaitan dengan penurunan daya terima makanan ', 'ditandai dengan hasil lab 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 albumin 1.6 IMT 14.06 

ditandai dengan IMT 14.06 

ditandai dengan asupan makan pagi 3 suap , asupan 2 bulan terakhir 3x 3-5 suap , perkiraan asupan &lt;30% kebutuhan', 'BB DJ RG T.kal ex Putel snack cair Entramix 2x200cc', '2', '1446 kkal', '54 gr', '40 gr', '217 gr', '1820 ml', NULL, '1', '3x makan 2x snack', 'Hasil lab dan klinis terkait gizi target mendekati normal Perbaikan dan peningkatan asupan bertahap >80%, kebutuhan"', '2025-07-11 10:59', '1994', '1', '440', '1', '2025-07-11 10:57:20')
ERROR - 2025-07-11 10:57:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:57:26 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('724299', '784332', '00340941', '1994', 'Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin Pneumonia geriatri dd tirah baring + TB Paru putus pengobatan + Takikardi + Anemia penyakit kronis + HipoNa + HipoK + Susp Hipoalbumin ', '2', '1', NULL, NULL, '2', '2', '36', NULL, '160', NULL, '14.06', 'malnutrisi berat', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '1', '2', '2', '1', NULL, '2', NULL, 'Tanggal 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 GDS 165 mg/dl Ro. Tgl 10/7/2025', 'BB 36 kg, TB 160 cm, IMT 14.06 kg/m2 (status gizi malnutrisi berat) TD: 96/ 66mmHg Nadi : 78 x/menit RR: 20 x/menit Suhu : 36.2 c Spo2: 100 persen dengan nasl kanul 1 LPM. Tgl 10/7/2025 IVFD Nacl 3 P0ml/24 jam. Tgl 10/7/2025 terpasang DC No 16 pengunci 20 cc.  Thorax di Radiologi. OAT 4FDC 1x3 tablet mulai 10/7/2025, sesak, batuk, asupan makan pagi dihabiskan. tidak ada riwayat alergi makanan.', 'Perubahan nilai lab terkait gizi

Malnutrisi berat 

Inadekuat asupan', ' berkaitan dengan KEP, Malnutrisi, geriatri dan penyakit infeksi paru 

berkaitan dengan Kep dan penyakit infeksi paru-paru, 

 berkaitan dengan penurunan daya terima makanan ', 'ditandai dengan hasil lab 10/7/2025 Hb 9,3 Leukosit 4.9 Trombosit 385. URCR 36/0,7 Eletrolit Na:128 Kal:2,8 albumin 1.6 IMT 14.06 

ditandai dengan IMT 14.06 

ditandai dengan asupan makan pagi 3 suap , asupan 2 bulan terakhir 3x 3-5 suap , perkiraan asupan &lt;30%, kebutuhan', 'BB DJ RG T.kal ex Putel snack cair Entramix 2x200cc', '2', '1446 kkal', '54 gr', '40 gr', '217 gr', '1820 ml', NULL, '1', '3x makan 2x snack', 'Hasil lab dan klinis terkait gizi target mendekati normal Perbaikan dan peningkatan asupan bertahap >80%, kebutuhan"', '2025-07-11 10:59', '1994', '1', '440', '1', '2025-07-11 10:57:26')
ERROR - 2025-07-11 10:57:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 10:57:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:57:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:57:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:57:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:58:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:58:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:58:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 10:58:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:58:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:58:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:58:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:58:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:58:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:58:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:59:08 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:59:08 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:59:08 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 10:59:08 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:59:08 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:59:08 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 10:59:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:59:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 10:59:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 10:59:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:59:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:00:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:00:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:01:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:01:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:01:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:01:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:01:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:01:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:02:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:02:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:03:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:03:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:04:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:04:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:04:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:04:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:05:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:05:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:05:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:05:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:06:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:06:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:06:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:07:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:07:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:07:30 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 11:07:30 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 11:07:30 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 11:07:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 11:07:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 11:07:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 11:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:08:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:08:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:08:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:08:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:09:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:10:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 04:10:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:10:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:10:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:10:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:10:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:10:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:10:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:11:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:11:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:11:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:11:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:11:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:12:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:13:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:13:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:14:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:15:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (886995, '7', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:15:43 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (886995, '7', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (886995, '7', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 11:16:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:16:47 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 17982
ERROR - 2025-07-11 11:18:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:18:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:18:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:18:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:18:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:18:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:19:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (911106, 784987, null, 8, Pasien datang dengan keluhan pusing berputar sejak semalam SMRS ..., KU: Tampak sakit sedang
GCS: E4M6V5, CM
TD : 148/74 mmHg
HR :..., Vertigo perifer+GEA, TL igd : 
* ⁠RL 20 tpm 
* Inj Ranitidine 50 mg ⁠
* ⁠Inj..., , 2056, null, &lt;p&gt;konsul dr Eko Sp,N &lt;/p&gt;&lt;p&gt;advice: &lt;/p&gt;, null, null, 2056, 2025-07-11 11:19:18, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:19:18 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (911106, 784987, null, 8, Pasien datang dengan keluhan pusing berputar sejak semalam SMRS ..., KU: Tampak sakit sedang
GCS: E4M6V5, CM
TD : 148/74 mmHg
HR :..., Vertigo perifer+GEA, TL igd : 
* ⁠RL 20 tpm 
* Inj Ranitidine 50 mg ⁠
* ⁠Inj..., , 2056, null, <p>konsul dr Eko Sp,N </p><p>advice: </p>, null, null, 2056, 2025-07-11 11:19:18, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('784987', NULL, '8', 'Pasien datang dengan keluhan pusing berputar sejak semalam SMRS , tadi pagi pusing memberat, keliyengan seperti ingin jatuh, pusing saat membuka mata.  Pusing berputar disertai mual (+), muntah 5x(+), demam (-), makan berkurang, tampak lemas+ 
BAB cair sejak tadi pagi 4x, lendir (-), darah (-)
BAK DBN. 
RPD: DM 
RPO: Metformin 3x500 mg
Riw alergi: - ', 'KU: Tampak sakit sedang
GCS: E4M6V5, CM
TD : 148/74 mmHg
HR : 122 x/min
RR: 19 x/min
SpO2 : 100 % RA
S: 36.7 C
VAS 7 
Kepala : normocephal
Hidung : dbn
Mata : ca -/- si -/- 
Leher : pembesaran KGB (-)
Mulut : mukosa bibir kering(+)
Jantung : bj 1 2 reg, murmur -, gallop -
Paru : sn ves +/+, rhk -/-, wh -/-
Abd : datar, supel, BU (+) n, NTE +
Eks : akral hangat, crt &lt; 2 dtk, ptekie ', 'Vertigo perifer+GEA', 'TL igd : 
* ⁠RL 20 tpm 
* Inj Ranitidine 50 mg ⁠
* ⁠Injketorolac 1 amp iv 
* ⁠Betahistine 24 mg po
* ⁠Flunarizine 5 mg po
', '', '', '', '', '', '', '', '', '2056', NULL, '<p>konsul dr Eko Sp,N </p><p>advice: </p>', NULL, '2056', 0, NULL, '2025-07-11 11:19:18')
ERROR - 2025-07-11 11:19:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (911107, 784987, null, 8, Pasien datang dengan keluhan pusing berputar sejak semalam SMRS ..., KU: Tampak sakit sedang
GCS: E4M6V5, CM
TD : 148/74 mmHg
HR :..., Vertigo perifer+GEA, TL igd : 
* ⁠RL 20 tpm 
* Inj Ranitidine 50 mg ⁠
* ⁠Inj..., , 2056, null, &lt;p&gt;konsul dr Eko Sp,N &lt;/p&gt;&lt;p&gt;advice: &lt;/p&gt;, null, null, 2056, 2025-07-11 11:19:36, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:19:36 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (911107, 784987, null, 8, Pasien datang dengan keluhan pusing berputar sejak semalam SMRS ..., KU: Tampak sakit sedang
GCS: E4M6V5, CM
TD : 148/74 mmHg
HR :..., Vertigo perifer+GEA, TL igd : 
* ⁠RL 20 tpm 
* Inj Ranitidine 50 mg ⁠
* ⁠Inj..., , 2056, null, <p>konsul dr Eko Sp,N </p><p>advice: </p>, null, null, 2056, 2025-07-11 11:19:36, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('784987', NULL, '8', 'Pasien datang dengan keluhan pusing berputar sejak semalam SMRS , tadi pagi pusing memberat, keliyengan seperti ingin jatuh, pusing saat membuka mata.  Pusing berputar disertai mual (+), muntah 5x(+), demam (-), makan berkurang, tampak lemas+ 
BAB cair sejak tadi pagi 4x, lendir (-), darah (-)
BAK DBN. 
RPD: DM 
RPO: Metformin 3x500 mg
Riw alergi: - ', 'KU: Tampak sakit sedang
GCS: E4M6V5, CM
TD : 148/74 mmHg
HR : 122 x/min
RR: 19 x/min
SpO2 : 100 % RA
S: 36.7 C
VAS 7 
Kepala : normocephal
Hidung : dbn
Mata : ca -/- si -/- 
Leher : pembesaran KGB (-)
Mulut : mukosa bibir kering(+)
Jantung : bj 1 2 reg, murmur -, gallop -
Paru : sn ves +/+, rhk -/-, wh -/-
Abd : datar, supel, BU (+) n, NTE +
Eks : akral hangat, crt &lt; 2 dtk, ptekie ', 'Vertigo perifer+GEA', 'TL igd : 
* ⁠RL 20 tpm 
* Inj Ranitidine 50 mg ⁠
* ⁠Injketorolac 1 amp iv 
* ⁠Betahistine 24 mg po
* ⁠Flunarizine 5 mg po
', '', '', '', '', '', '', '', '', '2056', NULL, '<p>konsul dr Eko Sp,N </p><p>advice: </p>', NULL, '2056', 0, NULL, '2025-07-11 11:19:36')
ERROR - 2025-07-11 11:20:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:20:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:20:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:21:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:22:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:22:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:22:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:22:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 11:22:46 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 11:22:46 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 11:22:46 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 11:22:46 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 11:22:46 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 11:22:46 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 11:22:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:23:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:23:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 11:23:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:23:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 11:23:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:23:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:24:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:24:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:25:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:25:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:25:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:26:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:26:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:26:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:26:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:27:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:28:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:28:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:29:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:29:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:29:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 11:29:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 11:29:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:30:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:30:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:30:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:31:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:31:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 11:31:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:31:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 11:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:31:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:32:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:32:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:33:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 04:33:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:33:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:33:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:34:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:34:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:35:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:36:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:36:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:37:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:37:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 11:37:45 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('724827', '784824', '0001797139642', '0223R0380725V005992', '00237189', 'FIZAL MUSTAQIM', '2007-12-21', 1, '2025-07-11 08:53:25', '2025-07-11 09:05:03', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#B20.8', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. SITI NILAWARDHANI, Sp.A', 'CP', '00003', 'JKN', '3603286209970003', '2025-07-11 11:37:44', 'normal', 'set_claim_data', 'Z09.8#B20.8', '89.05')
ERROR - 2025-07-11 11:38:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:39:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:39:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:39:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:39:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:39:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:40:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:40:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:41:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 11:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 11:41:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 11:41:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 11:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:41:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:42:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:42:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:42:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:42:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:43:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:43:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:44:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:44:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:45:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:45:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:46:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:46:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 11:46:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:47:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:47:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:47:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:48:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:48:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:48:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:49:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:49:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:49:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:49:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:49:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:50:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:50:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:51:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:52:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:52:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:54:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:55:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:55:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 04:57:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:57:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:57:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:57:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 04:57:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:57:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:58:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:58:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:58:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:58:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:58:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:58:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:58:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:58:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:59:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:59:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 04:59:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 04:59:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:00:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:00:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:00:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:01:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:01:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:02:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:03:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:04:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-07-11 13.00&quot;
LINE 1: ...i_dokter_dpjp&quot;, &quot;created_date&quot;) VALUES ('785095', '2025-07-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:04:45 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-07-11 13.00"
LINE 1: ...i_dokter_dpjp", "created_date") VALUES ('785095', '2025-07-1...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('785095', '2025-07-11 13.00', '', '{"pasien":"","keluarga":"","lain":"","ket_lain":""}', '', '', '', '{"infeksi":"","lain":"","ket_lain":""}', '', '', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"","gcs_m":"","gcs_v":""}', '', '', '', '', '', NULL, NULL, '{"vesikuler":"","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"","lain":"","ket_lain":""}', '', '0', '0', '0', '{"normal":"","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"","lain":"","ket_lain":""}', '{"baik":"","sedang":"","buruk":""}', '{"normal":"","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', '', '', '', '', '', '', '', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', '', 'Normal', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '{"hambatan_1":"","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '200', NULL, '2025-07-11 12:04', NULL, '1', NULL, '2025-07-11 12:04:45')
ERROR - 2025-07-11 12:04:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:06:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:07:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:09:45 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:09:45 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:09:45 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:09:45 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:09:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:09:45 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('785099', '2025-07-11 12:09:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 12:09:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:09:58 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:09:58 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:09:58 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:09:58 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:09:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:09:58 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('785099', '2025-07-11 12:09:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 12:10:01 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:10:01 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:10:01 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:10:01 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-07-11 12:10:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:10:01 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('785099', '2025-07-11 12:10:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 12:10:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:10:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:10:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:11:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbe /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:11:39 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbe - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '785012', "waktu" = '2025-07-11 12:11:39', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = 'sejak 2 minggu (awal Juli) Kebas dan kesemutan tangan kiri dan kaki kiri tu saat naik motor, tengkuk tegang leher kaku setahun, vertigo  terakhir 2 bln terakhir kambuh
Nafsu makan kurang, bab bak dbn
R kecelakkan motor  tahun, 
Setiap naik motor matic 30 menit awal kebas dan kesemuatan tgn kiri, pegang stang tdk bisa, langsung berhenti nunggu sampai berasa. Terasa 6 kali/mg. Kaki kiridalam seminggu sekitar 15 menit harus berhenti, Di tempat kerja sertelah 2 jam tangan berasa lsg bangun digerakkan 5 menit hilang.bisa 3-4 kali terasa kaki ki i ditempat kerja dalam seminggu 2 kali.
nafsu makan menurun bab/bak dbn tidur  sehari 5-6 jam 
komunikasi nyambung
', "anamnesa_sosial" = 'Supervisor security
1 jam naik motor jam 7-19.00 istirahat fleksibel, senin-jumat
6.30 serah terima 6.45 apel. 7.00 cek pos di lantai, mengontrol seluruh area 7 lantai, harus cek lantai 2, 3 lantai terisi  3 saat patrol 1 jam,siapkan  data dan menganalisa. Sebulan 2 kali lembur paling jam 8, sharing rencana. Mengontrol  3 kali  paling 30 fokus 3 lantai.perlu kretivitas.

Dikejar target dudk 75�rdiri 15%', "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = 'cm', "gcs" = NULL, "tensi_sistolik" = '131', "tensi_diastolik" = '82', "suhu" = NULL, "nadi" = '91', "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = 'konsentrasi dbn', "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = 'Kelaikan kerja', "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = 'Tangan kiri phalen + finkel + tremor kiri +
Romberg dbm 
lasq kernig dbn
NT +  pinggang ka
MMT 5/5
           5/5
sensibel dbn
abduksi bahu &lt;180 nyeri NT+/+ flexi leher nyeri', "prognosis" = 'Dubia Et Bonam', "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = 'dbn', "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = 'dbn', "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = 'dbn', "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = 'dbn', "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = NULL, "o_soap" = NULL, "a_soap" = NULL, "p_soap" = NULL, "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '785012'
ERROR - 2025-07-11 12:11:40 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 12:11:40 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 12:11:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbe /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:11:45 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbe - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '785012', "waktu" = '2025-07-11 12:11:45', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = 'sejak 2 minggu (awal Juli) Kebas dan kesemutan tangan kiri dan kaki kiri tu saat naik motor, tengkuk tegang leher kaku setahun, vertigo  terakhir 2 bln terakhir kambuh
Nafsu makan kurang, bab bak dbn
R kecelakkan motor  tahun, 
Setiap naik motor matic 30 menit awal kebas dan kesemuatan tgn kiri, pegang stang tdk bisa, langsung berhenti nunggu sampai berasa. Terasa 6 kali/mg. Kaki kiridalam seminggu sekitar 15 menit harus berhenti, Di tempat kerja sertelah 2 jam tangan berasa lsg bangun digerakkan 5 menit hilang.bisa 3-4 kali terasa kaki ki i ditempat kerja dalam seminggu 2 kali.
nafsu makan menurun bab/bak dbn tidur  sehari 5-6 jam 
komunikasi nyambung
', "anamnesa_sosial" = 'Supervisor security
1 jam naik motor jam 7-19.00 istirahat fleksibel, senin-jumat
6.30 serah terima 6.45 apel. 7.00 cek pos di lantai, mengontrol seluruh area 7 lantai, harus cek lantai 2, 3 lantai terisi  3 saat patrol 1 jam,siapkan  data dan menganalisa. Sebulan 2 kali lembur paling jam 8, sharing rencana. Mengontrol  3 kali  paling 30 fokus 3 lantai.perlu kretivitas.

Dikejar target dudk 75�rdiri 15%', "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = 'cm', "gcs" = NULL, "tensi_sistolik" = '131', "tensi_diastolik" = '82', "suhu" = NULL, "nadi" = '91', "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = 'konsentrasi dbn', "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = 'Kelaikan kerja', "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = 'Tangan kiri phalen + finkel + tremor kiri +
Romberg dbm 
lasq kernig dbn
NT +  pinggang ka
MMT 5/5
           5/5
sensibel dbn
abduksi bahu &lt;180 nyeri NT+/+ flexi leher nyeri', "prognosis" = 'Dubia Et Bonam', "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = 'dbn', "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = 'dbn', "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = 'dbn', "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = 'dbn', "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = NULL, "o_soap" = NULL, "a_soap" = NULL, "p_soap" = NULL, "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '785012'
ERROR - 2025-07-11 12:12:16 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 12:12:16 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 12:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:13:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbe /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:13:46 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbe - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '785012', "waktu" = '2025-07-11 12:13:46', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = 'sejak 2 minggu (awal Juli) Kebas dan kesemutan tangan kiri dan kaki kiri tu saat naik motor, tengkuk tegang leher kaku setahun, vertigo  terakhir 2 bln terakhir kambuh
Nafsu makan kurang, bab bak dbn
R kecelakkan motor  tahun, 
Setiap naik motor matic 30 menit awal kebas dan kesemuatan tgn kiri, pegang stang tdk bisa, langsung berhenti nunggu sampai berasa. Terasa 6 kali/mg. Kaki kiridalam seminggu sekitar 15 menit harus berhenti, Di tempat kerja sertelah 2 jam tangan berasa lsg bangun digerakkan 5 menit hilang.bisa 3-4 kali terasa kaki ki i ditempat kerja dalam seminggu 2 kali.
nafsu makan menurun bab/bak dbn tidur  sehari 5-6 jam 
komunikasi nyambung
', "anamnesa_sosial" = 'Supervisor security
1 jam naik motor jam 7-19.00 istirahat fleksibel, senin-jumat
6.30 serah terima 6.45 apel. 7.00 cek pos di lantai, mengontrol seluruh area 7 lantai, harus cek lantai 2, 3 lantai terisi  3 saat patrol 1 jam,siapkan  data dan menganalisa. Sebulan 2 kali lembur paling jam 8, sharing rencana. Mengontrol  3 kali  paling 30 fokus 3 lantai.perlu kretivitas.

Dikejar target dudk 75�rdiri 15%', "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = 'cm', "gcs" = NULL, "tensi_sistolik" = '131', "tensi_diastolik" = '82', "suhu" = NULL, "nadi" = '91', "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = 'konsentrasi dbn', "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = 'Kelaikan kerja', "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = 'Tangan kiri phalen + finkel + tremor kiri +
Romberg dbm 
lasq kernig dbn
NT +  pinggang ka
MMT 5/5
           5/5
sensibel dbn
abduksi bahu &lt;180 nyeri NT+/+ flexi leher nyeri', "prognosis" = 'Dubia Et Bonam', "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = 'dbn', "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = 'dbn', "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = 'dbn', "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = 'dbn', "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = NULL, "o_soap" = NULL, "a_soap" = NULL, "p_soap" = NULL, "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '785012'
ERROR - 2025-07-11 12:13:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:14:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:14:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:14:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:15:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:15:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:15:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:16:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbe /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:16:30 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbe - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '785012', "waktu" = '2025-07-11 12:16:30', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = 'Kebas dan kesemutan tangan kiri dan kaki kiri selalu saat naik motor  leher kaku setahun, vertigo 2015 terakhir 2 bln terakhir kambuh
Nafsu makan kurang, bab bak dbn
R kecelakkan motor  tahun, 
Setiap naik motor matic 30 menit awal kebas dan kesemuatan tgn kiri, pegang stang tdk bisa, langsung berhenti nunggu sampai berasa. Terasa 4 kali. Kaki kiridalam seminggu sekitar 15 menit harus berhenti, Di tempat kerja sertelah 2 jam tangan berasa lsg bangun digerakkan 5 menit hilang.bisa 3-4 kali terasa kaki ki i ditempat kerja dalam seminggu 2 kali.

', "anamnesa_sosial" = 'Supervisor security
1 jam naik motor jam 7-19.00 istirahat fleksibel, senin-jumat
6.30 serah terima 6.45 apel. 7.00 cek pos di lantai, mengontrol seluruh area 7 lantai, harus cek lantai 2, 3 lantai terisi  3 saat patrol 1 jam,siapkan  data dan menganalisa. Sebulan 2 kali lembur paling jam 8, sharing rencana. Mengontrol  3 kali  paling 30 fokus 3 lantai.perlu kretivitas.

Dikejar target dudk 75�rdiri 15%
', "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = 'Kelaikan kerja', "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = 'Tangan kiri phalen + finkel + tremor kiri +
Romberg dbm 
lasq kernig dbn
NT +  pinggang ka
MMT 5/5
           5/5
sensibel dbn
abduksi bahu &lt;180 nyeri NT+/+ flexi leher nyeri

', "prognosis" = 'Dubia Et Bonam', "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = 'dbn', "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = 'dbn', "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = 'dbn', "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = 'dbn', "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = NULL, "o_soap" = NULL, "a_soap" = NULL, "p_soap" = NULL, "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '785012'
ERROR - 2025-07-11 12:18:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:18:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbe /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:18:09 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbe - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '785012', "waktu" = '2025-07-11 12:18:09', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = 'Kebas dan kesemutan tangan kiri dan kaki kiri selalu saat naik motor  leher kaku setahun, vertigo 2015 terakhir 2 bln terakhir kambuh
Nafsu makan kurang, bab bak dbn
R kecelakkan motor  tahun, 
Setiap naik motor matic 30 menit awal kebas dan kesemuatan tgn kiri, pegang stang tdk bisa, langsung berhenti nunggu sampai berasa. Terasa 4 kali. Kaki kiridalam seminggu sekitar 15 menit harus berhenti, Di tempat kerja sertelah 2 jam tangan berasa lsg bangun digerakkan 5 menit hilang.bisa 3-4 kali terasa kaki ki i ditempat kerja dalam seminggu 2 kali.

', "anamnesa_sosial" = 'Supervisor security
1 jam naik motor jam 7-19.00 istirahat fleksibel, senin-jumat
6.30 serah terima 6.45 apel. 7.00 cek pos di lantai, mengontrol seluruh area 7 lantai, harus cek lantai 2, 3 lantai terisi  3 saat patrol 1 jam,siapkan  data dan menganalisa. Sebulan 2 kali lembur paling jam 8, sharing rencana. Mengontrol  3 kali  paling 30 fokus 3 lantai.perlu kretivitas.

Dikejar target dudk 75�rdiri 15%
', "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = 'Kelaikan kerja', "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = 'Tangan kiri phalen + finkel + tremor kiri +
Romberg dbm 
lasq kernig dbn
NT +  pinggang ka
MMT 5/5
           5/5
sensibel dbn
abduksi bahu &lt;180 nyeri NT+/+ flexi leher nyeri

', "prognosis" = 'Dubia Et Bonam', "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = 'dbn', "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = 'dbn', "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = 'dbn', "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = 'dbn', "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = NULL, "o_soap" = NULL, "a_soap" = NULL, "p_soap" = NULL, "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '785012'
ERROR - 2025-07-11 12:18:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:19:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:20:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:21:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:21:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:23:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:23:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:24:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:25:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:25:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:25:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:25:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:25:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:25:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:25:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:25:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:25:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:26:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:27:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:27:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:27:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:27:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:27:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:27:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:28:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:28:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:28:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:28:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:28:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 12:28:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 12:29:15 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-11 12:29:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:30:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:30:40 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:30:41 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:31:01 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:31:01 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:31:01 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:31:01 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:31:01 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:31:01 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:31:01 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:31:01 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:31:18 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:31:18 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:31:18 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:31:18 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:31:18 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:31:18 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:31:18 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:31:18 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:31:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:31:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:31:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:32:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:33:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:34:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:34:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:35:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:35:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:37:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:37:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 12:38:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:38:08 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '910935', "id_layanan_pendaftaran" = '783396', "waktu" = '2025-07-11 12:00', "id_profesi" = '18', "subject" = 'Keluarga pasien mengatakan sesak nafas disertai batuk berdahak sulit dikeluarkan, demam sudah tidak ada, mual muntah berkurang,
', "objective" = 'Kesadaran E3M4Vafasia EWS Hijau (2) akral hangat nadi teraba kuat dan teratur, pasien tampak sesak nafas, batuk grok grok produksi +, sulit dikeluarkan, demam naik turum, lemas. ADL Dibantu, kekuatan otot ekstremitas bawah 2222/2222, tedapat luka di bokong tertutup kasa, luas luka 5x5 cm, TD: 122/66 mmHg, N: 82 x/menit S: 36.6 C R: 20 x/menit SpO2:99 �ngan NK 3 lpm. IVFD Nacl 0.9 persen 500 CC/24 jam . Tanggal 9/7/25 RO Thorax sedang di exp, EKG terlampir. HB: 12.4 HT: 34 Trom: 231 Leu: 10.5 Trom: 231 GDS 168 mg/dL. Nat: 124 Kal: 2.6 UR: 28 CR: 0.4. Riw. Stroke sejak tahun 2022 dan terbaring aktivitas di tempat tidur hingga saat ini HT (+) DM Parkinson (+) Rpo nospirinal 1*80mg, triheksipenidil 1*2mg, leparson 2*1tab, mecobalamin 2*500mcg, eperisone 1*1tab, metformin 1*500mg, tgl 10/7/25 GDS 97 mg/dL. Tgl 10/07/25 Sputum gram Coccus Gram positif susunan dua-dua, Coccus Gram positif susunan rantai, Batang Gram positif susunan satu-satu, Batang Gram negatif susunan satu-satu.Tgl 11/07/25 GDS jam 06: 96 mg/dl HB 10,7, HT 31, trombosit 239, leukosit 8,7, natrium 129, kalium 4,2
', "assessment" = 'Bersihan Jalan Napas Tidak Efektif, Ketidakstabilan Kadar Glukosa Darah, Gangguan Mobilitas Fisik, Gangguan Integritas Kulit/Jaringan, Risiko Ketidakseimbangan Elektrolit, Hipertermia teratasi
', "plan" = 'Setelah dilakukan Tindakan keperawatan 3x24 jam Bersihan jalan napas meningkat dengan kriteria hasil Batuk efektif meningkat, Produksi sputum menurun, Pola napas membaik, Kestabilan kadar glukosa darah meningkat dengan kriteria hasil Kadar glukosa dalam darah membaik, Mobilitas Fisik meningkat dengan kriteria hasil Rentang gerak ROM meningkat, Gerakan terbatas menurun, Kelemahan fisik menurun, Integritas Kulit Dan Jaringan meningkat dengan kriteria hasil Hidrasi meningkat, Perfusi jaringan, Nyeri menurun, Kadar serum elektrolit dalam batas normal, Serum natrium membaik, Serum kalium membaik', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1621', "ttd_nadis" = '1', "instruksi_ppa" = '<div>fisioterapi per hari</div><div>Pp sore
</div><div>Monitor pola napas, Monitor sputum, Posisikan semi-fowler, Berikan minuman hangat, Lakukan fisoterapi dada, Ajarkan tehnik batuk efektif, Kolaborasi pemberian bronkhodilator, ekspectoran, mukolitik, Identifikasi kemungknan penyebab hiperglikemia, Monitor kadar glukosa darah, Monitor tanda dan gejala hiperglikemia, Kolaborasi pemberian Insulin, jika perlu, Fasilitasi aktivitas ambulasi dari tidur ke duduk, Fasilitasi melakukan mobilisasi fisik, jika perlu, Jelaskan tujuan dan prosedur ambulasi, Monitor karakteristik luka (mis:drainase,warna,ukuran,bau), Monitor tanda –tanda infeksi, Bersihkan jaringan nekrotik, Bersihkan luka dengan cairan NACL, Pertahan kan teknik seteril saat perawatan luka, Identifikasi tanda dan gejala ketidakseimbangan elektrolit, Identfikasi penyebab ketidakseimbangan elektrolit, Monitor kadar elektrolit, Kolaborasi pemberian suplemen elektrolit, <b>Nebu ventolin 4x</b></div><div>Pp malam
</div><div>Identifikasi kemampuan batuk, Monitor adanya retensi sputum, Monitor tanda dan gejala infeksi saluran nafas, Atur posisi semi fowler ajarkan batuk efektif, Kolaborasi pemberian mukolitik atau ekspektoran, Identifikasi kemungknan penyebab hiperglikemia, Monitor kadar glukosa darah, Kolaborasi pemberian Insulin, jika perlu, Identifikasi toleransi fisik melakukan pergerakan, Jelaskan tujuan dan prosedur mobilisasi, Fasilitasi melakukan pergerakan, jika perlu, Monitor karakteristik luka (mis:drainase,warna,ukuran,bau), Monitor tanda –tanda infeksi, Bersihkan jaringan nekrotik, Bersihkan luka dengan cairan NACL, Pertahan kan teknik seteril saat perawatan luka, Identifikasi tanda dan gejala ketidakseimbangan elektrolit, Identfikasi penyebab ketidakseimbangan elektrolit, Monitor kadar elektrolit, Kolaborasi pemberian suplemen elektrolit,<b> Cek GDS per hari oad Metformin 1x500 mg PO, Perawatan luka dgn octadine gel, Nebu ventolin 4x</b></div><div><br></div><div>
</div><div>
</div>', "id_dokter_dpjp" = NULL, "id_user" = '1621', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-07-11 12:38:08'
WHERE "id" = '910935'
ERROR - 2025-07-11 05:38:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 05:38:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:38:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:38:14 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '910935', "id_layanan_pendaftaran" = '783396', "waktu" = '2025-07-11 12:00', "id_profesi" = '18', "subject" = 'Keluarga pasien mengatakan sesak nafas disertai batuk berdahak sulit dikeluarkan, demam sudah tidak ada, mual muntah berkurang,
', "objective" = 'Kesadaran E3M4Vafasia EWS Hijau (2) akral hangat nadi teraba kuat dan teratur, pasien tampak sesak nafas, batuk grok grok produksi +, sulit dikeluarkan, demam naik turum, lemas. ADL Dibantu, kekuatan otot ekstremitas bawah 2222/2222, tedapat luka di bokong tertutup kasa, luas luka 5x5 cm, TD: 122/66 mmHg, N: 82 x/menit S: 36.6 C R: 20 x/menit SpO2:99 �ngan NK 3 lpm. IVFD Nacl 0.9 persen 500 CC/24 jam . Tanggal 9/7/25 RO Thorax sedang di exp, EKG terlampir. HB: 12.4 HT: 34 Trom: 231 Leu: 10.5 Trom: 231 GDS 168 mg/dL. Nat: 124 Kal: 2.6 UR: 28 CR: 0.4. Riw. Stroke sejak tahun 2022 dan terbaring aktivitas di tempat tidur hingga saat ini HT (+) DM Parkinson (+) Rpo nospirinal 1*80mg, triheksipenidil 1*2mg, leparson 2*1tab, mecobalamin 2*500mcg, eperisone 1*1tab, metformin 1*500mg, tgl 10/7/25 GDS 97 mg/dL. Tgl 10/07/25 Sputum gram Coccus Gram positif susunan dua-dua, Coccus Gram positif susunan rantai, Batang Gram positif susunan satu-satu, Batang Gram negatif susunan satu-satu.Tgl 11/07/25 GDS jam 06: 96 mg/dl HB 10,7, HT 31, trombosit 239, leukosit 8,7, natrium 129, kalium 4,2
', "assessment" = 'Bersihan Jalan Napas Tidak Efektif, Ketidakstabilan Kadar Glukosa Darah, Gangguan Mobilitas Fisik, Gangguan Integritas Kulit/Jaringan, Risiko Ketidakseimbangan Elektrolit, Hipertermia teratasi
', "plan" = 'Setelah dilakukan Tindakan keperawatan 3x24 jam Bersihan jalan napas meningkat dengan kriteria hasil Batuk efektif meningkat, Produksi sputum menurun, Pola napas membaik, Kestabilan kadar glukosa darah meningkat dengan kriteria hasil Kadar glukosa dalam darah membaik, Mobilitas Fisik meningkat dengan kriteria hasil Rentang gerak ROM meningkat, Gerakan terbatas menurun, Kelemahan fisik menurun, Integritas Kulit Dan Jaringan meningkat dengan kriteria hasil Hidrasi meningkat, Perfusi jaringan, Nyeri menurun, Kadar serum elektrolit dalam batas normal, Serum natrium membaik, Serum kalium membaik', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1621', "ttd_nadis" = '1', "instruksi_ppa" = '<div>fisioterapi per hari</div><div>Pp sore
</div><div>Monitor pola napas, Monitor sputum, Posisikan semi-fowler, Berikan minuman hangat, Lakukan fisoterapi dada, Ajarkan tehnik batuk efektif, Kolaborasi pemberian bronkhodilator, ekspectoran, mukolitik, Identifikasi kemungknan penyebab hiperglikemia, Monitor kadar glukosa darah, Monitor tanda dan gejala hiperglikemia, Kolaborasi pemberian Insulin, jika perlu, Fasilitasi aktivitas ambulasi dari tidur ke duduk, Fasilitasi melakukan mobilisasi fisik, jika perlu, Jelaskan tujuan dan prosedur ambulasi, Monitor karakteristik luka (mis:drainase,warna,ukuran,bau), Monitor tanda –tanda infeksi, Bersihkan jaringan nekrotik, Bersihkan luka dengan cairan NACL, Pertahan kan teknik seteril saat perawatan luka, Identifikasi tanda dan gejala ketidakseimbangan elektrolit, Identfikasi penyebab ketidakseimbangan elektrolit, Monitor kadar elektrolit, Kolaborasi pemberian suplemen elektrolit, <b>Nebu ventolin 4x</b></div><div>Pp malam
</div><div>Identifikasi kemampuan batuk, Monitor adanya retensi sputum, Monitor tanda dan gejala infeksi saluran nafas, Atur posisi semi fowler ajarkan batuk efektif, Kolaborasi pemberian mukolitik atau ekspektoran, Identifikasi kemungknan penyebab hiperglikemia, Monitor kadar glukosa darah, Kolaborasi pemberian Insulin, jika perlu, Identifikasi toleransi fisik melakukan pergerakan, Jelaskan tujuan dan prosedur mobilisasi, Fasilitasi melakukan pergerakan, jika perlu, Monitor karakteristik luka (mis:drainase,warna,ukuran,bau), Monitor tanda –tanda infeksi, Bersihkan jaringan nekrotik, Bersihkan luka dengan cairan NACL, Pertahan kan teknik seteril saat perawatan luka, Identifikasi tanda dan gejala ketidakseimbangan elektrolit, Identfikasi penyebab ketidakseimbangan elektrolit, Monitor kadar elektrolit, Kolaborasi pemberian suplemen elektrolit,<b> Cek GDS per hari oad Metformin 1x500 mg PO, Perawatan luka dgn octadine gel, Nebu ventolin 4x</b></div><div><br></div><div>
</div><div>
</div>', "id_dokter_dpjp" = NULL, "id_user" = '1621', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-07-11 12:38:14'
WHERE "id" = '910935'
ERROR - 2025-07-11 05:38:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 05:38:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:38:49 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 12:38:49 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 12:38:49 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 12:38:49 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 12:39:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:39:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:40:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:42:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 12:43:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:43:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:43:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:43:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:44:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:44:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:45:23 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 12:47:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 12:47:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:47:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:48:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:48:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:48:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:48:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:49:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:49:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:49:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:49:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:49:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:50:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:50:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:50:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:50:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:50:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:50:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:50:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 12:50:58 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 62
ERROR - 2025-07-11 12:50:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:50:58 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_rawat_inap, ri.waktu_masuk, 
					ri.waktu_keluar, pd.id_pasien, pd.no_register, 
					CONCAT_WS(' ', COALESCE(p.status_pasien), p.nama, '') as nama, 
					p.tanggal_lahir, pd.tanggal_daftar, pd.tanggal_keluar, p.telp,
					COALESCE(sp.nama, '') as layanan,
					COALESCE(pg.nama, '') as dokter, 
					(select bg.id from sm_bangsal as bg where bg.id = ri.id_bangsal) as id_bangsal,
					(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal,
					k.nama as kelas, ri.no_ruang, ri.no_bed, ri.checkout, ri.konfirmasi_ranap, 
					ri.waktu_konfirmasi_ranap, pj.nama as penjamin,
					odri.id_dokter_dpjp, pgdpjp.nama as dokter_dpjp,
					COALESCE(tr.account, '') as user_sep, 
					COALESCE((select DISTINCT case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '2121' ), '0') as visit_anestesi,
					sep.nosep_igd, sep.nosep_rajal, sep.nosep_ranap, sep.created_date tgl_sepasal from sm_layanan_pendaftaran as lp 
				join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas)
				left join sm_asal_sep sep on lp.id_pendaftaran = sep.id_pendaftaran join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Rawat Inap'  and lp.status_terlayani != 'Batal'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-07-11 12:51:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:51:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:51:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:51:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:51:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:51:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:51:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:52:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:52:02 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 12:52:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:52:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:52:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:52:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:52:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:54:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:54:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:54:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:54:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:54:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:54:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:55:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:55:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:55:29 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_jadwal_dokter"
WHERE "id" = ''
ERROR - 2025-07-11 12:55:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:56:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:56:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:56:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:56:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:56:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (887072, '3', '', '31', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:56:21 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (887072, '3', '', '31', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (887072, '3', '', '31', '', '', 'PC', '0', '', '0', '', NULL, '0', 1, '1x1 pulv', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 12:56:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:57:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:57:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:58:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:59:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:59:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:59:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:59:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 12:59:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 12:59:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:00:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:00:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:00:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:01:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('886565', '4', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:01:00 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('886565', '4', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('886565', '4', '', '1', 'Injeksi', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 13:01:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('886553', '6', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:01:04 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('886553', '6', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('886553', '6', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 13:01:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:01:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:01:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:01:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:01:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 62
ERROR - 2025-07-11 13:01:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:01:24 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_rawat_inap, ri.waktu_masuk, 
					ri.waktu_keluar, pd.id_pasien, pd.no_register, 
					CONCAT_WS(' ', COALESCE(p.status_pasien), p.nama, '') as nama, 
					p.tanggal_lahir, pd.tanggal_daftar, pd.tanggal_keluar, p.telp,
					COALESCE(sp.nama, '') as layanan,
					COALESCE(pg.nama, '') as dokter, 
					(select bg.id from sm_bangsal as bg where bg.id = ri.id_bangsal) as id_bangsal,
					(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal,
					k.nama as kelas, ri.no_ruang, ri.no_bed, ri.checkout, ri.konfirmasi_ranap, 
					ri.waktu_konfirmasi_ranap, pj.nama as penjamin,
					odri.id_dokter_dpjp, pgdpjp.nama as dokter_dpjp,
					COALESCE(tr.account, '') as user_sep, 
					COALESCE((select DISTINCT case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '2003' ), '0') as visit_anestesi,
					sep.nosep_igd, sep.nosep_rajal, sep.nosep_ranap, sep.created_date tgl_sepasal from sm_layanan_pendaftaran as lp 
				join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas)
				left join sm_asal_sep sep on lp.id_pendaftaran = sep.id_pendaftaran join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Rawat Inap'  and lp.status_terlayani != 'Batal'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-07-11 13:01:30 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:01:30 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:01:30 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:01:30 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:01:30 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:01:30 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:01:30 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:01:30 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:01:31 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:01:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:01:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:02:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 13:02:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 13:02:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:02:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:02:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:02:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:49 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:49 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:49 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:49 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:50 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:02:50 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:02:50 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:02:50 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:50 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:02:50 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:02:50 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:02:50 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:03:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:04:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:04:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:04:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:04:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:04:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:04:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:04:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('886587', '8', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:04:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('886587', '8', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('886587', '8', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:05:14 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 13:06:08 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:06:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:06:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:07:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:07:59 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 13:07:59 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 13:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:08:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:09:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:09:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:10:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:10:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:10:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:10:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:10:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:11:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('885851', '17', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:11:04 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('885851', '17', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('885851', '17', '2', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 13:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:12:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:12:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('886947', '10', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:12:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('886947', '10', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('886947', '10', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 13:13:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:14:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:14:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:14:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:14:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:14:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:15:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:15:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:15:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:15:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:16:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:16:48 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '911059', "id_layanan_pendaftaran" = '784386', "waktu" = '2025-07-11 12:02', "id_profesi" = '18', "subject" = 'pasien mengatakan lemah tangan dan kaki kiri tiba-tiba saat berjalan , sulit menelan dan ada batuk berdahak 
', "objective" = 'kesadaran CM, GCS 15, EWS hijau. pasien tampak lemas . TD 140/90 mmhg, nadi 80x/m, suhu 36.5, RR 20x/m, saturasi 98 �ngan 02 3 LPM IVFD RL/8jam. RPD : HT dan pembengkakan jantung, rutin kontrol ke RS Sari Asih Cipondoh utk jantung dan PKM Benda utk HT RPO : obat darah tinggi lupa namanya. dari RS Benda terpasang NGT NO.16 dan DC No.25, dg pengunci 25cc. (10/7/25) CT Brain NK dan Ro thorax. EKG dan Cek lab dari RS benda: HB 13.5, hematokrit 42, leukosit 7.67, trombosit 287, natrium 146. kalium 3.9, clorida 104, ureum 17, creatinin 0.7, GDS 213 GDP 150 GD2PP: 158 HBa1C:6,5
', "assessment" = 'Penurunan Kapasitas Adaptif Intrakranial. Bersihan jalan nafas tidak efektif', "plan" = 'Setelah dilakukan asuhan keperwatan selama 2x24 jam Kapasitas Adaptif Intrakranial meningkat. Bersihan jalan nafas meningkat ', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2006', "ttd_nadis" = NULL, "instruksi_ppa" = '<b>Untuk PP Sore :
</b><div>Monitor TD. Monitor pelebaran tekanan nadi (selisis TDS dan TDD). Monitor penurunan frekuensi jantung. Monitor ireguleritas irama napas. Monitor penurunan tingkat kesadaran. Pertahankan posisi kepala dan leher netral.
</div><div>Identifikasi kemampuan batuk. Monitor adanya retensi sputum. Atur posisi semi fowler atau fowler. Jelaskan tujuan dan prosedur batuk efektif. Ajarkan teknik batuk efektif.</div><div><b>Untuk PP Malam :
</b></div><div>Monitor TD. Monitor pelebaran tekanan nadi (selisis TDS dan TDD). Monitor penurunan frekuensi jantung. Monitor ireguleritas irama napas. Monitor penurunan tingkat kesadaran. Pertahankan posisi kepala dan leher netral.
</div><div>Identifikasi kemampuan batuk. Monitor adanya retensi sputum. Atur posisi semi fowler atau fowler. Jelaskan tujuan dan prosedur batuk efektif. Ajarkan teknik batuk efektif. <b>R/ cek GD / Hari</b></div>', "id_dokter_dpjp" = NULL, "id_user" = '2006', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-07-11 13:16:48'
WHERE "id" = '911059'
ERROR - 2025-07-11 13:16:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:17:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:17:05 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '911059', "id_layanan_pendaftaran" = '784386', "waktu" = '2025-07-11 12:02', "id_profesi" = '18', "subject" = 'pasien mengatakan lemah tangan dan kaki kiri tiba-tiba saat berjalan , sulit menelan dan ada batuk berdahak 
', "objective" = 'kesadaran CM, GCS 15, EWS hijau. pasien tampak lemas . TD 140/90 mmhg, nadi 80x/m, suhu 36.5, RR 20x/m, saturasi 98 �ngan 02 3 LPM IVFD RL/8jam. RPD : HT dan pembengkakan jantung, rutin kontrol ke RS Sari Asih Cipondoh utk jantung dan PKM Benda utk HT RPO : obat darah tinggi lupa namanya. dari RS Benda terpasang NGT NO.16 dan DC No.25, dg pengunci 25cc. (10/7/25) CT Brain NK dan Ro thorax. EKG dan Cek lab dari RS benda: HB 13.5, hematokrit 42, leukosit 7.67, trombosit 287, natrium 146. kalium 3.9, clorida 104, ureum 17, creatinin 0.7, GDS 213 GDP 150 GD2PP: 158 HBa1C:6,5
', "assessment" = 'Penurunan Kapasitas Adaptif Intrakranial. Bersihan jalan nafas tidak efektif', "plan" = 'Setelah dilakukan asuhan keperwatan selama 2x24 jam Kapasitas Adaptif Intrakranial meningkat. Bersihan jalan nafas meningkat ', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2006', "ttd_nadis" = NULL, "instruksi_ppa" = '<b>Untuk PP Sore :
</b><div>Monitor TD. Monitor pelebaran tekanan nadi (selisis TDS dan TDD). Monitor penurunan frekuensi jantung. Monitor ireguleritas irama napas. Monitor penurunan tingkat kesadaran. Pertahankan posisi kepala dan leher netral.
</div><div>Identifikasi kemampuan batuk. Monitor adanya retensi sputum. Atur posisi semi fowler atau fowler. Jelaskan tujuan dan prosedur batuk efektif. Ajarkan teknik batuk efektif.</div><div><b>Untuk PP Malam :
</b></div><div>Monitor TD. Monitor pelebaran tekanan nadi (selisis TDS dan TDD). Monitor penurunan frekuensi jantung. Monitor ireguleritas irama napas. Monitor penurunan tingkat kesadaran. Pertahankan posisi kepala dan leher netral.
</div><div>Identifikasi kemampuan batuk. Monitor adanya retensi sputum. Atur posisi semi fowler atau fowler. Jelaskan tujuan dan prosedur batuk efektif. Ajarkan teknik batuk efektif. <b>R/ cek GD / Hari</b></div>', "id_dokter_dpjp" = NULL, "id_user" = '2006', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-07-11 13:17:05'
WHERE "id" = '911059'
ERROR - 2025-07-11 13:17:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:17:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:17:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:17:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:17:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:17:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:17:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:18:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:18:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:18:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:18:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:18:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:18:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:18:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:18:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:19:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:19:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:19:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:19:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:19:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:20:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:20:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:20:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:20:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:20:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:20:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:20:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:21:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:21:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:21:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:21:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:21:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:21:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:21:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:22:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:22:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:22:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:22:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:22:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:22:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:23:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:23:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:23:32 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 13:23:32 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 13:23:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:23:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:23:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:24:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:24:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:24:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:24:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:24:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:25:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:25:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:25:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:25:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:25:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:25:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:26:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:26:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:26:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:26:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:26:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:26:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:26:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:26:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:26:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:26:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:27:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:27:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:27:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:27:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:28:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:28:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:28:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:28:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:28:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:28:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:28:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:28:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:29:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:29:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:29:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:29:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:29:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:29:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:29:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:29:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 13:29:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 13:30:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:30:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:30:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:30:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:30:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:31:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:31:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:31:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:31:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:32:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:32:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:32:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:32:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:33:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:33:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:33:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:33:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:33:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:33:41 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '788489'),
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
			 
ERROR - 2025-07-11 13:34:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:34:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:34:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:34:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:34:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:34:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:34:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:35:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:35:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:35:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:35:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:35:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:35:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:35:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:35:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:35:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:35:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:35:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:35:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('887052', '16', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:35:46 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('887052', '16', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('887052', '16', '1', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 13:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:36:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:36:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:36:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:36:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:36:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:36:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:36:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:58 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%K%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 13:36:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:58 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%Ke%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 13:36:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:58 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%Ket%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 13:36:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:59 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%Keto%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 13:36:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:59 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%Ketor%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 13:36:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:36:59 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%Ketoro%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 13:37:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:37:01 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00343372' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%Ketor%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-07-11 13:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:37:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:37:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:37:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:37:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:37:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:37:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:38:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:38:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:38:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:38:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:38:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:38:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:38:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:38:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:38:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:38:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:38:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:38:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:38:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:38:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:39:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:39:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:39:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:39:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:39:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:39:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:39:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:39:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:39:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:39:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:39:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:39:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:40:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:40:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:40:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:40:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:40:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-07-11 19&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-07-11 19', &quot;...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:40:22 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-07-11 19"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-07-11 19', "...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-07-11 19', "id_dokter_dpjp" = '50', "ttd_dokter_dpjp" = '1'
WHERE "id" = '906729'
ERROR - 2025-07-11 13:40:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:40:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:41:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:41:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:41:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:41:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:41:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:41:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:42:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:42:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:42:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:42:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:42:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:42:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:43:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:43:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:43:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:43:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:43:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:43:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:43:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:43:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:44:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:44:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:44:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:44:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:44:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:44:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:44:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:44:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:44:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:45:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:45:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:45:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:45:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:45:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:45:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:46:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:46:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:46:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 13:46:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 13:46:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:46:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:46:53 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 13:46:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 13:47:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:47:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:47:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:47:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:48:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:48:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:48:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:48:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:48:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:48:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:48:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:49:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:49:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:49:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:49:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:49:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:50:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:50:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:50:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:50:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:50:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:50:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:50:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:50:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:51:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:51:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:51:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:52:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:52:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:53:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:53:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:54:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:54:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:54:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:56:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:56:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:56:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:56:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:57:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:57:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:57:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:57:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:57:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:57:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:57:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:57:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:57:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:57:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:58:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:58:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:58:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 13:58:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:58:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:58:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:58:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:58:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:59:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:59:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:59:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '69', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-07-11 13:59:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:59:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:59:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 13:59:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:59:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:59:28 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 101
ERROR - 2025-07-11 13:59:28 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 110
ERROR - 2025-07-11 13:59:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:59:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 13:59:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:01:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:01:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:01:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:01:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:01:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:01:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:01:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:01:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:01:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:01:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:01:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:02:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:02:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:02:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:03:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:03:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:03:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:03:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:03:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:03:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:03:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:03:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:04:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:04:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:05:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:05:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:05:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:05:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:05:47 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:05:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:05:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:05:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:06:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:06:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:06:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:06:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:06:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:07:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:07:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:07:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:07:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:07:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:07:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:08:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:08:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:09:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:09:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 14:09:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:09:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 14:09:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:09:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:09:54 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:10:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:10:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:10:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:10:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:10:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:10:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:10:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:10:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:10:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:10:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:10:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:10:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:10:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:11:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:11:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:11:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:11:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:11:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:11:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 14:11:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 14:11:45 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 14:11:45 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 14:11:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:11:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:12:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:12:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:12:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:12:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:12:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:12:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:12:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:12:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:12:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:12:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:12:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:12:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:13:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:13:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:13:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:13:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:14:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:14:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:14:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:14:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:14:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:14:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:14:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:14:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:14:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:14:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:15:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:15:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:15:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:16:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:16:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:16:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:16:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:17:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:17:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:17:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:17:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:17:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:17:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:17:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:17:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:17:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:17:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:17:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:17:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:17:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:17:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:17:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:18:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:18:17 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-11 14:18:17 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 14:18:17 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 14:18:17 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 14:18:17 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 14:18:17 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 14:18:17 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-11 14:18:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:18:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:19:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:19:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:19:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:19:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:19:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:19:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:19:56 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:20:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:20:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:20:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:20:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:20:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:20:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:20:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:20:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:21:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:21:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:21:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:21:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:21:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:21:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:21:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:21:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:22:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:22:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:22:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:22:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:22:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:23:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:23:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:23:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:23:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:23:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:23:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:23:44 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-11 14:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:23:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:23:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:24:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:24:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:24:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:24:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:24:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:24:18 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:24:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:24:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:24:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:24:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:24:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:24:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:25:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:25:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:25:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:25:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:25:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:26:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:26:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:26:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:26:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:27:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:27:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:27:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:27:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:27:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:27:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:27:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:27:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:28:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:28:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:28:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:28:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:28:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:28:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:28:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:28:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:28:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:28:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 14:28:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 14:29:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:29:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:29:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:29:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:29:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:29:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 14:29:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 14:29:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:29:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:29:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:29:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:30:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 14:30:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 14:30:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:30:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:30:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:30:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:30:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:31:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:31:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:31:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:31:52 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:31:52 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:31:52 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:31:52 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:31:52 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:31:52 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:31:52 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:31:52 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:31:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:31:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:32:02 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:02 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:02 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:02 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:02 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:02 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:02 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:02 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:03 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:05 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:08 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:46 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:32:47 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 14:33:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:33:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:33:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:33:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:34:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:34:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:34:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:34:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:34:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:34:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:35:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:35:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:35:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:35:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:35:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:36:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:36:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:36:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:36:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:36:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:36:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:36:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:36:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:36:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:36:35 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:36:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:36:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:37:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:37:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:37:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:37:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:37:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:38:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:38:38 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-07-11 14:38:53 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-07-11 14:39:00 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-07-11 14:39:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:39:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:40:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:40:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 14:40:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:40:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:40:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:41:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:41:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:41:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:41:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 07:42:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:42:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:42:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:42:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 14:42:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:42:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:42:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:42:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:42:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 14:43:23 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:43:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:43:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:43:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:44:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:44:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:44:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:44:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:44:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:44:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:44:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:44:29 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 14:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:44:29 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 14:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:44:29 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 14:45:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:45:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:45:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:45:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:45:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:45:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:45:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:45:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:45:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:46:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:46:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:46:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:46:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:46:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:46:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:47:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 14:47:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 14:47:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:47:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 14:49:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:49:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:49:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:49:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:49:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:49:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:49:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:49:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:49:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:51:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:51:18 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:51:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 14:51:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:51:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:51:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:51:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:51:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:51:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 14:51:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 14:51:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 07:52:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:52:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:52:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:52:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:52:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:52:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 14:52:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:53:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 14:53:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:53:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 14:54:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:55:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:57:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:57:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 07:57:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:57:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:57:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:57:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:57:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 07:57:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 14:58:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 14:59:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:01:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:01:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:01:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:01:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:02:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:02:17 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 15:02:17 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 15:02:17 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 15:02:17 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 15:02:17 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 15:02:17 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 15:02:17 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 15:02:17 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 15:02:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:03:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:03:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:03:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:03:54 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-11 15:03:54 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-11 15:03:54 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-11 15:03:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 15:03:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-11 15:03:54 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-11 15:03:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 15:03:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-11 15:03:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:04:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:04:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:04:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:04:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:04:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:05:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:05:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:06:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:07:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:08:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:09:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:11:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:11:40 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 15:11:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:11:41 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 15:11:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:11:41 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 15:12:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:12:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:12:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:15:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:15:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:15:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (887133, '13', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:15:55 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (887133, '13', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (887133, '13', '', '1', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 15:16:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8108
ERROR - 2025-07-11 15:17:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:18:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:18:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:18:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:19:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:19:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:20:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...ma_sore&quot;, &quot;id_users&quot;) VALUES ('723729', '784215', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:20:23 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...ma_sore", "id_users") VALUES ('723729', '784215', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_sore" ("id_pendaftaran", "id_layanan_pendaftaran", "dokter_dpjp_sore", "konsulen_sore", "tanggal_waktu_sore", "diagnosa_keperawatan_sore", "infus_sore", "rencana_tindakan_sore", "perawat_mengover_sore", "perawat_menerima_sore", "id_users") VALUES ('723729', '784215', '', NULL, '2025-07-11 15:23:00', ' Hipertermi, Nausea', ' RL/ 6 JAM', 'dr/hari', '569', '570', '2007')
ERROR - 2025-07-11 15:20:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:20:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:20:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:20:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:22:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:22:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:22:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:22:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:22:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:22:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:23:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:23:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:23:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:23:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:23:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:23:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:23:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:23:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:23:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:24:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:24:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:25:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:25:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:26:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:26:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:26:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:26:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:26:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:27:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:27:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:27:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:27:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 15:27:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:28:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:28:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:29:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:29:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:29:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:29:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:30:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:30:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:30:56 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:31:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:31:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 15:31:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:31:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 15:31:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:31:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:31:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:37:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:37:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:37:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:37:48 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 15:37:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:37:48 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 15:37:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:37:48 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-11 15:38:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:38:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:38:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 08:39:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:39:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:39:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:39:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 15:39:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 15:40:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:40:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:40:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:40:54 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:41:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:41:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 08:42:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 08:42:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 15:43:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:45:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:45:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:45:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6595411, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:45:39 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6595411, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6595411, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-07-11 15:45:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:45:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:47:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:47:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:47:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:47:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:47:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:47:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:48:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:48:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:48:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:48:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:48:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:48:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 15:48:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:48:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 15:48:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:52:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 15:52:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 15:52:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:52:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:54:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:57:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 15:57:44 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-11 15:57:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 15:57:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 15:58:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 15:58:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 16:00:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 16:00:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 16:02:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 09:03:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:03:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:03:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:03:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:03:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:03:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:12:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:12:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:12:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:12:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:12:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:12:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:13:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:15:17 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-07-11 16:16:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 16:16:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 09:19:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:19:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:22:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 16:23:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:24:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 16:24:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 16:24:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 16:25:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 16:27:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:29:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 16:34:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 09:36:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:36:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:36:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:36:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:37:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:37:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:37:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:37:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:42:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:42:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:42:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:42:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:42:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:42:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:42:49 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-07-11 16:42:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:42:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:42:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:04 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 16:43:04 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 09:43:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:43:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:43:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 09:43:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:43:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:43:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:43:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:45:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 16:46:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 16:47:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 16:48:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 09:49:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:49:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:49:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:49:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:49:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 09:49:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:49:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 16:49:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 16:49:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 16:49:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 16:49:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 16:49:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 16:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 16:49:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 16:49:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 16:49:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 16:50:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 16:50:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 16:50:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 16:50:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 16:57:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 17:01:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 17:01:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 17:08:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 17:08:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 17:08:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6595579, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 17:08:44 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6595579, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6595579, '1264', 28061.244, '1', '1.00', NULL, 'null')
ERROR - 2025-07-11 17:08:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 17:08:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 17:11:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-11 17:11:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 17:12:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 17:27:08 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 17:27:08 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 17:28:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 17:28:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 17:33:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 17:37:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 17:37:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 17:37:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 17:37:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 17:42:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 17:42:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 10:42:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:42:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:47:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:48:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:48:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:48:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:48:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 17:52:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 17:54:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 17:57:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 17:57:40 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 17:57:40 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 17:58:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 17:58:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 17:58:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 17:58:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 17:59:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 10:59:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:59:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:59:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:59:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:59:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:59:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:59:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 10:59:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:00:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 18:05:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 18:07:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 18:11:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:11:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:11:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:11:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:14:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:14:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:15:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:19:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:19:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:22:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:22:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:22:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:22:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 18:27:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:27:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:28:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 18:29:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:29:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:29:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 11:29:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:29:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:29:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:29:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 18:29:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 18:29:52 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '911442', "id_layanan_pendaftaran" = '785164', "waktu" = '2025-07-11 18:43', "id_profesi" = '18', "subject" = 'Pasien mengatakan pasien mengatakan sesak berkurang, mual dan lemas berkurang ', "objective" = 'Kesadaran composmentis GCS 15 EWS Hijau(2) akral hangat nadi teraba kuat dan teratur, kedua kaki tampak bengkak. TD: 165/79 mmHg, N: 78x/menit S: 36,3 C R: 20 x/menit SpO2: 99 �ngan nasal canul 3lpm IVFD Vemflon. Tanggal 8/7/25 HB: 11.2 HT:33  Leu: 11.7 Trom: 355, nat: 139 kal: 3.7, ur: 34 cr: 1.0, gds: 303 mg/dl, Terpasang DC tanggal 8/7/2025 produksi urine (+), Ro thorax tgl 8/7/25 diradiologi. GDS jaM 06: 162 MG/DL. echo tgl 10/7/25 EF : 74,3%', "assessment" = 'Penurunan curah jantung, Ketidakstabilan Kadar Glukosa Darah, Intoleransi Aktivitas', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2013', "ttd_nadis" = '1', "instruksi_ppa" = 'EKG Hari
<div>- GDS / hari => inj apidra 3x8 iu sc</div><div>- dosis koreksi jika:
</div><div>   >>GD <100>
</div><div>   >>GD 100-200: dosis tetap
</div><div>  >>GD 200-300: +3
</div><div>  >>GD >300: +5</div>', "id_dokter_dpjp" = NULL, "id_user" = '2013', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-07-11 18:29:52'
WHERE "id" = '911442'
ERROR - 2025-07-11 11:29:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:29:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 18:29:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 18:29:57 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '911442', "id_layanan_pendaftaran" = '785164', "waktu" = '2025-07-11 18:43', "id_profesi" = '18', "subject" = 'Pasien mengatakan pasien mengatakan sesak berkurang, mual dan lemas berkurang ', "objective" = 'Kesadaran composmentis GCS 15 EWS Hijau(2) akral hangat nadi teraba kuat dan teratur, kedua kaki tampak bengkak. TD: 165/79 mmHg, N: 78x/menit S: 36,3 C R: 20 x/menit SpO2: 99 �ngan nasal canul 3lpm IVFD Vemflon. Tanggal 8/7/25 HB: 11.2 HT:33  Leu: 11.7 Trom: 355, nat: 139 kal: 3.7, ur: 34 cr: 1.0, gds: 303 mg/dl, Terpasang DC tanggal 8/7/2025 produksi urine (+), Ro thorax tgl 8/7/25 diradiologi. GDS jaM 06: 162 MG/DL. echo tgl 10/7/25 EF : 74,3%', "assessment" = 'Penurunan curah jantung, Ketidakstabilan Kadar Glukosa Darah, Intoleransi Aktivitas', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2013', "ttd_nadis" = '1', "instruksi_ppa" = 'EKG Hari
<div>- GDS / hari => inj apidra 3x8 iu sc</div><div>- dosis koreksi jika:
</div><div>   >>GD <100>
</div><div>   >>GD 100-200: dosis tetap
</div><div>  >>GD 200-300: +3
</div><div>  >>GD >300: +5</div>', "id_dokter_dpjp" = NULL, "id_user" = '2013', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-07-11 18:29:57'
WHERE "id" = '911442'
ERROR - 2025-07-11 11:38:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:38:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 18:38:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 18:38:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 11:38:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:38:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 18:38:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 18:38:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 18:38:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 18:38:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 18:39:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 18:40:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 18:40:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 18:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:42:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:42:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:45:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:45:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:45:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:45:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:46:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:46:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:48:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:48:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 18:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 11:53:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:53:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:53:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:53:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:55:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:55:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:55:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:55:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:55:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:55:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:55:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 11:55:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 18:57:58 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:57:58 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:58:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:58:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 18:58:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 18:58:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 19:06:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:06:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-11 19:06:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:06:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-11 12:08:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:08:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:10:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:11:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:11:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 19:13:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 19:13:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 19:14:57 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 19:14:57 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 19:17:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:17:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:17:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 19:18:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 12:25:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 12:25:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 19:27:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 19:27:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 19:28:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:28:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 19:30:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:30:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 19:30:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:30:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 19:41:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 19:41:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 19:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 19:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 19:42:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 19:44:16 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 19:44:16 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 19:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 19:49:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 19:51:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:51:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 19:51:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6596068, '1179', 240, '20', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:51:25 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6596068, '1179', 240, '20', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6596068, '1179', 240, '20', '1.00', 'Ya', 'null')
ERROR - 2025-07-11 19:51:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:51:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 19:52:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 19:52:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 20:07:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 20:12:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 20:12:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 20:19:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:20:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:20:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:21:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 20:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 20:29:13 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 20:29:13 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 13:32:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:32:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:32:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:32:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 20:32:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 13:32:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:32:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:32:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:32:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:33:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:33:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 20:34:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 20:37:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 20:37:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 20:38:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (6596148, '2450', 4395.6, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 20:38:49 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (6596148, '2450', 4395.6, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6596148, '2450', 4395.6, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-07-11 20:39:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 20:39:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 13:41:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:41:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:41:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 13:41:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 20:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 20:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 20:42:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 20:42:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 20:44:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 20:46:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:48:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:50:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 20:51:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:51:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:53:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:56:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:56:25 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:56:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 20:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:03:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:03:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:04:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:04:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:09:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:10:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:10:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:11:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:11:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:11:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:11:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:11:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:11:52 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:11:52 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:13:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:13:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:13:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:15:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:16:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:17:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:17:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:22:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:22:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:23:00 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:23:10 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:23:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:24:47 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:27:58 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:27:58 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:28:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:30:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:32:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:32:56 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:33:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:34:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:36:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:40:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-11 21:40:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:40:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:41:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:41:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:43:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:44:04 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:44:04 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:47:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:47:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:51:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 21:52:18 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:53:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:54:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:57:45 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:57:45 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:57:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 21:58:51 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 21:58:51 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 21:59:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 14:59:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 14:59:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 22:02:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:03:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:05:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 22:05:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:06:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:09:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:10:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:10:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:11:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 22:11:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 22:14:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:14:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:14:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6596316, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:14:24 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6596316, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6596316, '1264', 28061.244, '1', '1.00', NULL, 'null')
ERROR - 2025-07-11 22:14:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:14:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:15:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:15:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:15:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:15:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:15:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:15:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6596325, '314', 7920, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:15:31 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6596325, '314', 7920, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6596325, '314', 7920, '1', '1.00', NULL, 'null')
ERROR - 2025-07-11 22:15:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:15:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:15:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:15:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:16:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:16:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:16:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:16:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:16:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:16:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6596344, '60', 130.8, '1', '5.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:16:53 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6596344, '60', 130.8, '1', '5.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6596344, '60', 130.8, '1', '5.00', NULL, 'null')
ERROR - 2025-07-11 22:19:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:19:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:19:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:19:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:22:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:26:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:28:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 22:28:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 15:28:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 15:28:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 15:28:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 15:28:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 22:28:28 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 22:28:28 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 22:29:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 22:29:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 22:33:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 22:39:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 22:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 22:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 22:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 22:41:50 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 22:41:50 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 22:41:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:42:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 22:42:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 22:47:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:49:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:52:19 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:52:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:52:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:52:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 22:55:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:55:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:56:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:56:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:56:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:56:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:56:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:56:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-11 22:59:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('887233', '9', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-11 22:59:45 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('887233', '9', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('887233', '9', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-11 16:04:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:04:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 23:06:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 23:08:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:11:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:11:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:11:53 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 23:11:53 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 23:11:54 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 23:11:54 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 16:12:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:12:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:12:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:12:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:12:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:12:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 23:12:19 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 23:12:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 23:14:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 23:14:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 23:19:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-11 23:22:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:22:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:22:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 16:24:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:24:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:24:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:24:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:26:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:26:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:26:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:26:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:37:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:38:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:38:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:38:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:38:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:38:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:38:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:38:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 16:38:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 23:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 23:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 23:41:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-11 23:41:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-11 23:41:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:41:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:49:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:57:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-11 23:12:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-11 23:12:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
