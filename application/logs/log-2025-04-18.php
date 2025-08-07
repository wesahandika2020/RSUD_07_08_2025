<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-04-18 00:01:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 00:01:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 00:01:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 00:01:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 00:01:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 00:01:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 00:02:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 00:02:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 00:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 00:19:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 00:54:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;lp&quot;
LINE 10: ...5-04-18 23:59:59' and p.id ilike '%00083974'  and lp.cara_ba...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 00:54:43 --> Query error: ERROR:  missing FROM-clause entry for table "lp"
LINE 10: ...5-04-18 23:59:59' and p.id ilike '%00083974'  and lp.cara_ba...
                                                              ^ - Invalid query:  select DISTINCT ON (lpd.id) lpd.id,lpd.id_pendaftaran, 'rawat_jalan' as search_jenis_layanan, 'cco' search_filter,
                    pd.no_register,pd.tanggal_daftar,pd.tanggal_keluar, lpd.tanggal_layanan,   CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama,
                    p.id as id_pasien,pd.jenis_pendaftaran, lpd.jenis_layanan, (select nama from sm_spesialisasi where id=lpd.id_unit_layanan) nama_layanan,
                    lpd.id_dokter, pg.nama dokter,lpd.cara_bayar, pj.nama penjamin,lpd.status_terlayani, lpd.tindak_lanjut,lpd.id_penjamin   from sm_pendaftaran as pd 
                 left join sm_layanan_pendaftaran lpd on pd.id=lpd.id_pendaftaran
                 left join sm_pasien as p on p.id = pd.id_pasien
                 left join sm_tenaga_medis tm on lpd.id_dokter=tm.id
	             left join sm_pegawai pg on tm.id_pegawai=pg.id
                 left join sm_penjamin pj on lpd.id_penjamin=pj.id
                 where lpd.id is not null  and lpd.tanggal_layanan BETWEEN '2025-04-17 00:00:00' AND '2025-04-18 23:59:59' and p.id ilike '%00083974'  and lp.cara_bayar = 'Tunai'  and pd.jenis_pendaftaran = 'IGD'  and lpd.tindak_lanjut ilike ('%cco sementara%')  and lpd.jenis_layanan in ('Poliklinik','IGD','Medical Check Up') and pd.jenis_rawat='Jalan'   limit 10 offset 0
