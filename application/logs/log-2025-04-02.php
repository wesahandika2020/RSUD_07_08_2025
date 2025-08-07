<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-04-02 00:34:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 00:36:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 00:36:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 00:37:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (817761, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 00:37:29 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (817761, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (817761, '1', '', '', '', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 1, ' ', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 01:20:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 01:20:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 01:21:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 01:21:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 02:15:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 02:27:17 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 02:27:17 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 02:27:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-02 02:48:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (21717, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 720059, 2025-04-02 02:48:12, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 02:48:12 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (21717, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 720059, 2025-04-02 02:48:12, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('720059', NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2025-04-02 02:48:12')
ERROR - 2025-04-02 02:48:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (21718, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 720059, 2025-04-02 02:48:16, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 02:48:16 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (21718, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 720059, 2025-04-02 02:48:16, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('720059', NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2025-04-02 02:48:16')
ERROR - 2025-04-02 04:39:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 04:39:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 04:39:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 04:39:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 04:39:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 04:39:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 04:39:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 04:39:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 04:40:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 04:40:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 04:43:02 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-02 04:43:02 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-02 04:43:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 04:43:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 04:43:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5888373, '922', 1017.648, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 04:43:51 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5888373, '922', 1017.648, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5888373, '922', 1017.648, '1', '2.00', NULL, 'null')
ERROR - 2025-04-02 04:44:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 04:44:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 05:01:02 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-02 05:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 05:54:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 05:54:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:00:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('817779', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:00:03 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('817779', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('817779', '2', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 06:05:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:05:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:05:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5888392, '182', 13800, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:05:45 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5888392, '182', 13800, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5888392, '182', 13800, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 06:05:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:05:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:06:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:06:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:06:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:06:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:06:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:06:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:06:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:06:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:06:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:06:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:06:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:06:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:06:41 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-02 06:06:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:06:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:07:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:07:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:07:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:07:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:07:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:07:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:15:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:15:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:15:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5888432, '670', 5661, '200', '3.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:15:53 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5888432, '670', 5661, '200', '3.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5888432, '670', 5661, '200', '3.00', 'Ya', 'null')
ERROR - 2025-04-02 06:16:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:16:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:16:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:16:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:16:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:16:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:16:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:16:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:17:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:17:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:25:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 06:28:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-02 06:37:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5888453, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:37:12 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5888453, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5888453, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 06:38:24 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-02 06:41:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 06:42:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 06:42:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 06:45:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 06:48:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 06:48:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 06:52:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 06:58:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:02:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 07:06:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 07:10:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 07:10:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:12:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:19:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:20:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 07:20:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 07:34:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:39:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:43:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:47:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:48:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:49:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:49:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 07:49:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 07:56:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 07:56:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 07:56:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 07:56:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 07:56:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 08:00:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:00:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 08:06:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 08:06:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...nerima_pagi&quot;, &quot;id_users&quot;) VALUES ('720060', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:06:29 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...nerima_pagi", "id_users") VALUES ('720060', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('720060', NULL, '', NULL, '2025-04-02 13:30:00', 'hipertermi, bersihan jalan napas tidak efektif', 'RL 7 tpm', 'Monitor suhu tubuh, beri posisi nyaman', '604', '583', '2020')
ERROR - 2025-04-02 08:06:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...nerima_pagi&quot;, &quot;id_users&quot;) VALUES ('720060', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:06:34 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...nerima_pagi", "id_users") VALUES ('720060', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('720060', NULL, '', NULL, '2025-04-02 13:30:00', 'hipertermi, bersihan jalan napas tidak efektif', 'RL 7 tpm', 'Monitor suhu tubuh, beri posisi nyaman', '604', '583', '2020')
ERROR - 2025-04-02 08:08:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 08:08:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 08:08:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 08:08:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 08:12:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:12:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 08:14:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:14:25 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT "kode_bpjs"
FROM "sm_tenaga_medis"
WHERE "id" = ''
ERROR - 2025-04-02 08:15:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...nerima_pagi&quot;, &quot;id_users&quot;) VALUES ('720040', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:15:51 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...nerima_pagi", "id_users") VALUES ('720040', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('720040', NULL, '', NULL, '2025-04-02 13:30:00', 'Diare', 'D51/2ns 22 tpm', 'R/ FL', '604', '583', '2020')
ERROR - 2025-04-02 08:16:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...nerima_pagi&quot;, &quot;id_users&quot;) VALUES ('720040', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:16:08 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...nerima_pagi", "id_users") VALUES ('720040', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('720040', NULL, '', NULL, '2025-04-02 13:30:00', 'Diare', 'D51/2ns 22 tpm', 'R/ FL', '604', '583', '2020')
ERROR - 2025-04-02 08:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 08:26:22 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 08:27:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (817805, '4', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:27:02 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (817805, '4', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (817805, '4', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'null', '0', '', '0', 'MORN, NOON, EVE', '6', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 08:30:53 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2181
ERROR - 2025-04-02 08:30:53 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2225
ERROR - 2025-04-02 08:34:39 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-02 08:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 08:46:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 08:46:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 08:46:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 08:48:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 01:50:31 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-04-02 01:50:31 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-04-02 01:50:31 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-04-02 01:50:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-04-02 01:50:31 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-04-02 01:50:31 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-04-02 08:50:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 08:51:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 08:51:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:51:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-02 08:51:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:51:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-02 08:54:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ... NULL, '-', NULL, NULL, NULL, '-', '-', '-', '-', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 08:54:17 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ... NULL, '-', NULL, NULL, NULL, '-', '-', '-', '-', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_maternal_igd" ("id_layanan_pendaftaran", "pm_waktu_kajian", "pm_diperoleh", "pm_diperoleh_sebutkan", "pm_cara_masuk", "pm_keluhan_utama", "pm_kontraksi", "pm_waktu_kontraksi", "pm_lendir", "pm_waktu_lendir", "pm_ketuban", "pm_waktu_ketuban", "pm_warna_ketuban", "pm_darah", "pm_darah_sebutkan", "pm_lainnya", "pm_lainnya_sebutkan", "pm_hamil_muda", "pm_hamil_muda_muntah", "pm_hamil_muda_pendarahan", "pm_hamil_muda_lain", "pm_hamil_muda_sebutkan", "pm_hamil_tua", "pm_hamil_tua_kepala", "pm_hamil_tua_pendarahan", "pm_hamil_tua_lain", "pm_hamil_tua_sebutkan", "pm_anc_x", "pm_anc_lokasi", "pm_anc", "pm_anc_tidak_teratur", "pm_anc_imunisasi", "pm_nifas_g", "pm_nifas_p", "pm_nifas_a", "pm_nifas_hidup", "pm_waktu_partus_1", "pm_tempat_partus_1", "pm_umur_hamil_1", "pm_jenis_persalinan_1", "pm_penolong_persalinan_1", "pm_penyulit_1", "pm_nifas_1", "pm_kelamin_1", "pm_keadaan_1", "pm_waktu_partus_2", "pm_tempat_partus_2", "pm_umur_hamil_2", "pm_jenis_persalinan_2", "pm_penolong_persalinan_2", "pm_penyulit_2", "pm_nifas_2", "pm_kelamin_2", "pm_keadaan_2", "pm_waktu_partus_3", "pm_tempat_partus_3", "pm_umur_hamil_3", "pm_jenis_persalinan_3", "pm_penolong_persalinan_3", "pm_penyulit_3", "pm_nifas_3", "pm_kelamin_3", "pm_keadaan_3", "pm_waktu_partus_4", "pm_tempat_partus_4", "pm_umur_hamil_4", "pm_jenis_persalinan_4", "pm_penolong_persalinan_4", "pm_penyulit_4", "pm_nifas_4", "pm_kelamin_4", "pm_keadaan_4", "pm_waktu_partus_5", "pm_tempat_partus_5", "pm_umur_hamil_5", "pm_jenis_persalinan_5", "pm_penolong_persalinan_5", "pm_penyulit_5", "pm_nifas_5", "pm_kelamin_5", "pm_keadaan_5", "pm_waktu_partus_6", "pm_tempat_partus_6", "pm_umur_hamil_6", "pm_jenis_persalinan_6", "pm_penolong_persalinan_6", "pm_penyulit_6", "pm_nifas_6", "pm_kelamin_6", "pm_keadaan_6", "pm_umur_menarche", "pm_umur_menarche_sebutkan", "pm_lama_haid", "pm_pembalut", "pm_dismenorroe", "pm_spoting", "pm_menorrhagia", "pmm_metrorhagia", "pm_menstrual", "pm_hpht", "pm_taksiran", "pm_asma", "pm_hipertensi", "pm_jantung", "pm_diabetes", "pm_penyakit_lain", "pm_penyakit_lain_sebutkan", "pm_kesadaran", "pm_sistolik", "pm_suhu_sistolik", "pm_diastolik", "pm_cgs_e", "pm_cgs_m", "pm_cgs_v", "pm_cgs_total", "pm_spo2", "pm_frekuensi_nadi", "pm_frekuensi_nafas", "pm_membesar", "pm_melebar", "pm_pelebaran", "pm_linea_alba", "pm_linea_nigra", "pm_striae_livide", "pm_striae_albican", "pm_luka", "pm_luka_lain", "pm_luka_lain_sebutkan", "pm_tfu", "pm_leopold_1", "pm_leopold_bokong", "pm_leopold_lain", "pm_leopold_1_sebutkan", "pm_leopold_2", "pm_leopold_punggung", "pm_leopold_lainn", "pm_leopold_2_sebutkan", "pm_leopold_3", "pm_leopold_bokonggg", "pm_leopold_lainnn", "pm_leopold_3_sebutkan", "pm_leopold_4", "pm_leopold_bokongggg", "pm_janin_masuk", "pm_taksiran_janin", "pm_djj_x", "pm_djj", "pm_gerak_janin", "pm_his_x", "pm_his_detik", "pm_his_kekuatan", "pm_vulva", "pm_vulva_sebutkan", "pm_pengeluaran_lendir", "pm_pengeluaran_ketuban", "pm_pengeluaran_ketuban_warna", "pm_pengeluaran_flex", "pm_pengeluaran_darah", "pm_pengeluaran_darah_sebanyak", "pm_pengeluaran_lain", "pm_pengeluaran_lain_sebutkan", "pm_introitus", "pm_introitus_sebutkan", "pm_porsio", "pm_porsio_sebutkan", "pm_pembukaan", "pm_pembukaan_ketuban", "pm_pembukaan_ketuban_warna", "pm_hodge", "pm_uuk", "pm_moulage", "pm_nyeri_porsio", "pm_jatuh", "pm_diagnosis", "pm_kursi_roda", "pm_kursi_roda_ya", "pm_kruk", "pm_kruk_ya", "pm_pegangan", "pm_pegangan_ya", "pm_heparin", "pm_imobilisasi", "pm_imobilisasi_ya", "pm_lemah", "pm_lemah_ya", "pm_terganggu", "pm_terganggu_ya", "pm_kemampuan", "pm_kemampuan_ya", "pm_lupa", "pm_lupa_ya", "pm_jumlah_skor", "pm_skala_nyeri", "pm_kualitas_nyeri", "pm_frekuensi_nyeri", "pm_pemberat_nyeri", "pm_lama_nyeri", "pm_pengurang_nyeri", "pm_alergi", "pm_alergi_obat", "pm_alergi_obat_reaksi", "pm_alergi_makan", "pm_alergi_makan_reaksi", "pm_alergi_lain", "pm_alergi_lain_reaksi", "pm_alergi_obat_konsumsi", "pm_berat_badan", "pm_berat_badan_kg", "pm_berat_badan_sebutkan", "pm_berat_badan_t", "pm_fungsional", "pm_fungsional_sebutkan", "pm_psikologis", "pm_psikologis_sebutkan", "pm_mental", "pm_mental_sebutkan", "pm_pekerjaan", "pm_bayar", "pm_bayar_asuransi_sebutkan", "pm_bayar_sebutkan", "pm_bayar_t", "pm_keagamaan", "pm_ibadah", "pm_ibadah_sebutkan", "pm_thaharoh", "pm_sholat", "pm_banyak_makan", "pm_waktu_makan", "pm_banyak_minum", "pm_waktu_minum", "pm_banyak_bak", "pm_waktu_bak", "pm_banyak_bab", "pm_waktu_bab", "pm_sex", "sews_respirasit", "sews_saturasit", "sews_o2t", "sews_suhut", "sews_td_sintolikt", "sews_td_diastolikt", "sews_nadit", "sews_kesadarant", "sews_nyerit", "sews_pengeluwarant", "sews_proteint", "pm_meows", "sews_laju_respirasio", "sews_saturasio", "sews_suplemeno", "sews_temperaturo", "sews_tdso", "sews_laju_jantungo", "sews_kesadarano", "pm_news", "pm_tanggal_lab", "pm_hasil_lab", "pm_tanggal_cgt", "pm_hasil_cgt", "pm_penunjang_lain", "pm_infeksi", "pm_pendarahan", "pm_nausea", "pm_gawat_jalan", "pm_anxietas", "pm_nyeri_melahirkan", "pm_pola_nafas", "pm_kebutuhan_lain", "pm_kebutuhan_sebutkan", "pm_asuhan_jelaskan", "pm_asuhan_laporkan", "pm_asuhan_fasilitas", "pm_asuhan_masalah", "pm_asuhan_observasi", "pm_asuhan_edukasi", "pm_asuhan_lain", "pm_asuhan_sebutkan", "pm_waktu_bidan", "pm_waktu_dpjp", "pm_bidan", "pm_dpjp", "pm_paraf_bidan", "pm_paraf_dpjp", "created_date") VALUES ('720074', '2025-04-02 08:15', '1', NULL, '2', 'nyeri perut saat di tekan sebelah kanan. muntah 1x, mual (-). flek (-).', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'sudah menikah 3th belum memiliki anak', NULL, NULL, NULL, '1', '-', NULL, NULL, NULL, '1', '-', NULL, '-', NULL, NULL, NULL, '-', '-', '-', '-', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '15', '7', '3', NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, '1', '-', '1', '114', '36.5', '62', '4', '6', '5', '15', '100', '68', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '-', NULL, NULL, NULL, '1', '-', NULL, NULL, '1', '-', NULL, NULL, '1', '-', NULL, NULL, '-', NULL, NULL, NULL, NULL, NULL, NULL, '-', '2', '-', NULL, NULL, NULL, NULL, NULL, NULL, '1', '-', '2', '-', '2', '-', '-', NULL, NULL, '-', '-', '-', NULL, '0', '15', NULL, NULL, NULL, NULL, NULL, NULL, '20', '1', '0', NULL, NULL, NULL, NULL, '1', '0', NULL, NULL, '35', '3', '-', '-', '-', '-', '-', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '1', NULL, '1', NULL, '5', '2', NULL, NULL, NULL, 'kristen', '3', 'menstruasi', NULL, NULL, '1', '21:00', '2', '07:00', '2', '08:00', '1', '05:00', 'bln kemarin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0_3', '0_4', '0_2', '0_3', '0_3', '0_2', '0_1', 'Putih', '02/04/2025', 'terlampir', '-', '-', '-', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '2025-04-02 08:15', '2025-04-02 08:15', '290', '45', '1', '1', '2025-04-02 08:54:17')
ERROR - 2025-04-02 08:55:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 08:59:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 08:59:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 09:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 09:02:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 09:04:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 09:04:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 09:06:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 09:06:48 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-02 09:06:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 09:06:48 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-02 09:07:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 09:16:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 09:18:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 09:20:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 09:20:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 09:27:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 09:27:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 09:27:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 09:27:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 09:28:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 09:28:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 09:28:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 09:28:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 09:28:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 09:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 10:02:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 10:02:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 10:08:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 10:08:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 10:18:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 10:35:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8378
ERROR - 2025-04-02 10:37:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 10:37:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 10:39:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-02 10915&quot;
LINE 1: ..._kdpi_6&quot;:&quot;JERNIH&quot;,&quot;riwayat_kdpi_7&quot;:&quot;TIDAK ADA&quot;}', '2025-04-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 10:39:19 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-02 10915"
LINE 1: ..._kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-0...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_neonatus" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "tanggal_jam_pengkajian", "membawa_obat", "cara_masuk_irj_neonatus", "cara_masuk_igd_neonatus", "cara_masuk_lain_neonatus", "cara_masuk_lain_lain_neonatus", "nama_ayah", "nama_ibu", "riwayat_kehamilan_persalinan", "tanggal_lahir_riwayat", "riwayat_kehamilan_bayi", "riwayat_kehamilan_bayii", "apgar_frekuensi_jantung", "apgar_usaha_nafas", "apgar_tonus_otot", "apgar_refleksi", "apgar_warna", "apgar_skor_1", "apgar_skor_2", "pemeriksaan_fisik_dan_ttv", "neonatusj", "ket_nyerii", "pengkajian_nyeri_kepala", "pengkajian_nyeri_mata", "pengkajian_nyeri_tht", "pengkajian_nyeri_mulut", "pengkajian_nyeri_gigi", "pengkajian_nyeri_leher", "pengkajian_nyeri_dada", "pengkajian_nyeri_paru_paru", "pengkajian_nyeri_jantung", "pengkajian_nyeri_extremitas_atas", "pengkajian_nyeri_abdomen", "pengkajian_nyeri_umbilikal", "pengkajian_nyeri_genetalia", "pengkajian_nyeri_anus", "pengkajian_nyeri_kulit", "pengkajian_nyeri_refleks", "pengkajian_nyeri_otot_tonus", "pengkajian_nyeri_ektremitas_bawah", "pews_pernafasan", "pews_alat_bantu", "pews_saturasi", "pews_nadi", "pews_warna_kulit", "pews_tds", "pews_total", "skrining_usia", "skrining_nafas", "skrining_sepsis", "skrining_multiple", "skrining_stadium", "data_penunjang_tgl_lab", "data_penunjang_tgl_radiologi", "data_penunjang_hasil", "data_penunjang_hasil1", "data_penunjang_lain_lain", "masalah_keperawatann", "kriteria_discharge_planingg", "perencanaan_pulangg", "tanggal_jam_perawat", "id_perawat", "ceklis_ttd_perawat", "tanggal_jam_dokter", "id_dokter", "ceklis_ttd_dokter", "created_date") VALUES ('720093', '664641', '2046', '2025-04-02 10:32', 'tidak', NULL, NULL, NULL, NULL, '{"data_ayah_1":"MUHAMAD ALI","data_ayah_2":"38","data_ayah_3":"ISLAM","data_ayah_4":"WIRASWASTA","data_ayah_5":"-","data_ayah_6":" JL.AL HIDAYAH RT. 01\/04 PORIS PLAWAD INDAH CIPONDOH KOTA TANGERANG BANTEN 15141","data_ayah_7":"0895611911840"}', '{"data_ibu_1":"NURLAYLA","data_ibu_2":"38","data_ibu_3":"ISLAM","data_ibu_4":"IBU RUMAH TANGGA","data_ibu_5":"-","data_ibu_6":" JL.AL HIDAYAH RT. 01\/04 PORIS PLAWAD INDAH CIPONDOH KOTA TANGERANG BANTEN 15141","data_ibu_7":"0895611911840"}', '{"riwayat_kdpi_1":"G3P2A0","riwayat_kdpi_2":"38","riwayat_kdpi_3":"SPONTAN PERVAGINAM","riwayat_kdpi_4":"KPD > 24 JAM , HDK","riwayat_kdpi_5":"DOKTER","riwayat_kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-02 10915', '{"riwayat_kb_1":"PEREMPUAN","riwayat_kb_2":"8\/9","riwayat_kb_3":"TUNGGAL","riwayat_kb_4":"TIDAK","riwayat_kb_5":"YA"}', '{"riwayat_kb_6":"2100","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"ADA","riwayat_kb_10":"BELUM","riwayat_kb_11":"BELUM"}', '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', '{"apgar_refleksi_1":null,"apgar_refleksi_2":"1","apgar_refleksi_3":null,"apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', '{"apgar_warna_1":null,"apgar_warna_2":null,"apgar_warna_3":"2","apgar_warna_4":"1","apgar_warna_6":"1"}', '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"1","total_skor_1_1_1_1":"1","total_skor_1_1_1_1_1":"2"}', '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"1","total_skor_2_2_2_2_2":"2"}', '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.6","pemeriksaan_fdttl_3":"138","pemeriksaan_fdttl_4":"42"}', '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', '{"ptn_keterangan":"Tidak Nyeri"}', '{"kepalaa_1":"1","kepalaa_2":null,"kepalaa_3":null,"kepalaa_4":null,"kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":null,"kepalaa_10":null,"kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":null,"kepalaa_14":null}', '{"mataa_1":null,"mataa_2":null,"mataa_3":"1","mataa_4":null,"mataa_5":null,"mataa_6":null,"mataa_7":null,"mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":null,"tht_6":null}', '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":null,"mulut_7":null}', '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', '{"leher_1":"1","leher_2":null,"leher_3":null}', '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"TIDAK ADA","dada_6":"1","dada_7":null}', '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":null,"paru_10":"1","paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"42","paru_16":null,"paru_17":null,"paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":null,"paru_25":null}', '{"jantung_1":null,"jantung_2":"1","jantung_3":null,"jantung_4":null}', '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":null,"ardomen_6":null,"ardomen_7":"1","ardomen_8":"26"}', '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', '{"genetalia_1":"1","genetalia_2":"TIDAK ADA KELAINAN","genetalia_3":null,"genetalia_4":null}', '{"anus_1":"1"}', '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":null,"kulit_6":null,"kulit_7":null,"kulit_8":null}', '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', '0_3', '0_3', '0_3', '0_1', '0_3', '0_1', 'putih', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, '{"masalah_keperawatan_1_neonatus":null,"masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RESIKO HIPOTERMI"}', '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"1","discharge_planning_noenatus_3":"1","discharge_planning_noenatus_4":"1"}', '{"kriteria_discharge_noenatus_1":"1","kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":"1","kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":"1","kriteria_discharge_noenatus_10":"PERAWATAN TALI PUSAT, ASI EKSKLUSIF"}', '2025-04-02 10:32', '609', '1', '2025-04-02 10:40', '674', '1', '2025-04-02 10:39:19')
ERROR - 2025-04-02 10:40:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-02 10915&quot;
LINE 1: ..._kdpi_6&quot;:&quot;JERNIH&quot;,&quot;riwayat_kdpi_7&quot;:&quot;TIDAK ADA&quot;}', '2025-04-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 10:40:06 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-02 10915"
LINE 1: ..._kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-0...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_neonatus" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "tanggal_jam_pengkajian", "membawa_obat", "cara_masuk_irj_neonatus", "cara_masuk_igd_neonatus", "cara_masuk_lain_neonatus", "cara_masuk_lain_lain_neonatus", "nama_ayah", "nama_ibu", "riwayat_kehamilan_persalinan", "tanggal_lahir_riwayat", "riwayat_kehamilan_bayi", "riwayat_kehamilan_bayii", "apgar_frekuensi_jantung", "apgar_usaha_nafas", "apgar_tonus_otot", "apgar_refleksi", "apgar_warna", "apgar_skor_1", "apgar_skor_2", "pemeriksaan_fisik_dan_ttv", "neonatusj", "ket_nyerii", "pengkajian_nyeri_kepala", "pengkajian_nyeri_mata", "pengkajian_nyeri_tht", "pengkajian_nyeri_mulut", "pengkajian_nyeri_gigi", "pengkajian_nyeri_leher", "pengkajian_nyeri_dada", "pengkajian_nyeri_paru_paru", "pengkajian_nyeri_jantung", "pengkajian_nyeri_extremitas_atas", "pengkajian_nyeri_abdomen", "pengkajian_nyeri_umbilikal", "pengkajian_nyeri_genetalia", "pengkajian_nyeri_anus", "pengkajian_nyeri_kulit", "pengkajian_nyeri_refleks", "pengkajian_nyeri_otot_tonus", "pengkajian_nyeri_ektremitas_bawah", "pews_pernafasan", "pews_alat_bantu", "pews_saturasi", "pews_nadi", "pews_warna_kulit", "pews_tds", "pews_total", "skrining_usia", "skrining_nafas", "skrining_sepsis", "skrining_multiple", "skrining_stadium", "data_penunjang_tgl_lab", "data_penunjang_tgl_radiologi", "data_penunjang_hasil", "data_penunjang_hasil1", "data_penunjang_lain_lain", "masalah_keperawatann", "kriteria_discharge_planingg", "perencanaan_pulangg", "tanggal_jam_perawat", "id_perawat", "ceklis_ttd_perawat", "tanggal_jam_dokter", "id_dokter", "ceklis_ttd_dokter", "created_date") VALUES ('720093', '664641', '2046', '2025-04-02 10:32', 'tidak', NULL, NULL, NULL, NULL, '{"data_ayah_1":"MUHAMAD ALI","data_ayah_2":"38","data_ayah_3":"ISLAM","data_ayah_4":"WIRASWASTA","data_ayah_5":"-","data_ayah_6":" JL.AL HIDAYAH RT. 01\/04 PORIS PLAWAD INDAH CIPONDOH KOTA TANGERANG BANTEN 15141","data_ayah_7":"0895611911840"}', '{"data_ibu_1":"NURLAYLA","data_ibu_2":"38","data_ibu_3":"ISLAM","data_ibu_4":"IBU RUMAH TANGGA","data_ibu_5":"-","data_ibu_6":" JL.AL HIDAYAH RT. 01\/04 PORIS PLAWAD INDAH CIPONDOH KOTA TANGERANG BANTEN 15141","data_ibu_7":"0895611911840"}', '{"riwayat_kdpi_1":"G3P2A0","riwayat_kdpi_2":"38","riwayat_kdpi_3":"SPONTAN PERVAGINAM","riwayat_kdpi_4":"KPD > 24 JAM , HDK","riwayat_kdpi_5":"DOKTER","riwayat_kdpi_6":"JERNIH","riwayat_kdpi_7":"TIDAK ADA"}', '2025-04-02 10915', '{"riwayat_kb_1":"PEREMPUAN","riwayat_kb_2":"8\/9","riwayat_kb_3":"TUNGGAL","riwayat_kb_4":"TIDAK","riwayat_kb_5":"YA"}', '{"riwayat_kb_6":"2100","riwayat_kb_7":"30","riwayat_kb_8":"28","riwayat_kb_9":"ADA","riwayat_kb_10":"BELUM","riwayat_kb_11":"BELUM"}', '{"apgar_frekuensi_1":null,"apgar_frekuensi_2":null,"apgar_frekuensi_3":"2","apgar_frekuensi_4":"0","apgar_frekuensi_6":"0"}', '{"apgar_usaha_1":null,"apgar_usaha_2":null,"apgar_usaha_3":"2","apgar_usaha_4":"1","apgar_usaha_6":"1"}', '{"apgar_tonus_1":null,"apgar_tonus_2":null,"apgar_tonus_3":"2","apgar_tonus_4":"1","apgar_tonus_6":"1"}', '{"apgar_refleksi_1":null,"apgar_refleksi_2":"1","apgar_refleksi_3":null,"apgar_refleksi_4":"1","apgar_refleksi_6":"1"}', '{"apgar_warna_1":null,"apgar_warna_2":null,"apgar_warna_3":"2","apgar_warna_4":"1","apgar_warna_6":"1"}', '{"total_skor_1":"2","total_skor_1_1":"2","total_skor_1_1_1":"1","total_skor_1_1_1_1":"1","total_skor_1_1_1_1_1":"2"}', '{"total_skor_2":"2","total_skor_2_2":"2","total_skor_2_2_2":"2","total_skor_2_2_2_2":"1","total_skor_2_2_2_2_2":"2"}', '{"pemeriksaan_fdttl_1":"CM","pemeriksaan_fdttl_2":"36.6","pemeriksaan_fdttl_3":"138","pemeriksaan_fdttl_4":"42"}', '{"menangisj":"0","spoj":"0","vitalj":"0","wajahj":"0","tidurj":"0","total_neonatusj":"0"}', '{"ptn_keterangan":"Tidak Nyeri"}', '{"kepalaa_1":"1","kepalaa_2":null,"kepalaa_3":null,"kepalaa_4":null,"kepalaa_5":null,"kepalaa_6":"1","kepalaa_7":null,"kepalaa_8":null,"kepalaa_9":null,"kepalaa_10":null,"kepalaa_11":"1","kepalaa_12":"1","kepalaa_13":null,"kepalaa_14":null}', '{"mataa_1":null,"mataa_2":null,"mataa_3":"1","mataa_4":null,"mataa_5":null,"mataa_6":null,"mataa_7":null,"mataa_8":null,"mataa_9":null,"mataa_10":null,"mataa_11":null}', '{"tht_1":"1","tht_2":null,"tht_3":"1","tht_4":null,"tht_5":null,"tht_6":null}', '{"mulut_1":"1","mulut_2":null,"mulut_3":null,"mulut_4":null,"mulut_5":null,"mulut_6":null,"mulut_7":null}', '{"gigi_1":"1","gigi_2":null,"gigi_3":null}', '{"leher_1":"1","leher_2":null,"leher_3":null}', '{"dada_1":null,"dada_2":null,"dada_3":null,"dada_4":"1","dada_5":"TIDAK ADA","dada_6":"1","dada_7":null}', '{"paru_1":"1","paru_2":null,"paru_3":null,"paru_4":null,"paru_5":null,"paru_6":"1","paru_7":null,"paru_8":null,"paru_9":null,"paru_10":"1","paru_11":"1","paru_12":null,"paru_13":null,"paru_14":"1","paru_15":"42","paru_16":null,"paru_17":null,"paru_18":"1","paru_19":null,"paru_20":"0","paru_22":null,"paru_23":null,"paru_24":null,"paru_25":null}', '{"jantung_1":null,"jantung_2":"1","jantung_3":null,"jantung_4":null}', '{"extremitas_1":"1","extremitas_2":null,"extremitas_3":null,"extremitas_4":null,"extremitas_5":null,"extremitas_6":"1","extremitas_7":null}', '{"ardomen_1":"1","ardomen_2":null,"ardomen_3":null,"ardomen_4":null,"ardomen_5":null,"ardomen_6":null,"ardomen_7":"1","ardomen_8":"26"}', '{"umbilikal_1":"1","umbilikal_2":null,"umbilikal_3":null,"umbilikal_4":null}', '{"genetalia_1":"1","genetalia_2":"TIDAK ADA KELAINAN","genetalia_3":null,"genetalia_4":null}', '{"anus_1":"1"}', '{"kulit_1":"1","kulit_2":null,"kulit_3":null,"kulit_4":null,"kulit_5":null,"kulit_6":null,"kulit_7":null,"kulit_8":null}', '{"refleks_1":"1","refleks_2":"1","refleks_3":"1","refleks_4":"1","refleks_5":"1","refleks_6":"1"}', '{"tonus_1":"1","tonus_2":null,"tonus_3":null,"tonus_4":null,"tonus_5":null,"tonus_6":null,"tonus_7":null,"tonus_8":null}', '{"extremitass_1":"1","extremitass_2":null,"extremitass_3":"1","extremitass_4":null,"extremitass_5":null}', '0_3', '0_3', '0_3', '0_1', '0_3', '0_1', 'putih', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, '{"masalah_keperawatan_1_neonatus":null,"masalah_keperawatan_2_neonatus":null,"masalah_keperawatan_3_neonatus":null,"masalah_keperawatan_4_neonatus":null,"masalah_keperawatan_5_neonatus":null,"masalah_keperawatan_6_neonatus":null,"masalah_keperawatan_7_neonatus":null,"masalah_keperawatan_8_neonatus":null,"masalah_keperawatan_9_neonatus":null,"masalah_keperawatan_10_neonatus":null,"masalah_keperawatan_11_neonatus":null,"masalah_keperawatan_12_neonatus":null,"masalah_keperawatan_13_neonatus":null,"masalah_keperawatan_14_neonatus":null,"masalah_keperawatan_15_neonatus":null,"masalah_keperawatan_16_neonatus":null,"masalah_keperawatan_17_neonatus":null,"masalah_keperawatan_18_neonatus":null,"masalah_keperawatan_19_neonatus":null,"masalah_keperawatan_20_neonatus":null,"masalah_keperawatan_21_neonatus":null,"masalah_keperawatan_22_neonatus":null,"masalah_keperawatan_23_neonatus":null,"masalah_keperawatan_24_neonatus":null,"masalah_keperawatan_25_neonatus":null,"masalah_keperawatan_26_neonatus":null,"masalah_keperawatan_27_neonatus":null,"masalah_keperawatan_28_neonatus":null,"masalah_keperawatan_29_neonatus":null,"masalah_keperawatan_30_neonatus":null,"masalah_keperawatan_31_neonatus":null,"masalah_keperawatan_32_neonatus":null,"masalah_keperawatan_33_neonatus":null,"masalah_keperawatan_34_neonatus":null,"masalah_keperawatan_35_neonatus":null,"masalah_keperawatan_36_neonatus":"1","masalah_keperawatan_lain_input_neonatus":"RESIKO HIPOTERMI"}', '{"discharge_planning_noenatus_1":"0","discharge_planning_noenatus_2":"1","discharge_planning_noenatus_3":"1","discharge_planning_noenatus_4":"1"}', '{"kriteria_discharge_noenatus_1":"1","kriteria_discharge_noenatus_2":null,"kriteria_discharge_noenatus_3":null,"kriteria_discharge_noenatus_4":null,"kriteria_discharge_noenatus_5":"1","kriteria_discharge_noenatus_6":null,"kriteria_discharge_noenatus_7":null,"kriteria_discharge_noenatus_8":null,"kriteria_discharge_noenatus_9":"1","kriteria_discharge_noenatus_10":"PERAWATAN TALI PUSAT, ASI EKSKLUSIF"}', '2025-04-02 10:32', '609', '1', '2025-04-02 10:40', '674', '1', '2025-04-02 10:40:06')
ERROR - 2025-04-02 10:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 10:45:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 10:45:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 10:45:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 10:47:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 10:47:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 10:47:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 10:50:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 10:50:19 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-02 10:50:19 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-02 10:51:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 11:02:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 11:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 11:10:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (817879, '2', '1', '', 'Infus...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:10:15 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (817879, '2', '1', '', 'Infus...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (817879, '2', '1', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 11:20:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:20:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:22:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:22:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:23:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 11:25:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:25:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 15: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_antrian_bpjs" as "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
LEFT JOIN "sm_surat_kontrol" as "skk" ON "skk"."id_layanan_pendaftaran"="lp"."id"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-04-02 00:00:00' AND '2025-04-02 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-04-02 11:25:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;jd&quot;
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:25:41 --> Query error: ERROR:  syntax error at or near "jd"
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ - Invalid query: SELECT sum(kuota) kuota, sum(jml_kunjung) jml_kunjung, sum(jml_checkin) jml_checkin, sum(jml_kunjung) - sum(jml_checkin) jml_booking, string_agg(nama_dokter, ' & ') nama_dokter
FROM ( select jd.id, "jd"."id_dokter", "jd"."nama_dokter", "jd"."kuota", "jd"."jml_kunjung", "kd"."jml_checkin", jd.jml_kunjung-kd.jml_checkin jml_booking
                                    from sm_jadwal_dokter jd 
                                    left join (select lp.id_dokter, count(lp.id_dokter) jml_checkin
                                                from sm_layanan_pendaftaran lp
                                                where lp.tanggal_layanan between '2025-04-02 00:00:00' and '2025-04-02 23:59:59'
                                                and lp.id_unit_layanan=null and lp.status_terlayani!='Batal'
                                                GROUP BY lp.id_dokter) kd on jd.id_dokter=kd.id_dokter
                                    where jd.id_poli=nulland jd.tanggal between '2025-04-02' and '2025-04-02'
                                    ) kuota
ERROR - 2025-04-02 11:25:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:25:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 15: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_antrian_bpjs" as "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
LEFT JOIN "sm_surat_kontrol" as "skk" ON "skk"."id_layanan_pendaftaran"="lp"."id"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-04-02 00:00:00' AND '2025-04-02 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-04-02 04:27:06 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-04-02 04:27:06 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-04-02 04:27:06 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-04-02 04:27:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-04-02 04:27:06 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-04-02 04:27:06 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-04-02 11:28:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 11:28:29 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 11:28:29 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 11:31:44 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-02 11:32:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:32:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:33:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:33:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:33:16 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-02 11:33:16 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-02 11:33:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:33:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:33:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:33:56 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT "kode_bpjs"
FROM "sm_tenaga_medis"
WHERE "id" = ''
ERROR - 2025-04-02 11:34:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:34:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:38:38 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-02 11:39:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 11:39:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 11:41:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 11:42:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:42:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:42:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 11:43:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:43:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:44:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:44:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:44:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:44:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:44:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('817892', '2', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:44:40 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('817892', '2', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('817892', '2', '', '1', '1 X SEHARI 2,5 ML ( 1/2 SENDOK )', 'PAGI', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 11:45:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:45:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:45:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:45:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:45:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:45:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:46:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:46:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:46:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:46:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:46:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 11:46:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 11:54:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 11:55:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 11:57:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 12:00:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 12:09:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 12:13:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AN...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 12:13:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1692' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AND lp.tindak_lanjut is null order by ri.id desc  limit 10 offset 0
ERROR - 2025-04-02 12:21:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 12:21:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 12:22:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 12:22:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 12:24:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 12:29:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 12:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 12:35:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 12:35:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 12:42:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 12:42:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 12:49:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 12:49:05 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('720086', '2025-04-02 09:28', '2025-04-02 12:40', 'IGD', 'albasia', 'KAD + Abd pain ec Dyspepsia dd gastropathy DM + DM tipe II+ curiga polisitemia vera + hiperkalemia +HipoNatremia', NULL, '438', '1', NULL, ' Nyeri ulu hati sejak 3 hari SMRS, nyeri dirasakan melilit dan terus menerus. hari ini memberat, hingga membuat pasien merasa sesak (+), nafas pendek dan dangkal. dada terasa tidak nyaman dan panas (+), berdebar-debar (+). mual (+) muntah (+) dengan frekuensi 3-4x/ hari', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '135', '89', '36.5', '120', '24', '0', NULL, '0', NULL, '1', 'sedang', '1', '1', '0', NULL, '1', '2025-04-02', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-04-02', NULL, NULL, NULL, NULL, NULL, NULL, ' NS 1Liter loading. i', ' inj insulin 20 iu. 
Inj omeprazole 40mg
 inj Ondan 4mg
', '1', 'DR, GDS stick 309, elek, ur, cr, keton', '1', 'RO thorak', '1', 'EKG', 'memasang infus', 'Cek GDS per 4 jam

Cek elektrolit per hari

Pasang DC

Rawat HCU

Monitor TNRS IO', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 12:49', NULL, '597', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 12:49:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 12:49:22 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('720086', '2025-04-02 09:28', '2025-04-02 12:40', 'IGD', 'albasia', 'KAD + Abd pain ec Dyspepsia dd gastropathy DM + DM tipe II+ curiga polisitemia vera + hiperkalemia +HipoNatremia', NULL, '438', '1', NULL, ' Nyeri ulu hati sejak 3 hari SMRS, nyeri dirasakan melilit dan terus menerus. hari ini memberat, hingga membuat pasien merasa sesak (+), nafas pendek dan dangkal. dada terasa tidak nyaman dan panas (+), berdebar-debar (+). mual (+) muntah (+) dengan frekuensi 3-4x/ hari', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '135', '89', '36.5', '120', '24', '0', NULL, '0', NULL, '1', 'sedang', '1', '1', '0', NULL, '1', '2025-04-02', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-04-02', NULL, NULL, NULL, NULL, NULL, NULL, ' NS 1Liter loading. i', ' inj insulin 20 iu. 
Inj omeprazole 40mg
 inj Ondan 4mg
', '1', 'DR, GDS stick 309, elek, ur, cr, keton', '1', 'RO thorak', '1', 'EKG', 'memasang infus', 'Cek GDS per 4 jam

Cek elektrolit per hari

Pasang DC

Rawat HCU

Monitor TNRS IO', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 12:49', NULL, '325', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 12:55:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 12:55:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 13:02:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 13:06:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 13:07:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 13:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 13:26:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 13:33:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 13:33:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 13:43:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 13:43:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 13:54:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (817976, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 13:54:59 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (817976, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (817976, '3', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 13:58:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 13:58:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 13:58:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 13:58:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 13:59:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 14:00:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 14:05:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:05:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 14:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 14:12:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:12:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 15: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_antrian_bpjs" as "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
LEFT JOIN "sm_surat_kontrol" as "skk" ON "skk"."id_layanan_pendaftaran"="lp"."id"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-04-02 00:00:00' AND '2025-04-02 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-04-02 14:12:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;jd&quot;
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:12:34 --> Query error: ERROR:  syntax error at or near "jd"
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ - Invalid query: SELECT sum(kuota) kuota, sum(jml_kunjung) jml_kunjung, sum(jml_checkin) jml_checkin, sum(jml_kunjung) - sum(jml_checkin) jml_booking, string_agg(nama_dokter, ' & ') nama_dokter
FROM ( select jd.id, "jd"."id_dokter", "jd"."nama_dokter", "jd"."kuota", "jd"."jml_kunjung", "kd"."jml_checkin", jd.jml_kunjung-kd.jml_checkin jml_booking
                                    from sm_jadwal_dokter jd 
                                    left join (select lp.id_dokter, count(lp.id_dokter) jml_checkin
                                                from sm_layanan_pendaftaran lp
                                                where lp.tanggal_layanan between '2025-04-02 00:00:00' and '2025-04-02 23:59:59'
                                                and lp.id_unit_layanan=null and lp.status_terlayani!='Batal'
                                                GROUP BY lp.id_dokter) kd on jd.id_dokter=kd.id_dokter
                                    where jd.id_poli=nulland jd.tanggal between '2025-04-02' and '2025-04-02'
                                    ) kuota
ERROR - 2025-04-02 14:12:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:12:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 15: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_antrian_bpjs" as "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
LEFT JOIN "sm_surat_kontrol" as "skk" ON "skk"."id_layanan_pendaftaran"="lp"."id"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-04-02 00:00:00' AND '2025-04-02 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-04-02 14:12:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 14:14:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:14:00 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('719845', '2025-03-29 17:00', '2025-04-02 17:00', 'JATI', 'Meranti', 'ISK, Anemia, riw mioma uteri, cystitis, hepatomegali', '-', '579', '1', NULL, 'Nyeri saat BAK, lemas, pucat ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, '108', '71', '36.7', '81', '19', '0', NULL, '1', '3/10', '1', 'Sedang', '1', '1', '0', NULL, '1', '2025-04-02', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-03-29', NULL, NULL, NULL, NULL, NULL, NULL, 'RL 20 tpm', 'Ceftriaxone 1x2gr 
Paracetamol drip 3x1gr ', '1', 'Darah rutin tgl1/4', '1', 'Usg abdomen tgl 2/4', NULL, NULL, 'Sedang jalan Transfusi prc bag ke-2 sisa 0 di bank darah', 'Transfusi PRC 2 bag, sedang jalan bag ke-2, cek darah rutin post transfusi,
Lapor hasil ur cr tgl 2/4 tunggu hasil ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 17:00', NULL, '175', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 14:14:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:14:05 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('719845', '2025-03-29 17:00', '2025-04-02 17:00', 'JATI', 'Meranti', 'ISK, Anemia, riw mioma uteri, cystitis, hepatomegali', '-', '579', '1', NULL, 'Nyeri saat BAK, lemas, pucat ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, '108', '71', '36.7', '81', '19', '0', NULL, '1', '3/10', '1', 'Sedang', '1', '1', '0', NULL, '1', '2025-04-02', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-03-29', NULL, NULL, NULL, NULL, NULL, NULL, 'RL 20 tpm', 'Ceftriaxone 1x2gr 
Paracetamol drip 3x1gr ', '1', 'Darah rutin tgl1/4', '1', 'Usg abdomen tgl 2/4', NULL, NULL, 'Sedang jalan Transfusi prc bag ke-2 sisa 0 di bank darah', 'Transfusi PRC 2 bag, sedang jalan bag ke-2, cek darah rutin post transfusi,
Lapor hasil ur cr tgl 2/4 tunggu hasil ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 17:00', NULL, '175', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 14:14:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:14:12 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('719845', '2025-03-29 17:00', '2025-04-02 17:00', 'JATI', 'Meranti', 'ISK, Anemia, riw mioma uteri, cystitis, hepatomegali', '-', '579', '1', NULL, 'Nyeri saat BAK, lemas, pucat ', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, '108', '71', '36.7', '81', '19', '0', NULL, '1', '3/10', '1', 'Sedang', '1', '1', '0', NULL, '1', '2025-04-02', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-03-29', NULL, NULL, NULL, NULL, NULL, NULL, 'RL 20 tpm', 'Ceftriaxone 1x2gr 
Paracetamol drip 3x1gr ', '1', 'Darah rutin tgl1/4', '1', 'Usg abdomen tgl 2/4', NULL, NULL, 'Sedang jalan Transfusi prc bag ke-2 sisa 0 di bank darah', 'Transfusi PRC 2 bag, sedang jalan bag ke-2, cek darah rutin post transfusi,
Lapor hasil ur cr tgl 2/4 tunggu hasil ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 17:00', NULL, '175', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 14:14:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:14:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 14:15:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:15:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 14:20:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 14:25:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-04-02 924:undefined&quot;
LINE 1: UPDATE &quot;sm_tarif_tindakan_pasien&quot; SET &quot;tanggal&quot; = '2025-04-0...
                                                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:25:09 --> Query error: ERROR:  date/time field value out of range: "2025-04-02 924:undefined"
LINE 1: UPDATE "sm_tarif_tindakan_pasien" SET "tanggal" = '2025-04-0...
                                                          ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "tanggal" = '2025-04-02 924:undefined'
WHERE "id" = '4377325'
ERROR - 2025-04-02 14:27:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 14:31:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-04-02 14:31:40', 1234627, '105', '', '81315...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:31:40 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-04-02 14:31:40', 1234627, '105', '', '81315...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-04-02 14:31:40', 1234627, '105', '', '81315.00', '166633.20', '1', 166633.2, '259', '2032')
ERROR - 2025-04-02 14:31:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-04-02 14:31:52', 1234628, '105', '', '81315...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 14:31:52 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-04-02 14:31:52', 1234628, '105', '', '81315...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-04-02 14:31:52', 1234628, '105', '', '81315.00', '166633.20', '1', 166633.2, '259', '2032')
ERROR - 2025-04-02 14:37:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 14:37:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 14:38:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 14:38:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 14:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 14:42:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 14:49:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 14:50:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 14:51:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 07:59:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-02 07:59:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-02 15:37:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 15:42:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 15:45:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 15:45:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 15:46:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 15:46:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 15:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 15:54:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 15:54:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 15:55:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 15:55:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 15:55:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 15:55:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 16:01:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 16:02:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 16:04:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 16:05:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 16:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 16:15:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 16:15:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 16:16:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 16:16:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 16:17:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 16:17:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 16:17:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 16:17:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 16:19:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 16:19:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 16:19:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 16:19:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 16:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 16:28:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 16:28:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 16:30:00 --> Severity: Notice  --> Undefined property: CI::$code /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-04-02 16:30:00 --> Severity: Notice  --> Undefined property: CI::$message /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-04-02 16:32:26 --> Severity: Notice  --> Undefined offset: -26 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 1115
ERROR - 2025-04-02 16:40:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-02 17:05:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5890636, '444', 7920, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:05:20 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5890636, '444', 7920, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5890636, '444', 7920, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 17:08:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5890654, '417', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:08:41 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5890654, '417', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5890654, '417', 8858.4, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 17:10:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 17:23:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:23:21 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-04-02 17:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 17:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 17:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 17:53:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 17:54:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:54:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 17:54:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:54:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 17:54:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:54:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 17:54:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5890714, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:54:57 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5890714, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5890714, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-04-02 17:55:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:55:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 17:55:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:55:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 17:55:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 17:55:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:03:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:03:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:03:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5890740, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:03:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5890740, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5890740, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 18:03:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:03:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:03:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 18:04:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 18:06:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 18:12:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 18:15:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:15:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:16:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5890760, '1032', 12600, '2', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:16:04 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5890760, '1032', 12600, '2', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5890760, '1032', 12600, '2', '1.00', 'Ya', 'null')
ERROR - 2025-04-02 18:16:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:16:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:18:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:18:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:18:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 18:19:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:19:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:19:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:19:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:26:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 18:28:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:28:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:30:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:30:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:30:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:30:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:30:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:31:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:31:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:31:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:31:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:31:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:31:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:32:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 87
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-04-02 18:35:52 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 91
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 94
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 96
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$nama_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 26
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$id_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 27
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tanggal_lahir_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 28
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$asal_ruangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 41
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 59
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 60
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 65
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 66
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 74
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 75
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 79
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 80
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 84
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 85
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 89
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 90
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 94
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 95
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 99
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 100
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 104
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 105
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 109
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 110
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 114
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 115
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 119
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 120
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 124
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 125
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 130
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 131
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 136
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 137
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 142
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 143
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 148
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 149
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 154
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 155
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 160
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 161
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 169
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 170
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 174
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 175
ERROR - 2025-04-02 18:35:52 --> Severity: Notice  --> Undefined property: stdClass::$updated_on /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 181
ERROR - 2025-04-02 18:36:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16759
ERROR - 2025-04-02 18:36:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16759
ERROR - 2025-04-02 18:37:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:37:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:40:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:40:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:41:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:41:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:41:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:41:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:41:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:41:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:49:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:49:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:49:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:49:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:49:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5890873, '219', 7440.552, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:49:41 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5890873, '219', 7440.552, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5890873, '219', 7440.552, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 18:49:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:49:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:50:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:50:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:50:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 18:50:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 18:50:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 18:53:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 18:55:46 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 18:55:46 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 18:55:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-02 19:04:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-02 19:10:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:10:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:10:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5890938, '60', 130.8, '1', '4.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:10:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5890938, '60', 130.8, '1', '4.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5890938, '60', 130.8, '1', '4.00', NULL, 'null')
ERROR - 2025-04-02 19:10:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:10:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:11:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('818010', '3', '', '4', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:11:01 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('818010', '3', '', '4', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('818010', '3', '', '4', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 19:11:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:11:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:19:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:19:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:19:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:19:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:19:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:19:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:19:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:19:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:19:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5890951, '420', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:19:51 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5890951, '420', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5890951, '420', 8858.4, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 19:20:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:20:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:20:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:20:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:20:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:20:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:21:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:21:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:22:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:22:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-02 19:22:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:22:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-02 19:24:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:24:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:36:11 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 19:36:11 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 19:36:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-02 19:38:37 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 19:38:37 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 19:38:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-02 19:38:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 19:41:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 19:43:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:43:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:44:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:44:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:45:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 19:45:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 19:52:48 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-02 20:06:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:06:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:06:56 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 20:06:56 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-02 20:06:56 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-02 20:28:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:28:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:28:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (5891082, '2450', 4395.6, '2.5', '6.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:28:51 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (5891082, '2450', 4395.6, '2.5', '6.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891082, '2450', 4395.6, '2.5', '6.00', 'Ya', 'null')
ERROR - 2025-04-02 20:29:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:29:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:36:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:36:06 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-02 20:36:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:36:06 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-02 20:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 20:48:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:48:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:48:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:48:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:49:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('818029', '4', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:49:00 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('818029', '4', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('818029', '4', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 20:49:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:49:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:50:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:50:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:50:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:50:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:50:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:50:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:50:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:50:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:50:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:50:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 20:51:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 20:51:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:01:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-02 21:01:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-02 21:07:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:07:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:10:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:10:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5891201, '887', 1272, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:10:23 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5891201, '887', 1272, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891201, '887', 1272, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 21:10:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:10:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:11:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:11:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:12:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:12:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:12:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:12:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:13:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:13:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:13:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:13:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:13:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:13:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:13:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:13:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:14:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:14:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:14:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:14:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 21:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 21:17:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 21:20:26 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-04-02 21:20:38 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-04-02 21:32:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 21:34:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 21:34:49 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '664609'
AND "lp"."id_pendaftaran" = '664609'
ORDER BY "lp"."id" ASC
ERROR - 2025-04-02 21:46:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2421
ERROR - 2025-04-02 21:46:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2434
ERROR - 2025-04-02 21:46:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2447
ERROR - 2025-04-02 21:47:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2421
ERROR - 2025-04-02 21:47:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2434
ERROR - 2025-04-02 21:47:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2447
ERROR - 2025-04-02 21:47:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2421
ERROR - 2025-04-02 21:47:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2434
ERROR - 2025-04-02 21:47:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2447
ERROR - 2025-04-02 21:47:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2421
ERROR - 2025-04-02 21:47:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2434
ERROR - 2025-04-02 21:47:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2447
ERROR - 2025-04-02 21:59:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 21:59:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 21:59:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 22:01:57 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 22:01:57 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-02 22:02:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891360, '3744', 8991, ' ', '2', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:02:14 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891360, '3744', 8991, ' ', '2', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891360, '3744', 8991, ' ', '2', NULL, 'null')
ERROR - 2025-04-02 22:02:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891361, '3744', 8991, ' ', '2', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:02:39 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891361, '3744', 8991, ' ', '2', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891361, '3744', 8991, ' ', '2', NULL, '0')
ERROR - 2025-04-02 22:03:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891362, '3744', 8991, ' ', '2', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:03:03 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891362, '3744', 8991, ' ', '2', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891362, '3744', 8991, ' ', '2', NULL, '0')
ERROR - 2025-04-02 22:05:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:05:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 22:08:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:08:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:08:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:08:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:08:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5891387, '420', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:08:19 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5891387, '420', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891387, '420', 8858.4, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 22:08:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:08:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:08:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:08:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:09:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891391, '3744', 8991, ' ', 'NaN'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:09:16 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891391, '3744', 8991, ' ', 'NaN'...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891391, '3744', 8991, ' ', 'NaN', NULL, '0')
ERROR - 2025-04-02 22:18:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:18:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:18:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:18:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:18:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:18:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:26:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 22:30:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891458, '3744', 8991, ' ', '2', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:30:24 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891458, '3744', 8991, ' ', '2', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891458, '3744', 8991, ' ', '2', NULL, '0')
ERROR - 2025-04-02 22:30:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891459, '3744', 8991, ' ', '2', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:30:43 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891459, '3744', 8991, ' ', '2', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891459, '3744', 8991, ' ', '2', NULL, '0')
ERROR - 2025-04-02 22:31:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891461, '3744', 8991, ' ', '2', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:31:20 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891461, '3744', 8991, ' ', '2', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891461, '3744', 8991, ' ', '2', NULL, '0')
ERROR - 2025-04-02 22:35:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (818068, '4', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:35:51 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (818068, '4', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (818068, '4', '', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 22:40:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 22:41:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 22:41:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:41:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:41:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('818067', '9', '1', '', 'Infus...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:41:32 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('818067', '9', '1', '', 'Infus...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('818067', '9', '1', '', 'Infus', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 22:41:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:41:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:42:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 22:43:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:43:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:45:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:45:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:47:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (818074, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:47:39 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (818074, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (818074, '2', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-02 22:54:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891564, '3744', 8991, ' ', '2', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:54:26 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891564, '3744', 8991, ' ', '2', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891564, '3744', 8991, ' ', '2', NULL, '0')
ERROR - 2025-04-02 22:57:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:57:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 22:57:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 22:57:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 23:05:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:05:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 23:18:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891658, '3744', 8991, ' ', '0.00...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:18:46 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891658, '3744', 8991, ' ', '0.00...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891658, '3744', 8991, ' ', '0.00', NULL, '0')
ERROR - 2025-04-02 23:20:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891673, '3744', 8991, ' ', '0.00...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:20:18 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891673, '3744', 8991, ' ', '0.00...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891673, '3744', 8991, ' ', '0.00', NULL, '0')
ERROR - 2025-04-02 23:21:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891682, '3744', 8991, ' ', '0.00...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:21:44 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891682, '3744', 8991, ' ', '0.00...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891682, '3744', 8991, ' ', '0.00', NULL, '0')
ERROR - 2025-04-02 23:24:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891685, '3744', 8991, ' ', '0.00...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:24:04 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891685, '3744', 8991, ' ', '0.00...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891685, '3744', 8991, ' ', '0.00', NULL, '0')
ERROR - 2025-04-02 23:25:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot; &quot;
LINE 1: ...larium&quot;, &quot;kronis&quot;) VALUES (5891687, '3744', 8991, ' ', '0.00...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:25:46 --> Query error: ERROR:  invalid input syntax for type double precision: " "
LINE 1: ...larium", "kronis") VALUES (5891687, '3744', 8991, ' ', '0.00...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891687, '3744', 8991, ' ', '0.00', NULL, '0')
ERROR - 2025-04-02 23:27:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:27:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 23:30:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:30:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 23:32:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:32:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-02 23:32:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5891696, '219', 7440.552, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-02 23:32:31 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5891696, '219', 7440.552, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5891696, '219', 7440.552, '1', '1.00', NULL, 'null')
ERROR - 2025-04-02 23:33:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-02 23:52:35 --> 404 Page Not Found --> /index
