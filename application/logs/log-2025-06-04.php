<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-04 00:00:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 00:04:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 00:04:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 00:04:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 00:04:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 00:25:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 00:28:22 --> Severity: error  --> Exception: Too few arguments to function Pengkodean_icd_x::cetak_resume_medis_ranap(), 1 passed in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/CodeIgniter.php on line 529 and at least 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 83
ERROR - 2025-06-04 00:28:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 00:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 00:56:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 01:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 03:19:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 05:18:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860408, '3', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 05:18:13 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (860408, '3', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860408, '3', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 05:21:41 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 05:24:06 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 05:24:08 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 06:02:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:20:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:21:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:25:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:26:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:30:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:30:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:34:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:35:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:35:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A050%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 06:36:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:37:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:42:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:42:34 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A127%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 06:46:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:47:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:48:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:49:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:49:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 06:49:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:49:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 06:49:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:49:27 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 06:50:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:50:00 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 06:50:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:50:00 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 06:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:53:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 06:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:53:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 06:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:56:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 06:58:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 06:58:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 06:59:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:04:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:04:08 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND "ab"."kode_booking" = '20250604A033'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 00:04:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:04:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:04:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:04:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 07:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:05:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:05:06 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 07:05:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 00:05:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 00:05:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 07:06:23 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-04 07:06:23 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-04 07:06:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 07:06:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 07:06:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:06:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:06:48 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-04 07:06:48 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-04 07:06:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 07:06:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 07:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:07:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:09:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:09:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:09:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:09:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:09:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:10:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:10:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:12:12 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-06-04 07:13:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:14:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:14:38 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1478'
WHERE "id" = '4641149'
ERROR - 2025-06-04 07:14:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:14:39 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1478'
WHERE "id" = '4641149'
ERROR - 2025-06-04 07:15:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:15:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:15:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:15:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-04 08.30&quot;
LINE 1: ... NULL, &quot;perawatt_cpo&quot; = NULL, &quot;jam_tanggal_cpo&quot; = '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:15:46 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-04 08.30"
LINE 1: ... NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = '2025-06-0...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '758434', "id_pendaftaran" = '699872', "id_users" = '1445', "id_data_catatan_perioperatift" = '3929', "suhu_ckp" = '{"suhu_ckp_1":"36.6","suhu_ckp_2":"94","suhu_ckp_3":"20","suhu_ckp_4":"137\/86","suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":"-"}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"PRECAUTION STANDAR","standar_kewaspadaan_ckp_2":"Cellulitis dengan Ulkus cruris et pedis dextra"}', "rencana_tindakan_operasi_ckp" = 'DEBRIDEMENT', "dokter_operator_ckp" = '67', "rencana_perawatan_pasca_operasi_ckp" = 'RANAP JATI', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":null,"verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":null,"verifikasi_pasien_7":null,"verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":null,"verifikasi_pasien_11":null,"verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":null,"verifikasi_pasien_15":null,"verifikasi_pasien_16":null,"verifikasi_pasien_17":null,"verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":null,"verifikasi_pasien_23":null,"verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":null,"verifikasi_pasien_27":null,"verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":null,"verifikasi_pasien_31":null,"verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":null,"verifikasi_pasien_35":null,"verifikasi_pasien_36":"PEMERIKSAAN PENUNJANG TERLAMPIR"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":null,"persiapan_fisik_pasien_3":null,"persiapan_fisik_pasien_4":"00:00","persiapan_fisik_pasien_5":null,"persiapan_fisik_pasien_6":null,"persiapan_fisik_pasien_7":null,"persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":null,"persiapan_fisik_pasien_10":null,"persiapan_fisik_pasien_11":null,"persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":null,"persiapan_fisik_pasien_22":null,"persiapan_fisik_pasien_23":null,"persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":null,"persiapan_fisik_pasien_30":null,"persiapan_fisik_pasien_31":null,"persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":null,"persiapan_fisik_pasien_39":null,"persiapan_fisik_pasien_40":"OBAT TERLAMPIR","persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":null,"persiapan_fisik_pasien_44":null,"persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = '560', "jam_pfp" = '7:15', "perawat_penerima_ot_ppo" = NULL, "jam_ppo" = NULL, "site_marketing" = '{"site_marketing":null}', "perawat_ot_po" = NULL, "jam_tanggal_po" = NULL, "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":null,"asuhan_keperawatan_ak_2":null,"asuhan_keperawatan_ak_3":null,"asuhan_keperawatan_ak_4":null,"asuhan_keperawatan_ak_5":null,"asuhan_keperawatan_ak_6":null,"asuhan_keperawatan_ak_7":null,"asuhan_keperawatan_ak_8":null,"asuhan_keperawatan_ak_9":null,"asuhan_keperawatan_ak_10":null,"asuhan_keperawatan_ak_11":null,"asuhan_keperawatan_ak_12":null,"asuhan_keperawatan_ak_13":null,"asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":null,"asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":null,"asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":null,"asuhan_keperawatan_ak_33":null,"asuhan_keperawatan_ak_58":null,"asuhan_keperawatan_ak_34":null,"asuhan_keperawatan_ak_35":null,"asuhan_keperawatan_ak_36":null,"asuhan_keperawatan_ak_37":null,"asuhan_keperawatan_ak_38":null,"asuhan_keperawatan_ak_39":null,"asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":null,"asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":null,"asuhan_keperawatan_ak_45":null,"asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":null,"asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":null,"asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":null,"asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = NULL, "perawwat_anastesi_pa" = NULL, "perawwat_kamar_bedah" = NULL, "time_out_ckio" = '{"time_out_ckio_1":null,"time_out_ckio_2":null,"time_out_ckio_4":null,"time_out_ckio_5":null,"time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":null,"time_out_ckio_11":null}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":null,"catatan_keperawatan_intra_operasi_2":null,"catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":null,"catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":null,"catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":null,"catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":null,"catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":null,"catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":null,"catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":null,"catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":null,"catatan_keperawatan_intra_operasi_55":null,"catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":null,"catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":null,"catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":null,"catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":null,"catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":null,"catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":null,"catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":null,"catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = NULL, "perawat_instrument_1" = NULL, "perawat_instrument_2" = NULL, "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":null,"asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":null,"asuhan_keperawatannnnn_ak_72":null,"asuhan_keperawatannnnn_ak_73":null,"asuhan_keperawatannnnn_ak_74":null,"asuhan_keperawatannnnn_ak_75":null,"asuhan_keperawatannnnn_ak_76":null,"asuhan_keperawatannnnn_ak_77":null,"asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":null,"asuhan_keperawatannnnn_ak_80":null,"asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":null,"asuhan_keperawatannnnn_ak_84":null,"asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = NULL, "perawwat_anastesi_paa" = '492', "perawwat_kamar_bedahh" = NULL, "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":"1","catatan_keperawatan_sesudah_operasi_2":"8:00","catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":null}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":"1","catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":"1","catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":"1","catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":null,"catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":"1","catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":null,"catatan_keperawatan_sesudah_op_21":"1","catatan_keperawatan_sesudah_op_22":"1","catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":"1","catatan_keperawatan_sesudah_op_25":null,"catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":null,"catatan_keperawatan_sesudah_op_30":"1","catatan_keperawatan_sesudah_op_31":"1","catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":"1","catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":"1","catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":"1","catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":"1","ceklis_persiapan_operasi_2":"1","ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":"1","ceklis_persiapan_operasi_10":"1","ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":"8:00","ceklis_persiapan_operasiii_2":"RL","ceklis_persiapan_operasiii_3":"30","ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":"8:30","jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = '2025-06-04 08.30', "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":null,"asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":null,"asssuhan_keperawatannnnn_ak_49":null,"asssuhan_keperawatannnnn_ak_50":null,"asssuhan_keperawatannnnn_ak_51":null,"asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":null,"asssuhan_keperawatannnnn_ak_55":null,"asssuhan_keperawatannnnn_ak_56":null,"asssuhan_keperawatannnnn_ak_57":null,"asssuhan_keperawatannnnn_ak_58":null,"asssuhan_keperawatannnnn_ak_59":null,"asssuhan_keperawatannnnn_ak_60":null,"asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":null,"asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":null,"asssuhan_keperawatannnnn_ak_70":null,"asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":null,"asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = NULL, "perawwat_ruangan_prrr" = NULL, "perawwat_anastesi_paaa" = '492', "perawwat_kamar_bedahhh" = NULL, "updated_at" = '2025-06-04 07:15:46'
WHERE "id_data_catatan_perioperatift" = '3929'
ERROR - 2025-06-04 07:15:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-04 08.30&quot;
LINE 1: ... NULL, &quot;perawatt_cpo&quot; = NULL, &quot;jam_tanggal_cpo&quot; = '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:15:51 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-04 08.30"
LINE 1: ... NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = '2025-06-0...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '758434', "id_pendaftaran" = '699872', "id_users" = '1445', "id_data_catatan_perioperatift" = '3929', "suhu_ckp" = '{"suhu_ckp_1":"36.6","suhu_ckp_2":"94","suhu_ckp_3":"20","suhu_ckp_4":"137\/86","suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":"-"}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"PRECAUTION STANDAR","standar_kewaspadaan_ckp_2":"Cellulitis dengan Ulkus cruris et pedis dextra"}', "rencana_tindakan_operasi_ckp" = 'DEBRIDEMENT', "dokter_operator_ckp" = '67', "rencana_perawatan_pasca_operasi_ckp" = 'RANAP JATI', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":null,"verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":null,"verifikasi_pasien_7":null,"verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":null,"verifikasi_pasien_11":null,"verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":null,"verifikasi_pasien_15":null,"verifikasi_pasien_16":null,"verifikasi_pasien_17":null,"verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":null,"verifikasi_pasien_23":null,"verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":null,"verifikasi_pasien_27":null,"verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":null,"verifikasi_pasien_31":null,"verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":null,"verifikasi_pasien_35":null,"verifikasi_pasien_36":"PEMERIKSAAN PENUNJANG TERLAMPIR"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":null,"persiapan_fisik_pasien_3":null,"persiapan_fisik_pasien_4":"00:00","persiapan_fisik_pasien_5":null,"persiapan_fisik_pasien_6":null,"persiapan_fisik_pasien_7":null,"persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":null,"persiapan_fisik_pasien_10":null,"persiapan_fisik_pasien_11":null,"persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":null,"persiapan_fisik_pasien_22":null,"persiapan_fisik_pasien_23":null,"persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":null,"persiapan_fisik_pasien_30":null,"persiapan_fisik_pasien_31":null,"persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":null,"persiapan_fisik_pasien_39":null,"persiapan_fisik_pasien_40":"OBAT TERLAMPIR","persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":null,"persiapan_fisik_pasien_44":null,"persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = '560', "jam_pfp" = '7:15', "perawat_penerima_ot_ppo" = NULL, "jam_ppo" = NULL, "site_marketing" = '{"site_marketing":null}', "perawat_ot_po" = NULL, "jam_tanggal_po" = NULL, "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":null,"asuhan_keperawatan_ak_2":null,"asuhan_keperawatan_ak_3":null,"asuhan_keperawatan_ak_4":null,"asuhan_keperawatan_ak_5":null,"asuhan_keperawatan_ak_6":null,"asuhan_keperawatan_ak_7":null,"asuhan_keperawatan_ak_8":null,"asuhan_keperawatan_ak_9":null,"asuhan_keperawatan_ak_10":null,"asuhan_keperawatan_ak_11":null,"asuhan_keperawatan_ak_12":null,"asuhan_keperawatan_ak_13":null,"asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":null,"asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":null,"asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":null,"asuhan_keperawatan_ak_33":null,"asuhan_keperawatan_ak_58":null,"asuhan_keperawatan_ak_34":null,"asuhan_keperawatan_ak_35":null,"asuhan_keperawatan_ak_36":null,"asuhan_keperawatan_ak_37":null,"asuhan_keperawatan_ak_38":null,"asuhan_keperawatan_ak_39":null,"asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":null,"asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":null,"asuhan_keperawatan_ak_45":null,"asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":null,"asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":null,"asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":null,"asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = NULL, "perawwat_anastesi_pa" = NULL, "perawwat_kamar_bedah" = NULL, "time_out_ckio" = '{"time_out_ckio_1":null,"time_out_ckio_2":null,"time_out_ckio_4":null,"time_out_ckio_5":null,"time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":null,"time_out_ckio_11":null}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":null,"catatan_keperawatan_intra_operasi_2":null,"catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":null,"catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":null,"catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":null,"catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":null,"catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":null,"catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":null,"catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":null,"catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":null,"catatan_keperawatan_intra_operasi_55":null,"catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":null,"catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":null,"catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":null,"catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":null,"catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":null,"catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":null,"catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":null,"catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = NULL, "perawat_instrument_1" = NULL, "perawat_instrument_2" = NULL, "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":null,"asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":null,"asuhan_keperawatannnnn_ak_72":null,"asuhan_keperawatannnnn_ak_73":null,"asuhan_keperawatannnnn_ak_74":null,"asuhan_keperawatannnnn_ak_75":null,"asuhan_keperawatannnnn_ak_76":null,"asuhan_keperawatannnnn_ak_77":null,"asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":null,"asuhan_keperawatannnnn_ak_80":null,"asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":null,"asuhan_keperawatannnnn_ak_84":null,"asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = NULL, "perawwat_anastesi_paa" = '492', "perawwat_kamar_bedahh" = NULL, "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":"1","catatan_keperawatan_sesudah_operasi_2":"8:00","catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":null}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":"1","catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":"1","catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":"1","catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":null,"catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":"1","catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":null,"catatan_keperawatan_sesudah_op_21":"1","catatan_keperawatan_sesudah_op_22":"1","catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":"1","catatan_keperawatan_sesudah_op_25":null,"catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":null,"catatan_keperawatan_sesudah_op_30":"1","catatan_keperawatan_sesudah_op_31":"1","catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":"1","catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":"1","catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":"1","catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":"1","ceklis_persiapan_operasi_2":"1","ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":"1","ceklis_persiapan_operasi_10":"1","ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":"8:00","ceklis_persiapan_operasiii_2":"RL","ceklis_persiapan_operasiii_3":"30","ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":"8:30","jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = '2025-06-04 08.30', "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":null,"asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":null,"asssuhan_keperawatannnnn_ak_49":null,"asssuhan_keperawatannnnn_ak_50":null,"asssuhan_keperawatannnnn_ak_51":null,"asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":null,"asssuhan_keperawatannnnn_ak_55":null,"asssuhan_keperawatannnnn_ak_56":null,"asssuhan_keperawatannnnn_ak_57":null,"asssuhan_keperawatannnnn_ak_58":null,"asssuhan_keperawatannnnn_ak_59":null,"asssuhan_keperawatannnnn_ak_60":null,"asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":null,"asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":null,"asssuhan_keperawatannnnn_ak_70":null,"asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":null,"asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = NULL, "perawwat_ruangan_prrr" = NULL, "perawwat_anastesi_paaa" = '492', "perawwat_kamar_bedahhh" = NULL, "updated_at" = '2025-06-04 07:15:51'
WHERE "id_data_catatan_perioperatift" = '3929'
ERROR - 2025-06-04 07:16:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:17:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:17:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:18:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:18:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:18:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:19:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:19:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:20:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:20:01 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A131%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 07:20:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:20:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:20:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:20:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:20:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:21:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:21:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:21:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:22:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:22:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:22:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:23:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:23:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:24:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:25:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:25:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:25:35 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 07:25:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:25:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 07:25:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:25:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 07:26:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:26:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 07:26:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:27:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:27:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:27:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:27:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:27:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:27:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:27:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:28:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:28:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:28:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:28:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:29:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:29:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:29:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:29:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:29:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:29:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:29:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:29:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:29:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:29:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:29:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:29:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:30:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:30:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:30:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:30:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:30:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:30:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:30:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:30:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:30:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:30:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:31:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:32:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:32:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:32:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 07:32:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:32:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 07:32:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:32:41 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A047%' ESCAPE '!'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 07:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:34:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:34:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:35:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:35:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:35:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:35:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:35:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:36:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:36:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:36:05 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-04 07:36:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:36:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:36:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:37:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:37:21 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-04 07:37:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:37:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:38:10 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-04 07:38:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:38:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:38:25 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11727
ERROR - 2025-06-04 07:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:38:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:38:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:39:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:39:03 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-04 07:39:39 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-04 07:39:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:41:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:41:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:41:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:41:14 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 07:41:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:41:14 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 07:41:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:41:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:41:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A035%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 07:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040206) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:42:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040206) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040206', '00165731', '2025-06-04 07:42:11', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000816791668', NULL, '102505040325Y001861', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250604A169')
ERROR - 2025-06-04 07:42:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:43:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 07:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:43:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:43:46 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 07:43:51 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-04 07:43:51 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-04 07:43:51 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-04 07:43:57 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-04 07:43:57 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-04 07:43:57 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-04 07:44:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:44:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:44:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:44:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 07:44:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:44:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 07:44:47 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-04 07:44:47 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-04 07:44:47 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-04 07:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:45:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:46:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:47:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:47:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040217) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:47:47 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040217) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040217', '00215297', '2025-06-04 07:47:43', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002315114403', NULL, '102501040325Y004446', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250604B248')
ERROR - 2025-06-04 07:48:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:48:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:49:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:49:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:49:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:50:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:50:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:50:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:50:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:51:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:51:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:51:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:51:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:51:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:51:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:51:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:52:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:52:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:52:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:52:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:52:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6327999, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:52:05 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6327999, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6327999, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-06-04 07:52:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:52:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:52:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:52:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:52:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:52:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:52:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:53:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:53:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:53:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:53:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:54:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:54:31 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-04 07:54:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:55:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:55:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:55:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:55:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:55:55 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-04 07:55:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:56:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:56:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:56:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:57:08 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-04 07:57:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 07:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:58:39 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-04 07:58:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040240) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:58:40 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040240) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040240', '00330264', '2025-06-04 07:58:23', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002239369277', NULL, '102501060525Y000481', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250604A138')
ERROR - 2025-06-04 07:58:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:58:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:59:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:59:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:59:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 07:59:34 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-06-04 07:59:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:00:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:00:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:00:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:00:56 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 08:00:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 08:00:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 08:01:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:01:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A073%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 08:01:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:01:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:01:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:01:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:02:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:02:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:02:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:02:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:02:50 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A039%' ESCAPE '!'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 08:02:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:03:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:03:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:03:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:03:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:03:40 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A040%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 08:03:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:03:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:04:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:04:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:04:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:04:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:04:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:05:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:05:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:05:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:05:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040263) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:05:41 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040263) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040263', '00377014', '2025-06-04 08:05:40', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001376201619', NULL, '0223U0280525P000317', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250604A046')
ERROR - 2025-06-04 08:05:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:05:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040264) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:05:59 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040264) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040264', '00377014', '2025-06-04 08:05:58', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001376201619', NULL, '0223U0280525P000317', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250604A046')
ERROR - 2025-06-04 08:06:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:06:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:07:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:07:05 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A060%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 08:07:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:07:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:08:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:08:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:08:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:08:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:08:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:09:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:09:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:09:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-04 08:09:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:10:43 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 08:10:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 08:10:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 08:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:10:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250604B375) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:10:58 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250604B375) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250604B375', '375', 'B375', 'B', '2025-06-04', '0', '2025-06-04 08:10:58', 'Booking', 'APM', 'Asuransi', 0, '2025-06-04  16:20:00', 0, '1945', '00271641', 65, 444269, 14, 'BED', '081389400709', '3671116702730004', '1973-02-27', 'dr. SURYANTI LASE, Sp.B', 1, 'Asuransi', 45, '60', '200', 'Ok.', '0', '58090', '0001374352536', 'JKN', NULL, '1', NULL, '0223B1380525Y005060', 'KLINIK PINANG SARI 2', '2025-08-26', 'BED', '1', NULL, NULL, '14')
ERROR - 2025-06-04 08:10:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:12:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:12:10 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A034%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 08:12:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:12:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:13:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:13:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:14:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040298) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:14:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040298) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040298', '00044001', '2025-06-04 08:14:08', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001855118338', NULL, '102505030525Y000521', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250604A026')
ERROR - 2025-06-04 08:14:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:14:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040300) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:14:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040300) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040300', '00208730', '2025-06-04 08:14:36', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002320451368', NULL, '022300090525Y000167', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250604B051')
ERROR - 2025-06-04 08:14:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:14:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:14:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6328139, '291', 1170, '1', '3.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:14:46 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6328139, '291', 1170, '1', '3.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6328139, '291', 1170, '1', '3.00', NULL, 'null')
ERROR - 2025-06-04 08:14:51 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4844
ERROR - 2025-06-04 08:14:51 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4938
ERROR - 2025-06-04 08:14:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:14:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:15:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:15:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:16:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:16:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:16:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:17:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:17:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:17:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:17:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860496, '4', '', '31', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:17:48 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (860496, '4', '', '31', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860496, '4', '', '31', '', '', 'PC', '0', '', '0', 'MORN', NULL, '1', 1, '1x1 pulv', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 08:17:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 08:18:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:18:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:19:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040322) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:19:48 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040322) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040322', '00375066', '2025-06-04 08:19:48', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '19', NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Klinik Akasia', 0, '2', '', '20250604C017')
ERROR - 2025-06-04 08:20:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:20:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 01:21:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 01:21:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 08:21:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 01:22:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 01:22:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 08:23:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:23:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:23:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:23:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:24:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:24:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:24:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:24:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:24:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 08:24:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:24:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 08:24:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:25:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:25:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:25:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:25:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:25:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:25:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:26:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:26:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:26:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:26:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:26:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:26:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:27:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:27:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:27:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:27:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:27:46 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 08:27:46 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 08:27:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:27:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:27:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6328231, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:27:51 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6328231, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6328231, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-04 08:28:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:28:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:28:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:28:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:28:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:28:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:28:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 01:29:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 01:29:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 08:29:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250702B041) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:29:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250702B041) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250702B041', '041', 'B041', 'B', '2025-07-02', '0', '2025-06-04 08:29:17', 'Booking', 'APM', 'Asuransi', 0, '2025-07-02  08:48:00', 0, '1701', '00208318', 672, 37214, 30, 'INT', '081219936780', '3603280503840010', '1984-03-05', 'dr. I GEDE RAI KOSA, Sp.PD', 1, 'Asuransi', 50, '60', '200', 'Ok.', '0', '58176', '0001837919687', 'JKN', '315061', '0', '30', '0223B1370525P000072', 'KLINIK SILOAM', '2025-07-31', 'INT', '3', NULL, '0223R0380625V001501', '30')
ERROR - 2025-06-04 08:29:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:29:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:29:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:30:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:30:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:31:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:31:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:31:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:32:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:32:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:32:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:32:52 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 08:32:52 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 08:33:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:33:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:33:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:33:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:33:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 01:33:51 --> Severity: Notice  --> Undefined property: CI::$code /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-06-04 01:33:51 --> Severity: Notice  --> Undefined property: CI::$message /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-06-04 08:34:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:35:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:35:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:35:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:35:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:35:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:36:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:37:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:37:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:37:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:37:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:37:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:37:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:38:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:38:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:38:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:38:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:39:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:39:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:39:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:40:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:40:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:40:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:40:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:40:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:40:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:40:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:40:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:40:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:40:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:40:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 08:40:48 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 08:40:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:40:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:41:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:41:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 08:41:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:41:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 08:41:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:41:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:41:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:41:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:41:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:41:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:41:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:41:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:41:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040381) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:41:39 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040381) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040381', '00370465', '2025-06-04 08:41:38', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002255106453', NULL, '102504020625Y000377', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Paru', 0, '2', '', '20250604B117')
ERROR - 2025-06-04 08:41:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:42:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:42:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:42:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:42:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:42:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:42:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:43:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:43:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:43:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040388) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:43:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040388) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040388', '00377362', '2025-06-04 08:43:06', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001375220338', NULL, '0496B0520525Y002072', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, 2, NULL, '20250604B246')
ERROR - 2025-06-04 08:43:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:43:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:43:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:44:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:44:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:44:09 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00055073'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-04 08:44:11 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-06-04 08:44:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:44:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:44:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 01:44:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 01:44:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:45:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:45:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:45:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380625V001284) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:45:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380625V001284) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380625V001284', "no_polish" = '0002210963084'
WHERE "id" = '701175'
ERROR - 2025-06-04 08:45:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:45:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:46:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:46:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:46:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:47:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:47:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:48:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:48:46 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-06-04 08:48:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:49:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:49:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:49:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:49:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:49:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040408) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:49:39 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040408) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040408', '00274673', '2025-06-04 08:49:38', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001852024318', NULL, '102501100425Y004045', 'Lama', NULL, '1975', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250604A038')
ERROR - 2025-06-04 08:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:50:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:50:46 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-06-04 08:50:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:50:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 08:50:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:50:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 08:51:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:51:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:51:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:51:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 08:51:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:51:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 08:51:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:51:33 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 08:51:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:51:33 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 08:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:52:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 01:52:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 01:52:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 08:52:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:52:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:53:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:53:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:53:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:53:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:53:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 01:53:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 01:53:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 01:54:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 01:54:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:54:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:54:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ..., &quot;id_kultur&quot;, &quot;id_antiobika&quot;, &quot;id_user&quot;) VALUES ('', '2025-...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:54:04 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ..., "id_kultur", "id_antiobika", "id_user") VALUES ('', '2025-...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_form_ppi" ("id_ppi", "created_at", "id_kultur", "id_antiobika", "id_user") VALUES ('', '2025-06-04 08:54:04', NULL, '19', '1656')
ERROR - 2025-06-04 08:54:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:54:13 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-06-04 08:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:54:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 08:54:14 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-06-04 08:54:17 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-06-04 08:54:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:54:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:54:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:55:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:56:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:56:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:56:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:56:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:56:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:56:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:57:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:57:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:58:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:58:28 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 08:58:28 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 08:58:28 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 08:58:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:59:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:59:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:59:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:59:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:59:38 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-06-04 09:00:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:00:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:00:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:00:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:00:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:00:58 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00181999'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-04 09:01:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:01:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:01:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:01:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:01:50 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4644668'
ERROR - 2025-06-04 09:01:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:01:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:02:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 09:03:37 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 09:03:38 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 09:03:38 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 09:03:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040436) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:03:39 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040436) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040436', '00374684', '2025-06-04 09:03:32', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001108383254', NULL, '022301110425Y000508', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250604B273')
ERROR - 2025-06-04 09:03:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:04:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:04:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:05:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:05:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:05:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:06:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:06:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:06:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:06:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:06:52 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 02:06:52 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 09:06:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:07:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:07:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:07:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:07:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:08:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:08:25 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 09:08:26 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 09:08:26 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 09:08:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:08:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:08:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:08:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:09:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:09:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:10:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = ''
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:10:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 11: WHERE "pd"."id" = ''
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
WHERE "pd"."id" = ''
ERROR - 2025-06-04 09:10:18 --> Severity: error  --> Exception: Too few arguments to function Rawat_inap::cetak_resume_medis_ranap(), 0 passed in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/CodeIgniter.php on line 529 and exactly 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 373
ERROR - 2025-06-04 09:10:18 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 09:10:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:10:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:10:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:11:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:11:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:11:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:11:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:11:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:11:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:11:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:11:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:12:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:12:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:12:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:12:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:13:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:13:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:13:28 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 09:13:29 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 09:13:29 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 09:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:14:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:14:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:14:24 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A130%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 09:14:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:14:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:15:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:15:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:15:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:16:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:16:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:16:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:17:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 09:17:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:17:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 09:17:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:17:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 09:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:17:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:17:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:17:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:18:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:18:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:19:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:20:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:20:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:20:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:20:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:20:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:20:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:20:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:21:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:21:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:21:16 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-04 09:21:16 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-04 09:21:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-06-04 09:21:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:21:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:21:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:21:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:22:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:22:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:22:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:22:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:22:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:23:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:24:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:24:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:24:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:25:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:25:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:25:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:25:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:25:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:25:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:25:56 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 09:25:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 09:25:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 09:26:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:26:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:26:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:26:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:26:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:26:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:26:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:26:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:27:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:27:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:27:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:27:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:27:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:27:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040489) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:27:30 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040489) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040489', '00378325', '2025-06-04 09:27:30', 'IGD', 'IGD', 'KELAS I', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001962369808', NULL, NULL, 'Baru', '0', '1772', 0, 'Belum', 'IGD ', 0, 2, '', NULL)
ERROR - 2025-06-04 09:27:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:27:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:27:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:28:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:28:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:28:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:28:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:28:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:28:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:28:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:29:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:29:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:29:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:29:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:29:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:29:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:29:21 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A150%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 09:29:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:29:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:29:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:29:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:29:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:29:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:29:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:29:55 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 09:29:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:29:55 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 02:29:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:29:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:30:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:30:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:30:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:30:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:30:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:30:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:30:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:30:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:30:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:30:56 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 09:30:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 09:30:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 09:30:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:31:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:31:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:31:53 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-04 09:31:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:31:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:31:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:31:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:31:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:31:56 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:31:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:31:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:32:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:33:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:33:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A123%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 09:33:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:33:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:33:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:33:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:33:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:33:31 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 09:33:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:34:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:34:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:34:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-28&quot;
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:34:39 --> Query error: ERROR:  date/time field value out of range: "25-05-28"
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('753240', '695471', '1261', 'Extubasi ', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28', '12:28', '12:31', '0 jam 3 menit', '1. Ucapakan basmalah 
2. Mencuci tangan dan memakai sarung tangan
3. Lepas plester 
4. Kempeskan cuff ETT
5. Lepaskan ETT dari elbow ventilator 
6. Keluarkan ETT dari mulut pasien
7. Plug (-), clot (-)
8. Buang ke tempat sampah kuning
9. Lepas sarung tangan dan cuci tangan
10. Ucapkan hamdalah ', '1', NULL, NULL, '21', NULL, NULL, '2025-06-04 09:34:39')
ERROR - 2025-06-04 09:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:34:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:34:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 09:34:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:34:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 09:34:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-28&quot;
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:34:45 --> Query error: ERROR:  date/time field value out of range: "25-05-28"
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('753240', '695471', '1261', 'Extubasi ', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28', '12:28', '12:31', '0 jam 3 menit', '1. Ucapakan basmalah 
2. Mencuci tangan dan memakai sarung tangan
3. Lepas plester 
4. Kempeskan cuff ETT
5. Lepaskan ETT dari elbow ventilator 
6. Keluarkan ETT dari mulut pasien
7. Plug (-), clot (-)
8. Buang ke tempat sampah kuning
9. Lepas sarung tangan dan cuci tangan
10. Ucapkan hamdalah ', '1', NULL, NULL, '21', NULL, NULL, '2025-06-04 09:34:45')
ERROR - 2025-06-04 09:34:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 09:35:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:35:06 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 09:35:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:35:06 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 09:35:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-28&quot;
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:35:18 --> Query error: ERROR:  date/time field value out of range: "25-05-28"
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('753240', '695471', '1261', 'Extubasi ', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28', '12:28', '12:31', '0 jam 3 menit', '1. Ucapakan basmalah 
2. Mencuci tangan dan memakai sarung tangan
3. Lepas plester 
4. Kempeskan cuff ETT
5. Lepaskan ETT dari elbow ventilator 
6. Keluarkan ETT dari mulut pasien
7. Plug (-), clot (-)
8. Buang ke tempat sampah kuning
9. Lepas sarung tangan dan cuci tangan
10. Ucapkan hamdalah ', '1', NULL, '1', '21', NULL, NULL, '2025-06-04 09:35:18')
ERROR - 2025-06-04 09:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:35:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-28&quot;
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:35:35 --> Query error: ERROR:  date/time field value out of range: "25-05-28"
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('753240', '695471', '1261', 'Extubasi ', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28', '12:28', '12:31', '0 jam 3 menit', '1. Ucapakan basmalah 
2. Mencuci tangan dan memakai sarung tangan
3. Lepas plester 
4. Kempeskan cuff ETT
5. Lepaskan ETT dari elbow ventilator 
6. Keluarkan ETT dari mulut pasien
7. Plug (-), clot (-)
8. Buang ke tempat sampah kuning
9. Lepas sarung tangan dan cuci tangan
10. Ucapkan hamdalah ', '1', NULL, '1', '21', NULL, '275', '2025-06-04 09:35:35')
ERROR - 2025-06-04 09:35:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:35:57 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 09:35:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 09:35:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 09:35:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-28&quot;
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:35:59 --> Query error: ERROR:  date/time field value out of range: "25-05-28"
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('753240', '695471', '1261', 'Extubasi ', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28', '12:28', '12:31', '0 jam 3 menit', '1. Ucapakan basmalah 
2. Mencuci tangan dan memakai sarung tangan
3. Lepas plester 
4. Kempeskan cuff ETT
5. Lepaskan ETT dari elbow ventilator 
6. Keluarkan ETT dari mulut pasien
7. Plug (-), clot (-)
8. Buang ke tempat sampah kuning
9. Lepas sarung tangan dan cuci tangan
10. Ucapkan hamdalah ', '1', NULL, NULL, '21', NULL, '275', '2025-06-04 09:35:59')
ERROR - 2025-06-04 09:36:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:36:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:36:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:36:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:36:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:36:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-28&quot;
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:36:50 --> Query error: ERROR:  date/time field value out of range: "25-05-28"
LINE 1: ...ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('753240', '695471', '1261', 'Extubasi ', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'BBLSR KB SMK HMD dd Neonatal Pneumonia Post pemberian surfaktan Trombositopenia post tranfusi trombosit ikterik neonatorum S/P reintubasi S/P ROSC 2x', 'Tidak ada ', 'Tidak ada', 'Tidak ada', '25-05-28', '12:28', '12:31', '0 jam 3 menit', '1. Ucapakan basmalah 
2. Mencuci tangan dan memakai sarung tangan
3. Lepas plester 
4. Kempeskan cuff ETT
5. Lepaskan ETT dari elbow ventilator 
6. Keluarkan ETT dari mulut pasien
7. Plug (-), clot (-)
8. Buang ke tempat sampah kuning
9. Lepas sarung tangan dan cuci tangan
10. Ucapkan hamdalah ', '1', NULL, NULL, '21', NULL, '275', '2025-06-04 09:36:50')
ERROR - 2025-06-04 09:36:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:37:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:37:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:37:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:38:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:38:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:38:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:38:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:38:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:38:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:38:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:38:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:38:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:38:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:38:38 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-06-04 02:39:06 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-04 09:39:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:39:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:39:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:39:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:39:58 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-04 09:39:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:40:01 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-04 09:40:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:40:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:40:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:40:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:40:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:40:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:40:57 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 09:40:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 09:40:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 09:40:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:41:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:41:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:41:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:41:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:41:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:41:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:41:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:41:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:41:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:41:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:41:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:41:53 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:41:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:41:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:42:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:42:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:42:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:42:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:42:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:43:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:43:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:43:04 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%b%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-06-04 09:43:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:43:04 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%be%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-06-04 09:43:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:43:05 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%bec%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-06-04 09:43:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:43:05 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%beci%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-06-04 09:43:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:43:06 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%bec%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-06-04 09:43:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:43:07 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00223244' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%beco%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-06-04 09:43:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:43:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:43:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:43:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:43:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:44:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 09:44:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 02:44:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 02:44:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 09:44:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:44:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:45:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:45:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:45:57 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-04 09:45:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-04 09:45:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-04 09:46:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:46:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:46:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:47:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:47:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:47:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:47:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:47:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:48:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:48:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:48:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:49:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:49:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:49:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:49:47 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-06-04'
AND "id" = ''
ERROR - 2025-06-04 09:49:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:50:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:50:06 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00362049'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-04 09:50:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:50:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:50:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:50:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:50:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:50:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:50:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:50:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:50:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:51:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:51:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:51:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 09:51:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:51:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:51:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:51:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:52:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:54:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:54:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:54:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:55:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:55:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:56:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:56:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 09:56:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:56:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A132%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 09:56:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 09:56:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 09:56:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:56:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 02:56:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:56:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:56:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 02:57:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 02:57:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:57:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:59:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:59:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:59:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:59:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:59:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 09:59:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:00:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:00:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:00:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:00:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:00:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:00:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:01:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:01:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:01:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:01:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:01:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:01:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:02:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:02:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:02:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:02:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 10:02:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:02:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 10:02:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:02:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:02:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:02:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:02:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:03:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:03:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040542) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:03:14 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040542) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040542', '00378335', '2025-06-04 10:03:14', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000522747516', NULL, '0223B1570625P000118', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik Bedah', 0, '2', '', '20250604B425')
ERROR - 2025-06-04 10:04:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 03:04:04 --> Severity: Notice  --> Undefined property: CI::$code /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-06-04 03:04:04 --> Severity: Notice  --> Undefined property: CI::$message /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-06-04 10:04:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:04:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:04:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:04:50 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-06-04'
AND "id" = ''
ERROR - 2025-06-04 10:04:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:05:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:07:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:07:34 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-08-06'
AND "id" = ''
ERROR - 2025-06-04 10:07:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:08:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:09:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:09:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:09:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:10:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:10:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:10:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:11:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:11:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:11:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:12:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:12:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 03:12:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 03:12:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:12:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:12:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:13:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:13:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:13:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:13:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:13:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:14:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:15:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:15:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:15:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:15:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:15:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:16:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:16:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:16:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860843, '1', '', '6.00'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:17:32 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (860843, '1', '', '6.00'...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860843, '1', '', '6.00', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', '3x4mg', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 10:17:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:17:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:18:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:18:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:18:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:18:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:18:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 10:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:18:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 10:18:43 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2574
ERROR - 2025-06-04 10:18:43 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2576
ERROR - 2025-06-04 03:18:43 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2769
ERROR - 2025-06-04 03:18:43 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2770
ERROR - 2025-06-04 03:18:43 --> Severity: Notice  --> Trying to get property 'noKartu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2772
ERROR - 2025-06-04 03:18:43 --> Severity: Notice  --> Trying to get property 'noSuratKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2773
ERROR - 2025-06-04 03:18:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 03:18:43 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_surat_kontrol" ("id_pendaftaran", "id_layanan_pendaftaran", "id_jadwal_dokter", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "created_date", "updated_date", "id_dokter_asal", "id_dokter_tujuan", "id_skb") VALUES ('698575', '758669', '438', '2025-06-04', '30', '1947', 'Surat Kontrol', NULL, '00377782', '1', NULL, NULL, '{"konsul":null,"raber":null,"alih":null}', NULL, NULL, NULL, '2025-06-04 10:18:43', '2025-06-04 10:18:43', NULL, NULL, 188758)
ERROR - 2025-06-04 10:18:50 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2574
ERROR - 2025-06-04 10:18:50 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2576
ERROR - 2025-06-04 03:18:51 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2769
ERROR - 2025-06-04 03:18:51 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2770
ERROR - 2025-06-04 03:18:51 --> Severity: Notice  --> Trying to get property 'noKartu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2772
ERROR - 2025-06-04 03:18:51 --> Severity: Notice  --> Trying to get property 'noSuratKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2773
ERROR - 2025-06-04 03:18:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 03:18:51 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_surat_kontrol" ("id_pendaftaran", "id_layanan_pendaftaran", "id_jadwal_dokter", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "created_date", "updated_date", "id_dokter_asal", "id_dokter_tujuan", "id_skb") VALUES ('698575', '758669', '438', '2025-06-04', '30', '1947', 'Surat Kontrol', NULL, '00377782', '1', NULL, NULL, '{"konsul":null,"raber":null,"alih":null}', NULL, NULL, NULL, '2025-06-04 10:18:50', '2025-06-04 10:18:50', NULL, NULL, 188759)
ERROR - 2025-06-04 10:18:54 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2574
ERROR - 2025-06-04 10:18:54 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2576
ERROR - 2025-06-04 03:18:54 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2769
ERROR - 2025-06-04 03:18:54 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2770
ERROR - 2025-06-04 03:18:54 --> Severity: Notice  --> Trying to get property 'noKartu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2772
ERROR - 2025-06-04 03:18:54 --> Severity: Notice  --> Trying to get property 'noSuratKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2773
ERROR - 2025-06-04 03:18:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 03:18:54 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_surat_kontrol" ("id_pendaftaran", "id_layanan_pendaftaran", "id_jadwal_dokter", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "created_date", "updated_date", "id_dokter_asal", "id_dokter_tujuan", "id_skb") VALUES ('698575', '758669', '438', '2025-06-04', '30', '1947', 'Surat Kontrol', NULL, '00377782', '1', NULL, NULL, '{"konsul":null,"raber":null,"alih":null}', NULL, NULL, NULL, '2025-06-04 10:18:54', '2025-06-04 10:18:54', NULL, NULL, 188760)
ERROR - 2025-06-04 10:18:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:19:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:19:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:19:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 03:19:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 03:19:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 03:19:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 03:19:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:19:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:19:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:19:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:19:36 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2574
ERROR - 2025-06-04 10:19:36 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2576
ERROR - 2025-06-04 03:19:37 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2769
ERROR - 2025-06-04 03:19:37 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2770
ERROR - 2025-06-04 03:19:37 --> Severity: Notice  --> Trying to get property 'noKartu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2772
ERROR - 2025-06-04 03:19:37 --> Severity: Notice  --> Trying to get property 'noSuratKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2773
ERROR - 2025-06-04 03:19:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 03:19:37 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_surat_kontrol" ("id_pendaftaran", "id_layanan_pendaftaran", "id_jadwal_dokter", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "created_date", "updated_date", "id_dokter_asal", "id_dokter_tujuan", "id_skb") VALUES ('698575', '758669', '438', '2025-06-04', '30', '1947', 'Surat Kontrol', NULL, '00377782', '1', NULL, NULL, '{"konsul":null,"raber":null,"alih":null}', NULL, NULL, NULL, '2025-06-04 10:19:36', '2025-06-04 10:19:36', NULL, NULL, 188761)
ERROR - 2025-06-04 10:19:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:19:52 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2574
ERROR - 2025-06-04 10:19:52 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2576
ERROR - 2025-06-04 03:19:52 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2769
ERROR - 2025-06-04 03:19:52 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2770
ERROR - 2025-06-04 03:19:52 --> Severity: Notice  --> Trying to get property 'noKartu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2772
ERROR - 2025-06-04 03:19:52 --> Severity: Notice  --> Trying to get property 'noSuratKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2773
ERROR - 2025-06-04 03:19:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 03:19:52 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_surat_kontrol" ("id_pendaftaran", "id_layanan_pendaftaran", "id_jadwal_dokter", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "created_date", "updated_date", "id_dokter_asal", "id_dokter_tujuan", "id_skb") VALUES ('698575', '758669', '438', '2025-06-04', '30', '1947', 'Surat Kontrol', NULL, '00377782', '1', NULL, NULL, '{"konsul":null,"raber":null,"alih":null}', NULL, NULL, NULL, '2025-06-04 10:19:52', '2025-06-04 10:19:52', NULL, NULL, 188762)
ERROR - 2025-06-04 10:19:56 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2574
ERROR - 2025-06-04 10:19:56 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2576
ERROR - 2025-06-04 03:19:56 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2769
ERROR - 2025-06-04 03:19:56 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2770
ERROR - 2025-06-04 03:19:56 --> Severity: Notice  --> Trying to get property 'noKartu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2772
ERROR - 2025-06-04 03:19:56 --> Severity: Notice  --> Trying to get property 'noSuratKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2773
ERROR - 2025-06-04 03:19:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 03:19:56 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_surat_kontrol" ("id_pendaftaran", "id_layanan_pendaftaran", "id_jadwal_dokter", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "created_date", "updated_date", "id_dokter_asal", "id_dokter_tujuan", "id_skb") VALUES ('698575', '758669', '438', '2025-06-04', '30', '1947', 'Surat Kontrol', NULL, '00377782', '1', NULL, NULL, '{"konsul":null,"raber":null,"alih":null}', NULL, NULL, NULL, '2025-06-04 10:19:56', '2025-06-04 10:19:56', NULL, NULL, 188763)
ERROR - 2025-06-04 10:19:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:19:59 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00378307'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-04 10:20:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:20:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:20:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:20:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:21:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:21:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:22:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 10:22:35 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2574
ERROR - 2025-06-04 10:22:35 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2576
ERROR - 2025-06-04 03:22:35 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2769
ERROR - 2025-06-04 03:22:35 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2770
ERROR - 2025-06-04 03:22:35 --> Severity: Notice  --> Trying to get property 'noKartu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2772
ERROR - 2025-06-04 03:22:35 --> Severity: Notice  --> Trying to get property 'noSuratKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2773
ERROR - 2025-06-04 03:22:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 03:22:35 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(438) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_surat_kontrol" ("id_pendaftaran", "id_layanan_pendaftaran", "id_jadwal_dokter", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "created_date", "updated_date", "id_dokter_asal", "id_dokter_tujuan", "id_skb") VALUES ('698575', '758669', '438', '2025-06-04', '30', '1947', 'Surat Kontrol', NULL, '00377782', '1', NULL, NULL, '{"konsul":null,"raber":null,"alih":null}', NULL, NULL, NULL, '2025-06-04 10:22:35', '2025-06-04 10:22:35', NULL, NULL, 188767)
ERROR - 2025-06-04 10:22:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:23:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:23:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:23:43 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A063%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 10:23:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:24:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:24:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:24:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:25:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:25:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:25:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:25:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:25:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:26:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:26:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:26:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:26:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:26:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:26:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:27:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:27:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 10:27:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:27:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:27:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:27:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:28:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:28:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:28:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:28:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:29:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:29:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:29:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:29:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:30:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:30:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:30:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:30:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:30:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:31:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:31:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:31:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:31:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:31:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:31:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:32:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:32:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:32:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:33:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:33:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:33:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:33:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:33:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:34:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:34:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:34:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:35:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:35:10 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A197%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 10:35:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:35:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:35:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:36:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:36:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:36:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:36:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506040597) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:36:39 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506040597) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506040597', '00359264', '2025-06-04 10:36:38', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik THT', 0, '2', '', '20250604B442')
ERROR - 2025-06-04 10:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:36:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:36:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:36:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:37:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:37:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:37:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:37:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:37:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:37:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:38:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:38:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:39:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:39:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:39:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:40:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:40:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:40:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:40:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:41:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 03:41:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 03:41:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:42:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:42:00 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-06-04'
AND "id" = ''
ERROR - 2025-06-04 10:42:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:42:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:42:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:43:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:43:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 10:43:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:43:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 10:43:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:44:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:44:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:44:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:45:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:45:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:45:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:45:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:45:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:45:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:46:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:46:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:46:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:46:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:46:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:46:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:46:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:46:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:47:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:47:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:47:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:47:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:47:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:47:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:47:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:48:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:48:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:48:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:48:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:49:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:49:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:49:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:49:44 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 10:49:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:49:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:50:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:50:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:50:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:50:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:50:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860899, '1', '', '60', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:50:37 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (860899, '1', '', '60', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860899, '1', '', '60', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, NIGHT', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 10:50:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:51:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:51:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:51:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:51:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:51:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:51:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:52:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:52:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 10:52:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:52:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 10:52:10 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-04 10:52:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 10:52:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 10:52:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 10:52:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 10:52:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 10:52:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 10:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:52:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:52:17 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A170%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 10:52:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:53:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:53:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:53:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:53:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:53:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:53:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 10:53:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 10:53:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 10:53:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 10:53:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:53:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 10:53:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:53:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:54:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:54:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:54:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860903, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 10:54:54 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (860903, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860903, '1', '', '', '', '', 'PC', '0', '', '0', 'MORN', '1x10mg ', '1', 1, '1x10mg ', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 10:54:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:55:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:56:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:56:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:58:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:59:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:00:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:00:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 11:00:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:00:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 11:00:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:01:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 11:01:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:02:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:03:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:03:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:04:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:04:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:04:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:04:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:04:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 04:05:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380525V009310) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 04:05:07 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380525V009310) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380525V009310', "id_rujukan" = '163712'
WHERE "id" = '701841'
ERROR - 2025-06-04 11:05:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:06:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:06:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:06:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 11:07:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:07:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 11:07:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:07:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 11:07:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:09:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:10:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:10:10 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00374204'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-04 11:11:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:11:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:11:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:12:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 04:12:44 --> Severity: Notice  --> Undefined property: CI::$code /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-06-04 04:12:44 --> Severity: Notice  --> Undefined property: CI::$message /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-06-04 11:12:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:12:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:13:23 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-04 11:13:23 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 887
ERROR - 2025-06-04 11:13:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:13:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 11:13:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:13:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 11:14:00 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 11:14:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:14:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:15:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 11:15:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:15:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:15:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:16:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 11:16:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:16:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:19:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:19:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 11:20:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:20:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:21:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:21:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:21:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:21:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:21:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:21:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:21:51 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A205%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 11:22:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:22:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:22:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:23:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:23:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:23:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:24:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:24:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:25:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:25:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:25:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 11:25:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 11:25:09 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-04 11:25:09 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-04 11:25:09 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-04 11:25:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 04:26:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 04:26:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:26:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 88
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 90
ERROR - 2025-06-04 11:26:58 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 90
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 92
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 95
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 97
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$nama_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 26
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$id_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 27
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tanggal_lahir_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 28
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$asal_ruangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 41
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 59
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 60
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 65
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 66
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 74
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 75
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 79
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 80
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 84
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 85
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 89
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 90
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 94
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 95
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 99
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 100
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 104
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 105
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 109
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 110
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 114
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 115
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 119
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 120
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 124
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 125
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 130
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 131
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 136
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 137
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 142
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 143
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 148
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 149
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 154
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 155
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 160
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 161
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 169
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 170
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 174
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 175
ERROR - 2025-06-04 11:26:58 --> Severity: Notice  --> Undefined property: stdClass::$updated_on /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 181
ERROR - 2025-06-04 11:27:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:28:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:28:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:28:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:29:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:29:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:29:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:30:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:30:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:30:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:31:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 11:31:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:31:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:31:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:32:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:32:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:32:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:32:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:33:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:33:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:33:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:33:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:35:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:35:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 11:37:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:37:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:37:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:38:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:38:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:38:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 11:38:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:38:28 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759447', '2025-06-04 11:16', '11', '', '', '', '', 'BB = 34 kg; TB = 141 cm; BB/U =108 %; TB/U = 103 %; BB/TB = 103 %; HA = 10 th 8 bln bulan; BBI = 33 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., Kesadaran CM, GCS 15, PEWS 1 (hijau), nadi kuat, akral hangat, mukosa bibir lembab, turgor kulit elastis, badan teraba hangat, tampak mual, makan hanya 3 sendok, Terpasang IVFD RL 20 tpm.TTV N: 100 x/menit S: 37 (terakhir demam 4/6/25 jm 06.00 suhu 39.4oC) P: 20 x/menit. lab DR 3/6/25 Hemoglobin 12.2 Hematokrit 37 Leukosit 6.2 Trombosit 182, masih mual , lemas nyeri ulu hati , asupan makan pagi 1/2 porsi dihabiskan, kebiasaan makan dirumah KH Nasi P lengkap sayur buah mau ,  tidak ada riwayata lergi makan.', '"Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan perkiraan asupan 25% kebutuhan 

Perubahan fungsi GI berkaitan dengan peningkatan motilitas usus ditandai dengan BAB cair ampas sedikit 4x

Perubahan nilai lab terkait gizi berkaitan dengan gangguan fungsi endokrin ditandai dengan riwayat Dm, GDS 165. 

Pembatasan asupan zat gizi spesifik natrium berkaitan dengan hipertensi ditandai dengan riwayat hipertensi, TD : 135/82 mmHg. 

Perubahan nilai lab terkait gizi berkaitan dengan gangguan fungsi ginjal ditandai dengan urcr : 79/2,8, kalium 6,7.

Kurangnya pegetahuan terhadap makanan dan gizi berkaitan dengan pola kebiasaan makan dirumah kurang dan tidak variatif ditandai dengan perkiraan asupan 50Úri kebutuhan

sikap/kepercayaan yang tidak mendukung terkait makanan atau gizi berkaitan dengan khawatir kegemukan ditandai dengan perkiraan asupan 40% kebutuhan

Malnutrisi pada anak berkaitan dengan asupan energi dan protein tidak adekuat ditandai denganBB/PB: -3-2 SD ( Gizi kurang ) kebiasaan makan bubur beli jadi , perkiraan asupan 60Úri kebutuhan"', 'Diet NT DL E = 1700 kkal; P = 51 gr; L = 75 gr; KH = 204 gr; Cairan 1780 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack. Edukasi gizi', '"Peningkatan asupan oral bertahap memenuhi >=90% kebutuhan
BAB normal
Hasil GDS mendekati normal/terkontrol. 
Hasil tekanan darah mendekati normal/terkontrol. 
Hasil lab Kalium, Ur dan Cr normal/terkontrol
Peningkatan asupan bertahap >80% kebutuhan
perubahan perilaku  makan memenuhi kebutuhan dan variasi pilihan makanan bertambah"', '', '', '', '', '1994', '1', 'Diet NT DL 1700 kkal', NULL, '1994', 0, NULL, '2025-06-04 11:38:28')
ERROR - 2025-06-04 11:38:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 04:38:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 04:38:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 04:38:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 04:38:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:38:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:38:47 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759447', '2025-06-04 11:16', '11', '', '', '', '', 'BB = 34 kg; TB = 141 cm; BB/U =108 %; TB/U = 103 %; BB/TB = 103 %; HA = 10 th 8 bln bulan; BBI = 33 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., Kesadaran CM, GCS 15, PEWS 1 (hijau), nadi kuat, akral hangat, mukosa bibir lembab, turgor kulit elastis, badan teraba hangat, tampak mual, makan hanya 3 sendok, Terpasang IVFD RL 20 tpm.TTV N: 100 x/menit S: 37 (terakhir demam 4/6/25 jm 06.00 suhu 39.4oC) P: 20 x/menit. lab DR 3/6/25 Hemoglobin 12.2 Hematokrit 37 Leukosit 6.2 Trombosit 182, masih mual , lemas nyeri ulu hati , asupan makan pagi 1/2 porsi dihabiskan, kebiasaan makan dirumah KH Nasi P lengkap sayur buah mau ,  tidak ada riwayata lergi makan.', '"Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan perkiraan asupan 25% kebutuhan 

Perubahan fungsi GI berkaitan dengan peningkatan motilitas usus ditandai dengan BAB cair ampas sedikit 4x

Perubahan nilai lab terkait gizi berkaitan dengan gangguan fungsi endokrin ditandai dengan riwayat Dm, GDS 165. 

Pembatasan asupan zat gizi spesifik natrium berkaitan dengan hipertensi ditandai dengan riwayat hipertensi, TD : 135/82 mmHg. 

Perubahan nilai lab terkait gizi berkaitan dengan gangguan fungsi ginjal ditandai dengan urcr : 79/2,8, kalium 6,7.

Kurangnya pegetahuan terhadap makanan dan gizi berkaitan dengan pola kebiasaan makan dirumah kurang dan tidak variatif ditandai dengan perkiraan asupan 50Úri kebutuhan

sikap/kepercayaan yang tidak mendukung terkait makanan atau gizi berkaitan dengan khawatir kegemukan ditandai dengan perkiraan asupan 40% kebutuhan

Malnutrisi pada anak berkaitan dengan asupan energi dan protein tidak adekuat ditandai denganBB/PB: -3-2 SD ( Gizi kurang ) kebiasaan makan bubur beli jadi , perkiraan asupan 60Úri kebutuhan"', 'Diet NT DL E = 1700 kkal; P = 51 gr; L = 75 gr; KH = 204 gr; Cairan 1780 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack. Edukasi gizi', '"Peningkatan asupan oral bertahap memenuhi >=90% kebutuhan
BAB normal
Hasil GDS mendekati normal/terkontrol. 
Hasil tekanan darah mendekati normal/terkontrol. 
Hasil lab Kalium, Ur dan Cr normal/terkontrol
Peningkatan asupan bertahap >80% kebutuhan
perubahan perilaku  makan memenuhi kebutuhan dan variasi pilihan makanan bertambah"', '', '', '', '', '1994', '1', 'Diet NT DL 1700 kkal', NULL, '1994', 0, NULL, '2025-06-04 11:38:47')
ERROR - 2025-06-04 11:39:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:39:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:39:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:41:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:41:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:41:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:41:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:43:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:43:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:44:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:44:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:45:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 04:45:43 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 04:45:43 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 11:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:46:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:46:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:46:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:46:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:47:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:48:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:48:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:51:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 11:51:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:51:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 11:51:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 11:51:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 11:51:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:52:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:52:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:52:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:53:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:53:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:53:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:54:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:54:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:55:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 11:55:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 04:55:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 04:55:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:55:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:56:13 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-04 11:56:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:57:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:58:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:59:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:00:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:00:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:00:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:01:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:01:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:01:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 05:02:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:02:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:02:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:02:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:02:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:02:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:02:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:02:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 12:03:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882684, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:03:10, null, null, null, null, null, null, null, 0, &quot;Inadekuat asupan berkaitan dengan penurunan daya terima makan d..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., &quot;Peningkatan asupan oral bertahap memenuhi &gt;=90% kebutuhan
, , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:03:10 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882684, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:03:10, null, null, null, null, null, null, null, 0, "Inadekuat asupan berkaitan dengan penurunan daya terima makan d..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., "Peningkatan asupan oral bertahap memenuhi >=90% kebutuhan
, , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1x asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', '"Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', '"Peningkatan asupan oral bertahap memenuhi >=90% kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS #Cokelat 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:03:10')
ERROR - 2025-06-04 12:03:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882685, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:03:29, null, null, null, null, null, null, null, 0, &quot;Inadekuat asupan berkaitan dengan penurunan daya terima makan d..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., &quot;Peningkatan asupan oral bertahap memenuhi &gt;=90%, kebutuhan
, , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:03:29 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882685, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:03:29, null, null, null, null, null, null, null, 0, "Inadekuat asupan berkaitan dengan penurunan daya terima makan d..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., "Peningkatan asupan oral bertahap memenuhi >=90%, kebutuhan
, , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1x asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', '"Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', '"Peningkatan asupan oral bertahap memenuhi >=90%, kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS #Cokelat 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:03:29')
ERROR - 2025-06-04 12:03:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882686, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:03:38, null, null, null, null, null, null, null, 0, &quot;Inadekuat asupan berkaitan dengan penurunan daya terima makan d..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., &quot;Peningkatan asupan oral bertahap memenuhi &gt;=90%; kebutuhan
, , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:03:38 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882686, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:03:38, null, null, null, null, null, null, null, 0, "Inadekuat asupan berkaitan dengan penurunan daya terima makan d..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., "Peningkatan asupan oral bertahap memenuhi >=90%; kebutuhan
, , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1x asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', '"Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', '"Peningkatan asupan oral bertahap memenuhi >=90%; kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS #Cokelat 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:03:38')
ERROR - 2025-06-04 12:04:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882687, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:04:05, null, null, null, null, null, null, null, 0, &quot;Inadekuat asupan berkaitan dengan penurunan daya terima makan d..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., &quot;Peningkatan asupan oral bertahap memenuhi &gt;=90 persen kebutuhan..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:04:05 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882687, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:04:05, null, null, null, null, null, null, null, 0, "Inadekuat asupan berkaitan dengan penurunan daya terima makan d..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., "Peningkatan asupan oral bertahap memenuhi >=90 persen kebutuhan..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1x asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', '"Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', '"Peningkatan asupan oral bertahap memenuhi >=90 persen kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS #Cokelat 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:04:05')
ERROR - 2025-06-04 12:04:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882688, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:04:16, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., Peningkatan asupan oral bertahap memenuhi &gt;=90 persen kebutuhan..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:04:16 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882688, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:04:16, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., Peningkatan asupan oral bertahap memenuhi >=90 persen kebutuhan..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1x asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', 'Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', 'Peningkatan asupan oral bertahap memenuhi >=90 persen kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS #Cokelat 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:04:16')
ERROR - 2025-06-04 12:04:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:04:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882689, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:04:44, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., Peningkatan asupan oral bertahap memenuhi &gt; 90 persen kebutuhan..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:04:44 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882689, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:04:44, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1x asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', 'Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', 'Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS #Cokelat 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:04:44')
ERROR - 2025-06-04 12:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:05:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882692, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:05:10, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., Peningkatan asupan oral bertahap memenuhi &gt; 90 persen kebutuhan..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:05:10 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882692, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS #Cokelat 980 kkal, null, null, 1994, 2025-06-04 12:05:10, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1 kali asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', 'Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', 'Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS #Cokelat 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:05:10')
ERROR - 2025-06-04 12:05:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882693, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS 980 kkal, null, null, 1994, 2025-06-04 12:05:20, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., Peningkatan asupan oral bertahap memenuhi &gt; 90 persen kebutuhan..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:05:20 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882693, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS 980 kkal, null, null, 1994, 2025-06-04 12:05:20, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 1..., Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1 kali asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', 'Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS #Cokelat E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', 'Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:05:20')
ERROR - 2025-06-04 12:05:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882694, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS 980 kkal, null, null, 1994, 2025-06-04 12:05:27, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Ca..., Peningkatan asupan oral bertahap memenuhi &gt; 90 persen kebutuhan..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:05:27 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882694, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS 980 kkal, null, null, 1994, 2025-06-04 12:05:27, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Ca..., Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1 kali asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', 'Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali.', 'Diet BB RS E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', 'Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan
', '', '', '', '', '1994', '1', 'Diet BB RS 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:05:27')
ERROR - 2025-06-04 12:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:06:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (882696, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS 980 kkal, null, null, 1994, 2025-06-04 12:06:17, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Ca..., Peningkatan asupan oral bertahap memenuhi &gt; 90 persen kebutuhan, , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:06:17 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (882696, 759481, null, 11, , , , , BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-..., 1994, 1, Diet BB RS 980 kkal, null, null, 1994, 2025-06-04 12:06:17, null, null, null, null, null, null, null, 0, Inadekuat asupan berkaitan dengan penurunan daya terima makan di..., Diet BB RS E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Ca..., Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan, , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('759481', NULL, '11', '', '', '', '', 'BB = 9.8 kg; TB = 88 cm; BB/U = -1 SD; TB/U =-10 SD; BB/TB = -1-0 SD; HA = 15 bulan; BBI = 12.3 kg; KESAN = Status gizi Baik, perawakan Normal dan BB Normal., kesadaran composmentis, GCS 15, akral hangat, nadi kaut, mukosa biir lembab, turgor kulit elastis, tampak rewel. tampak batuk produksi (+). mual makan habis 3 sendok. terpasang IVFD RL 7 tpm N : 110x/mnt, S: 37 oC (demam terakir tgl 4/5/25 jam 06:0 S : 38.2oC ), P : 24x/mnt. Hasil lab HB : 13.4/39/7.5/211, demam batuk pilek diare pagi ini 1 kali asupan makan pagi tidak mau sama sekali , tidak ada riwayat alergi makan. ', 'Inadekuat asupan berkaitan dengan penurunan daya terima makan ditandai dengan asupan makan pagi tidak makan sama sekali', 'Diet BB RS E = 980 kkal; P = 29.4 gr; L = 43 gr; KH = 117 gr; Cairan 980 ml; Bentuk makanan lunak, jalur oral, frekuensi 3x makan 2x snack', 'Peningkatan asupan oral bertahap memenuhi > 90 persen kebutuhan', '', '', '', '', '1994', '1', 'Diet BB RS 980 kkal', NULL, '1994', 0, NULL, '2025-06-04 12:06:17')
ERROR - 2025-06-04 12:06:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:06:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:07:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:07:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:07:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:07:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:07:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:08:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:08:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:08:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:08:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:08:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:08:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 05:09:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:09:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 12:09:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:09:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 12:10:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:10:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:11:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:11:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:12:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:12:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:13:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:14:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:15:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:15:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:15:30 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-04 12:15:30 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-04 12:15:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 12:15:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 12:15:35 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-04 12:15:35 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-04 12:15:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 12:15:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 12:15:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:15:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:15:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:15:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:16:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:17:14 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 12:17:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:18:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:18:22 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-04 12:18:22 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-04 12:19:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:19:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:20:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:21:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:21:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
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
ERROR - 2025-06-04 05:22:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:22:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:23:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:23:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:23:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:23:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:23:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:23:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 12:23:30 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_sessiond056007b6168f83c26764b7338b148709fa1f767 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-06-04 12:23:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 05:24:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:24:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 12:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:27:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-04 12:30:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:30:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:30:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:30:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:31:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:33:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:33:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (861026, '4', '1', '', 'Infus...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:33:51 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (861026, '4', '1', '', 'Infus...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (861026, '4', '1', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 12:34:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:34:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:35:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 05:35:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:35:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:35:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:35:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 12:36:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:36:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 12:37:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:38:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:40:07 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-04 12:40:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:40:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:40:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:40:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:40:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:40:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:40:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:41:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:42:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:44:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:46:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:47:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:47:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:48:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:48:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:49:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:49:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:49:12 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760001', '2025-06-04 08:51', '11', '', '', '', '', 'BB = 59 Kg, TB = 176 cm. HA 18 tahun, BBI = 60,5 Kg, BB/U = 97% TB/U = 100»/TB = 97%. Kesan : Perawakan normal BB baik, status gizi normal. Tidak ada alergi makanan, Makan habis 1/2 porsi.  CM TSS suhu : 39,7 Nadi : 132 regular x/menit, kuat angkat RR : 24 x /menit Spo2: 100 RA TD : 119/48 mmHg BB : 59.65 kg VAS : 8 Mata : moon face (+), anemis -/-, udema palpebra +/+, isokor+/+, RCL +/+, nistagmus -/-, THT : Faring hiperemis (-) Leher : JVP meningkat (-), KGB tidak teraba membesar Mulut : mukosa bibir kering (+) Thoraks : BND Vesikular, retraksi (-) , RH -/- , WH -/- jantung : BJ 1, 2 regular, murmur (-), gallop (-) Abdomen : BU (+) N, asites (+), nyeri tekan (+) Epigastrik, Nyeri ketok CVA -/- Ekstremitas : akral hangat, CRT 2" edema eks inf ++/++ non pitting Motorik : tidak ada kesan lateralisasi R. meningen : kaku kuduk (-) Babinski -/- scrotum edema +/+', 'Peningkan kebutuhan protein berkaitan dengan gangguan permeabiltas cairan ditandai dengan  scrotum edema +/+', 'Diet NB TKTP Eks putel ; E = 2420 Kkal P = 72,6 gr L = 80,6 gr KH = 350,9 gr ; bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan', 'Asupan makan >80% ;'' edema perbaikan', '', '', '', '', '1436', '1', 'Diet NB TKTP Eks putel 2420 Kkal&nbsp;', NULL, '1436', 0, NULL, '2025-06-04 12:49:12')
ERROR - 2025-06-04 12:49:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:49:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:49:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:49:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:49:25 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760001', '2025-06-04 08:51', '11', '', '', '', '', 'BB = 59 Kg, TB = 176 cm. HA 18 tahun, BBI = 60,5 Kg, BB/U = 97% TB/U = 100»/TB = 97%. Kesan : Perawakan normal BB baik, status gizi normal. Tidak ada alergi makanan, Makan habis 1/2 porsi.  CM TSS suhu : 39,7 Nadi : 132 regular x/menit, kuat angkat RR : 24 x /menit Spo2: 100 RA TD : 119/48 mmHg BB : 59.65 kg VAS : 8 Mata : moon face (+), anemis -/-, udema palpebra +/+, isokor+/+, RCL +/+, nistagmus -/-, THT : Faring hiperemis (-) Leher : JVP meningkat (-), KGB tidak teraba membesar Mulut : mukosa bibir kering (+) Thoraks : BND Vesikular, retraksi (-) , RH -/- , WH -/- jantung : BJ 1, 2 regular, murmur (-), gallop (-) Abdomen : BU (+) N, asites (+), nyeri tekan (+) Epigastrik, Nyeri ketok CVA -/- Ekstremitas : akral hangat, CRT 2" edema eks inf ++/++ non pitting Motorik : tidak ada kesan lateralisasi R. meningen : kaku kuduk (-) Babinski -/- scrotum edema +/+', 'Peningkan kebutuhan protein berkaitan dengan gangguan permeabiltas cairan ditandai dengan  scrotum edema +/+', 'Diet NB TKTP Eks putel ; E = 2420 Kkal P = 72,6 gr L = 80,6 gr KH = 350,9 gr ; bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan', 'Asupan makan >80 persen ;'' edema perbaikan', '', '', '', '', '1436', '1', 'Diet NB TKTP Eks putel 2420 Kkal&nbsp;', NULL, '1436', 0, NULL, '2025-06-04 12:49:25')
ERROR - 2025-06-04 12:49:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:49:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:49:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:49:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:49:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:49:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:49:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 05:50:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:50:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:50:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 05:50:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 12:50:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:50:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 12:51:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:54:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:54:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:54:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:54:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-04 12:54:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:54:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-04 12:54:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:56:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:56:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset 0
ERROR - 2025-06-04 12:56:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:56:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...', &quot;no_rumah&quot; = '', &quot;kode_pos&quot; = '', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:56:23 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00048171', "status_pasien" = NULL, "nama" = 'MUHAMAD SYAHRIL ZHU-BAIR', "kelamin" = 'L', "tempat_lahir" = '', "tanggal_lahir" = '2006-05-11', "alamat" = 'KARANGSARI  RT. 001/005 KARANG SARI NEGLASARI KOTA TANGERANG BANTEN', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '10', "nama_kec" = 'NEGLASARI', "no_kel" = '1002', "nama_kel" = 'KARANG SARI', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '1', "id_pekerjaan" = '1', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3671101105060004', "telp" = '087860545584', "status" = 'Hidup', "no_rt" = '01', "no_rw" = '05', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email" = '', "last_active" = '2025-06-04 12:56:23'
WHERE "id" = '00048171'
ERROR - 2025-06-04 12:56:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...', &quot;no_rumah&quot; = '', &quot;kode_pos&quot; = '', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:56:25 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00048171', "status_pasien" = NULL, "nama" = 'MUHAMAD SYAHRIL ZHU-BAIR', "kelamin" = 'L', "tempat_lahir" = '', "tanggal_lahir" = '2006-05-11', "alamat" = 'KARANGSARI  RT. 001/005 KARANG SARI NEGLASARI KOTA TANGERANG BANTEN', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '10', "nama_kec" = 'NEGLASARI', "no_kel" = '1002', "nama_kel" = 'KARANG SARI', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '1', "id_pekerjaan" = '1', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3671101105060004', "telp" = '087860545584', "status" = 'Hidup', "no_rt" = '01', "no_rw" = '05', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email" = '', "last_active" = '2025-06-04 12:56:25'
WHERE "id" = '00048171'
ERROR - 2025-06-04 12:56:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...', &quot;no_rumah&quot; = '', &quot;kode_pos&quot; = '', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:56:34 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00048171', "status_pasien" = NULL, "nama" = 'MUHAMAD SYAHRIL ZHUBAIR', "kelamin" = 'L', "tempat_lahir" = '', "tanggal_lahir" = '2006-05-11', "alamat" = 'KARANGSARI  RT. 001/005 KARANG SARI NEGLASARI KOTA TANGERANG BANTEN', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '10', "nama_kec" = 'NEGLASARI', "no_kel" = '1002', "nama_kel" = 'KARANG SARI', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '1', "id_pekerjaan" = '1', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3671101105060004', "telp" = '087860545584', "status" = 'Hidup', "no_rt" = '01', "no_rw" = '05', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email" = '', "last_active" = '2025-06-04 12:56:34'
WHERE "id" = '00048171'
ERROR - 2025-06-04 12:56:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...', &quot;no_rumah&quot; = '', &quot;kode_pos&quot; = '', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:56:48 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00048171', "status_pasien" = NULL, "nama" = 'MUHAMAD SYAHRIL ZHUBAIR', "kelamin" = 'L', "tempat_lahir" = '', "tanggal_lahir" = '2006-05-11', "alamat" = 'KARANGSARI  RT. 001/005 KARANG SARI NEGLASARI KOTA TANGERANG BANTEN', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '10', "nama_kec" = 'NEGLASARI', "no_kel" = '1002', "nama_kel" = 'KARANG SARI', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '1', "id_pekerjaan" = '1', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3671101105060004', "telp" = '087860545584', "status" = 'Hidup', "no_rt" = '01', "no_rw" = '05', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email" = '', "last_active" = '2025-06-04 12:56:48'
WHERE "id" = '00048171'
ERROR - 2025-06-04 12:56:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:57:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AN...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:57:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1679' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AND lp.tindak_lanjut is null order by ri.id desc  limit 10 offset 0
ERROR - 2025-06-04 12:57:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:57:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...rumah&quot; = '01', &quot;kode_pos&quot; = '15121', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:57:36 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...rumah" = '01', "kode_pos" = '15121', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00048171', "status_pasien" = NULL, "nama" = 'MUHAMAD SYAHRIL ZHU-BAIR', "kelamin" = 'L', "tempat_lahir" = '', "tanggal_lahir" = '2006-05-11', "alamat" = 'KARANGSARI  RT. 001/005 KARANG SARI NEGLASARI KOTA TANGERANG BANTEN', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '10', "nama_kec" = 'NEGLASARI', "no_kel" = '1002', "nama_kel" = 'KARANG SARI', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '1', "id_pekerjaan" = '1', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3671101105060004', "telp" = '087860545584', "status" = 'Hidup', "no_rt" = '01', "no_rw" = '05', "no_rumah" = '01', "kode_pos" = '15121', "id_etnis" = '', "email" = '', "last_active" = '2025-06-04 12:57:36'
WHERE "id" = '00048171'
ERROR - 2025-06-04 12:58:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 12:58:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 12:58:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 12:59:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:00:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:01:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:05:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-04 06:06:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 06:06:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 06:06:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 06:06:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 06:07:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 06:07:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 13:10:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:10:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:12:46 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-06-04 13:13:04 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-06-04 13:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:14:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('760201', '', '1357'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:14:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('760201', '', '1357'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('760201', '', '1357', '2025-06-04 13:07', '{"cara_tiba_diruangan_pasien":"KursiRoda"}', '{"rujukan_pasien_1":"Rs","rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"PASIEN DARI POLI OBGYN RSUD KOTA TANGERANG \r\nSAAT INI KELUHAN PUSING (+) LEMAS (+)  MULES (-)\r\nPENGELUARAN DARI JALAN LAHIR TIDAK ADA "}', '{"hamil_muda_1":"1","hamil_muda_2":"1","hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"4","anc_2":"PKM","anc_3":"1","anc_4":null,"anc_5":null}', '1', '0', '0', '36 MINGGU ', '27 September 2024', '5/7/2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"12","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"2","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":"-","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"13:15","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"13:15","kebutuhan_biologis_5":"5","kebutuhan_biologis_6":"13:15","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"06","kebutuhan_biologis_9":"4 MINGGU YG LALU"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":"1","kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":"1","kebutuhan_sosial_12":"1","kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"-"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":null,"spiritual_6":null,"spiritual_7":null,"spiritual_8":"1","spiritual_9":null}', '{"budaya_1":null,"budaya_2":"1","budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', NULL, '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '1', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"30","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":"1","palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"-","palpasi_17":"USG 2200 GR "}', '{"auskultasi_1":"145","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '> 3', '{"his_konteraksi_1":"1","his_konteraksi_2":"10","his_konteraksi_3":"TIDAK ADA KUAT "}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '15', '10', '15', NULL, '90', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', NULL, '15', NULL, NULL, '30', '20', NULL, '10', NULL, NULL, '15', '90', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"118","tekanan_darah_2":"75","tekanan_darah_3":"36.8"}', '{"frekuensi_nadi_1":"89","frekuensi_nadi_2":"20"}', '{"berat_badan_1":"68","berat_badan_2":"158"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-04', '2025-06-04', 'TERLAMPIR ', 'TERLAMPIR ', NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-04 13:07', '298', '1', '2025-06-04 13:17', '45', '1', '2025-06-04 13:14:25')
ERROR - 2025-06-04 13:14:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('760201', '', '1357'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:14:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('760201', '', '1357'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('760201', '', '1357', '2025-06-04 13:07', '{"cara_tiba_diruangan_pasien":"KursiRoda"}', '{"rujukan_pasien_1":"Rs","rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"PASIEN DARI POLI OBGYN RSUD KOTA TANGERANG \r\nSAAT INI KELUHAN PUSING (+) LEMAS (+)  MULES (-)\r\nPENGELUARAN DARI JALAN LAHIR TIDAK ADA "}', '{"hamil_muda_1":"1","hamil_muda_2":"1","hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"4","anc_2":"PKM","anc_3":"1","anc_4":null,"anc_5":null}', '1', '0', '0', '36 MINGGU ', '27 September 2024', '5/7/2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"12","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"2","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":"-","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"13:15","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"13:15","kebutuhan_biologis_5":"5","kebutuhan_biologis_6":"13:15","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"06","kebutuhan_biologis_9":"4 MINGGU YG LALU"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":"1","kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":"1","kebutuhan_sosial_12":"1","kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"-"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":null,"spiritual_6":null,"spiritual_7":null,"spiritual_8":"1","spiritual_9":null}', '{"budaya_1":null,"budaya_2":"1","budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', NULL, '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '1', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"30","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":"1","palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"-","palpasi_17":"USG 2200 GR "}', '{"auskultasi_1":"145","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '> 3', '{"his_konteraksi_1":"1","his_konteraksi_2":"10","his_konteraksi_3":"TIDAK ADA KUAT "}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '15', '10', '15', NULL, '90', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', NULL, '15', NULL, NULL, '30', '20', NULL, '10', NULL, NULL, '15', '90', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"118","tekanan_darah_2":"75","tekanan_darah_3":"36.8"}', '{"frekuensi_nadi_1":"89","frekuensi_nadi_2":"20"}', '{"berat_badan_1":"68","berat_badan_2":"158"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-04', '2025-06-04', 'TERLAMPIR ', 'TERLAMPIR ', NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-04 13:07', '298', '1', '2025-06-04 13:17', '45', '1', '2025-06-04 13:14:35')
ERROR - 2025-06-04 13:20:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:24:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:24:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:24:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:24:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:26:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:27:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:27:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:28:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:28:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:28:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:28:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:29:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:29:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:29:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:29:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:30:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:31:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:31:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:31:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:31:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:33:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:33:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:34:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:35:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:35:25 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'nanangadnan', '2025-06-04 13:35:25')
ERROR - 2025-06-04 13:36:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:36:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:36:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:36:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:36:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:36:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:38:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:38:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:38:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:38:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:39:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:39:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:40:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:40:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:40:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:40:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:40:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:40:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:40:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:40:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:40:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:40:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:41:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:41:11 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'nanangadnan', '2025-06-04 13:41:11')
ERROR - 2025-06-04 13:41:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:41:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:41:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:41:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:41:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:41:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:41:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:41:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:42:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:42:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-04 13:42:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:42:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:43:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:43:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:43:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:43:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:43:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:43:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:45:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:45:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:45:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:45:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:45:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:46:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:46:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:46:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:46:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:46:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:46:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:47:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:47:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:47:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:47:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:48:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:48:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:48:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-04 13:49:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:49:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:49:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:49:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:49:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:49:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:49:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:52:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:52:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:52:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:52:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:52:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:52:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:52:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:52:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:52:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:52:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:52:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:52:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:53:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:53:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:53:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:53:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:53:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:53:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:53:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:53:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:54:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:54:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:55:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:56:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:56:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:56:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:56:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:56:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:56:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:56:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:57:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:57:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:57:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:57:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:57:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:57:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:57:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:57:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:58:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:58:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:58:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:58:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:58:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:58:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:58:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:58:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:58:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:58:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:58:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:58:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:58:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:58:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:58:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:58:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:58:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 13:59:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:59:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:59:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:59:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:59:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:59:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 13:59:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 13:59:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:01:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:01:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:01:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:01:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:01:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:02:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:02:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:02:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:02:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:02:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:02:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:02:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:02:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:03:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:03:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:03:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:03:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:03:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:03:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:04:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:04:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:04:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:04:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:05:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:05:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:05:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:05:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:05:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:06:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:06:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:06:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:06:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:06:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:06:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:06:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:07:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:07:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:07:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:07:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:07:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:08:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:08:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:08:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:10:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:10:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:10:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:10:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:10:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:10:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:10:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:10:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:11:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:11:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:11:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:11:10 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-06-04 14:11:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:11:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:11:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:11:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:11:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:11:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:11:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:11:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:11:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:11:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:12:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:12:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:12:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:12:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:12:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:12:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:12:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:12:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:13:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:13:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:13:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:13:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:13:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:13:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:13:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:13:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:13:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:13:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:13:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:13:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:13:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:13:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:14:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:14:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:14:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:14:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:14:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('860642', '18', '', '6', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:14:20 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('860642', '18', '', '6', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('860642', '18', '', '6', '3 x Sehari 1 Tablet/Kapsul', '', 'null', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 14:14:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:14:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:14:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:14:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:15:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:15:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:17:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:17:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:17:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:17:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:18:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:18:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:18:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:18:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:18:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:18:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:19:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:19:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:19:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:19:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:19:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:19:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:19:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:19:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:19:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:19:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:19:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:19:38 --> Severity: Notice  --> Undefined index:  /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 1115
ERROR - 2025-06-04 14:19:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:19:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:19:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:19:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:23:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:24:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:24:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:25:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:25:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:25:58 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 14:26:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-04 15&quot;
LINE 1: ... op', 'ondansetron', 'acc anestesi asa 2', '112', '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:26:01 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-04 15"
LINE 1: ... op', 'ondansetron', 'acc anestesi asa 2', '112', '2025-06-0...
                                                             ^ - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('760119', '701296', '814', 'peritonitis', 'LE', '67', '{"aaas_anamnesa":null,"aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":null,"aaas_riwayat_anestesi_4":null}', '{"aaas_komplikasi":null,"aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":null,"aaas_riwayat_alergi_4":null}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":null}', '{"aaas_evaluasi_1":null,"aaas_evaluasi_3":null,"aaas_evaluasi_5":null,"aaas_evaluasi_7":null,"aaas_evaluasi_8":null,"aaas_evaluasi_10":null,"aaas_evaluasi_11":null,"aaas_evaluasi_13":null,"aaas_evaluasi_14":null,"aaas_evaluasi_16":null,"aaas_evaluasi_18":null,"aaas_evaluasi_22":null,"aaas_evaluasi_24":null,"aaas_evaluasi_26":null,"aaas_evaluasi_28":null}', '{"aaas_pernafasan_1":null,"aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":null,"aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":null,"aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":null,"aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":null,"aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":null,"aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":null,"aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":null,"baru_4":null}', NULL, 'GA', '{"aaas_regional_1":null,"aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":"EKG Lead","aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"ICU","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', 'PERDARAHAN, SEDIAAN DARAH PRC 2', '6 jam pre op', 'ondansetron', 'acc anestesi asa 2', '112', '2025-06-04 15', '1', '2025-06-04 14:26:01')
ERROR - 2025-06-04 14:26:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:26:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:26:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:26:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:28:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:28:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:28:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:28:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:28:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:28:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:29:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:29:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:31:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:31:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:32:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:32:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:32:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:32:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:32:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:32:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:32:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:32:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:34:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:34:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:34:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:34:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:36:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:36:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:36:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:36:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:37:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:37:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:37:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:37:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:39:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:39:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:39:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:39:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:39:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:39:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:39:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:39:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 14:41:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:41:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:41:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:42:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:42:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:43:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:43:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:43:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:43:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:43:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:43:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:43:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:43:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:43:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:43:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:43:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:43:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:44:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:44:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:44:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:44:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:44:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:44:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:44:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:44:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:45:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:45:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:45:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:45:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:45:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:45:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:46:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:46:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:46:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:46:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:47:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:47:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:47:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:47:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 07:47:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:48:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:48:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:48:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:48:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:48:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 14:48:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:48:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:48:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:48:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 14:48:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:48:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:48:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:49:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:49:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:49:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:49:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:49:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 14:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:49:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:50:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:50:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:50:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 14:50:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:50:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:50:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:50:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:50:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:50:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:50:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:50:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:50:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:50:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:51:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:51:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:51:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:51:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:51:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:51:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:51:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:51:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:51:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:51:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:51:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:51:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 14:52:00 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_skpk.php 215
ERROR - 2025-06-04 14:52:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:52:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:52:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:52:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:52:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:52:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:54:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:54:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:54:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:54:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:54:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:54:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:54:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:54:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:54:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:54:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:54:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:54:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:54:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:54:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:55:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 07:55:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:55:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:55:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:55:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:55:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 07:55:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 07:55:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:55:22 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-04 14:55:22 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-04 14:55:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-06-04 14:55:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 07:55:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 07:55:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:56:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:56:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:56:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:56:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:56:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:56:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:56:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:56:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:56:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:56:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:57:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:57:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:57:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:57:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:57:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:57:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:57:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:57:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:57:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:57:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:57:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:57:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:58:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 14:58:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 14:58:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:58:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:58:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:58:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:59:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:59:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:59:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 14:59:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:00:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:00:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:00:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:00:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:00:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:00:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:01:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:01:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:02:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:02:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:02:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:02:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:02:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:02:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:03:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:03:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:04:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:04:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:04:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:04:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:04:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:04:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:05:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:05:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:05:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:05:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:05:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('860651', '6', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:05:48 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('860651', '6', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('860651', '6', '', '1', '1 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 15:06:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:06:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:06:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:06:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:06:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:06:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:06:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:06:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:06:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:06:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:07:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:07:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:07:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:07:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:07:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:07:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:07:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:07:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:07:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:08:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:08:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:08:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:08:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:09:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:09:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:09:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:09:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:09:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:09:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:09:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:09:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:09:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:09:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:09:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:09:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 08:09:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:09:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:09:46 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-04 08:09:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:09:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:09:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:09:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:10:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:10:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:10:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:10:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:12:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:12:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:12:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:12:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:12:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:12:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:12:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:12:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:13:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('860774', '6', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:13:05 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('860774', '6', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('860774', '6', '', '1', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 15:13:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:13:35 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:13:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:13:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:14:01 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_skpk.php 215
ERROR - 2025-06-04 15:14:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:14:09 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_skpk.php 215
ERROR - 2025-06-04 15:14:16 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_skpk.php 215
ERROR - 2025-06-04 15:14:24 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_skpk.php 215
ERROR - 2025-06-04 15:14:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:14:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:14:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:14:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:15:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:15:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:16:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:16:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:17:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:17:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:17:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:17:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:17:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:17:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:17:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:17:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:18:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:18:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:19:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:19:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:19:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:19:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:20:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:20:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:22:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:22:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:22:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:22:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:22:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:22:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:23:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:24:25 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2194
ERROR - 2025-06-04 15:24:25 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2238
ERROR - 2025-06-04 15:24:28 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2194
ERROR - 2025-06-04 15:24:28 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2238
ERROR - 2025-06-04 15:24:31 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2194
ERROR - 2025-06-04 15:24:31 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2238
ERROR - 2025-06-04 15:24:34 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2194
ERROR - 2025-06-04 15:24:34 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2238
ERROR - 2025-06-04 15:24:50 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-04 15:24:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:24:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:25:00 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2194
ERROR - 2025-06-04 15:25:00 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2238
ERROR - 2025-06-04 15:25:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:25:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:25:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:25:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 08:25:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:25:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:25:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:25:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:25:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:25:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:25:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:25:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:25:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:26:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:26:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:26:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:28:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:28:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:29:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 08:33:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:33:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:34:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:35:42 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_skpk.php 215
ERROR - 2025-06-04 15:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:41:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:41:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:43:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:43:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:43:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:43:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:43:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:43:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:43:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:43:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:44:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:44:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:44:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:44:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:45:11 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-04 15:45:11 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-04 15:45:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-04 08:45:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:45:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:46:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:46:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:46:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:46:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:46:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:46:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:46:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:47:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:47:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:47:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:47:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:47:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 08:49:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:49:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:49:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 15:51:39 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-06-04 15:52:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:52:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 15:52:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:52:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 15:52:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:52:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 08:53:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 08:53:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:55:17 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 15:55:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 15:55:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 15:56:09 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-04 15:56:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:03:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:03:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 16:03:31 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-04 00:00:00' AND '2025-06-04 23:59:59'
AND "ab"."kode_booking" = '20250604A125'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-04 16:04:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:05:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:05:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:05:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:06:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:06:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:08:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:08:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:09:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:12:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:12:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 16:12:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 16:15:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 16:15:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 09:15:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:15:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:15:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:15:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:15:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:15:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:16:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 09:17:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:17:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:17:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:17:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:19:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 16:21:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 16:21:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 16:21:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 16:22:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 09:23:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:23:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:23:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:23:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:25:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:25:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:25:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:25:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:25:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:25:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:25:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:25:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:27:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 09:28:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:28:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:39:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 16:39:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 16:39:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:40:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 16:40:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 09:40:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:40:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:40:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 09:41:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:41:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:41:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 09:41:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:43:57 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-04 16:46:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 16:52:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 16:52:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 16:52:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 16:52:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 16:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 16:54:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 17:16:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 17:16:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 17:17:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 17:17:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 17:19:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 17:20:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 17:20:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 17:21:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 17:21:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 17:23:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 17:23:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 17:27:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 17:27:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 17:30:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 17:33:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 17:33:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 17:39:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 17:39:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:40:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:40:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:41:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:41:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:41:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:41:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:45:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 10:48:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:48:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:48:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:48:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:48:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:48:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:48:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 10:48:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:55:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 18:00:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 18:01:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:01:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 18:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:01:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 18:08:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 18:10:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 18:10:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 18:28:17 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 18:28:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 11:30:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:30:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:30:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:30:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:39:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:39:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 18:41:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 18:44:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 18:44:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:44:53 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 18:44:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:44:53 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 18:44:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:44:53 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 11:44:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:44:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:44:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:44:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:45:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 11:45:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 18:46:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:46:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 18:46:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:46:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 18:46:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:46:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 18:47:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...wat_menerima_sore&quot;, &quot;id_users&quot;) VALUES ('760265', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:47:13 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...wat_menerima_sore", "id_users") VALUES ('760265', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_sore" ("id_layanan_pendaftaran", "dokter_dpjp_sore", "konsulen_sore", "tanggal_waktu_sore", "diagnosa_keperawatan_sore", "infus_sore", "rencana_tindakan_sore", "perawat_mengover_sore", "perawat_menerima_sore", "id_users") VALUES ('760265', '', NULL, '2025-06-04 18:00:00', 'ansietas', 'RL 20 tpm', 'rencana SC + MOW besok jam 10', '319', '614', '2051')
ERROR - 2025-06-04 18:49:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:49:03 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760223', '2025-06-04 16:00', '8', 'menerima PB dari cendana 1, pasien cenderung tidur demam dan sesak. Dikeluhkan sulit diajak komunikasi sejak kemarin sore, sebelumnya mengeluh pusing kemudian tiba tiba sulit bicara, pasien tampak gelisah, mual (+) muntah Sempat pingsan di rumah kemudian sadar dan muntah 1x (+) demam (-) BAB dan BAK tak ada keluhan RPD: HT, obat rutin Amlodipin 1x10 mg, DM (-) Alergi (-) Pasien rujukan dari RS Benda, sudah di cek lab, hasil terlampir Saat di IGD RSUD pasien mengelu kepala terasa sangat nyeri', 'ku : E3M4V2
TD : 112/72 mmhg, rr : 35 x/menit, HR : 72 x/menit, sp02 : 95Şngan nrm 15 lpm', 'CVD SNH, HT, Hipokalemia (3,2) Hipernatremia (147)', 'Terapi sesuai DPJP', '', '', '', '', '', '', '', '', '1885', '1', '.', NULL, '2063', 0, NULL, '2025-06-04 18:49:03')
ERROR - 2025-06-04 18:51:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:51:01 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760223', '2025-06-04 16:00', '8', 'menerima PB dari cendana 1, pasien cenderung tidur demam dan sesak. Dikeluhkan sulit diajak komunikasi sejak kemarin sore, sebelumnya mengeluh pusing kemudian tiba tiba sulit bicara, pasien tampak gelisah, mual (+) muntah Sempat pingsan di rumah kemudian sadar dan muntah 1x (+) demam (-) BAB dan BAK tak ada keluhan RPD: HT, obat rutin Amlodipin 1x10 mg, DM (-) Alergi (-) Pasien rujukan dari RS Benda, sudah di cek lab, hasil terlampir Saat di IGD RSUD pasien mengelu kepala terasa sangat nyeri', 'ku : E3M4V2
TD : 112/72 mmhg, rr : 35 x/menit, HR : 72 x/menit, sp02 : 95Şngan nrm 15 lpm', 'CVD SNH, HT, Hipokalemia (3,2) Hipernatremia (147)', 'Terapi sesuai DPJP', '', '', '', '', '', '', '', '', '1885', '1', '.', NULL, '2063', 0, NULL, '2025-06-04 18:51:01')
ERROR - 2025-06-04 18:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:52:15 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 18:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:52:15 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 18:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:52:15 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-04 18:53:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:53:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 18:54:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 18:54:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 19:14:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:14:31 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760242', '2025-06-04 18:56', '18', '', '', 'Ikterik Neonatus, Menyusui tidak efektif
', '', '', '', '', '', 'Melaporkan hasil lab dan foto thorax ke dr Siti Nila,SpA', 'Bayi masih ada retraksi,suhu 37,4C,HR 180x/mnt,RR 51x/mnt,SPO2 94Úrah Lengkap : Hemoglobin L 14.5 g/dL ; Hematokrit 48 % ; Eritrosit 4.86 10^6/ÂµL ; Leukosit 27.5 10^3/ÂµL ; Trombosit 355 10^3/ÂµL ; Laju Endap Darah (LED) 1 mm/jam ; MCV H 98 ; MCHC L 31 g/dL 
 Hitung Jenis : Basofil 0 %; Eosinofil H 4 % ; Neutrofil Segmen 55 % ; Limfosit 31 % ; Monosit H 10 %
Foto thorax terlampir', 'Gangguan ventilasi spontan', 'Apakah advice selanjutnya', '1686', '1', '-', NULL, '1686', 0, NULL, '2025-06-04 19:14:31')
ERROR - 2025-06-04 19:15:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:15:09 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760242', '2025-06-04 18:56', '18', '', '', 'Ikterik Neonatus, Menyusui tidak efektif
', '', '', '', '', '', 'Melaporkan hasil lab dan foto thorax ke dr Siti Nila,SpA', 'Bayi masih ada retraksi,suhu 37,4C,HR 180x/mnt,RR 51x/mnt,SPO2 94Úrah Lengkap : Hemoglobin L 14.5 g/dL ; Hematokrit 48 % ; Eritrosit 4.86 10^6/ÂµL ; Leukosit 27.5 10^3/ÂµL ; Trombosit 355 10^3/ÂµL ; Laju Endap Darah (LED) 1 mm/jam ; MCV H 98 ; MCHC L 31 g/dL 
 Hitung Jenis : Basofil 0 %; Eosinofil H 4 % ; Neutrofil Segmen 55 % ; Limfosit 31 % ; Monosit H 10 % ; Foto thorax terlampir', 'Gangguan ventilasi spontan', 'Apakah advice selanjutnya', '1686', '1', '-', NULL, '1686', '1', NULL, '2025-06-04 19:15:09')
ERROR - 2025-06-04 19:15:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:15:18 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760242', '2025-06-04 18:56', '18', '', '', 'Ikterik Neonatus, Menyusui tidak efektif
', '', '', '', '', '', 'Melaporkan hasil lab dan foto thorax ke dr Siti Nila,SpA', 'Bayi masih ada retraksi,suhu 37,4 C,HR 180x/mnt,RR 51x/mnt,SPO2 94Úrah Lengkap : Hemoglobin L 14.5 g/dL ; Hematokrit 48 % ; Eritrosit 4.86 10^6/ÂµL ; Leukosit 27.5 10^3/ÂµL ; Trombosit 355 10^3/ÂµL ; Laju Endap Darah (LED) 1 mm/jam ; MCV H 98 ; MCHC L 31 g/dL 
 Hitung Jenis : Basofil 0 %; Eosinofil H 4 % ; Neutrofil Segmen 55 % ; Limfosit 31 % ; Monosit H 10 % ; Foto thorax terlampir', 'Gangguan ventilasi spontan', 'Apakah advice selanjutnya', '1686', '1', '-', NULL, '1686', '1', NULL, '2025-06-04 19:15:18')
ERROR - 2025-06-04 12:16:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 12:16:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 19:18:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:18:05 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760242', '2025-06-04 18:56', '18', '', '', 'Ikterik Neonatus, Menyusui tidak efektif
', '', '', '', '', '', 'Melaporkan hasil lab dan foto thorax ke dr Siti Nila,SpA', 'Bayi masih ada retraksi,suhu 37.4 C,HR 180x/mnt,RR 51x/mnt,SPO2 94Úrah Lengkap : Hemoglobin L 14.5 g/dL ;Hematokrit 48 % ;Eritrosit 4.86 10^6/ÂµL ;Leukosit 27.5 10^3/ÂµL ;Trombosit 355 10^3/ÂµL ;Laju Endap Darah (LED) 1 mm/jam ;MCV H 98 ;MCHC L 31 g/dL 
 Hitung Jenis : Basofil 0 %; Eosinofil H 4 % ; Neutrofil Segmen 55 % ; Limfosit 31 % ; Monosit H 10 % ; Foto thorax terlampir', 'Gangguan ventilasi spontan', 'Apakah advice selanjutnya', '1686', '1', '-', NULL, '1686', '1', NULL, '2025-06-04 19:18:05')
ERROR - 2025-06-04 19:19:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:19:07 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760242', '2025-06-04 18:56', '18', '', '', 'Ikterik Neonatus, Menyusui tidak efektif
', '', '', '', '', '', 'Melaporkan hasil lab dan foto thorax ke dr Siti Nila,SpA', 'Bayi masih ada retraksi,suhu 37.4 C,HR 180x/mnt,RR 51x/mnt,SPO2 94Úrah Lengkap : Hemoglobin L 14.5 g/dL ;Hematokrit 48 % ;Eritrosit 4.86 ;Leukosit 27.5 ;Trombosit 355  ;Laju Endap Darah (LED) 1 mm/jam ;MCV H 98 ;MCHC L 31 g/dL 
 Hitung Jenis : Basofil 0 %; Eosinofil H 4 % ; Neutrofil Segmen 55 % ; Limfosit 31 % ; Monosit H 10 % ; Foto thorax terlampir', 'Gangguan ventilasi spontan', 'Apakah advice selanjutnya', '1686', '1', '-', NULL, '1686', '1', NULL, '2025-06-04 19:19:07')
ERROR - 2025-06-04 19:19:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:19:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760242', '2025-06-04 18:56', '18', '', '', 'Ikterik Neonatus, Menyusui tidak efektif
', '', '', '', '', '', 'Melaporkan hasil lab dan foto thorax ke dr Siti Nila,SpA', 'Bayi masih ada retraksi,suhu 37.4 C,HR 180x/mnt,RR 51x/mnt,SPO2 94Úrah Lengkap : Hemoglobin L 14.5 g/dL ;Hematokrit 48 % ;Eritrosit 4.86 ;Leukosit 27.5 ;Trombosit 355  ;Laju Endap Darah (LED) 1 mm/jam ;MCV H 98 ;MCHC L 31 g/dL ,Hitung Jenis : Basofil 0 %; Eosinofil H 4 % ; Neutrofil Segmen 55 % ; Limfosit 31 % ; Monosit H 10 % ; Foto thorax terlampir', 'Gangguan ventilasi spontan', 'Apakah advice selanjutnya', '1686', '1', '-', NULL, '1686', '1', NULL, '2025-06-04 19:19:27')
ERROR - 2025-06-04 19:20:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:20:25 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('760242', '2025-06-04 18:56', '18', '', '', 'Ikterik Neonatus, Menyusui tidak efektif
', '', '', '', '', '', 'Melaporkan hasil lab dan foto thorax ke dr Siti Nila,SpA', 'Bayi masih ada retraksi,suhu 37.4 C,HR 180x/mnt,RR 51x/mnt,SPO2 94Úrah Lengkap : Hemoglobin L 14.5 g/dL ;Hematokrit 48 % ;Eritrosit 4.86 ;Leukosit 27.5 ;Trombosit 355  ;Laju Endap Darah (LED) 1 mm/jam ;MCV H 98 ;MCHC L 31 g/dL ,Hitung Jenis : Basofil 0 %,Eosinofil H 4 %,Neutrofil Segmen 55 % ,Limfosit 31 %,Monosit H 10 % ; Foto thorax terlampir', 'Gangguan ventilasi spontan', 'Apakah advice selanjutnya?', '1686', '1', '-', NULL, '1686', '1', NULL, '2025-06-04 19:20:25')
ERROR - 2025-06-04 19:21:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 19:24:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 19:46:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 19:46:50 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 19:48:17 --> Severity: Notice  --> Undefined variable: kategori_barang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-06-04 19:48:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-06-04 19:49:26 --> Severity: Notice  --> Undefined variable: kategori_barang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-06-04 19:49:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-06-04 19:50:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:50:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 19:50:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:50:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 19:50:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:50:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 19:54:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:54:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 19:54:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 19:54:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:07:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (861198, '8', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:07:56 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (861198, '8', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (861198, '8', '', '', '1 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 20:10:03 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-04 20:11:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (861199, '2', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:11:00 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (861199, '2', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (861199, '2', '', '', '1 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-04 20:14:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-04 20:16:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 20:17:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:17:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:17:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:17:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:17:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:17:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:17:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:17:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:18:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:18:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:18:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:18:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:20:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:20:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:21:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:21:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:21:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:21:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:26:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:26:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:26:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:26:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:26:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:26:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:27:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:27:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:30:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 20:40:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:40:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:40:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 13:48:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 13:48:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 13:48:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 13:48:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:51:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 20:58:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:58:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 20:59:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 20:59:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 21:00:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 21:00:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 21:03:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 21:10:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 21:10:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:13:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:13:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:14:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:14:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:15:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:15:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:16:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 21:17:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 21:17:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 21:17:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 21:18:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 21:18:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 14:25:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:25:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:36:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:36:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:36:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:36:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 21:36:42 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-04 21:36:42 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-04 14:46:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 14:46:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:17:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:17:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:17:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 15:17:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 22:46:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 22:46:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 22:46:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 22:46:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 16:02:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:02:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:02:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:02:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:02:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:02:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:03:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:03:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:03:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:03:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:03:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:03:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:03:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:03:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:05:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:05:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:05:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:05:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:06:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:06:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:06:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:06:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:06:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 23:06:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 23:06:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 23:06:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 23:06:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 23:06:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 23:13:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 23:13:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 23:13:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 23:13:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 23:20:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-05 06&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-06-05 06'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 23:20:40 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-05 06"
LINE 4: AND "lo_tgl" = '2025-06-05 06'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '2052'
AND "lo_tgl" = '2025-06-05 06'
AND "id_layanan_pendaftaran" = '760265'
ERROR - 2025-06-04 23:20:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-05 06&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-06-05 06'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 23:20:45 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-05 06"
LINE 4: AND "lo_tgl" = '2025-06-05 06'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '2052'
AND "lo_tgl" = '2025-06-05 06'
AND "id_layanan_pendaftaran" = '760265'
ERROR - 2025-06-04 16:26:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:26:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:26:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:26:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:26:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 16:26:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:27:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 23:34:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-04 23:34:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-04 23:38:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-04 17:09:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:09:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:09:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:09:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:09:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:09:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:09:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 17:09:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:17:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:17:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:17:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:17:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:26:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:26:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:26:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:26:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:26:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:26:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:27:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 20:27:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 22:19:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 22:19:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:46:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:51:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-04 23:51:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