ERROR - 2025-04-18 01:14:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 01:22:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 01:22:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 01:23:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 01:23:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 02:37:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 02:37:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 02:37:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 02:37:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 02:37:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 02:37:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 02:44:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 02:44:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 03:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 03:23:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 04:24:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-18 04:36:44 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-18 04:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 05:04:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 05:04:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 05:04:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 05:04:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 05:04:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 05:04:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 05:04:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 05:04:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 05:08:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (828386, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 05:08:43 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (828386, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (828386, '1', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 05:11:24 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-18 05:30:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 05:37:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 06:27:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:27:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 06:27:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5995501, '419', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:27:44 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5995501, '419', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5995501, '419', 8858.4, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 06:28:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:28:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 06:29:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:29:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 06:29:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:29:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 06:30:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 06:33:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 06:34:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-04-18 06:34:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-04-18 06:34:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-04-18 06:36:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:36:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 06:36:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:36:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 06:37:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:37:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 06:37:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 06:37:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 06:39:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 06:42:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 06:42:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 06:42:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 06:48:39 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10731
ERROR - 2025-04-18 06:48:39 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10731
ERROR - 2025-04-18 06:48:48 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10731
ERROR - 2025-04-18 06:48:48 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10731
ERROR - 2025-04-18 06:49:32 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10731
ERROR - 2025-04-18 06:49:32 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10731
ERROR - 2025-04-18 06:50:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 06:52:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 06:53:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 06:58:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 07:06:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 07:06:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 07:06:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 07:06:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 07:07:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 07:07:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 07:07:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 07:07:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 07:07:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 07:07:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 07:16:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:19:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 07:21:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:24:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 07:26:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:30:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 07:32:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 07:32:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 07:34:44 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 07:35:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:39:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 07:44:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:45:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 07:45:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:50:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:55:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:55:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:56:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:56:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 07:57:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 07:58:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (828404, '2', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 07:58:42 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (828404, '2', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (828404, '2', '', '', 'Injeksi', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 07:59:46 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 08:09:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 08:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 08:21:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-04-18 08:21:49', 1253384, '105', '', '81315...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 08:21:49 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-04-18 08:21:49', 1253384, '105', '', '81315...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-04-18 08:21:49', 1253384, '105', '', '81315.00', '166633.20', '1', 166633.2, '259', '2032')
ERROR - 2025-04-18 08:22:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 08:30:37 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-18 08:30:47 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-18 08:31:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 08:36:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (828410, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 08:36:19 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (828410, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (828410, '2', '', '', '', '', 'null', '0', '', '0', '', 'infus ', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 08:40:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 08:51:29 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 08:51:29 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 08:51:32 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 08:51:32 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 08:51:33 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 08:51:33 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 08:51:35 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 08:51:35 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 08:53:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 08:57:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 08:59:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 08:59:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 09:06:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 09:07:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 09:08:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 09:13:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11889
ERROR - 2025-04-18 09:23:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 09:24:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:24:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:24:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:24:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:24:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:24:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:24:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:24:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:24:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5995725, '666', 2019.6, '5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:24:51 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5995725, '666', 2019.6, '5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5995725, '666', 2019.6, '5', '1.00', 'Ya', 'null')
ERROR - 2025-04-18 09:25:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:25:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:25:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:25:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:25:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:25:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:26:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:26:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:26:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 09:27:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 09:42:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 09:56:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:56:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 09:56:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 09:56:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 10:14:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (828428, '10', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 10:14:14 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (828428, '10', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (828428, '10', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 10:21:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 10:25:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 10:25:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 10:26:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 10:26:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 10:27:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 10:27:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 10:29:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 10:29:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 10:30:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 10:30:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 10:34:45 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 10:34:45 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 10:35:56 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 10:35:56 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 10:42:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 10:42:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 10:43:17 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 10:43:17 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 10:55:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 10:57:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 10:57:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 10:57:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 10:57:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 10:57:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 10:57:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 10:58:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 11:01:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 11:02:49 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 11:02:49 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 11:02:53 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 11:02:53 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 11:02:58 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 11:02:58 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 11:03:33 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-18 11:03:33 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-18 11:05:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 11:05:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 11:07:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11582
ERROR - 2025-04-18 11:17:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 11:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 11:30:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 11:49:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 11:49:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 11:57:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 11:57:22 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-18 11:57:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 11:57:22 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-18 11:57:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 11:57:22 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-18 11:57:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot; 00:00:00&quot;
LINE 27: WHERE &quot;r&quot;.&quot;tanggal&quot; BETWEEN ' 00:00:00' AND '2025-04-18 23:5...
                                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 11:57:51 --> Query error: ERROR:  invalid input syntax for type date: " 00:00:00"
LINE 27: WHERE "r"."tanggal" BETWEEN ' 00:00:00' AND '2025-04-18 23:5...
                                     ^ - Invalid query: SELECT *
FROM (SELECT DISTINCT ON (r.id)
			r.id, "rt"."id" as "id_resep_tebus", date(r.waktu) as tanggal, "pj"."id" as "id_penjualan", "pj"."waktu_diserahkan", "pg"."nama" as "dokter", "p"."nama" as "pasien", "p"."alamat" as "alamat_pasien", "p"."id" as "no_rm", "p"."tanggal_lahir", "lp"."jenis_layanan", CASE WHEN lp.cara_bayar = 'Tunai' THEN 'Umum' ELSE pjn.nama END as cara_bayar, "lp"."id_penjamin", "pjn"."nama" as "nama_penjamin", "lp"."id_dokter", "sp"."nama" as "spesialisasi", "jko"."layanan" as "layanan_ok", 0 as "is_log"
FROM "sm_resep" as "r"
LEFT JOIN "sm_resep_tebus" as "rt" ON "rt"."id_resep" = "r"."id"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_jadwal_kamar_operasi" as "jko" ON "jko"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "r"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_unit" as "u" ON "u"."id" = "sp"."id_unit"
LEFT JOIN "sm_penjamin" as "pjn" ON "pjn"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id" UNION SELECT DISTINCT ON (rl.resep->>'id')
			(rl.resep->>'id')::int as id, (rl.resep_tebus->>'id')::int as id_resep_tebus, date(rl.resep->>'waktu') as tanggal, "pj"."id" as "id_penjualan", "pj"."waktu_diserahkan", "pg"."nama" as "dokter", "p"."nama" as "pasien", "p"."alamat" as "alamat_pasien", "p"."id" as "no_rm", "p"."tanggal_lahir", "lp"."jenis_layanan", CASE WHEN lp.cara_bayar = 'Tunai' THEN 'Umum' ELSE pjn.nama END as cara_bayar, "lp"."id_penjamin", "pjn"."nama" as "nama_penjamin", "lp"."id_dokter", "sp"."nama" as "spesialisasi", "jko"."layanan" as "layanan_ok", 1 as is_log
FROM "sm_resep_logs" "rl"
JOIN "sm_pasien" as "p" ON "p"."id" = rl.resep->>'id_pasien'
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = (rl.resep->>'id_layanan_pendaftaran')::int
LEFT JOIN "sm_jadwal_kamar_operasi" as "jko" ON "jko"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = (rl.resep->>'id_dokter')::int
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_unit" as "u" ON "u"."id" = "sp"."id_unit"
LEFT JOIN "sm_penjamin" as "pjn" ON "pjn"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = (rl.resep->>'id')::int
WHERE "rl"."aksi" = 'Hapus') as r
WHERE "r"."tanggal" BETWEEN ' 00:00:00' AND '2025-04-18 23:59:59'
AND "r"."no_rm" = '00373608'
AND "r"."jenis_layanan" = 'Rawat Inap'
ORDER BY "r"."id" DESC, "r"."tanggal" DESC
 LIMIT 10
ERROR - 2025-04-18 11:59:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 12:00:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:00:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:05:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (828465, '3', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:05:22 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (828465, '3', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (828465, '3', '', '', 'Injeksi', '', 'WAKE', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 12:05:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 12:06:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:06:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:06:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:06:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:10:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 12:21:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 12:21:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 12:22:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 12:23:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 12:24:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 12:27:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 12:37:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 12:39:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;LIKE&quot;
LINE 11: AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:39:47 --> Query error: ERROR:  syntax error at or near "LIKE"
LINE 11: AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
                                   ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, date(pd.tanggal_daftar) as tanggal_daftar, "pd"."tanggal_keluar", "pd"."id_pasien", "pjl"."id_resep", "pjl"."id_resep_tebus", "pd"."no_register", CONCAT_WS(' ', "p"."nama", COALESCE(p.status_pasien, '')) as nama, "p"."tanggal_lahir", "p"."alamat", COALESCE(pj.nama, '') as penjamin, "p"."telp", COALESCE(sp.nama, '') as layanan, COALESCE(pg.nama, '') as dokter, COALESCE(lp.no_antrian, 0) as no_antrian, "pjl"."id" as "id_penjualan", "pd"."jenis_igd"
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_penjualan" as "pjl" ON "pjl"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "d" ON "d"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "d"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "lp"."id_penjamin" = "pj"."id"
WHERE "lp"."jenis_layanan" in ('Poliklinik','IGD','Kemoterapi', 'Medical Check Up')
AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
AND "lp"."jenis_layanan" = 'IGD'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-04-18 12:39:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;LIKE&quot;
LINE 11: AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:39:55 --> Query error: ERROR:  syntax error at or near "LIKE"
LINE 11: AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
                                   ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, date(pd.tanggal_daftar) as tanggal_daftar, "pd"."tanggal_keluar", "pd"."id_pasien", "pjl"."id_resep", "pjl"."id_resep_tebus", "pd"."no_register", CONCAT_WS(' ', "p"."nama", COALESCE(p.status_pasien, '')) as nama, "p"."tanggal_lahir", "p"."alamat", COALESCE(pj.nama, '') as penjamin, "p"."telp", COALESCE(sp.nama, '') as layanan, COALESCE(pg.nama, '') as dokter, COALESCE(lp.no_antrian, 0) as no_antrian, "pjl"."id" as "id_penjualan", "pd"."jenis_igd"
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_penjualan" as "pjl" ON "pjl"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "d" ON "d"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "d"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "lp"."id_penjamin" = "pj"."id"
WHERE "lp"."jenis_layanan" in ('Poliklinik','IGD','Kemoterapi', 'Medical Check Up')
AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
AND "lp"."id_unit_layanan" = '26'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-04-18 12:40:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;LIKE&quot;
LINE 12: AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:40:12 --> Query error: ERROR:  syntax error at or near "LIKE"
LINE 12: AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
                                   ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, date(pd.tanggal_daftar) as tanggal_daftar, "pd"."tanggal_keluar", "pd"."id_pasien", "pjl"."id_resep", "pjl"."id_resep_tebus", "pd"."no_register", CONCAT_WS(' ', "p"."nama", COALESCE(p.status_pasien, '')) as nama, "p"."tanggal_lahir", "p"."alamat", COALESCE(pj.nama, '') as penjamin, "p"."telp", COALESCE(sp.nama, '') as layanan, COALESCE(pg.nama, '') as dokter, COALESCE(lp.no_antrian, 0) as no_antrian, "pjl"."id" as "id_penjualan", "pd"."jenis_igd"
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_penjualan" as "pjl" ON "pjl"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "d" ON "d"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "d"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "lp"."id_penjamin" = "pj"."id"
WHERE "lp"."tanggal_layanan" BETWEEN '2025-04-14 00:00:00' AND '2025-04-18 23:59:59'
AND "lp"."jenis_layanan" in ('Poliklinik','IGD','Kemoterapi', 'Medical Check Up')
AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
AND "lp"."id_unit_layanan" = '26'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-04-18 12:40:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;LIKE&quot;
LINE 12: AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:40:13 --> Query error: ERROR:  syntax error at or near "LIKE"
LINE 12: AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
                                   ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, date(pd.tanggal_daftar) as tanggal_daftar, "pd"."tanggal_keluar", "pd"."id_pasien", "pjl"."id_resep", "pjl"."id_resep_tebus", "pd"."no_register", CONCAT_WS(' ', "p"."nama", COALESCE(p.status_pasien, '')) as nama, "p"."tanggal_lahir", "p"."alamat", COALESCE(pj.nama, '') as penjamin, "p"."telp", COALESCE(sp.nama, '') as layanan, COALESCE(pg.nama, '') as dokter, COALESCE(lp.no_antrian, 0) as no_antrian, "pjl"."id" as "id_penjualan", "pd"."jenis_igd"
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_penjualan" as "pjl" ON "pjl"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "d" ON "d"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "d"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "lp"."id_penjamin" = "pj"."id"
WHERE "lp"."tanggal_layanan" BETWEEN '2025-04-14 00:00:00' AND '2025-04-18 23:59:59'
AND "lp"."jenis_layanan" in ('Poliklinik','IGD','Kemoterapi', 'Medical Check Up')
AND  p.id ilike '337440%' LIKE '%%' ESCAPE '!'
AND "lp"."id_unit_layanan" = '26'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-04-18 12:41:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 12:41:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 12:42:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:42:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:46:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:46:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:46:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:46:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:46:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('828440', '4', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:46:54 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('828440', '4', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('828440', '4', '', '', 'Injeksi', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 12:50:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:50:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:51:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:51:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:51:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:51:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:51:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:51:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:51:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:51:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:52:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:52:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 12:53:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 12:53:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:02:17 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-18 13:04:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (844767, 729811, null, 8, , , , , , 2039, 1, &lt;p&gt;Sudah konsultasi dan konfirmasi ulang dr Khotib SpAn &lt;br&gt;Adv..., null, null, 2039, 2025-04-18 13:04:43, null, null, null, null, null, null, null, 1, , , ,  pasien masih fighting, cenderung membuka ett, sampai duduk, TSB/ gerak mulai aktif
Hr: 78x/menit,
 Rr: on venti
 Suhu: 37..., EDH TEMPORAL SIN post craniotomy, Lapor dr Khotib SpAn , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:04:43 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (844767, 729811, null, 8, , , , , , 2039, 1, <p>Sudah konsultasi dan konfirmasi ulang dr Khotib SpAn <br>Adv..., null, null, 2039, 2025-04-18 13:04:43, null, null, null, null, null, null, null, 1, , , ,  pasien masih fighting, cenderung membuka ett, sampai duduk, TSB/ gerak mulai aktif
Hr: 78x/menit,
 Rr: on venti
 Suhu: 37..., EDH TEMPORAL SIN post craniotomy, Lapor dr Khotib SpAn , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('729811', NULL, '8', '', '', '', '', '', '', '', '', ' pasien masih fighting, cenderung membuka ett, sampai duduk', 'TSB/ gerak mulai aktif
Hr: 78x/menit,
 Rr: on venti
 Suhu: 37*C,
 Spo2 96-99 persen on venti
Terpasang mode SIMV PC 13/12/50 % target TV 500

Sedasi 
Midazolam 1 mg/jam, sudah dinaikan jadi 5mg/jam
Fentanyl per syring pump 1cc/jam (Fentanyl 200 mcg + NACL 24 ml)', 'EDH TEMPORAL SIN post craniotomy', 'Lapor dr Khotib SpAn ', '2039', '1', '<p>Sudah konsultasi dan konfirmasi ulang dr Khotib SpAn <br>Advice</p><p><br></p>', NULL, '2039', '1', NULL, '2025-04-18 13:04:43')
ERROR - 2025-04-18 13:06:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (844768, 729811, null, 8, , , , , , 2039, 1, &lt;p&gt;Sudah konsultasi dan konfirmasi ulang dr Khotib SpAn &lt;br&gt;Adv..., null, null, 2039, 2025-04-18 13:06:00, null, null, null, null, null, null, null, 1, , , ,  pasien masih fighting, cenderung membuka ett, sampai duduk, TSB/ gerak mulai aktif
Hr: 78x/menit,
 Rr: on venti
 Suhu: 37..., EDH TEMPORAL SIN post craniotomy, Lapor dr Khotib SpAn , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:06:00 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (844768, 729811, null, 8, , , , , , 2039, 1, <p>Sudah konsultasi dan konfirmasi ulang dr Khotib SpAn <br>Adv..., null, null, 2039, 2025-04-18 13:06:00, null, null, null, null, null, null, null, 1, , , ,  pasien masih fighting, cenderung membuka ett, sampai duduk, TSB/ gerak mulai aktif
Hr: 78x/menit,
 Rr: on venti
 Suhu: 37..., EDH TEMPORAL SIN post craniotomy, Lapor dr Khotib SpAn , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('729811', NULL, '8', '', '', '', '', '', '', '', '', ' pasien masih fighting, cenderung membuka ett, sampai duduk', 'TSB/ gerak mulai aktif
Hr: 78x/menit,
 Rr: on venti
 Suhu: 37*C,
 Spo2 96-99 persen on venti
Terpasang mode SIMV PC 13/12/50 % target TV 500

Sedasi 
Midazolam 1 mg/jam, sudah dinaikan jadi 5mg/jam
Fentanyl per syring pump 1cc/jam (Fentanyl 200 mcg + NACL 24 ml)', 'EDH TEMPORAL SIN post craniotomy', 'Lapor dr Khotib SpAn ', '2039', '1', '<p>Sudah konsultasi dan konfirmasi ulang dr Khotib SpAn <br>Advice</p><p><br></p>', NULL, '2039', '1', NULL, '2025-04-18 13:06:00')
ERROR - 2025-04-18 13:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:13:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:14:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:14:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:33:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (22283, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 729831, 2025-04-18 13:33:28, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:33:28 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (22283, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 729831, 2025-04-18 13:33:28, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('729831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-18 13:33:28')
ERROR - 2025-04-18 13:33:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (22284, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 729831, 2025-04-18 13:33:31, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:33:31 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (22284, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 729831, 2025-04-18 13:33:31, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('729831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-18 13:33:31')
ERROR - 2025-04-18 13:33:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (22285, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 729831, 2025-04-18 13:33:39, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:33:39 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (22285, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 729831, 2025-04-18 13:33:39, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('729831', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-18 13:33:39')
ERROR - 2025-04-18 13:37:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 13:39:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 13:42:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:42:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:42:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 13:43:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:43:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:44:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:44:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:45:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:45:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:46:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:46:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:47:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:47:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 13:49:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 13:49:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 13:50:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 13:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 13:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 13:57:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 14:02:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 14:05:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 14:05:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 14:06:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:06:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:12:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:12:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-18 14:12:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:12:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-18 14:16:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:16:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:16:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:16:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:17:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:18:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 14:23:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:26:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:26:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:26:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-04-18 14:26:53', 1253561, '105', '', '81315...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:26:53 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-04-18 14:26:53', 1253561, '105', '', '81315...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-04-18 14:26:53', 1253561, '105', '', '81315.00', '166633.20', '1', 166633.2, '259', '2026')
ERROR - 2025-04-18 14:26:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-04-18 14:26:58', 1253562, '105', '', '81315...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:26:58 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-04-18 14:26:58', 1253562, '105', '', '81315...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-04-18 14:26:58', 1253562, '105', '', '81315.00', '166633.20', '1', 166633.2, '259', '2026')
ERROR - 2025-04-18 14:28:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:38:06 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-04-18 14:38:06 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-04-18 14:38:06 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-04-18 14:38:06 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-04-18 14:38:06 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-04-18 14:38:06 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-04-18 14:38:06 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-04-18 14:38:06 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-04-18 14:38:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:38:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:38:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (5996432, '592', 2216.448, '10', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:38:22 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (5996432, '592', 2216.448, '10', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5996432, '592', 2216.448, '10', '2.00', 'Ya', 'null')
ERROR - 2025-04-18 14:38:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:38:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:38:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:38:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:39:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:39:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:39:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:39:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:39:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 14:39:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:39:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:39:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:39:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:39:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:39:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:40:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:40:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 14:40:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:40:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:40:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:40:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:41:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:41:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:41:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:41:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:41:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (828488, '1', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:41:27 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (828488, '1', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (828488, '1', '', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, '6:00', '18:00', NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 14:41:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 14:41:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 14:59:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 15:16:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 15:18:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:18:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:18:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5996517, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:18:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5996517, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5996517, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 15:18:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:18:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:18:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:18:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:18:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:18:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:18:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:19:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:19:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:19:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:19:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:19:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:19:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:19:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:19:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:19:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:19:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:19:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:19:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:24:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:24:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:28:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 15:28:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 15:37:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:37:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:43:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:44:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:44:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:44:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5996642, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:44:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5996642, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5996642, '237', 9457.2, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 15:44:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:44:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:44:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:44:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('828493', '9', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:44:41 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('828493', '9', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('828493', '9', '', '1', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 15:45:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:45:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:45:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 15:45:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 15:56:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 16:03:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 16:07:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 16:07:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 16:07:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 16:07:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 16:07:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 16:07:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 16:13:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 16:45:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 16:45:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-18 16:45:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 16:45:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-18 16:52:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 17:02:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 17:05:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 17:06:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (828507, '9', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:06:09 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (828507, '9', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (828507, '9', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 17:08:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 17:14:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-18 17:25:26 --> Severity: Notice  --> Undefined property: stdClass::$id_radiologi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/keuangan/controllers/Pembayaran.php 422
ERROR - 2025-04-18 17:26:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:26:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-18 17:26:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:26:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-18 17:27:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:27:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-18 17:27:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:27:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-18 17:34:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5996786, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:34:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5996786, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5996786, '123', 2386.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 17:45:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5996833, '53', 12387.6, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:45:23 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5996833, '53', 12387.6, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5996833, '53', 12387.6, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 17:56:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0x96 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:56:24 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0x96 - Invalid query: select tm.*, pg.nama, coalesce(s.nama, '') as spesialisasi 
                  from sm_tenaga_medis as tm
                  join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                  left join sm_spesialisasi as s on (s.id = tm.id_spesialisasi) 
                  left join sm_profesi_nadis as pn on (pn.id = tm.id_profesi)  
                  where pg.nama ilike ('%pH 7.414 7.350 - 7.450  p CO2 LL 19.8 mm Hg 35.0 - 45.0  p O2 H 105 mm Hg 80 - 95  HCO3 L 13 mEq/L 22 - 26  O2 Saturasi H 97.6 �.0 - 97.0  Base Excess L -12.1 mmol/L - 2.5 - + 2.5  ctCO2 L 13%') and pg.status = '1'  and pn.id = '18'  order by pg.nama limit 20 offset 0
ERROR - 2025-04-18 17:56:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0x96 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 17:56:24 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0x96 - Invalid query: INSERT INTO "sm_logs" ("waktu", "menu", "status", "url", "response") VALUES ('2025-04-18 17:56:24', '[object HTMLLIElement]', 'Internal Server Error', 'https://simrsud.tangerangkota.go.id/masterdata/api/masterdata_auto/nadis_auto?q=pH 7.414 7.350 - 7.450  p CO2 LL 19.8 mm Hg 35.0 - 45.0  p O2 H 105 mm Hg 80 - 95  HCO3 L 13 mEq/L 22 - 26  O2 Saturasi H 97.6 �.0 - 97.0  Base Excess L -12.1 mmol/L - 2.5 - + 2.5  ctCO2 L 13', '<div xss=removed>

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  pg_query(): Query failed: ERROR:  invalid byte sequence for encoding ')
ERROR - 2025-04-18 18:12:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 18:19:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (5996888, '307', 18000.648, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 18:19:06 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (5996888, '307', 18000.648, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5996888, '307', 18000.648, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 18:26:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ...yanan_pendaftaran&quot; = '729850', &quot;id_pendaftaran&quot; = '', &quot;id_us...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 18:26:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ...yanan_pendaftaran" = '729850', "id_pendaftaran" = '', "id_us...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_kebidanan_dan_kandungan" SET "id_layanan_pendaftaran" = '729850', "id_pendaftaran" = '', "id_users" = '2024', "waktu_kajian_kebidanan" = '2025-04-18 18:00', "cara_tiba" = '{"cara_tiba_diruangan_pasien":"KursiRoda"}', "rujukan" = '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":"lain-lain","rujukan_pasienl":null}', "informasi" = '{"informasi_pasien":"Pasien","informasi_pasienn":null}', "keluhan_utama_keb" = '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":null}', "rks_hamil_muda" = '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":null}', "rks_hamil_tua" = '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":null}', "rks_anc" = '{"anc_1":"-","anc_2":"-","anc_3":null,"anc_4":null,"anc_5":null}', "rks_g" = '-', "rks_p" = '-', "rks_a" = '-', "rks_usia_kehamilan" = '-', "rks_hpht" = '-', "rks_tp" = '-', "rk_riwayat_menstruasi" = '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"14","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"2","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', "rk_riwayat_perkawinan" = '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"5","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', "rk_riwayat_penyakit_operasi" = '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"1","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"1","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', "rk_obat_dikosumsi" = NULL, "rk_membawa_obat_dari_luar" = '{"membawa_obat_1":"0"}', "rk_terapi_komplementari" = '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":null}', "rk_riwayat_penyakit_kluwarga" = '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":null}', "rk_riwayat_kluwarga_berencana" = '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', "rk_riwayat_ginekologi" = '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":null}', "rk_riwayat_alergi" = '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', "rk_riwayat_tranfusi_darah" = '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":"1","riwayat_tranfusi_darah_5":null}', "rk_kebiasaan" = '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', "rk_status_psikologi" = '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', "rk_status_mental" = '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', "rk_kebutuhan_biologis" = '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"18:15","kebutuhan_biologis_3":"3-6","kebutuhan_biologis_4":"18:15","kebutuhan_biologis_5":"3-4","kebutuhan_biologis_6":"18:15","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"18:15","kebutuhan_biologis_9":"1bulan"}', "rk_kebutuhan_sosial" = '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', "rk_status_ekonomi" = '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', "rk_status_nilai_kepercayaan" = '{"status_nn_kepercayaan_1":"1","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"1","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":null}', "rk_spiritual" = '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', "rk_budaya" = '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', "ikbe_kewarganegaraan" = '1', "ikbe_suku_bangsa" = NULL, "ikbe_bicara" = '0', "ikbe_jelaskan" = NULL, "ikbe_perlu_peterjemah" = '0', "ikbe_bahasa" = NULL, "ikbe_bahasa_isyarat" = '0', "ikbe_pemahaman_penyakit" = '1', "ikbe_pemahaman_pengobatan" = '1', "ikbe_pemahaman_nutrisi" = '1', "ikbe_pemahaman_spiritual" = '1', "ikbe_pemahaman_peralatan" = '0', "ikbe_pemahaman_rahab" = '0', "ikbe_pemahaman_manajemen" = '1', "hambatan_keb" = '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', "pkdk_inpeksi_abdomen" = '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":"1","infeksi_abdomen_10":null}', "pkdk_palpasi" = '{"palpasi_1":"-","palpasi_2":null,"palpasi_3":null,"palpasi_4":"1","palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":"1","palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":"1","palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', "pkdk_auskultasi" = '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', "pkdk_gerak_janin" = '-', "pkdk_his_kontraksi" = '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', "pkdk_pemeriksaan_dalam" = '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', "pkf_makan" = '10', "pkf_mandi" = '0', "pkf_personal" = '0', "pkf_berpakaian" = '5', "pkf_buang_besar" = '10', "pkf_buang_kecil" = '10', "pkf_berpindah" = '10', "pkf_toileting" = '5', "pkf_mobilitas" = '10', "pkf_naik" = '10', "pkf_jumlah_skor" = '70', "sn_penurunan_bb_kebidanan" = '1', "sn_penurunan_bb_on_kebidanan" = NULL, "sn_asupan_makan_kebidanan" = '0', "sn_total_kebidanan" = '0', "ptn_nilai_tingkat_nyeri" = '{"keterangan_kebidanan_1":"Berat"}', "ptn_nyeri_hilang" = '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', "prjd_riwayat_jatuh" = NULL, "prjd_diagnosis" = '15', "prjd_kursi_roda" = NULL, "prjd_kruk_tongkat" = NULL, "prjd_berpegangan" = '30', "prjd_terpasang_infus" = '20', "prjd_normal" = NULL, "prjd_lemah" = '10', "prjd_terganggu" = NULL, "prjd_sadar" = '0', "prjd_sering" = NULL, "prjd_jumlah_skor" = '75', "spak_usia" = '0', "spak_nafas" = '0', "spak_sepsis" = '0', "spak_multiple" = '0', "spak_studium" = '0', "pftv_kesadaran" = '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', "pftv_gsc_e" = '4', "pftv_gsc_m" = '6', "pftv_gsc_v" = '5', "pftv_total" = '15', "pftv_tekanan_darah" = '{"tekanan_darah_1":"133","tekanan_darah_2":"88","tekanan_darah_3":"36.6"}', "pftv_frekuensi_nadi" = '{"frekuensi_nadi_1":"79","frekuensi_nadi_2":"22"}', "pftv_berat_badan" = '{"berat_badan_1":null,"berat_badan_2":null}', "pftv_mata" = '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', "pftv_dada_aksila" = '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', "pftv_ekstremitas" = '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', "pftv_sistem_pernafasan" = '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', "pftv_sistem_kardiovaskuler" = '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"1","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', "sews_respirasi" = '0_2', "sews_saturasi_1" = '0_3', "sews_o2" = '0_2', "sews_suhu" = '0_2', "sews_td_sistolik" = '0_2', "sews_td_diastolik" = '0_1', "sews_nadi" = '0_3', "sews_kesadaran_1" = '0_1', "sews_nyeri" = NULL, "sews_pengeluaran" = NULL, "sews_protein_urin" = NULL, "sews_total_1" = 'Putih', "sews_laju_respirasi" = NULL, "sews_saturasi_2" = NULL, "sews_suplemen" = NULL, "sews_temperatur" = NULL, "sews_tds" = NULL, "sews_laju_jantung" = NULL, "sews_kesadaran_2" = '1', "sews_total_2" = NULL, "dp_pemeriksaan_lab_tanggal" = '2025-04-18', "dp_pemeriksaan_ctg_tanggal" = NULL, "dp_hasil" = 'terlampir', "dp_hasil1" = NULL, "dp_lain_lain" = NULL, "pk_penyakit_menular" = '{"pk_penyakit_menular_1":null,"pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', "pk_penurunan_daya_tahan_tubuh" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', "pk_pasien_kekerasan_penganiayaan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"1"}', "pk_pasien_ketergantungan_obat" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "ak_infeksi" = NULL, "ak_anxeitas" = NULL, "ak_perdarahan" = NULL, "ak_melahirkan" = '1', "ak_nausea" = NULL, "ak_efektif" = NULL, "ak_janin" = NULL, "ak_lain" = NULL, "ak_lainl" = NULL, "rak_kluwarga" = '1', "rak_selanjutnya" = '1', "rak_consent" = NULL, "rak_kebutuhan" = '1', "rak_persalinan" = NULL, "rak_pasien" = '1', "rak_lain" = NULL, "rak_lainl" = NULL, "kriteria_discharge_planing" = '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"1"}', "perencanaa_pulang" = '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":"1","kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":"1","kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":"1","kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', "tanggal_jam_bidan" = '2025-04-18 18:00:00', "id_bidan" = '306', "ttd_bidan" = '1', "tanggal_jam_dokter_keb" = '2025-04-19 08:08:00', "id_dokter" = '50', "ttd_dokter" = '1', "updated_date" = '2025-04-18 18:26:39'
WHERE "id" = '2844'
ERROR - 2025-04-18 18:26:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ...yanan_pendaftaran&quot; = '729850', &quot;id_pendaftaran&quot; = '', &quot;id_us...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 18:26:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ...yanan_pendaftaran" = '729850', "id_pendaftaran" = '', "id_us...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_kebidanan_dan_kandungan" SET "id_layanan_pendaftaran" = '729850', "id_pendaftaran" = '', "id_users" = '2024', "waktu_kajian_kebidanan" = '2025-04-18 18:00', "cara_tiba" = '{"cara_tiba_diruangan_pasien":"KursiRoda"}', "rujukan" = '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":"lain-lain","rujukan_pasienl":null}', "informasi" = '{"informasi_pasien":"Pasien","informasi_pasienn":null}', "keluhan_utama_keb" = '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":null}', "rks_hamil_muda" = '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":null}', "rks_hamil_tua" = '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":null}', "rks_anc" = '{"anc_1":"-","anc_2":"-","anc_3":null,"anc_4":null,"anc_5":null}', "rks_g" = '-', "rks_p" = '-', "rks_a" = '-', "rks_usia_kehamilan" = '-', "rks_hpht" = '-', "rks_tp" = '-', "rk_riwayat_menstruasi" = '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"14","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"2","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', "rk_riwayat_perkawinan" = '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"5","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', "rk_riwayat_penyakit_operasi" = '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"1","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"1","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', "rk_obat_dikosumsi" = NULL, "rk_membawa_obat_dari_luar" = '{"membawa_obat_1":"0"}', "rk_terapi_komplementari" = '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":null}', "rk_riwayat_penyakit_kluwarga" = '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":null}', "rk_riwayat_kluwarga_berencana" = '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', "rk_riwayat_ginekologi" = '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":null}', "rk_riwayat_alergi" = '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', "rk_riwayat_tranfusi_darah" = '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":"1","riwayat_tranfusi_darah_5":null}', "rk_kebiasaan" = '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', "rk_status_psikologi" = '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', "rk_status_mental" = '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', "rk_kebutuhan_biologis" = '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"18:15","kebutuhan_biologis_3":"3-6","kebutuhan_biologis_4":"18:15","kebutuhan_biologis_5":"3-4","kebutuhan_biologis_6":"18:15","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"18:15","kebutuhan_biologis_9":"1bulan"}', "rk_kebutuhan_sosial" = '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', "rk_status_ekonomi" = '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', "rk_status_nilai_kepercayaan" = '{"status_nn_kepercayaan_1":"1","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"1","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":null}', "rk_spiritual" = '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', "rk_budaya" = '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', "ikbe_kewarganegaraan" = '1', "ikbe_suku_bangsa" = NULL, "ikbe_bicara" = '0', "ikbe_jelaskan" = NULL, "ikbe_perlu_peterjemah" = '0', "ikbe_bahasa" = NULL, "ikbe_bahasa_isyarat" = '0', "ikbe_pemahaman_penyakit" = '1', "ikbe_pemahaman_pengobatan" = '1', "ikbe_pemahaman_nutrisi" = '1', "ikbe_pemahaman_spiritual" = '1', "ikbe_pemahaman_peralatan" = '0', "ikbe_pemahaman_rahab" = '0', "ikbe_pemahaman_manajemen" = '1', "hambatan_keb" = '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', "pkdk_inpeksi_abdomen" = '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":"1","infeksi_abdomen_10":null}', "pkdk_palpasi" = '{"palpasi_1":"-","palpasi_2":null,"palpasi_3":null,"palpasi_4":"1","palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":"1","palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":"1","palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', "pkdk_auskultasi" = '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', "pkdk_gerak_janin" = '-', "pkdk_his_kontraksi" = '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', "pkdk_pemeriksaan_dalam" = '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', "pkf_makan" = '10', "pkf_mandi" = '0', "pkf_personal" = '0', "pkf_berpakaian" = '5', "pkf_buang_besar" = '10', "pkf_buang_kecil" = '10', "pkf_berpindah" = '10', "pkf_toileting" = '5', "pkf_mobilitas" = '10', "pkf_naik" = '10', "pkf_jumlah_skor" = '70', "sn_penurunan_bb_kebidanan" = '1', "sn_penurunan_bb_on_kebidanan" = NULL, "sn_asupan_makan_kebidanan" = '0', "sn_total_kebidanan" = '0', "ptn_nilai_tingkat_nyeri" = '{"keterangan_kebidanan_1":"Berat"}', "ptn_nyeri_hilang" = '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', "prjd_riwayat_jatuh" = NULL, "prjd_diagnosis" = '15', "prjd_kursi_roda" = NULL, "prjd_kruk_tongkat" = NULL, "prjd_berpegangan" = '30', "prjd_terpasang_infus" = '20', "prjd_normal" = NULL, "prjd_lemah" = '10', "prjd_terganggu" = NULL, "prjd_sadar" = '0', "prjd_sering" = NULL, "prjd_jumlah_skor" = '75', "spak_usia" = '0', "spak_nafas" = '0', "spak_sepsis" = '0', "spak_multiple" = '0', "spak_studium" = '0', "pftv_kesadaran" = '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', "pftv_gsc_e" = '4', "pftv_gsc_m" = '6', "pftv_gsc_v" = '5', "pftv_total" = '15', "pftv_tekanan_darah" = '{"tekanan_darah_1":"133","tekanan_darah_2":"88","tekanan_darah_3":"36.6"}', "pftv_frekuensi_nadi" = '{"frekuensi_nadi_1":"79","frekuensi_nadi_2":"22"}', "pftv_berat_badan" = '{"berat_badan_1":null,"berat_badan_2":null}', "pftv_mata" = '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', "pftv_dada_aksila" = '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', "pftv_ekstremitas" = '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', "pftv_sistem_pernafasan" = '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', "pftv_sistem_kardiovaskuler" = '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"1","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', "sews_respirasi" = '0_2', "sews_saturasi_1" = '0_3', "sews_o2" = '0_2', "sews_suhu" = '0_2', "sews_td_sistolik" = '0_2', "sews_td_diastolik" = '0_1', "sews_nadi" = '0_3', "sews_kesadaran_1" = '0_1', "sews_nyeri" = NULL, "sews_pengeluaran" = NULL, "sews_protein_urin" = NULL, "sews_total_1" = 'Putih', "sews_laju_respirasi" = NULL, "sews_saturasi_2" = NULL, "sews_suplemen" = NULL, "sews_temperatur" = NULL, "sews_tds" = NULL, "sews_laju_jantung" = NULL, "sews_kesadaran_2" = '1', "sews_total_2" = NULL, "dp_pemeriksaan_lab_tanggal" = '2025-04-18', "dp_pemeriksaan_ctg_tanggal" = NULL, "dp_hasil" = 'terlampir', "dp_hasil1" = NULL, "dp_lain_lain" = NULL, "pk_penyakit_menular" = '{"pk_penyakit_menular_1":null,"pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', "pk_penurunan_daya_tahan_tubuh" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', "pk_pasien_kekerasan_penganiayaan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"1"}', "pk_pasien_ketergantungan_obat" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "ak_infeksi" = NULL, "ak_anxeitas" = NULL, "ak_perdarahan" = NULL, "ak_melahirkan" = '1', "ak_nausea" = NULL, "ak_efektif" = NULL, "ak_janin" = NULL, "ak_lain" = NULL, "ak_lainl" = NULL, "rak_kluwarga" = '1', "rak_selanjutnya" = '1', "rak_consent" = NULL, "rak_kebutuhan" = '1', "rak_persalinan" = NULL, "rak_pasien" = '1', "rak_lain" = NULL, "rak_lainl" = NULL, "kriteria_discharge_planing" = '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"1"}', "perencanaa_pulang" = '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":"1","kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":"1","kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":"1","kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', "tanggal_jam_bidan" = '2025-04-18 18:00:00', "id_bidan" = '306', "ttd_bidan" = '1', "tanggal_jam_dokter_keb" = '2025-04-19 08:08:00', "id_dokter" = '50', "ttd_dokter" = '1', "updated_date" = '2025-04-18 18:26:44'
WHERE "id" = '2844'
ERROR - 2025-04-18 18:26:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 18:26:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ...yanan_pendaftaran&quot; = '729850', &quot;id_pendaftaran&quot; = '', &quot;id_us...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 18:26:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ...yanan_pendaftaran" = '729850', "id_pendaftaran" = '', "id_us...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_kebidanan_dan_kandungan" SET "id_layanan_pendaftaran" = '729850', "id_pendaftaran" = '', "id_users" = '2024', "waktu_kajian_kebidanan" = '2025-04-18 18:00', "cara_tiba" = '{"cara_tiba_diruangan_pasien":"KursiRoda"}', "rujukan" = '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":"lain-lain","rujukan_pasienl":null}', "informasi" = '{"informasi_pasien":"Pasien","informasi_pasienn":null}', "keluhan_utama_keb" = '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":null}', "rks_hamil_muda" = '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":null}', "rks_hamil_tua" = '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":null}', "rks_anc" = '{"anc_1":"-","anc_2":"-","anc_3":null,"anc_4":null,"anc_5":null}', "rks_g" = '-', "rks_p" = '-', "rks_a" = '-', "rks_usia_kehamilan" = '-', "rks_hpht" = '-', "rks_tp" = '-', "rk_riwayat_menstruasi" = '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"14","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"2","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', "rk_riwayat_perkawinan" = '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"5","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', "rk_riwayat_penyakit_operasi" = '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"1","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"1","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', "rk_obat_dikosumsi" = NULL, "rk_membawa_obat_dari_luar" = '{"membawa_obat_1":"0"}', "rk_terapi_komplementari" = '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":null}', "rk_riwayat_penyakit_kluwarga" = '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":null}', "rk_riwayat_kluwarga_berencana" = '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', "rk_riwayat_ginekologi" = '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":null}', "rk_riwayat_alergi" = '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', "rk_riwayat_tranfusi_darah" = '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":"1","riwayat_tranfusi_darah_5":null}', "rk_kebiasaan" = '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', "rk_status_psikologi" = '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', "rk_status_mental" = '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', "rk_kebutuhan_biologis" = '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"18:15","kebutuhan_biologis_3":"3-6","kebutuhan_biologis_4":"18:15","kebutuhan_biologis_5":"3-4","kebutuhan_biologis_6":"18:15","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"18:15","kebutuhan_biologis_9":"1bulan"}', "rk_kebutuhan_sosial" = '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', "rk_status_ekonomi" = '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', "rk_status_nilai_kepercayaan" = '{"status_nn_kepercayaan_1":"1","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"1","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":null}', "rk_spiritual" = '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', "rk_budaya" = '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', "ikbe_kewarganegaraan" = '1', "ikbe_suku_bangsa" = NULL, "ikbe_bicara" = '0', "ikbe_jelaskan" = NULL, "ikbe_perlu_peterjemah" = '0', "ikbe_bahasa" = NULL, "ikbe_bahasa_isyarat" = '0', "ikbe_pemahaman_penyakit" = '1', "ikbe_pemahaman_pengobatan" = '1', "ikbe_pemahaman_nutrisi" = '1', "ikbe_pemahaman_spiritual" = '1', "ikbe_pemahaman_peralatan" = '0', "ikbe_pemahaman_rahab" = '0', "ikbe_pemahaman_manajemen" = '1', "hambatan_keb" = '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', "pkdk_inpeksi_abdomen" = '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":"1","infeksi_abdomen_10":null}', "pkdk_palpasi" = '{"palpasi_1":"-","palpasi_2":null,"palpasi_3":null,"palpasi_4":"1","palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":"1","palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":"1","palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', "pkdk_auskultasi" = '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', "pkdk_gerak_janin" = '-', "pkdk_his_kontraksi" = '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', "pkdk_pemeriksaan_dalam" = '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', "pkf_makan" = '10', "pkf_mandi" = '0', "pkf_personal" = '0', "pkf_berpakaian" = '5', "pkf_buang_besar" = '10', "pkf_buang_kecil" = '10', "pkf_berpindah" = '10', "pkf_toileting" = '5', "pkf_mobilitas" = '10', "pkf_naik" = '10', "pkf_jumlah_skor" = '70', "sn_penurunan_bb_kebidanan" = '1', "sn_penurunan_bb_on_kebidanan" = NULL, "sn_asupan_makan_kebidanan" = '0', "sn_total_kebidanan" = '0', "ptn_nilai_tingkat_nyeri" = '{"keterangan_kebidanan_1":"Berat"}', "ptn_nyeri_hilang" = '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', "prjd_riwayat_jatuh" = NULL, "prjd_diagnosis" = '15', "prjd_kursi_roda" = NULL, "prjd_kruk_tongkat" = NULL, "prjd_berpegangan" = '30', "prjd_terpasang_infus" = '20', "prjd_normal" = NULL, "prjd_lemah" = '10', "prjd_terganggu" = NULL, "prjd_sadar" = '0', "prjd_sering" = NULL, "prjd_jumlah_skor" = '75', "spak_usia" = '0', "spak_nafas" = '0', "spak_sepsis" = '0', "spak_multiple" = '0', "spak_studium" = '0', "pftv_kesadaran" = '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', "pftv_gsc_e" = '4', "pftv_gsc_m" = '6', "pftv_gsc_v" = '5', "pftv_total" = '15', "pftv_tekanan_darah" = '{"tekanan_darah_1":"133","tekanan_darah_2":"88","tekanan_darah_3":"36.6"}', "pftv_frekuensi_nadi" = '{"frekuensi_nadi_1":"79","frekuensi_nadi_2":"22"}', "pftv_berat_badan" = '{"berat_badan_1":null,"berat_badan_2":null}', "pftv_mata" = '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', "pftv_dada_aksila" = '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', "pftv_ekstremitas" = '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', "pftv_sistem_pernafasan" = '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', "pftv_sistem_kardiovaskuler" = '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"1","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', "sews_respirasi" = '0_2', "sews_saturasi_1" = '0_3', "sews_o2" = '0_2', "sews_suhu" = '0_2', "sews_td_sistolik" = '0_2', "sews_td_diastolik" = '0_1', "sews_nadi" = '0_3', "sews_kesadaran_1" = '0_1', "sews_nyeri" = NULL, "sews_pengeluaran" = NULL, "sews_protein_urin" = NULL, "sews_total_1" = 'Putih', "sews_laju_respirasi" = NULL, "sews_saturasi_2" = NULL, "sews_suplemen" = NULL, "sews_temperatur" = NULL, "sews_tds" = NULL, "sews_laju_jantung" = NULL, "sews_kesadaran_2" = '1', "sews_total_2" = NULL, "dp_pemeriksaan_lab_tanggal" = '2025-04-18', "dp_pemeriksaan_ctg_tanggal" = NULL, "dp_hasil" = 'terlampir', "dp_hasil1" = NULL, "dp_lain_lain" = NULL, "pk_penyakit_menular" = '{"pk_penyakit_menular_1":null,"pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', "pk_penurunan_daya_tahan_tubuh" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', "pk_pasien_kekerasan_penganiayaan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"1"}', "pk_pasien_ketergantungan_obat" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "ak_infeksi" = NULL, "ak_anxeitas" = NULL, "ak_perdarahan" = NULL, "ak_melahirkan" = '1', "ak_nausea" = NULL, "ak_efektif" = NULL, "ak_janin" = NULL, "ak_lain" = NULL, "ak_lainl" = NULL, "rak_kluwarga" = '1', "rak_selanjutnya" = '1', "rak_consent" = NULL, "rak_kebutuhan" = '1', "rak_persalinan" = NULL, "rak_pasien" = '1', "rak_lain" = NULL, "rak_lainl" = NULL, "kriteria_discharge_planing" = '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"1"}', "perencanaa_pulang" = '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":"1","kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":"1","kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":"1","kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', "tanggal_jam_bidan" = '2025-04-18 18:00:00', "id_bidan" = '306', "ttd_bidan" = '1', "tanggal_jam_dokter_keb" = '2025-04-19 08:08:00', "id_dokter" = '50', "ttd_dokter" = '1', "updated_date" = '2025-04-18 18:26:56'
WHERE "id" = '2844'
ERROR - 2025-04-18 18:29:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._____________________________', &quot;tanggal_lahir&quot; = '', &quot;jenis...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 18:29:28 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._____________________________', "tanggal_lahir" = '', "jenis...
                                                             ^ - Invalid query: UPDATE "sm_form_persetujuan_tindakan_kedokteran" SET "id_saksi_1" = '408', "id_keluwarga" = NULL, "nama_keluarga" = '__________________________________________________', "tanggal_lahir" = '', "jenis_kelamin" = 'Laki-laki', "alamat" = 'Tangerang', "hubungan_keluarga" = 'Anak', "tindakan" = 'Intubasi', "updated_on" = '2025-04-18 18:29:28', "is_pasien" = 0
WHERE "id_layanan_pendaftaran" = '728149'
ERROR - 2025-04-18 18:29:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._____________________________', &quot;tanggal_lahir&quot; = '', &quot;jenis...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 18:29:29 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._____________________________', "tanggal_lahir" = '', "jenis...
                                                             ^ - Invalid query: UPDATE "sm_form_persetujuan_tindakan_kedokteran" SET "id_saksi_1" = '408', "id_keluwarga" = NULL, "nama_keluarga" = '__________________________________________________', "tanggal_lahir" = '', "jenis_kelamin" = 'Laki-laki', "alamat" = 'Tangerang', "hubungan_keluarga" = 'Anak', "tindakan" = 'Intubasi', "updated_on" = '2025-04-18 18:29:29', "is_pasien" = 0
WHERE "id_layanan_pendaftaran" = '728149'
ERROR - 2025-04-18 18:46:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5996990, '887', 1272, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 18:46:47 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5996990, '887', 1272, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5996990, '887', 1272, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 19:07:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5997040, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 19:07:00 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5997040, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5997040, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 19:10:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 19:28:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 19:28:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 19:32:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-18 19:46:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 19:48:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5997128, '567', 710.4, '75', '4.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 19:48:37 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5997128, '567', 710.4, '75', '4.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5997128, '567', 710.4, '75', '4.00', 'Ya', 'null')
ERROR - 2025-04-18 19:52:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (828535, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 19:52:43 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (828535, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (828535, '3', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-18 19:57:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 20:03:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5997224, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 20:03:03 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5997224, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5997224, '1264', 28061.244, '1', '1.00', NULL, 'null')
ERROR - 2025-04-18 20:04:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 20:04:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 20:18:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 20:33:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 20:34:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 20:34:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 20:42:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 20:42:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 20:46:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 20:46:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 20:48:39 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-18 20:48:39 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-18 20:48:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-18 20:53:44 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-18 20:57:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-18 20:57:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-18 21:04:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 21:11:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 21:13:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:13:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 21:20:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 21:25:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:25:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 21:25:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:25:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 21:29:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 21:38:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:38:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 21:38:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:38:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 21:39:20 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8390
ERROR - 2025-04-18 21:39:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 7: ...ppi.id_kultur is not null AND ppi.tanggal_input = '' ) count...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:39:49 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 7: ...ppi.id_kultur is not null AND ppi.tanggal_input = '' ) count...
                                                             ^ - Invalid query: SELECT count (ppi.id) jumlah_pasien, coalesce (sum(ppi.ett::INT), '0') sum_ett,
                coalesce (sum(ppi.cvl::INT), '0') sum_cvl, coalesce (sum(ppi.ivl::INT), '0') sum_ivl, coalesce (sum(ppi.uc::INT), '0') sum_uc,
                coalesce (sum(ppi.tirah_baring::INT), '0') sum_tirah_baring, coalesce (sum(ppi.vap::INT), '0') sum_vap,
                coalesce (sum(ppi.iadp::INT), '0') sum_iadp, coalesce (sum(ppi.isk::INT), '0') sum_isk,
                coalesce (sum(ppi.dekubitus::INT), '0') sum_dekubitus, coalesce (sum(ppi.plebitis::INT), '0') sum_plebitis,
                coalesce (sum(ppi.operasi::INT), '0') sum_operasi, coalesce (sum(ppi.ido::INT), '0') sum_ido,
                (SELECT count(dppi.id) as count_kultur FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_kultur is not null AND ppi.tanggal_input = '' ) count_kultur,
	            (SELECT count(dppi.id) as count_antiobika FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_antiobika is not null AND ppi.tanggal_input = '' ) count_antiobika FROM sm_form_ppi as ppi
                JOIN sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                JOIN sm_pasien as p on pd.id_pasien = p.id
                JOIN sm_rawat_inap as ri on ri.id_layanan_pendaftaran = lp.id
                JOIN sm_bangsal as bg on ri.id_bangsal = bg.id
                
                where (ppi.ett::INT+ppi.cvl::INT+ppi.ivl::INT+ppi.uc::INT+ppi.tirah_baring::INT+
                ppi.vap::INT+ppi.iadp::INT+ppi.isk::INT+ppi.dekubitus::INT+ppi.plebitis::INT+
                ppi.operasi::INT+ppi.ido::INT) != 0 
                and lp.status_terlayani != 'Batal'
                and ri.konfirmasi_ranap = 'Ya'
                and ppi.tanggal_input = ''  and bg.id = '8' 
ERROR - 2025-04-18 21:39:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 7: ...ppi.id_kultur is not null AND ppi.tanggal_input = '' ) count...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:39:52 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 7: ...ppi.id_kultur is not null AND ppi.tanggal_input = '' ) count...
                                                             ^ - Invalid query: SELECT count (ppi.id) jumlah_pasien, coalesce (sum(ppi.ett::INT), '0') sum_ett,
                coalesce (sum(ppi.cvl::INT), '0') sum_cvl, coalesce (sum(ppi.ivl::INT), '0') sum_ivl, coalesce (sum(ppi.uc::INT), '0') sum_uc,
                coalesce (sum(ppi.tirah_baring::INT), '0') sum_tirah_baring, coalesce (sum(ppi.vap::INT), '0') sum_vap,
                coalesce (sum(ppi.iadp::INT), '0') sum_iadp, coalesce (sum(ppi.isk::INT), '0') sum_isk,
                coalesce (sum(ppi.dekubitus::INT), '0') sum_dekubitus, coalesce (sum(ppi.plebitis::INT), '0') sum_plebitis,
                coalesce (sum(ppi.operasi::INT), '0') sum_operasi, coalesce (sum(ppi.ido::INT), '0') sum_ido,
                (SELECT count(dppi.id) as count_kultur FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_kultur is not null AND ppi.tanggal_input = '' ) count_kultur,
	            (SELECT count(dppi.id) as count_antiobika FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_antiobika is not null AND ppi.tanggal_input = '' ) count_antiobika FROM sm_form_ppi as ppi
                JOIN sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                JOIN sm_pasien as p on pd.id_pasien = p.id
                JOIN sm_rawat_inap as ri on ri.id_layanan_pendaftaran = lp.id
                JOIN sm_bangsal as bg on ri.id_bangsal = bg.id
                
                where (ppi.ett::INT+ppi.cvl::INT+ppi.ivl::INT+ppi.uc::INT+ppi.tirah_baring::INT+
                ppi.vap::INT+ppi.iadp::INT+ppi.isk::INT+ppi.dekubitus::INT+ppi.plebitis::INT+
                ppi.operasi::INT+ppi.ido::INT) != 0 
                and lp.status_terlayani != 'Batal'
                and ri.konfirmasi_ranap = 'Ya'
                and ppi.tanggal_input = ''  and bg.id = '8' 
ERROR - 2025-04-18 21:40:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 7: ...ppi.id_kultur is not null AND ppi.tanggal_input = '' ) count...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:40:39 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 7: ...ppi.id_kultur is not null AND ppi.tanggal_input = '' ) count...
                                                             ^ - Invalid query: SELECT count (ppi.id) jumlah_pasien, coalesce (sum(ppi.ett::INT), '0') sum_ett,
                coalesce (sum(ppi.cvl::INT), '0') sum_cvl, coalesce (sum(ppi.ivl::INT), '0') sum_ivl, coalesce (sum(ppi.uc::INT), '0') sum_uc,
                coalesce (sum(ppi.tirah_baring::INT), '0') sum_tirah_baring, coalesce (sum(ppi.vap::INT), '0') sum_vap,
                coalesce (sum(ppi.iadp::INT), '0') sum_iadp, coalesce (sum(ppi.isk::INT), '0') sum_isk,
                coalesce (sum(ppi.dekubitus::INT), '0') sum_dekubitus, coalesce (sum(ppi.plebitis::INT), '0') sum_plebitis,
                coalesce (sum(ppi.operasi::INT), '0') sum_operasi, coalesce (sum(ppi.ido::INT), '0') sum_ido,
                (SELECT count(dppi.id) as count_kultur FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_kultur is not null AND ppi.tanggal_input = '' ) count_kultur,
	            (SELECT count(dppi.id) as count_antiobika FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_antiobika is not null AND ppi.tanggal_input = '' ) count_antiobika FROM sm_form_ppi as ppi
                JOIN sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                JOIN sm_pasien as p on pd.id_pasien = p.id
                JOIN sm_rawat_inap as ri on ri.id_layanan_pendaftaran = lp.id
                JOIN sm_bangsal as bg on ri.id_bangsal = bg.id
                
                where (ppi.ett::INT+ppi.cvl::INT+ppi.ivl::INT+ppi.uc::INT+ppi.tirah_baring::INT+
                ppi.vap::INT+ppi.iadp::INT+ppi.isk::INT+ppi.dekubitus::INT+ppi.plebitis::INT+
                ppi.operasi::INT+ppi.ido::INT) != 0 
                and lp.status_terlayani != 'Batal'
                and ri.konfirmasi_ranap = 'Ya'
                and ppi.tanggal_input = ''  and bg.id = '8' 
ERROR - 2025-04-18 21:42:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-18 21:42:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:42:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 21:48:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 7: ...ppi.id_kultur is not null AND ppi.tanggal_input = '' ) count...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 21:48:16 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 7: ...ppi.id_kultur is not null AND ppi.tanggal_input = '' ) count...
                                                             ^ - Invalid query: SELECT count (ppi.id) jumlah_pasien, coalesce (sum(ppi.ett::INT), '0') sum_ett,
                coalesce (sum(ppi.cvl::INT), '0') sum_cvl, coalesce (sum(ppi.ivl::INT), '0') sum_ivl, coalesce (sum(ppi.uc::INT), '0') sum_uc,
                coalesce (sum(ppi.tirah_baring::INT), '0') sum_tirah_baring, coalesce (sum(ppi.vap::INT), '0') sum_vap,
                coalesce (sum(ppi.iadp::INT), '0') sum_iadp, coalesce (sum(ppi.isk::INT), '0') sum_isk,
                coalesce (sum(ppi.dekubitus::INT), '0') sum_dekubitus, coalesce (sum(ppi.plebitis::INT), '0') sum_plebitis,
                coalesce (sum(ppi.operasi::INT), '0') sum_operasi, coalesce (sum(ppi.ido::INT), '0') sum_ido,
                (SELECT count(dppi.id) as count_kultur FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_kultur is not null AND ppi.tanggal_input = '' ) count_kultur,
	            (SELECT count(dppi.id) as count_antiobika FROM sm_detail_form_ppi dppi JOIN sm_form_ppi ppi ON dppi.id_ppi = ppi.ID WHERE dppi.id_antiobika is not null AND ppi.tanggal_input = '' ) count_antiobika FROM sm_form_ppi as ppi
                JOIN sm_layanan_pendaftaran as lp on ppi.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran as pd on lp.id_pendaftaran = pd.id
                JOIN sm_pasien as p on pd.id_pasien = p.id
                JOIN sm_rawat_inap as ri on ri.id_layanan_pendaftaran = lp.id
                JOIN sm_bangsal as bg on ri.id_bangsal = bg.id
                
                where (ppi.ett::INT+ppi.cvl::INT+ppi.ivl::INT+ppi.uc::INT+ppi.tirah_baring::INT+
                ppi.vap::INT+ppi.iadp::INT+ppi.isk::INT+ppi.dekubitus::INT+ppi.plebitis::INT+
                ppi.operasi::INT+ppi.ido::INT) != 0 
                and lp.status_terlayani != 'Batal'
                and ri.konfirmasi_ranap = 'Ya'
                and ppi.tanggal_input = ''  and bg.id = '8' 
ERROR - 2025-04-18 21:51:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 22:02:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16198
ERROR - 2025-04-18 22:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...('673685', '729866', '625', '2060', '2025-04-18', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 22:02:59 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...('673685', '729866', '625', '2060', '2025-04-18', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_risiko_jatuh_pasien_lansia" ("id_pendaftaran", "id_layanan_pendaftaran", "id_perawat", "id_user", "tanggal_pengkajian", "jumlah_skor", "paraf", "pasien_datang_karena_jatuh", "jatuh_dua_bulan_terakhir", "delirium", "disorientasi", "agitasi", "kacamata", "buram", "galukoma", "berkemih", "purjpl_pasien_mandirit", "purjpl_pasien_m_mandiri", "created_at") VALUES ('673685', '729866', '625', '2060', '2025-04-18', '', '1', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, '2025-04-18 22:01:43')
ERROR - 2025-04-18 22:15:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 22:16:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 22:24:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 22:24:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 22:24:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 22:24:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 22:24:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 22:24:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 22:26:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 22:40:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 22:53:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 22:53:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:02:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-18 23:22:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:22:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:22:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:22:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:22:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:22:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:39:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:39:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:40:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:40:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:40:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:40:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:40:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:40:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:40:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:40:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-18 23:46:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-18 23:46:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
