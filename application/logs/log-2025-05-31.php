<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-05-31 00:02:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 00:03:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 00:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 00:09:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 00:11:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...sa&quot;, &quot;ruang&quot;) VALUES ('756782', '698720', '2121', '', 'FATIH...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:11:16 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...sa", "ruang") VALUES ('756782', '698720', '2121', '', 'FATIH...
                                                             ^ - Invalid query: INSERT INTO "sm_indikasi_pasien_icu_tambahan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_user", "tanggal_ipi", "nama_pasien", "diagnosa", "ruang") VALUES ('756782', '698720', '2121', '', 'FATIH  ABDURROHIM', 'Susp bronkopneumonia (Utama).', 'Eboni')
ERROR - 2025-05-31 00:11:40 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-05-31 00:11:40 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-05-31 00:16:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:16:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 00:16:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:16:24 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1293501'),
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
			 
ERROR - 2025-05-31 00:16:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:16:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 00:17:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:17:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 00:18:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:18:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 00:18:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:18:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 00:18:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:18:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 00:19:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:19:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 00:19:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 00:30:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 00:30:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 00:43:46 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-31 00:57:41 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 01:07:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:07:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 01:07:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6299350, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:07:22 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6299350, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6299350, '922', 1017.648, '1', '1.00', NULL, 'null')
ERROR - 2025-05-31 01:07:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:07:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 01:15:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 01:15:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 01:28:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:28:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 01:28:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6299383, '1151', 679.32, '1', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:28:36 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6299383, '1151', 679.32, '1', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6299383, '1151', 679.32, '1', '10.00', 'Ya', 'null')
ERROR - 2025-05-31 01:28:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:28:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 01:29:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('857662', '1', '', '10', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:29:00 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('857662', '1', '', '10', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('857662', '1', '', '10', '3 x Sehari 1 Tablet/Kapsul', '', 'null', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 01:29:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:29:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 01:35:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 01:35:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 01:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 02:45:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 02:45:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 02:45:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6299395, '1229', 4995, '2.5', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 02:45:37 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6299395, '1229', 4995, '2.5', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6299395, '1229', 4995, '2.5', '2.00', 'Ya', 'null')
ERROR - 2025-05-31 02:45:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 02:45:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 02:46:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 02:46:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 02:46:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 02:46:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 02:46:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 02:46:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 04:10:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 04:10:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 04:10:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 04:10:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 04:10:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 04:10:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 04:10:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 04:10:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 04:14:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 04:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 04:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 04:18:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 04:32:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 04:32:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 04:32:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 04:32:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 04:47:49 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-31 04:47:49 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-31 04:47:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-05-31 05:15:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 05:34:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:34:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:34:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:34:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:34:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:34:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:34:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:34:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:35:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6299507, '60', 130.8, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:35:02 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6299507, '60', 130.8, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6299507, '60', 130.8, '1', '2.00', NULL, 'null')
ERROR - 2025-05-31 05:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:35:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:36:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:36:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:36:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:36:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:46:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:46:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:48:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 05:48:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 05:53:25 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 06:18:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:25:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:25:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 06:27:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:28:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:29:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:30:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:30:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:31:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:31:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:32:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:33:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:33:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:33:34 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A047%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 06:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:34:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:34:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:34:49 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A039%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 06:35:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310028) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:35:14 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310028) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310028', '00304194', '2025-05-31 06:35:13', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003276264352', NULL, '022310040525Y002434', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Mata', 0, 2, NULL, '20250531B325')
ERROR - 2025-05-31 06:35:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310028) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:35:14 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310028) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310028', '00285433', '2025-05-31 06:35:13', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002103011908', NULL, '102501100325Y001830', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250531A167')
ERROR - 2025-05-31 06:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:36:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:37:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:38:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:38:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A061%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 06:39:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:39:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 06:39:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:39:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 06:40:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:40:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A035%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 06:40:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:41:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250531A170) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:41:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250531A170) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250531A170', '170', 'A170', 'A', '2025-05-31', '1', '2025-05-31 06:41:10', 'Booking', 'APM', 'Prioritas', 0, '2025-05-31  12:58:10', 0, '1945', '00089753', 673, 634416, 30, 'INT', '081384748384', '3671015511760002', '1976-11-15', 'dr. Ryandri Yovanda, Sp.PD', 1, 'Asuransi', 17, '49', '200', 'Ok.', '0', '54274', '0001297086232', 'JKN', NULL, '1', NULL, '0496B0000525Y004278', 'KLINIK DIANA PERMATA', '2025-08-26', 'INT', '1', NULL, NULL, '30', 'Sudah', 200, 'Ok.')
ERROR - 2025-05-31 06:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:41:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:42:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 06:42:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:42:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 06:42:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:43:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:43:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A085%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 06:43:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:46:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:46:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:47:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:47:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:48:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:49:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:49:15 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A162%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 06:49:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:49:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:52:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:53:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310067) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:53:46 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310067) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310067', '00162429', '2025-05-31 06:53:45', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002322466795', NULL, '102504020425Y003922', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Rehab Medik', 0, '2', '', '20250531B266')
ERROR - 2025-05-31 06:54:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:54:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:54:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310072) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:54:51 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310072) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310072', '00369212', '2025-05-31 06:54:50', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002599776022', NULL, '0223R0380525V011199', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250531B230')
ERROR - 2025-05-31 06:55:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:55:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:55:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 06:55:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:56:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:56:15 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A055%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 06:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:56:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:56:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:56:42 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-31 06:56:42 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-31 06:57:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (857684, '4', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:57:54 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (857684, '4', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (857684, '4', '1', '', '', '', 'PC', '0', '', '0', '', 'bcom 2x1', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 06:58:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310080) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 06:58:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310080) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310080', '00345902', '2025-05-31 06:58:52', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003571363102', NULL, '022300090525Y001607', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Anak', 0, '2', '', '20250531F004')
ERROR - 2025-05-31 06:59:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 06:59:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:00:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:00:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 07:00:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:00:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 07:00:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:02:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:03:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:04:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:04:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:05:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:05:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:05:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:05:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:05:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 07:05:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:05:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 07:05:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:05:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:05:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:06:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:06:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 07:06:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:06:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 07:06:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:06:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 07:06:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:06:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 07:06:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:07:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:08:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:08:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 07:08:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:08:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 07:08:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:08:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:09:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:11:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:11:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:11:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:11:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:11:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:12:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:12:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A052%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 07:12:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:12:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A087%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 07:12:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:12:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:13:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:13:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:13:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:13:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:13:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:13:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:13:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:14:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:16:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:16:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:17:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310140) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:17:43 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310140) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310140', '00260516', '2025-05-31 07:17:43', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001131011706', NULL, '102501100525Y003867', 'Lama', NULL, '1768', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250531B318')
ERROR - 2025-05-31 07:18:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:19:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:19:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:20:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:21:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:21:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:23:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310160) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:23:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310160) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310160', '00377857', '2025-05-31 07:23:02', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002136152046', NULL, '102501100525Y004290', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik THT', 0, '2', '', '20250531F017')
ERROR - 2025-05-31 07:23:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:23:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:23:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:24:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:24:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6299626, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:24:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6299626, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6299626, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-05-31 07:24:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310165) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:24:29 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310165) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310165', '00375508', '2025-05-31 07:24:28', 'Laboratorium', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003759353357', NULL, NULL, 'Lama', '0', '1773', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-05-31 07:24:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:24:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 07:24:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:24:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 07:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:25:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:25:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:26:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:28:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:29:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:30:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:30:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:30:27 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-31 07:30:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:30:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:30:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:31:33 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-31 07:32:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:32:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:32:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250531B372) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:32:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250531B372) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250531B372', '372', 'B372', 'B', '2025-05-31', '0', '2025-05-31 07:32:34', 'Booking', 'APM', 'Asuransi', 0, '2025-05-31  12:46:30', 0, '1950', '00356121', 673, 634416, 30, 'INT', '0895428173700', '3278021310730004', '1973-10-13', 'dr. Ryandri Yovanda, Sp.PD', 1, 'Asuransi', 21, '60', '200', 'Ok.', '0', '54274', '0003631428573', 'JKN', NULL, '1', NULL, '0223B1570525P001896', 'KLINIK KF MODERNLAND', '2025-08-26', 'INT', '1', NULL, NULL, '30', 'Sudah', 200, 'Ok.')
ERROR - 2025-05-31 07:32:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-31 07:32:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:33:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310190) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:33:49 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310190) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310190', '00370030', '2025-05-31 07:33:48', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002298294448', NULL, '102505030425P000691', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250531B289')
ERROR - 2025-05-31 07:34:19 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-31 07:34:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:35:06 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-31 07:36:04 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-05-31 07:36:05 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-05-31 07:36:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:36:13 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-05-31 07:36:13 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-05-31 07:36:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-05-31 07:36:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-05-31 07:36:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:36:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:36:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-05-31 07:37:14 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-05-31 07:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:39:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:39:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:40:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:40:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310208) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:40:47 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310208) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310208', '00377871', '2025-05-31 07:40:46', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1762', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250531B349')
ERROR - 2025-05-31 07:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:41:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:41:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:41:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:41:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:42:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:42:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:42:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...nerima_pagi&quot;, &quot;id_users&quot;) VALUES ('756788', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:42:33 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...nerima_pagi", "id_users") VALUES ('756788', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('756788', NULL, '', NULL, '2025-05-31 07:44:00', 'risiko hipotermi ', '', 'observasi miksi, rencana visite', '611', '309', '1369')
ERROR - 2025-05-31 07:42:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:42:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:42:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:43:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:43:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:43:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:44:19 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-05-31 07:44:19 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-05-31 07:44:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-05-31 07:44:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-05-31 07:45:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:45:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:45:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:45:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-05-31 07:45:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-05-31 07:45:33 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-05-31 07:45:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-05-31 07:45:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-05-31 07:45:33 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-05-31 07:46:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310223) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:46:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310223) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310223', '00001001', '2025-05-31 07:46:02', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001459818461', NULL, '0223R0380525V011253', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Orthopaedi', 0, '2', '', '20250531A100')
ERROR - 2025-05-31 07:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:46:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:46:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:46:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:47:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:47:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:48:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:48:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:48:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:49:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:49:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:49:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:49:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:50:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:50:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:50:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:50:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:51:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:51:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:52:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:53:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:53:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:53:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:53:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:53:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND "ab"."kode_booking" = '20250531A079'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 07:53:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:53:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:53:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:54:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:54:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:54:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:54:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:54:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:55:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:55:16 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-05-31 07:55:16 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-05-31 07:55:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 07:55:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:55:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:55:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 07:55:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:55:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 07:56:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:56:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 07:56:49 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A058%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 07:56:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-05-31 07:56:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-05-31 07:57:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:57:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:57:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:59:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:59:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:59:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:59:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:59:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:00:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:00:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:00:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:01:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:01:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:01:51 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-05-31 08:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:02:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:02:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:02:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:02:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:02:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A050%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 08:02:51 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-05-31 08:02:52 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-05-31 08:02:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:03:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:03:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:03:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-05-31 08:03:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-05-31 08:03:30 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-05-31 08:03:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:03:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 08:03:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:03:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 08:03:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:03:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310285) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:03:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310285) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310285', '00377256', '2025-05-31 08:03:45', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001257985271', NULL, '0223R0380525K006309', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Konservasi Gigi', 0, '2', '', '20250531A079')
ERROR - 2025-05-31 08:04:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:04:08 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 08:04:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:04:08 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 08:04:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:04:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:05:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310290) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:05:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310290) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310290', '00086786', '2025-05-31 08:05:00', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001872436375', NULL, '102501040525Y004612', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250531A194')
ERROR - 2025-05-31 08:05:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:05:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:05:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:22 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 08:06:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:06:43 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A043%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 08:06:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:06:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:07:26 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-31 08:07:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:07:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:07:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:07:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:07:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:07:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:07:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:07:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:08:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:08:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:08:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:09:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:09:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:09:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:10:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:11:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:11:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:11:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:11:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:12:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:12:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:12:59 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-31 08:12:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:12:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:12:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:12:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:12:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:12:59 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 08:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:13:04 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-01'
AND "id" = ''
ERROR - 2025-05-31 08:13:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:13:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:13:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:13:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310318) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:13:24 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310318) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310318', '00376856', '2025-05-31 08:13:22', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001156786569', NULL, '022300010525Y001142', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, 2, NULL, '20250531B404')
ERROR - 2025-05-31 08:13:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:13:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:14:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:14:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:15:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:15:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:16:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:16:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 08:16:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:16:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 08:16:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:16:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:17:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:17:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310334) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:17:35 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310334) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310334', '00184083', '2025-05-31 08:17:34', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000815345122', NULL, '022310040425Y002425', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250531B038')
ERROR - 2025-05-31 08:17:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:18:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:18:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:18:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:18:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:18:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310339) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:18:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310339) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310339', '00312219', '2025-05-31 08:18:53', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001258560483', NULL, '102505040525Y000294', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250531A030')
ERROR - 2025-05-31 08:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:19:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:21:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:22:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:22:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:23:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:23:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:23:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:23:42 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 08:23:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:23:42 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 08:24:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:24:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:25:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:25:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:26:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310375) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:26:13 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310375) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310375', '00268972', '2025-05-31 08:26:12', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000036985836', NULL, '102501020425Y001123', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250531A105')
ERROR - 2025-05-31 08:26:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:26:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:26:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:27:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:27:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:28:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:28:01 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4626494'
ERROR - 2025-05-31 08:28:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:28:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:29:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:29:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:29:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:29:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:29:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:29:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:29:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:30:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:30:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:30:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:30:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:30:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:30:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:31:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:31:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:31:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:31:41 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A092%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 08:31:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:31:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:32:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:32:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:32:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:32:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:32:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:33:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:33:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:33:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:33:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310405) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:33:47 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310405) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310405', '00205324', '2025-05-31 08:33:45', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001857868424', NULL, '102501090525Y001025', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Obgyn', 0, 2, NULL, '20250531B422')
ERROR - 2025-05-31 08:33:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310405) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:33:47 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310405) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310405', '00236259', '2025-05-31 08:33:44', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003123663333', NULL, '102501100325Y000476', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250531A206')
ERROR - 2025-05-31 08:34:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:34:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:35:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (857778, '2', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:35:02 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (857778, '2', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (857778, '2', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 08:36:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:36:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:37:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:37:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:38:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:38:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:38:14 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-05-31 08:38:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 887
ERROR - 2025-05-31 08:38:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:38:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310421) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:38:32 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310421) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310421', '00352844', '2025-05-31 08:38:32', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001732992096', NULL, '100411010525Y002595', 'Lama', NULL, '1762', 0, 'Belum', 'Poliklinik Orthopaedi', 0, '2', '', '20250531B414')
ERROR - 2025-05-31 08:38:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:38:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:38:57 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-05-31 08:39:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:39:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:40:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:40:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:40:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:40:47 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-05-31 08:41:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250531B435) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:41:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250531B435) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250531B435', '435', 'B435', 'B', '2025-05-31', '0', '2025-05-31 08:41:35', 'Booking', 'APM', 'Asuransi', 0, '2025-05-31  13:27:00', 0, '1701', '00136302', 657, 3643, 30, 'INT', '081280957875', '3671035101960002', '1996-01-11', 'dr. Lydia Sarah Shabrina, Sp.PD', 1, 'Asuransi', 17, '60', '200', 'Ok.', '0', '54252', '0001719637446', 'JKN', '313623', '0', '30', '0223U1100325Y000335', 'KLINIK BETH RAPHA A. I', '2025-06-05', 'KLT', '3', NULL, '0223R0380525V011212', '24', 'Belum', 201, 'Rujukan tidak valid')
ERROR - 2025-05-31 08:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:42:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:42:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:42:13 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-31 08:42:13 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-31 08:42:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:43:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:44:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:44:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:44:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:44:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:45:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:45:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:45:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:45:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:46:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:46:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:46:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:47:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:47:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:47:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:47:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (857806, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:47:47 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (857806, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (857806, '1', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 08:48:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:48:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (857811, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:48:13 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (857811, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (857811, '1', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 08:48:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:48:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:48:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:49:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:49:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:50:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:50:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:50:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:51:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:51:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:51:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:52:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:53:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:53:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:53:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:54:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:54:06 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 08:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:55:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:55:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:55:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:55:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:56:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:56:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:56:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:56:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:56:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 08:56:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:56:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:56:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:57:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:57:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:57:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:57:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310491) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 08:57:24 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310491) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310491', '00377928', '2025-05-31 08:57:23', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250531B434')
ERROR - 2025-05-31 08:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:57:47 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-05-31 08:57:47 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-05-31 08:57:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:58:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:58:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:59:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:59:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:00:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:00:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:00:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:00:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:00:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 09:00:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:00:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 09:01:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:01:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:01:48 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-05-31 09:02:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:02:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:03:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:03:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:03:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:03:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310512) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:03:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310512) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310512', '00377931', '2025-05-31 09:03:52', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1768', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250531B448')
ERROR - 2025-05-31 09:04:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 09:04:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:04:30 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00352843'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-31 09:05:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:05:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:05:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:06:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:06:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:06:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:07:20 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2194
ERROR - 2025-05-31 09:07:20 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2238
ERROR - 2025-05-31 09:08:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:08:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:08:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:08:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:08:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:08:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:08:58 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-31 09:09:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:09:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:09:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:09:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:10:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 09:10:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:10:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:10:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:10:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:11:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:11:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310533) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:11:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310533) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310533', '00246558', '2025-05-31 09:11:10', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001815862588', NULL, '0496B0000525Y000298', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250531B270')
ERROR - 2025-05-31 09:11:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:11:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:11:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:11:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:11:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:12:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:12:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:12:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:12:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:12:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:12:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:13:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:13:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:14:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:14:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-05-31 09:14:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:14:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:14:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:14:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:15:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:15:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:15:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:15:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:15:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:15:32 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 09:15:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:15:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:15:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:15:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:16:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:16:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:16:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:16:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:16:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:16:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:16:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:17:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:17:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:18:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:18:54 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-05-31 09:18:54 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-05-31 09:18:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 09:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:19:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:19:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:19:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:19:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:19:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:19:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:19:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:20:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:20:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:20:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:20:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:20:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:20:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:20:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:20:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:20:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:20:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:21:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:21:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:22:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:22:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:22:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:22:36 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 09:23:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:24:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:24:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:24:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:24:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 09:24:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(5) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:24:58 --> Query error: ERROR:  value too long for type character varying(5) - Invalid query: UPDATE "sm_pasien" SET "id" = '00133025', "rm_lama" = '', "tanggal_daftar" = '2025-05-31 09:24:58', "no_identitas" = '3209015406620005', "nama" = 'EROS ROSTIANI', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'TANGERANG', "tanggal_lahir" = '1962-06-14', "alamat" = 'DUSUN KARYAWAN RT. 003/008 WALED KOTA WALED KAB. CIREBON JAWA BARAT', "no_prop" = '32', "nama_prop" = 'JAWA BARAT', "no_kab" = '9', "nama_kab" = 'CIREBON', "no_kec" = '1', "nama_kec" = 'WALED', "no_kel" = '2002', "nama_kel" = 'WALED KOTA', "agama" = 'Islam', "gol_darah" = 'AB', "id_pendidikan" = '5', "id_pekerjaan" = '2', "status_kawin" = 'Kawin', "nama_ayah" = NULL, "nama_ibu" = NULL, "telp" = '081319448008', "id_etnis" = '6', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '008', "no_rt" = '003008', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-05-31 09:24:58'
WHERE "id" = '00133025'
ERROR - 2025-05-31 09:25:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(5) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:25:03 --> Query error: ERROR:  value too long for type character varying(5) - Invalid query: UPDATE "sm_pasien" SET "id" = '00133025', "rm_lama" = '', "tanggal_daftar" = '2025-05-31 09:25:03', "no_identitas" = '3209015406620005', "nama" = 'EROS ROSTIANI', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'TANGERANG', "tanggal_lahir" = '1962-06-14', "alamat" = 'DUSUN KARYAWAN RT. 003/008 WALED KOTA WALED KAB. CIREBON JAWA BARAT', "no_prop" = '32', "nama_prop" = 'JAWA BARAT', "no_kab" = '9', "nama_kab" = 'CIREBON', "no_kec" = '1', "nama_kec" = 'WALED', "no_kel" = '2002', "nama_kel" = 'WALED KOTA', "agama" = 'Islam', "gol_darah" = 'AB', "id_pendidikan" = '5', "id_pekerjaan" = '2', "status_kawin" = 'Kawin', "nama_ayah" = NULL, "nama_ibu" = NULL, "telp" = '081319448008', "id_etnis" = '6', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '008', "no_rt" = '003008', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-05-31 09:25:03'
WHERE "id" = '00133025'
ERROR - 2025-05-31 09:25:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(5) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:25:08 --> Query error: ERROR:  value too long for type character varying(5) - Invalid query: UPDATE "sm_pasien" SET "id" = '00133025', "rm_lama" = '', "tanggal_daftar" = '2025-05-31 09:25:08', "no_identitas" = '3209015406620005', "nama" = 'EROS ROSTIANI', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'TANGERANG', "tanggal_lahir" = '1962-06-14', "alamat" = 'DUSUN KARYAWAN RT. 003/008 WALED KOTA WALED KAB. CIREBON JAWA BARAT', "no_prop" = '32', "nama_prop" = 'JAWA BARAT', "no_kab" = '9', "nama_kab" = 'CIREBON', "no_kec" = '1', "nama_kec" = 'WALED', "no_kel" = '2002', "nama_kel" = 'WALED KOTA', "agama" = 'Islam', "gol_darah" = 'AB', "id_pendidikan" = '5', "id_pekerjaan" = '2', "status_kawin" = 'Kawin', "nama_ayah" = NULL, "nama_ibu" = NULL, "telp" = '081319448008', "id_etnis" = '6', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '008', "no_rt" = '003008', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-05-31 09:25:08'
WHERE "id" = '00133025'
ERROR - 2025-05-31 09:25:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(5) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:25:13 --> Query error: ERROR:  value too long for type character varying(5) - Invalid query: UPDATE "sm_pasien" SET "id" = '00133025', "rm_lama" = '', "tanggal_daftar" = '2025-05-31 09:25:13', "no_identitas" = '3209015406620005', "nama" = 'EROS ROSTIANI', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'TANGERANG', "tanggal_lahir" = '1962-06-14', "alamat" = 'DUSUN KARYAWAN RT. 003/008 WALED KOTA WALED KAB. CIREBON JAWA BARAT', "no_prop" = '32', "nama_prop" = 'JAWA BARAT', "no_kab" = '9', "nama_kab" = 'CIREBON', "no_kec" = '1', "nama_kec" = 'WALED', "no_kel" = '2002', "nama_kel" = 'WALED KOTA', "agama" = 'Islam', "gol_darah" = 'AB', "id_pendidikan" = '5', "id_pekerjaan" = '2', "status_kawin" = 'Kawin', "nama_ayah" = NULL, "nama_ibu" = NULL, "telp" = '081319448008', "id_etnis" = '6', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '008', "no_rt" = '003008', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-05-31 09:25:13'
WHERE "id" = '00133025'
ERROR - 2025-05-31 09:25:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:25:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:25:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:25:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:25:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:26:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:26:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:27:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:28:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:28:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:28:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:28:55 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00118486'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-31 09:29:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:29:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:29:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:29:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:30:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:30:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:30:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:30:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:31:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:31:20 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 09:31:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:35:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:35:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:35:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:35:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:36:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:36:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:36:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:36:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:36:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:36:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 09:36:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:36:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 09:36:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:36:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:37:21 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-31 09:37:21 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-31 09:37:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:37:26 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-31 09:37:26 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-31 09:37:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-31 09:37:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-31 09:37:38 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 09:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:38:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:38:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:38:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:39:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:39:37 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A157%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 09:40:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:40:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A108%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 09:40:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:40:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:40:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:40:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:40:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:41:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:41:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:41:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:41:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:42:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:42:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:42:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 09:42:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:42:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 09:42:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:42:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:43:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:43:57 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-05-31 09:43:57 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-05-31 09:44:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:44:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:44:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:44:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:44:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:44:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:44:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:45:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:46:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:46:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (857999, '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:46:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (857999, '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (857999, '1', '', '1', '', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 1, 'simm', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 09:47:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:47:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:47:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:48:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:48:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:48:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:48:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:48:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:48:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:49:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:49:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:49:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:49:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858012, '5', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:49:40 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (858012, '5', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858012, '5', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 09:50:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:51:48 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-05-31 09:51:48 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-05-31 09:51:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:53:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:53:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:54:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:54:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:54:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:54:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:54:57 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-05-31 09:55:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:55:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:55:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:55:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:55:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:56:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:56:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:56:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:56:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:56:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:56:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:56:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:56:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:56:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:57:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:57:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:57:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:57:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:57:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:57:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:57:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 02:57:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 02:57:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:57:58 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-05-31 09:57:58 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-05-31 02:57:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 02:57:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 02:58:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 02:58:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:58:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 09:58:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 02:58:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 02:58:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 02:58:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 02:58:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:59:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 09:59:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:59:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:59:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 09:59:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:00:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:00:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:00:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:00:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:00:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:01:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:01:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:01:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:01:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:01:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:01:14 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-31 10:01:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:01:14 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-31 10:01:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:01:14 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-31 10:01:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:01:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:02:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:02:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:02:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:03:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:03:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:04:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:04:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:04:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:04:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:04:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:04:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:04:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:04:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:04:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:04:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:05:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:05:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:05:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:05:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:05:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:05:43 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 62
ERROR - 2025-05-31 10:05:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:05:43 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_rawat_inap, ri.waktu_masuk, 
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
ERROR - 2025-05-31 10:05:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:06:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:06:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:06:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:06:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:06:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:06:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:07:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:07:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:07:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:07:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:08:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:09:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:09:32 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00340794'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-31 10:09:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:10:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:10:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:10:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:11:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:11:55 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-31 10:12:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:12:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:12:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:13:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:13:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:13:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:13:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:13:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:14:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:15:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:15:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:15:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:16:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:16:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:16:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:17:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:17:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:17:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:17:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:17:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:17:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:17:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:17:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:18:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:18:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:18:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858086, '1', '', '60', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:18:33 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858086, '1', '', '60', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858086, '1', '', '60', '', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '1', 1, '2x1', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 10:19:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:19:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:19:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:20:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:20:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:20:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:20:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:21:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:24:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:25:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:25:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:26:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858106, '4', '', '7', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:26:22 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858106, '4', '', '7', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858106, '4', '', '7', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'NIGHT', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 10:26:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:26:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:26:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:27:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:27:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:28:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:29:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:29:11 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00344368'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-31 10:29:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:29:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:30:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:30:33 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A161%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 10:30:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:31:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:31:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:31:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:31:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:31:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:31:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:31:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:31:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:31:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:31:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 10:32:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:32:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:32:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:33:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:33:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:34:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:34:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:34:15 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00377959'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-31 10:34:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:34:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:34:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858137, '2', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:34:34 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858137, '2', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858137, '2', '', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'NOON', NULL, '0', 0, '', NULL, NULL, '12:00', NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 10:35:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:35:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:35:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:35:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:35:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:35:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:36:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:36:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 10:36:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858145, '2', '', '15.00...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:36:54 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858145, '2', '', '15.00...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858145, '2', '', '15.00', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', 'batal', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 10:37:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:37:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:38:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:38:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:39:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:39:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:39:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:40:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:40:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:40:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:40:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:40:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:40:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:40:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:41:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:42:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:42:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:43:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:43:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:43:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:43:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:44:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:44:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:45:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:45:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:45:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:46:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:46:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:46:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:46:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:46:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:47:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:47:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:47:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;NO.3&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858172, '2', 'NO.3', 'N...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:47:46 --> Query error: ERROR:  invalid input syntax for type numeric: "NO.3"
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858172, '2', 'NO.3', 'N...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858172, '2', 'NO.3', 'NaN', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', 'NO.3', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 10:47:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:50:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310713) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:50:10 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310713) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310713', '00377968', '2025-05-31 10:50:09', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003063158076', NULL, '0223R0680425B000041', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, '2', '', '20250531B471')
ERROR - 2025-05-31 10:50:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:50:45 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 10:50:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:51:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:51:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:51:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:51:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:51:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:52:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:55:00 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 10:55:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:56:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:56:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:56:42 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-31 10:56:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:56:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:57:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:57:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:58:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:58:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:58:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:58:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:58:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:58:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:58:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:58:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:58:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:58:52 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-05-31 10:58:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:58:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:58:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:59:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:59:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 10:59:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 10:59:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 10:59:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:00:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:00:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:00:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 11:00:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:00:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 11:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:00:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13650
ERROR - 2025-05-31 11:00:52 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 11:00:55 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 11:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:01:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:01:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:02:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505310730) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:02:19 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505310730) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505310730', '00131089', '2025-05-31 11:02:16', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002275384094', NULL, '0223R0380525V009699', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Bedah', 0, 2, NULL, '20250531B162')
ERROR - 2025-05-31 11:02:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:03:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:04:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:04:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:04:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:04:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:04:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:05:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:05:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:06:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:06:05 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A153%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 11:06:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:06:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:07:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:07:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:07:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 75
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 80
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 80
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 85
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 259
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 261
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 263
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 265
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 267
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 269
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 271
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 273
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 275
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 277
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 279
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 281
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 283
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined variable: mo /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 283
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 90
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 486
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 487
ERROR - 2025-05-31 11:07:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 495
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'waktu_order' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 95
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 100
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 105
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 110
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 110
ERROR - 2025-05-31 11:07:33 --> Severity: Notice  --> Trying to get property 'item_pemeriksaan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 116
ERROR - 2025-05-31 11:07:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 116
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 75
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 80
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 80
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 85
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 259
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 261
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 263
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 265
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 267
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 269
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 271
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 273
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 275
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 277
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 279
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 281
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 283
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined variable: mo /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 283
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 90
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 486
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 487
ERROR - 2025-05-31 11:07:40 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 495
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'waktu_order' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 95
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 100
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 105
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 110
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 110
ERROR - 2025-05-31 11:07:40 --> Severity: Notice  --> Trying to get property 'item_pemeriksaan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 116
ERROR - 2025-05-31 11:07:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 116
ERROR - 2025-05-31 04:07:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:07:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:08:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:08:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:08:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:08:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 04:08:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:08:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:08:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:08:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:08:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:08:50 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A098%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 04:09:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:09:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:09:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:09:44 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-05-31 11:11:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 11:13:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:13:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:13:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:13:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:13:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:14:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:14:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:14:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:14:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 11:15:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:15:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:16:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:16:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:16:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:17:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:17:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:17:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:17:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:17:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:17:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:17:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:19:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:19:48 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11182
ERROR - 2025-05-31 11:20:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:20:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:20:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:20:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 11:21:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:21:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:21:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:22:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:22:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:22:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:22:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:23:07 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-05-31 11:23:07 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-05-31 11:23:07 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-05-31 11:23:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:23:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 11:23:14 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-05-31 11:23:14 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-05-31 11:23:14 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-05-31 11:23:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:23:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 11:23:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:23:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 11:23:37 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-05-31 11:23:37 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-05-31 11:23:37 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-05-31 11:23:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:23:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858260, '4', '', '14.00...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:23:58 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858260, '4', '', '14.00...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858260, '4', '', '14.00', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', 'batal', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 11:24:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:24:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:24:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:24:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:25:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:25:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:25:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:26:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:26:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:27:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:28:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:28:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:29:16 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-31 11:29:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 11:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:30:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 11:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:30:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:31:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:31:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:31:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:31:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:32:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:32:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:32:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:33:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:33:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:33:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:34:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:34:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:34:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:35:19 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-05-31 11:35:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:35:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:36:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:37:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:37:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:38:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:38:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:39:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:39:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:39:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:39:19 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('756769', '2025-05-31 09:26', '8', 'mual muntah + , tidak nafsu makan , badan terasa lemas , BB turun drastis ', 'kesadaran CM, GCS 15  TD 110:75 mmhg Nadi: 100 x/mnt Suhu: 36.2 C RR 20 x/mnt SpO2 100«d: Cembung, BU (+) meningkat, nyeri tekan punctum maximum RUQ dan epigastrium, murphy sign (+) Eks: akral hangat, crt &lt; 2 dtk, nadi kuat dan cepat, pitting edema pretibial bilateral', 'Abdominal pain susp kolesistitis dd kolelithiasis, Vomitus DRS, Hiponatremia, DM
', 'therapi sesuai DPJP', '', '', '', '', '', '', '', '', '743', '1', 'therapi sesuai DPJP', NULL, '743', 0, NULL, '2025-05-31 11:39:19')
ERROR - 2025-05-31 11:39:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:39:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:39:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:39:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:39:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:39:51 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A155%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-31 11:40:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 11:41:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 04:41:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:41:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:41:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:41:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:41:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:41:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:41:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 11:42:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:42:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:42:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 11:42:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:43:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (879434, 756546, null, 10, keluhan tidak ada 
BAB (+) , OUE: FC produksi urin kuning , HN bilateral, contracted ginjal kanan, kista ginjal kiri , terapi lanjut , , 797, 1, -, null, null, 797, 2025-05-31 11:43:12, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:43:12 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (879434, 756546, null, 10, keluhan tidak ada 
BAB (+) , OUE: FC produksi urin kuning , HN bilateral, contracted ginjal kanan, kista ginjal kiri , terapi lanjut , , 797, 1, -, null, null, 797, 2025-05-31 11:43:12, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('756546', NULL, '10', 'keluhan tidak ada 
BAB (+) ', 'OUE: FC produksi urin kuning ', 'HN bilateral, contracted ginjal kanan, kista ginjal kiri ', 'terapi lanjut ', '', '', '', '', '', '', '', '', '797', '1', '-', NULL, '797', 0, NULL, '2025-05-31 11:43:12')
ERROR - 2025-05-31 11:43:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (879435, 756546, null, 10, keluhan tidak ada 
BAB (+) , OUE: FC produksi urin kuning , HN bilateral, contracted ginjal kanan, kista ginjal kiri , terapi lanjut , , 797, 1, -, null, null, 797, 2025-05-31 11:43:18, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:43:18 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (879435, 756546, null, 10, keluhan tidak ada 
BAB (+) , OUE: FC produksi urin kuning , HN bilateral, contracted ginjal kanan, kista ginjal kiri , terapi lanjut , , 797, 1, -, null, null, 797, 2025-05-31 11:43:18, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('756546', NULL, '10', 'keluhan tidak ada 
BAB (+) ', 'OUE: FC produksi urin kuning ', 'HN bilateral, contracted ginjal kanan, kista ginjal kiri ', 'terapi lanjut ', '', '', '', '', '', '', '', '', '797', '1', '-', NULL, '797', 0, NULL, '2025-05-31 11:43:18')
ERROR - 2025-05-31 11:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:43:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 11:44:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:44:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:44:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:44:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 11:44:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 11:44:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:44:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:44:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:45:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:46:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:46:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:47:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:47:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:47:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:48:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:49:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:50:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:51:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:52:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:54:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 11:55:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:55:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:56:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:57:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:58:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:59:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 04:59:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:59:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 04:59:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 04:59:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:59:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:59:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:03:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:04:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:04:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:05:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:06:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 05:07:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 05:07:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 05:07:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 05:07:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 12:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 05:08:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 05:08:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 12:08:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 05:08:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 05:08:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 12:08:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 12:08:20 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-31 12:12:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:13:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:13:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:13:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:14:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:14:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:15:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:15:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:15:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:15:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:15:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:15:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:15:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:15:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:16:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 12:17:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:18:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:19:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:19:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:19:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:19:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:19:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:19:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:20:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:20:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 12:20:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:21:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:21:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:22:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:22:24 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:22:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:22:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:23:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:23:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:23:05 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:23:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:23:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:23:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:23:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:23:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 12:23:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:23:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 12:24:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:25:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:25:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:26:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:26:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:28:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:28:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:28:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:28:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:28:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:28:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:28:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:29:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:29:47 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:29:46', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:29:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:30:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:30:08 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:30:07', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:30:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:30:25 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:30:24', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:30:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:30:32 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:30:31', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:30:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:30:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:31:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:31:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:31:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:31:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:31:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:31:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:31:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:31:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:31:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:31:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:31:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:31:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:31:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:31:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:31:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:31:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:31:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:32:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:32:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:32:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:32:32 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:32:32', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:32:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:32:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:32:43 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:32:42', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:32:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:32:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:32:56 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:32:56', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:33:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:33:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:33:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:33:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:17 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:33:17', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:33:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:33:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:33:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:33:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:33:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:41 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 12:33:41', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 12:33:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:33:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:33:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:33:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:34:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:35:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:35:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:35:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:36:47 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:36:55 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:37:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:37:06 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-31 12:37:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:37:06 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-31 12:37:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:37:06 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-31 12:37:16 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:37:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:37:55 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:38:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 12:40:10 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:40:33 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:40:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:40:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 12:40:51 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-31 12:40:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:40:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:40:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:40:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:40:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:40:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:40:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:40:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:41:37 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:41:53 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:42:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:42:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:43:03 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-31 12:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:43:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:43:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:44:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858348, '11', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:44:40 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (858348, '11', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858348, '11', '', '2', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 12:44:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:45:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:45:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:46:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:46:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:46:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:46:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:46:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:47:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:48:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;25-5-tgl 3&quot;
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:48:59 --> Query error: ERROR:  invalid input syntax for type date: "25-5-tgl 3"
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('757606', '2025-05-31 12:40', 'Jalan', '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', 'cemas akan lakukan tindakan operasi', '1 hari smrs', '1 hari smrs', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'cemas akan lakukan tindakan operasi', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"dirawat":"","kapan":"","dimana":""}', '', '0', 'Tidak Ada', '-', 'Tidak Ada', '-', '39', '3200', '45', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '0', '0', '', '0', '', '24', '23', '9', '12', '12', '9', '10', '11', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', '', '', 'Wiraswata', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'berdo`a', '', 'Belum Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'Sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '0', '0', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '98', '36.2', '20', '30', '', '', '', '', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '', '', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2', NULL, '4', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, '1', '13', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '', '0_18', '', '0_1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl 3', '25, Ct-Brain Non  Kontras tgl  22-5-RO Thorax tgl 5', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '403', '44', NULL, '2025-06-01 11:00', '1', '1', '2025-05-31 12:48:59')
ERROR - 2025-05-31 12:49:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;25-5-tgl 3&quot;
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:49:15 --> Query error: ERROR:  invalid input syntax for type date: "25-5-tgl 3"
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('757606', '2025-05-31 12:40', 'Jalan', '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', 'cemas akan lakukan tindakan operasi', '1 hari smrs', '1 hari smrs', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'cemas akan lakukan tindakan operasi', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"dirawat":"","kapan":"","dimana":""}', '', '0', 'Tidak Ada', '-', 'Tidak Ada', '-', '39', '3200', '45', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '0', '0', '', '0', '', '24', '23', '9', '12', '12', '9', '10', '11', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', '', '', 'Wiraswata', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'berdo`a', '', 'Belum Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'Sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '0', '0', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '98', '36.2', '20', '30', '', '', '', '', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '', '', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2', NULL, '4', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, '1', '13', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '', '0_18', '', '0_1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl 3', '25, Ct-Brain Non  Kontras tgl  22-5-RO Thorax tgl 5', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '403', '44', NULL, '2025-06-01 11:00', '1', '1', '2025-05-31 12:49:15')
ERROR - 2025-05-31 12:49:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;25-5-tgl 3&quot;
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:49:24 --> Query error: ERROR:  invalid input syntax for type date: "25-5-tgl 3"
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('757606', '2025-05-31 12:40', 'Jalan', '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', 'cemas akan lakukan tindakan operasi', '1 hari smrs', '1 hari smrs', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'cemas akan lakukan tindakan operasi', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"dirawat":"","kapan":"","dimana":""}', '', '0', 'Tidak Ada', '-', 'Tidak Ada', '-', '39', '3200', '45', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '0', '0', '', '0', '', '24', '23', '9', '12', '12', '9', '10', '11', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', '', '', 'Wiraswata', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'berdo`a', '', 'Belum Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'Sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '0', '0', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '98', '36.2', '20', '30', '', '', '', '', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '', '', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2', NULL, '4', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, '1', '13', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '', '0_18', '', '0_1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl 3', '25, Ct-Brain Non  Kontras tgl  22-5-RO Thorax tgl 5', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '403', '44', NULL, '2025-06-01 11:00', '1', '1', '2025-05-31 12:49:24')
ERROR - 2025-05-31 12:49:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;25-5-tgl 3&quot;
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:49:29 --> Query error: ERROR:  invalid input syntax for type date: "25-5-tgl 3"
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('757606', '2025-05-31 12:40', 'Jalan', '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', 'cemas akan lakukan tindakan operasi', '1 hari smrs', '1 hari smrs', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'cemas akan lakukan tindakan operasi', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"dirawat":"","kapan":"","dimana":""}', '', '0', 'Tidak Ada', '-', 'Tidak Ada', '-', '39', '3200', '45', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '0', '0', '', '0', '', '24', '23', '9', '12', '12', '9', '10', '11', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', '', '', 'Wiraswata', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'berdo`a', '', 'Belum Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'Sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '0', '0', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '98', '36.2', '20', '30', '', '', '', '', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '', '', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2', NULL, '4', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, '1', '13', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '', '0_18', '', '0_1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl 3', '25, Ct-Brain Non  Kontras tgl  22-5-RO Thorax tgl 5', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '403', '44', NULL, '2025-06-01 11:00', '1', '1', '2025-05-31 12:49:29')
ERROR - 2025-05-31 12:49:33 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:49:40 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:49:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;25-5-tgl 3&quot;
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:49:43 --> Query error: ERROR:  invalid input syntax for type date: "25-5-tgl 3"
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('757606', '2025-05-31 12:40', 'Jalan', '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', 'cemas akan lakukan tindakan operasi', '1 hari smrs', '1 hari smrs', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'cemas akan lakukan tindakan operasi', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"dirawat":"","kapan":"","dimana":""}', '', '0', 'Tidak Ada', '-', 'Tidak Ada', '-', '39', '3200', '45', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '0', '0', '', '0', '', '24', '23', '9', '12', '12', '9', '10', '11', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', '', '', 'Wiraswata', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'berdo`a', '', 'Belum Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'Sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '0', '0', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '98', '36.2', '20', '30', '', '', '', '', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '', '', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2', NULL, '4', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, '1', '13', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '', '0_18', '', '0_1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl 3', '25, Ct-Brain Non  Kontras tgl  22-5-RO Thorax tgl 5', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '403', '44', NULL, '2025-06-01 11:00', '1', '1', '2025-05-31 12:49:43')
ERROR - 2025-05-31 12:49:58 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:50:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;25-5-tgl 3&quot;
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 12:50:11 --> Query error: ERROR:  invalid input syntax for type date: "25-5-tgl 3"
LINE 1: ..._1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('757606', '2025-05-31 12:40', 'Jalan', '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', 'cemas akan lakukan tindakan operasi', '1 hari smrs', '1 hari smrs', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'cemas akan lakukan tindakan operasi', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"dirawat":"","kapan":"","dimana":""}', '', '0', 'Tidak Ada', '-', 'Tidak Ada', '-', '39', '3200', '45', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '0', '0', '', '0', '', '24', '23', '9', '12', '12', '9', '10', '11', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', '', '', 'Wiraswata', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'berdo`a', '', 'Belum Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'Sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '0', '0', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '98', '36.2', '20', '30', '', '', '', '', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '', '', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2', NULL, '4', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, '1', '13', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '', '0_18', '', '0_1', '0_4', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl 3', '25, Ct-Brain Non  Kontras tgl  22-5-RO Thorax tgl 5', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"","planning_2":"","planning_3":"1","planning_4":"","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '403', '44', NULL, '2025-06-01 11:00', '1', '1', '2025-05-31 12:50:11')
ERROR - 2025-05-31 12:51:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:52:20 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:52:38 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 12:58:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:58:35 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-31 12:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-31 12:59:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:59:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:00:03 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:01:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:01:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 06:01:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 06:01:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:01:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 13:01:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 06:01:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 06:01:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:03:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:03:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:03:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 13:04:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...'0', '0', '0', '0', '0', '0', '0', '0', '207044', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:04:08 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...'0', '0', '0', '0', '0', '0', '0', '0', '207044', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('699194', '757246', '0001337011841', '0223R0380525V014454', '00376739', 'CECEP', '1969-11-02', 1, '2025-05-31 08:42:46', '2025-05-31 10:52:28', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#I69.4#I10', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '207044', 'NaN', '0', '0', '0', '0', 'dr. Vinnie Juliana Yonatan, Sp.N', 'CP', '00003', 'JKN', '3603286209970003', '2025-05-31 13:04:08', 'normal', 'set_claim_data', 'Z09.8#I69.4#I10', '89.05')
ERROR - 2025-05-31 13:04:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-31 13:05:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:05:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:05:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:05:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:05:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:05:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:07:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:07:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:08:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:08:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:08:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:09:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:09:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;25-5-tgl 3&quot;
LINE 1: ... '0_1', '', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:09:50 --> Query error: ERROR:  invalid input syntax for type date: "25-5-tgl 3"
LINE 1: ... '0_1', '', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl ...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('757606', '2025-05-31 12:50', 'Jalan', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'Cemas akan tindakan operasi', '1 hari smrs', '1 hari smrs', '{"infeksi":"","lain":"","ket_lain":""}', 'Akut', 'Cemas akan tindakan operasi', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', '{"dirawat":"","kapan":"","dimana":""}', '', '0', 'Tidak Ada', '-', 'Tidak Ada', '-', '39', '3500', '43', 'Spontan', '1', '0', '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', '1', '0', '', '0', '', '24', '23', '9', '10', '10', '11', '11', '12', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'Wiraswasta', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'Berdo`a', '', 'Belum Baligh', '', 'Berwudhu', 'Berdiri', 'WNI', 'Sunda', '1', '', '0', '', '0', '0', '', '', '1', '1', '1', '1', '1', '', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '92', '36.2', '20', '30', '', '', '', '', '0', '', 'Reguler', '1', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '', '', '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '2', NULL, NULL, NULL, '1', '10', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_18', '0_1', '0_1', '', '0_25', '0_1', '0_3', '0_3', 'Hijau', '25-5-tgl 3', '25,Ct-Brain Non  Kontras tgl  22-5-ro Thorax tgl 5', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '403', '44', NULL, '2025-06-01 11:00', '1', '1', '2025-05-31 13:09:50')
ERROR - 2025-05-31 13:10:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:10:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-05-31 13:10:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:10:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:10:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-05-31 13:10:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:10:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:10:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:10:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 06:10:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 06:10:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:10:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:11:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:11:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:11:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:11:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:11:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:12:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:12:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:13:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-31 13:13:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-31 13:13:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:13:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:13:52 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:13:58 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:14:19 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:14:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 06:14:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 06:14:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 06:14:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 06:14:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:15:22 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:16:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:17:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:18:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:18:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:18:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-03&quot;
LINE 1: ...= '0_3', &quot;sew_total&quot; = 'Hijau', &quot;penunjang_lab&quot; = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:18:14 --> Query error: ERROR:  date/time field value out of range: "25-05-03"
LINE 1: ...= '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_kajian_keperawatan_anak" SET "id_layanan_pendaftaran" = '757606', "waktu_pengkajian_anak" = '2025-05-31 13:10', "cara_tiba_diruangan_anak" = 'Jalan', "informasi_dari_anak" = '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', "keluhan_utama_anak" = 'Cemas', "timbul_keluhan_anak" = '1 hari smrs', "lama_keluhan_anak" = '1 hari smrs', "faktor_pencetus_anak" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan_anak" = 'Akut', "riwayat_penyakit_sekarang_anak" = 'Cemas Akan di lakukan operasi', "riwayat_penyakit_terdahulu" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "riwayat_penyakit_keluarga" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "pernah_dirawat_anak" = '{"dirawat":"1","kapan":"24\/5\/25","dimana":"RSUD Kota Tangerang"}', "obat_dari_luar_anak" = '0', "alergi_anak" = '0', "alergi_obat_anak" = 'Tidak Ada', "alergi_obat_reaksi_anak" = '-', "alergi_makanan_anak" = 'Tidak Ada', "alergi_makanan_reaksi_anak" = '-', "usia_kehamilan" = '36', "berat_badan_lahir" = '45', "panjang_badan_lahir" = '3300', "riwayat_kelahiran_anak" = 'Spontan', "menangis" = '1', "riwayat_kuning" = '0', "riwayat_imunisasi" = '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', "stts_fungsional_mandiri" = '1', "stts_fungsional_ketergantungan" = '0', "stts_fungsional_ket_ketergantungan" = '', "stts_fungsional_perlu_bantuan" = '0', "stts_fungsional_ket_perlu_bantuan" = '', "asi_anak" = '24', "susu_formula" = '23', "tengkurap" = '9', "tumbuh_gigi" = '9', "rtk_bicara" = '10', "rtk_duduk" = '8', "rtk_berdiri" = '9', "rtk_berjalan" = '12', "status_psikologi_anak" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "hubungan_dengan_orang_tua" = '1', "tempat_tinggal_anak" = 'Rumah', "ket_tempat_tinggal_anak" = '', "pekerjaan_ayah" = 'Wiraswasta', "pekerjaan_ibu" = 'IRT', "cara_bayar" = 'BPJS', "cara_bayar_anak_t" = '', "ket_asuransi_cara_bayar" = '', "ket_cara_bayar_lain" = '', "agama_anak" = 'Islam', "ket_agama_lain_anak" = '', "kegiatan_agama_dilakukan" = 'Berdo`a', "kegiatan_spiritual_dilakukan" = '', "wajib_ibadah_anak" = 'Belum Baligh', "ket_wajib_ibadah_halangan_anak" = '', "thaharoh_anak" = 'Berwudhu', "sholat_anak" = 'Berdiri', "kewarganegaraan_anak" = 'WNI', "suku_bangsa" = 'Sunda', "bicara_anak" = '1', "ket_bicara_anak" = '', "perlu_penterjemah" = '0', "ket_penterjemah" = '', "bahasa_isyarat" = '0', "hanbatan_belajar_w" = '0', "h_menerima_edikasi_w" = '', "pendidikan_anak" = '', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '1', "pemahaman_nutrisi_diet" = '1', "pemahaman_spiritual" = '1', "pemahaman_peralatan_medis" = '1', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '0', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', "tensi_sistolik_awal" = '', "tensi_diastolik_awal" = '', "nadi_awal" = '92', "suhu_awal" = '36.2', "nafas_awal_anak" = '20', "berat_badan_awal" = '30', "lingkar_kepala_anak" = '', "tinggi_badan_anak" = '', "lingkar_dada_anak" = '', "lingkar_perut_anak" = '', "gangguan_neurologis" = '0', "ket_gangguan_neurologis" = '', "irama_nafas" = 'Reguler', "retraksi_dada" = '0', "bentuk_dada" = '1', "ket_bentuk_dada" = '', "pola_nafas" = '1', "ket_pola_nafas" = '', "suara_nafas" = '1', "ket_suara_nafas" = '', "nafas_cuping_hidung" = '0', "sianosis_nafas" = '0', "alat_bantu_nafas" = 'Spontan', "ket_kanul" = '', "alat_bantu_nafas_anak_t" = '', "ket_ventilator" = '', "sirkulasi_sianosis" = '0', "sirkulasi_pucat" = '0', "intensitas_nadi" = '{"Kuat":"Kuat","Lemah":"","Bounding":""}', "irama_nadi" = 'Reguler', "sirkulasi_edema" = '0', "sirkulasi_crt" = 'Kurang dari 3', "sirkulasi_akral" = 'Hangat', "sirkulasi_clubing_finger" = '1', "gastro_mulut" = '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', "gastro_muntah" = '0', "ket_gastro_muntah" = '', "gastro_peristaltik" = '', "gastro_mual" = '0', "gastro_ascites" = '0', "gastro_nyeri_ulu_hati" = '0', "bab_pengeluaran" = '{"anus":"Anus","stomata":"","lainnya":""}', "bab_frekuensi" = '', "konsistensi_anak" = '', "normal_anak" = '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', "bab_konsistensi" = '', "bak_pengeluaran" = '{"spontan":"1","kateter_urine":"","cystostomy":""}', "bak_kelainan" = '0', "bak_ket_kelainan" = '', "integumen_warna_kulit" = '{"pucat":"","kuning":"","normal":"1","mootled":""}', "integumen_kelainan" = '0', "integumen_resiko_dubitus" = '0', "integumen_luka" = '0', "kelainan_tulang" = '0', "ket_kelainan_tulang" = '', "gerakan_anak" = 'Bebas', "gentalia_anak" = '1', "ket_gentalia_anak" = '', "nilai_tingkat_nyeri" = '', "nyeri_hilang" = '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "lokasi_nyeri" = '', "durasi_nyeri" = '', "frekuensi_nyeri" = '', "sn_wajah_1" = NULL, "sn_wajah_2" = NULL, "sn_wajah_3" = NULL, "sn_kaki_1" = NULL, "sn_kaki_2" = NULL, "sn_kaki_3" = NULL, "sn_aktivitas_1" = NULL, "sn_aktivitas_2" = NULL, "sn_aktivitas_3" = NULL, "sn_menangis_1" = NULL, "sn_menangis_2" = NULL, "sn_menangis_3" = NULL, "sn_bicara_1" = NULL, "sn_bicara_2" = NULL, "sn_bicara_3" = NULL, "sn_nilai_total" = '0', "prja_umur_1" = NULL, "prja_umur_2" = NULL, "prja_umur_3" = '2', "prja_umur_4" = NULL, "prja_jk_1" = '2', "prja_jk_2" = NULL, "prja_diagnosis_1" = NULL, "prja_diagnosis_2" = NULL, "prja_diagnosis_3" = NULL, "prja_diagnosis_4" = '1', "prja_kognitif_1" = NULL, "prja_kognitif_2" = NULL, "prja_kognitif_3" = '1', "prja_lingkungan_1" = NULL, "prja_lingkungan_2" = NULL, "prja_lingkungan_3" = NULL, "prja_lingkungan_4" = '1', "prja_respon_1" = NULL, "prja_respon_2" = '2', "prja_respon_3" = NULL, "prja_obat_1" = NULL, "prja_obat_2" = NULL, "prja_obat_3" = '1', "prja_nilai_total" = '10', "sg_nilai_1" = '0', "sg_nilai_2" = '0', "sg_nilai_3" = '0', "sg_nilai_4" = '0', "sg_nilai_total" = '0', "daftar_penyakit_malnutrisi" = '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', "skrining_pasien_akhir_kehidupan" = '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "sew_suhu" = '0_3', "sew_pernafasan" = '0_18', "sew_kondisi_pernafasan" = '0_1', "sew_alat_bantu" = '0_1', "sew_saturasi" = '', "sew_nadi" = '0_25', "sew_warna_kulit" = '0_1', "sew_tds" = '0_3', "sew_kesadaran" = '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03', "penunjang_rad" = '2025-05-05', "hasil_lab" = '', "hsail_rad" = '', "penunjang_lainnya" = 'CT Brain NK 22/03/25', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '403', "id_verifikasi_dokter_dpjp" = '44', "waktu_ttd_perawat" = '2025-05-31 13:12:00', "ttd_perawat" = '1', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-06-01 11:00:00', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-05-31 13:18:14'
WHERE "id" = '7183'
ERROR - 2025-05-31 13:18:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:18:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:18:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:18:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:18:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:18:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:18:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-03&quot;
LINE 1: ...= '0_3', &quot;sew_total&quot; = 'Hijau', &quot;penunjang_lab&quot; = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:18:59 --> Query error: ERROR:  date/time field value out of range: "25-05-03"
LINE 1: ...= '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_kajian_keperawatan_anak" SET "id_layanan_pendaftaran" = '757606', "waktu_pengkajian_anak" = '2025-05-31 13:10', "cara_tiba_diruangan_anak" = 'Jalan', "informasi_dari_anak" = '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', "keluhan_utama_anak" = 'Cemas', "timbul_keluhan_anak" = '1 hari smrs', "lama_keluhan_anak" = '1 hari smrs', "faktor_pencetus_anak" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan_anak" = 'Akut', "riwayat_penyakit_sekarang_anak" = 'Cemas Akan di lakukan operasi', "riwayat_penyakit_terdahulu" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "riwayat_penyakit_keluarga" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "pernah_dirawat_anak" = '{"dirawat":"1","kapan":"24\/5\/25","dimana":"RSUD Kota Tangerang"}', "obat_dari_luar_anak" = '0', "alergi_anak" = '0', "alergi_obat_anak" = 'Tidak Ada', "alergi_obat_reaksi_anak" = '-', "alergi_makanan_anak" = 'Tidak Ada', "alergi_makanan_reaksi_anak" = '-', "usia_kehamilan" = '36', "berat_badan_lahir" = '45', "panjang_badan_lahir" = '3300', "riwayat_kelahiran_anak" = 'Spontan', "menangis" = '1', "riwayat_kuning" = '0', "riwayat_imunisasi" = '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', "stts_fungsional_mandiri" = '1', "stts_fungsional_ketergantungan" = '0', "stts_fungsional_ket_ketergantungan" = '', "stts_fungsional_perlu_bantuan" = '0', "stts_fungsional_ket_perlu_bantuan" = '', "asi_anak" = '24', "susu_formula" = '23', "tengkurap" = '9', "tumbuh_gigi" = '9', "rtk_bicara" = '10', "rtk_duduk" = '8', "rtk_berdiri" = '9', "rtk_berjalan" = '12', "status_psikologi_anak" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "hubungan_dengan_orang_tua" = '1', "tempat_tinggal_anak" = 'Rumah', "ket_tempat_tinggal_anak" = '', "pekerjaan_ayah" = 'Wiraswasta', "pekerjaan_ibu" = 'IRT', "cara_bayar" = 'BPJS', "cara_bayar_anak_t" = '', "ket_asuransi_cara_bayar" = '', "ket_cara_bayar_lain" = '', "agama_anak" = 'Islam', "ket_agama_lain_anak" = '', "kegiatan_agama_dilakukan" = 'Berdo`a', "kegiatan_spiritual_dilakukan" = '', "wajib_ibadah_anak" = 'Belum Baligh', "ket_wajib_ibadah_halangan_anak" = '', "thaharoh_anak" = 'Berwudhu', "sholat_anak" = 'Berdiri', "kewarganegaraan_anak" = 'WNI', "suku_bangsa" = 'Sunda', "bicara_anak" = '1', "ket_bicara_anak" = '', "perlu_penterjemah" = '0', "ket_penterjemah" = '', "bahasa_isyarat" = '0', "hanbatan_belajar_w" = '0', "h_menerima_edikasi_w" = '', "pendidikan_anak" = '', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '1', "pemahaman_nutrisi_diet" = '1', "pemahaman_spiritual" = '1', "pemahaman_peralatan_medis" = '1', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '0', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', "tensi_sistolik_awal" = '', "tensi_diastolik_awal" = '', "nadi_awal" = '92', "suhu_awal" = '36.2', "nafas_awal_anak" = '20', "berat_badan_awal" = '30', "lingkar_kepala_anak" = '', "tinggi_badan_anak" = '', "lingkar_dada_anak" = '', "lingkar_perut_anak" = '', "gangguan_neurologis" = '0', "ket_gangguan_neurologis" = '', "irama_nafas" = 'Reguler', "retraksi_dada" = '0', "bentuk_dada" = '1', "ket_bentuk_dada" = '', "pola_nafas" = '1', "ket_pola_nafas" = '', "suara_nafas" = '1', "ket_suara_nafas" = '', "nafas_cuping_hidung" = '0', "sianosis_nafas" = '0', "alat_bantu_nafas" = 'Spontan', "ket_kanul" = '', "alat_bantu_nafas_anak_t" = '', "ket_ventilator" = '', "sirkulasi_sianosis" = '0', "sirkulasi_pucat" = '0', "intensitas_nadi" = '{"Kuat":"Kuat","Lemah":"","Bounding":""}', "irama_nadi" = 'Reguler', "sirkulasi_edema" = '0', "sirkulasi_crt" = 'Kurang dari 3', "sirkulasi_akral" = 'Hangat', "sirkulasi_clubing_finger" = '1', "gastro_mulut" = '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', "gastro_muntah" = '0', "ket_gastro_muntah" = '', "gastro_peristaltik" = '', "gastro_mual" = '0', "gastro_ascites" = '0', "gastro_nyeri_ulu_hati" = '0', "bab_pengeluaran" = '{"anus":"Anus","stomata":"","lainnya":""}', "bab_frekuensi" = '', "konsistensi_anak" = '', "normal_anak" = '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', "bab_konsistensi" = '', "bak_pengeluaran" = '{"spontan":"1","kateter_urine":"","cystostomy":""}', "bak_kelainan" = '0', "bak_ket_kelainan" = '', "integumen_warna_kulit" = '{"pucat":"","kuning":"","normal":"1","mootled":""}', "integumen_kelainan" = '0', "integumen_resiko_dubitus" = '0', "integumen_luka" = '0', "kelainan_tulang" = '0', "ket_kelainan_tulang" = '', "gerakan_anak" = 'Bebas', "gentalia_anak" = '1', "ket_gentalia_anak" = '', "nilai_tingkat_nyeri" = '', "nyeri_hilang" = '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "lokasi_nyeri" = '', "durasi_nyeri" = '', "frekuensi_nyeri" = '', "sn_wajah_1" = NULL, "sn_wajah_2" = NULL, "sn_wajah_3" = NULL, "sn_kaki_1" = NULL, "sn_kaki_2" = NULL, "sn_kaki_3" = NULL, "sn_aktivitas_1" = NULL, "sn_aktivitas_2" = NULL, "sn_aktivitas_3" = NULL, "sn_menangis_1" = NULL, "sn_menangis_2" = NULL, "sn_menangis_3" = NULL, "sn_bicara_1" = NULL, "sn_bicara_2" = NULL, "sn_bicara_3" = NULL, "sn_nilai_total" = '0', "prja_umur_1" = NULL, "prja_umur_2" = NULL, "prja_umur_3" = '2', "prja_umur_4" = NULL, "prja_jk_1" = '2', "prja_jk_2" = NULL, "prja_diagnosis_1" = NULL, "prja_diagnosis_2" = NULL, "prja_diagnosis_3" = NULL, "prja_diagnosis_4" = '1', "prja_kognitif_1" = NULL, "prja_kognitif_2" = NULL, "prja_kognitif_3" = '1', "prja_lingkungan_1" = NULL, "prja_lingkungan_2" = NULL, "prja_lingkungan_3" = NULL, "prja_lingkungan_4" = '1', "prja_respon_1" = NULL, "prja_respon_2" = '2', "prja_respon_3" = NULL, "prja_obat_1" = NULL, "prja_obat_2" = NULL, "prja_obat_3" = '1', "prja_nilai_total" = '10', "sg_nilai_1" = '0', "sg_nilai_2" = '0', "sg_nilai_3" = '0', "sg_nilai_4" = '0', "sg_nilai_total" = '0', "daftar_penyakit_malnutrisi" = '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', "skrining_pasien_akhir_kehidupan" = '{"kriteria_anak_1":"","kriteria_anak_2":"","kriteria_anak_3":"","kriteria_anak_4":"","kriteria_anak_5":""}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "sew_suhu" = '0_3', "sew_pernafasan" = '0_18', "sew_kondisi_pernafasan" = '0_1', "sew_alat_bantu" = '0_1', "sew_saturasi" = '', "sew_nadi" = '0_25', "sew_warna_kulit" = '0_1', "sew_tds" = '0_3', "sew_kesadaran" = '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03', "penunjang_rad" = '2025-05-05', "hasil_lab" = '-', "hsail_rad" = '-', "penunjang_lainnya" = 'CT Brain NK 22/03/25', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '403', "id_verifikasi_dokter_dpjp" = '44', "waktu_ttd_perawat" = '2025-05-31 13:12:00', "ttd_perawat" = '1', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-06-01 11:00:00', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-05-31 13:18:59'
WHERE "id" = '7183'
ERROR - 2025-05-31 13:19:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:19:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:20:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-03&quot;
LINE 1: ...= '0_3', &quot;sew_total&quot; = 'Hijau', &quot;penunjang_lab&quot; = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:20:38 --> Query error: ERROR:  date/time field value out of range: "25-05-03"
LINE 1: ...= '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_kajian_keperawatan_anak" SET "id_layanan_pendaftaran" = '757606', "waktu_pengkajian_anak" = '2025-05-31 13:10', "cara_tiba_diruangan_anak" = 'Jalan', "informasi_dari_anak" = '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', "keluhan_utama_anak" = 'Cemas', "timbul_keluhan_anak" = '1 hari smrs', "lama_keluhan_anak" = '1 hari smrs', "faktor_pencetus_anak" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan_anak" = 'Akut', "riwayat_penyakit_sekarang_anak" = 'Cemas Akan di lakukan operasi', "riwayat_penyakit_terdahulu" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "riwayat_penyakit_keluarga" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "pernah_dirawat_anak" = '{"dirawat":"1","kapan":"24\/5\/25","dimana":"RSUD Kota Tangerang"}', "obat_dari_luar_anak" = '0', "alergi_anak" = '0', "alergi_obat_anak" = 'Tidak Ada', "alergi_obat_reaksi_anak" = '-', "alergi_makanan_anak" = 'Tidak Ada', "alergi_makanan_reaksi_anak" = '-', "usia_kehamilan" = '39', "berat_badan_lahir" = '3300', "panjang_badan_lahir" = '45', "riwayat_kelahiran_anak" = 'Spontan', "menangis" = '1', "riwayat_kuning" = '0', "riwayat_imunisasi" = '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', "stts_fungsional_mandiri" = '1', "stts_fungsional_ketergantungan" = '0', "stts_fungsional_ket_ketergantungan" = '', "stts_fungsional_perlu_bantuan" = '0', "stts_fungsional_ket_perlu_bantuan" = '', "asi_anak" = '24', "susu_formula" = '23', "tengkurap" = '9', "tumbuh_gigi" = '9', "rtk_bicara" = '10', "rtk_duduk" = '8', "rtk_berdiri" = '9', "rtk_berjalan" = '12', "status_psikologi_anak" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "hubungan_dengan_orang_tua" = '1', "tempat_tinggal_anak" = 'Rumah', "ket_tempat_tinggal_anak" = '', "pekerjaan_ayah" = 'Wiraswasta', "pekerjaan_ibu" = 'IRT', "cara_bayar" = 'BPJS', "cara_bayar_anak_t" = '', "ket_asuransi_cara_bayar" = '', "ket_cara_bayar_lain" = '', "agama_anak" = 'Islam', "ket_agama_lain_anak" = '', "kegiatan_agama_dilakukan" = 'Berdo`a', "kegiatan_spiritual_dilakukan" = '', "wajib_ibadah_anak" = 'Belum Baligh', "ket_wajib_ibadah_halangan_anak" = '', "thaharoh_anak" = 'Berwudhu', "sholat_anak" = 'Berdiri', "kewarganegaraan_anak" = 'WNI', "suku_bangsa" = 'Sunda', "bicara_anak" = '1', "ket_bicara_anak" = '', "perlu_penterjemah" = '0', "ket_penterjemah" = '', "bahasa_isyarat" = '0', "hanbatan_belajar_w" = '0', "h_menerima_edikasi_w" = '', "pendidikan_anak" = '', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '1', "pemahaman_nutrisi_diet" = '1', "pemahaman_spiritual" = '1', "pemahaman_peralatan_medis" = '1', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '0', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', "tensi_sistolik_awal" = '', "tensi_diastolik_awal" = '', "nadi_awal" = '92', "suhu_awal" = '36.2', "nafas_awal_anak" = '20', "berat_badan_awal" = '30', "lingkar_kepala_anak" = '', "tinggi_badan_anak" = '', "lingkar_dada_anak" = '', "lingkar_perut_anak" = '', "gangguan_neurologis" = '0', "ket_gangguan_neurologis" = '', "irama_nafas" = 'Reguler', "retraksi_dada" = '0', "bentuk_dada" = '1', "ket_bentuk_dada" = '', "pola_nafas" = '1', "ket_pola_nafas" = '', "suara_nafas" = '1', "ket_suara_nafas" = '', "nafas_cuping_hidung" = '0', "sianosis_nafas" = '0', "alat_bantu_nafas" = 'Spontan', "ket_kanul" = '', "alat_bantu_nafas_anak_t" = '', "ket_ventilator" = '', "sirkulasi_sianosis" = '0', "sirkulasi_pucat" = '0', "intensitas_nadi" = '{"Kuat":"Kuat","Lemah":"","Bounding":""}', "irama_nadi" = 'Reguler', "sirkulasi_edema" = '0', "sirkulasi_crt" = 'Kurang dari 3', "sirkulasi_akral" = 'Hangat', "sirkulasi_clubing_finger" = '1', "gastro_mulut" = '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', "gastro_muntah" = '0', "ket_gastro_muntah" = '', "gastro_peristaltik" = '', "gastro_mual" = '0', "gastro_ascites" = '0', "gastro_nyeri_ulu_hati" = '0', "bab_pengeluaran" = '{"anus":"Anus","stomata":"","lainnya":""}', "bab_frekuensi" = '', "konsistensi_anak" = '', "normal_anak" = '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', "bab_konsistensi" = '', "bak_pengeluaran" = '{"spontan":"1","kateter_urine":"","cystostomy":""}', "bak_kelainan" = '0', "bak_ket_kelainan" = '', "integumen_warna_kulit" = '{"pucat":"","kuning":"","normal":"1","mootled":""}', "integumen_kelainan" = '0', "integumen_resiko_dubitus" = '0', "integumen_luka" = '0', "kelainan_tulang" = '0', "ket_kelainan_tulang" = '', "gerakan_anak" = 'Bebas', "gentalia_anak" = '1', "ket_gentalia_anak" = '', "nilai_tingkat_nyeri" = '', "nyeri_hilang" = '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "lokasi_nyeri" = '', "durasi_nyeri" = '', "frekuensi_nyeri" = '', "sn_wajah_1" = NULL, "sn_wajah_2" = NULL, "sn_wajah_3" = NULL, "sn_kaki_1" = NULL, "sn_kaki_2" = NULL, "sn_kaki_3" = NULL, "sn_aktivitas_1" = NULL, "sn_aktivitas_2" = NULL, "sn_aktivitas_3" = NULL, "sn_menangis_1" = NULL, "sn_menangis_2" = NULL, "sn_menangis_3" = NULL, "sn_bicara_1" = NULL, "sn_bicara_2" = NULL, "sn_bicara_3" = NULL, "sn_nilai_total" = '0', "prja_umur_1" = NULL, "prja_umur_2" = NULL, "prja_umur_3" = '2', "prja_umur_4" = NULL, "prja_jk_1" = '2', "prja_jk_2" = NULL, "prja_diagnosis_1" = NULL, "prja_diagnosis_2" = NULL, "prja_diagnosis_3" = NULL, "prja_diagnosis_4" = '1', "prja_kognitif_1" = NULL, "prja_kognitif_2" = NULL, "prja_kognitif_3" = '1', "prja_lingkungan_1" = NULL, "prja_lingkungan_2" = NULL, "prja_lingkungan_3" = NULL, "prja_lingkungan_4" = '1', "prja_respon_1" = NULL, "prja_respon_2" = '2', "prja_respon_3" = NULL, "prja_obat_1" = NULL, "prja_obat_2" = NULL, "prja_obat_3" = '1', "prja_nilai_total" = '10', "sg_nilai_1" = '0', "sg_nilai_2" = '0', "sg_nilai_3" = '0', "sg_nilai_4" = '0', "sg_nilai_total" = '0', "daftar_penyakit_malnutrisi" = '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', "skrining_pasien_akhir_kehidupan" = '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "sew_suhu" = '0_3', "sew_pernafasan" = '0_18', "sew_kondisi_pernafasan" = '0_1', "sew_alat_bantu" = '0_1', "sew_saturasi" = '', "sew_nadi" = '0_25', "sew_warna_kulit" = '0_1', "sew_tds" = '0_3', "sew_kesadaran" = '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03', "penunjang_rad" = '2025-05-05', "hasil_lab" = '-', "hsail_rad" = '-', "penunjang_lainnya" = 'CT Brain NK 22/03/25', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '403', "id_verifikasi_dokter_dpjp" = '44', "waktu_ttd_perawat" = '2025-05-31 13:12:00', "ttd_perawat" = '1', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-06-01 11:00:00', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-05-31 13:20:38'
WHERE "id" = '7183'
ERROR - 2025-05-31 13:21:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-03&quot;
LINE 1: ...= '0_3', &quot;sew_total&quot; = 'Hijau', &quot;penunjang_lab&quot; = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:21:06 --> Query error: ERROR:  date/time field value out of range: "25-05-03"
LINE 1: ...= '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_kajian_keperawatan_anak" SET "id_layanan_pendaftaran" = '757606', "waktu_pengkajian_anak" = '2025-05-31 13:10', "cara_tiba_diruangan_anak" = 'Jalan', "informasi_dari_anak" = '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', "keluhan_utama_anak" = 'Cemas', "timbul_keluhan_anak" = '1 hari smrs', "lama_keluhan_anak" = '1 hari smrs', "faktor_pencetus_anak" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan_anak" = 'Akut', "riwayat_penyakit_sekarang_anak" = 'Cemas Akan di lakukan operasi', "riwayat_penyakit_terdahulu" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "riwayat_penyakit_keluarga" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "pernah_dirawat_anak" = '{"dirawat":"1","kapan":"24\/5\/25","dimana":"RSUD Kota Tangerang"}', "obat_dari_luar_anak" = '0', "alergi_anak" = '0', "alergi_obat_anak" = 'Tidak Ada', "alergi_obat_reaksi_anak" = '-', "alergi_makanan_anak" = 'Tidak Ada', "alergi_makanan_reaksi_anak" = '-', "usia_kehamilan" = '39', "berat_badan_lahir" = '3300', "panjang_badan_lahir" = '45', "riwayat_kelahiran_anak" = 'Spontan', "menangis" = '1', "riwayat_kuning" = '0', "riwayat_imunisasi" = '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', "stts_fungsional_mandiri" = '1', "stts_fungsional_ketergantungan" = '0', "stts_fungsional_ket_ketergantungan" = '', "stts_fungsional_perlu_bantuan" = '0', "stts_fungsional_ket_perlu_bantuan" = '', "asi_anak" = '24', "susu_formula" = '23', "tengkurap" = '9', "tumbuh_gigi" = '9', "rtk_bicara" = '10', "rtk_duduk" = '8', "rtk_berdiri" = '9', "rtk_berjalan" = '12', "status_psikologi_anak" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "hubungan_dengan_orang_tua" = '1', "tempat_tinggal_anak" = 'Rumah', "ket_tempat_tinggal_anak" = '', "pekerjaan_ayah" = 'Wiraswasta', "pekerjaan_ibu" = 'IRT', "cara_bayar" = 'BPJS', "cara_bayar_anak_t" = '', "ket_asuransi_cara_bayar" = '', "ket_cara_bayar_lain" = '', "agama_anak" = 'Islam', "ket_agama_lain_anak" = '', "kegiatan_agama_dilakukan" = 'Berdo`a', "kegiatan_spiritual_dilakukan" = '', "wajib_ibadah_anak" = 'Belum Baligh', "ket_wajib_ibadah_halangan_anak" = '', "thaharoh_anak" = 'Berwudhu', "sholat_anak" = 'Berdiri', "kewarganegaraan_anak" = 'WNI', "suku_bangsa" = 'Sunda', "bicara_anak" = '1', "ket_bicara_anak" = '', "perlu_penterjemah" = '0', "ket_penterjemah" = '', "bahasa_isyarat" = '0', "hanbatan_belajar_w" = '0', "h_menerima_edikasi_w" = '', "pendidikan_anak" = '', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '1', "pemahaman_nutrisi_diet" = '1', "pemahaman_spiritual" = '1', "pemahaman_peralatan_medis" = '1', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '0', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', "tensi_sistolik_awal" = '', "tensi_diastolik_awal" = '', "nadi_awal" = '92', "suhu_awal" = '36.2', "nafas_awal_anak" = '20', "berat_badan_awal" = '30', "lingkar_kepala_anak" = '', "tinggi_badan_anak" = '', "lingkar_dada_anak" = '', "lingkar_perut_anak" = '', "gangguan_neurologis" = '0', "ket_gangguan_neurologis" = '', "irama_nafas" = 'Reguler', "retraksi_dada" = '0', "bentuk_dada" = '1', "ket_bentuk_dada" = '', "pola_nafas" = '1', "ket_pola_nafas" = '', "suara_nafas" = '1', "ket_suara_nafas" = '', "nafas_cuping_hidung" = '0', "sianosis_nafas" = '0', "alat_bantu_nafas" = 'Spontan', "ket_kanul" = '', "alat_bantu_nafas_anak_t" = '', "ket_ventilator" = '', "sirkulasi_sianosis" = '0', "sirkulasi_pucat" = '0', "intensitas_nadi" = '{"Kuat":"Kuat","Lemah":"","Bounding":""}', "irama_nadi" = 'Reguler', "sirkulasi_edema" = '0', "sirkulasi_crt" = 'Kurang dari 3', "sirkulasi_akral" = 'Hangat', "sirkulasi_clubing_finger" = '1', "gastro_mulut" = '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', "gastro_muntah" = '0', "ket_gastro_muntah" = '', "gastro_peristaltik" = '', "gastro_mual" = '0', "gastro_ascites" = '0', "gastro_nyeri_ulu_hati" = '0', "bab_pengeluaran" = '{"anus":"Anus","stomata":"","lainnya":""}', "bab_frekuensi" = '', "konsistensi_anak" = '', "normal_anak" = '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', "bab_konsistensi" = '', "bak_pengeluaran" = '{"spontan":"1","kateter_urine":"","cystostomy":""}', "bak_kelainan" = '0', "bak_ket_kelainan" = '', "integumen_warna_kulit" = '{"pucat":"","kuning":"","normal":"1","mootled":""}', "integumen_kelainan" = '0', "integumen_resiko_dubitus" = '0', "integumen_luka" = '0', "kelainan_tulang" = '0', "ket_kelainan_tulang" = '', "gerakan_anak" = 'Bebas', "gentalia_anak" = '1', "ket_gentalia_anak" = '', "nilai_tingkat_nyeri" = '', "nyeri_hilang" = '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "lokasi_nyeri" = '', "durasi_nyeri" = '', "frekuensi_nyeri" = '', "sn_wajah_1" = NULL, "sn_wajah_2" = NULL, "sn_wajah_3" = NULL, "sn_kaki_1" = NULL, "sn_kaki_2" = NULL, "sn_kaki_3" = NULL, "sn_aktivitas_1" = NULL, "sn_aktivitas_2" = NULL, "sn_aktivitas_3" = NULL, "sn_menangis_1" = NULL, "sn_menangis_2" = NULL, "sn_menangis_3" = NULL, "sn_bicara_1" = NULL, "sn_bicara_2" = NULL, "sn_bicara_3" = NULL, "sn_nilai_total" = '0', "prja_umur_1" = NULL, "prja_umur_2" = NULL, "prja_umur_3" = '2', "prja_umur_4" = NULL, "prja_jk_1" = '2', "prja_jk_2" = NULL, "prja_diagnosis_1" = NULL, "prja_diagnosis_2" = NULL, "prja_diagnosis_3" = NULL, "prja_diagnosis_4" = '1', "prja_kognitif_1" = NULL, "prja_kognitif_2" = NULL, "prja_kognitif_3" = '1', "prja_lingkungan_1" = NULL, "prja_lingkungan_2" = NULL, "prja_lingkungan_3" = NULL, "prja_lingkungan_4" = '1', "prja_respon_1" = NULL, "prja_respon_2" = '2', "prja_respon_3" = NULL, "prja_obat_1" = NULL, "prja_obat_2" = NULL, "prja_obat_3" = '1', "prja_nilai_total" = '10', "sg_nilai_1" = '0', "sg_nilai_2" = '0', "sg_nilai_3" = '0', "sg_nilai_4" = '0', "sg_nilai_total" = '0', "daftar_penyakit_malnutrisi" = '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', "skrining_pasien_akhir_kehidupan" = '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "sew_suhu" = '0_3', "sew_pernafasan" = '0_18', "sew_kondisi_pernafasan" = '0_1', "sew_alat_bantu" = '0_1', "sew_saturasi" = '', "sew_nadi" = '0_25', "sew_warna_kulit" = '0_1', "sew_tds" = '0_3', "sew_kesadaran" = '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03', "penunjang_rad" = '2025-05-05', "hasil_lab" = '-', "hsail_rad" = '-', "penunjang_lainnya" = 'CT Brain NK 22/03/25', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '403', "id_verifikasi_dokter_dpjp" = '44', "waktu_ttd_perawat" = '2025-05-31 13:12:00', "ttd_perawat" = '1', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-06-01 11:00:00', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-05-31 13:21:06'
WHERE "id" = '7183'
ERROR - 2025-05-31 13:21:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-03&quot;
LINE 1: ...= '0_3', &quot;sew_total&quot; = 'Hijau', &quot;penunjang_lab&quot; = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:21:18 --> Query error: ERROR:  date/time field value out of range: "25-05-03"
LINE 1: ...= '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_kajian_keperawatan_anak" SET "id_layanan_pendaftaran" = '757606', "waktu_pengkajian_anak" = '2025-05-31 13:10', "cara_tiba_diruangan_anak" = 'Jalan', "informasi_dari_anak" = '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', "keluhan_utama_anak" = 'Cemas', "timbul_keluhan_anak" = '1 hari smrs', "lama_keluhan_anak" = '1 hari smrs', "faktor_pencetus_anak" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan_anak" = 'Akut', "riwayat_penyakit_sekarang_anak" = 'Cemas Akan di lakukan operasi', "riwayat_penyakit_terdahulu" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "riwayat_penyakit_keluarga" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "pernah_dirawat_anak" = '{"dirawat":"1","kapan":"24\/5\/25","dimana":"RSUD Kota Tangerang"}', "obat_dari_luar_anak" = '0', "alergi_anak" = '0', "alergi_obat_anak" = 'Tidak Ada', "alergi_obat_reaksi_anak" = '-', "alergi_makanan_anak" = 'Tidak Ada', "alergi_makanan_reaksi_anak" = '-', "usia_kehamilan" = '39', "berat_badan_lahir" = '3300', "panjang_badan_lahir" = '45', "riwayat_kelahiran_anak" = 'Spontan', "menangis" = '1', "riwayat_kuning" = '0', "riwayat_imunisasi" = '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', "stts_fungsional_mandiri" = '1', "stts_fungsional_ketergantungan" = '0', "stts_fungsional_ket_ketergantungan" = '', "stts_fungsional_perlu_bantuan" = '0', "stts_fungsional_ket_perlu_bantuan" = '', "asi_anak" = '24', "susu_formula" = '23', "tengkurap" = '9', "tumbuh_gigi" = '9', "rtk_bicara" = '10', "rtk_duduk" = '8', "rtk_berdiri" = '9', "rtk_berjalan" = '12', "status_psikologi_anak" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "hubungan_dengan_orang_tua" = '1', "tempat_tinggal_anak" = 'Rumah', "ket_tempat_tinggal_anak" = '', "pekerjaan_ayah" = 'Wiraswasta', "pekerjaan_ibu" = 'IRT', "cara_bayar" = 'BPJS', "cara_bayar_anak_t" = '', "ket_asuransi_cara_bayar" = '', "ket_cara_bayar_lain" = '', "agama_anak" = 'Islam', "ket_agama_lain_anak" = '', "kegiatan_agama_dilakukan" = 'Berdo`a', "kegiatan_spiritual_dilakukan" = '', "wajib_ibadah_anak" = 'Belum Baligh', "ket_wajib_ibadah_halangan_anak" = '', "thaharoh_anak" = 'Berwudhu', "sholat_anak" = 'Berdiri', "kewarganegaraan_anak" = 'WNI', "suku_bangsa" = 'Sunda', "bicara_anak" = '1', "ket_bicara_anak" = '', "perlu_penterjemah" = '0', "ket_penterjemah" = '', "bahasa_isyarat" = '0', "hanbatan_belajar_w" = '0', "h_menerima_edikasi_w" = '', "pendidikan_anak" = '', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '1', "pemahaman_nutrisi_diet" = '1', "pemahaman_spiritual" = '1', "pemahaman_peralatan_medis" = '1', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '0', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', "tensi_sistolik_awal" = '', "tensi_diastolik_awal" = '', "nadi_awal" = '92', "suhu_awal" = '36.2', "nafas_awal_anak" = '20', "berat_badan_awal" = '30', "lingkar_kepala_anak" = '', "tinggi_badan_anak" = '', "lingkar_dada_anak" = '', "lingkar_perut_anak" = '', "gangguan_neurologis" = '0', "ket_gangguan_neurologis" = '', "irama_nafas" = 'Reguler', "retraksi_dada" = '0', "bentuk_dada" = '1', "ket_bentuk_dada" = '', "pola_nafas" = '1', "ket_pola_nafas" = '', "suara_nafas" = '1', "ket_suara_nafas" = '', "nafas_cuping_hidung" = '0', "sianosis_nafas" = '0', "alat_bantu_nafas" = 'Spontan', "ket_kanul" = '', "alat_bantu_nafas_anak_t" = '', "ket_ventilator" = '', "sirkulasi_sianosis" = '0', "sirkulasi_pucat" = '0', "intensitas_nadi" = '{"Kuat":"Kuat","Lemah":"","Bounding":""}', "irama_nadi" = 'Reguler', "sirkulasi_edema" = '0', "sirkulasi_crt" = 'Kurang dari 3', "sirkulasi_akral" = 'Hangat', "sirkulasi_clubing_finger" = '1', "gastro_mulut" = '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', "gastro_muntah" = '0', "ket_gastro_muntah" = '', "gastro_peristaltik" = '', "gastro_mual" = '0', "gastro_ascites" = '0', "gastro_nyeri_ulu_hati" = '0', "bab_pengeluaran" = '{"anus":"Anus","stomata":"","lainnya":""}', "bab_frekuensi" = '', "konsistensi_anak" = '', "normal_anak" = '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', "bab_konsistensi" = '', "bak_pengeluaran" = '{"spontan":"1","kateter_urine":"","cystostomy":""}', "bak_kelainan" = '0', "bak_ket_kelainan" = '', "integumen_warna_kulit" = '{"pucat":"","kuning":"","normal":"1","mootled":""}', "integumen_kelainan" = '0', "integumen_resiko_dubitus" = '0', "integumen_luka" = '0', "kelainan_tulang" = '0', "ket_kelainan_tulang" = '', "gerakan_anak" = 'Bebas', "gentalia_anak" = '1', "ket_gentalia_anak" = '', "nilai_tingkat_nyeri" = '', "nyeri_hilang" = '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "lokasi_nyeri" = '', "durasi_nyeri" = '', "frekuensi_nyeri" = '', "sn_wajah_1" = NULL, "sn_wajah_2" = NULL, "sn_wajah_3" = NULL, "sn_kaki_1" = NULL, "sn_kaki_2" = NULL, "sn_kaki_3" = NULL, "sn_aktivitas_1" = NULL, "sn_aktivitas_2" = NULL, "sn_aktivitas_3" = NULL, "sn_menangis_1" = NULL, "sn_menangis_2" = NULL, "sn_menangis_3" = NULL, "sn_bicara_1" = NULL, "sn_bicara_2" = NULL, "sn_bicara_3" = NULL, "sn_nilai_total" = '0', "prja_umur_1" = NULL, "prja_umur_2" = NULL, "prja_umur_3" = '2', "prja_umur_4" = NULL, "prja_jk_1" = '2', "prja_jk_2" = NULL, "prja_diagnosis_1" = NULL, "prja_diagnosis_2" = NULL, "prja_diagnosis_3" = NULL, "prja_diagnosis_4" = '1', "prja_kognitif_1" = NULL, "prja_kognitif_2" = NULL, "prja_kognitif_3" = '1', "prja_lingkungan_1" = NULL, "prja_lingkungan_2" = NULL, "prja_lingkungan_3" = NULL, "prja_lingkungan_4" = '1', "prja_respon_1" = NULL, "prja_respon_2" = '2', "prja_respon_3" = NULL, "prja_obat_1" = NULL, "prja_obat_2" = NULL, "prja_obat_3" = '1', "prja_nilai_total" = '10', "sg_nilai_1" = '0', "sg_nilai_2" = '0', "sg_nilai_3" = '0', "sg_nilai_4" = '0', "sg_nilai_total" = '0', "daftar_penyakit_malnutrisi" = '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', "skrining_pasien_akhir_kehidupan" = '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "sew_suhu" = '0_3', "sew_pernafasan" = '0_18', "sew_kondisi_pernafasan" = '0_1', "sew_alat_bantu" = '0_1', "sew_saturasi" = '', "sew_nadi" = '0_25', "sew_warna_kulit" = '0_1', "sew_tds" = '0_3', "sew_kesadaran" = '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03', "penunjang_rad" = '2025-05-05', "hasil_lab" = '-', "hsail_rad" = '-', "penunjang_lainnya" = 'CT Brain NK 22/03/25', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '403', "id_verifikasi_dokter_dpjp" = '44', "waktu_ttd_perawat" = '2025-05-31 13:12:00', "ttd_perawat" = '1', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-06-01 11:00:00', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-05-31 13:21:18'
WHERE "id" = '7183'
ERROR - 2025-05-31 13:21:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-03&quot;
LINE 1: ...= '0_3', &quot;sew_total&quot; = 'Hijau', &quot;penunjang_lab&quot; = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:21:32 --> Query error: ERROR:  date/time field value out of range: "25-05-03"
LINE 1: ...= '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_kajian_keperawatan_anak" SET "id_layanan_pendaftaran" = '757606', "waktu_pengkajian_anak" = '2025-05-31 13:10', "cara_tiba_diruangan_anak" = 'Jalan', "informasi_dari_anak" = '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', "keluhan_utama_anak" = 'Cemas', "timbul_keluhan_anak" = '1 hari smrs', "lama_keluhan_anak" = '1 hari smrs', "faktor_pencetus_anak" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan_anak" = 'Akut', "riwayat_penyakit_sekarang_anak" = 'Cemas Akan di lakukan operasi', "riwayat_penyakit_terdahulu" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "riwayat_penyakit_keluarga" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "pernah_dirawat_anak" = '{"dirawat":"1","kapan":"24\/5\/25","dimana":"RSUD Kota Tangerang"}', "obat_dari_luar_anak" = '0', "alergi_anak" = '0', "alergi_obat_anak" = 'Tidak Ada', "alergi_obat_reaksi_anak" = '-', "alergi_makanan_anak" = 'Tidak Ada', "alergi_makanan_reaksi_anak" = '-', "usia_kehamilan" = '39', "berat_badan_lahir" = '3300', "panjang_badan_lahir" = '45', "riwayat_kelahiran_anak" = 'Spontan', "menangis" = '1', "riwayat_kuning" = '0', "riwayat_imunisasi" = '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', "stts_fungsional_mandiri" = '1', "stts_fungsional_ketergantungan" = '0', "stts_fungsional_ket_ketergantungan" = '', "stts_fungsional_perlu_bantuan" = '0', "stts_fungsional_ket_perlu_bantuan" = '', "asi_anak" = '24', "susu_formula" = '23', "tengkurap" = '9', "tumbuh_gigi" = '9', "rtk_bicara" = '10', "rtk_duduk" = '8', "rtk_berdiri" = '9', "rtk_berjalan" = '12', "status_psikologi_anak" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "hubungan_dengan_orang_tua" = '1', "tempat_tinggal_anak" = 'Rumah', "ket_tempat_tinggal_anak" = '', "pekerjaan_ayah" = 'Wiraswasta', "pekerjaan_ibu" = 'IRT', "cara_bayar" = 'BPJS', "cara_bayar_anak_t" = '', "ket_asuransi_cara_bayar" = '', "ket_cara_bayar_lain" = '', "agama_anak" = 'Islam', "ket_agama_lain_anak" = '', "kegiatan_agama_dilakukan" = 'Berdo`a', "kegiatan_spiritual_dilakukan" = '', "wajib_ibadah_anak" = 'Belum Baligh', "ket_wajib_ibadah_halangan_anak" = '', "thaharoh_anak" = 'Berwudhu', "sholat_anak" = 'Berdiri', "kewarganegaraan_anak" = 'WNI', "suku_bangsa" = 'Sunda', "bicara_anak" = '1', "ket_bicara_anak" = '', "perlu_penterjemah" = '0', "ket_penterjemah" = '', "bahasa_isyarat" = '0', "hanbatan_belajar_w" = '0', "h_menerima_edikasi_w" = '', "pendidikan_anak" = '', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '1', "pemahaman_nutrisi_diet" = '1', "pemahaman_spiritual" = '1', "pemahaman_peralatan_medis" = '1', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '0', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', "tensi_sistolik_awal" = '', "tensi_diastolik_awal" = '', "nadi_awal" = '92', "suhu_awal" = '36.2', "nafas_awal_anak" = '20', "berat_badan_awal" = '30', "lingkar_kepala_anak" = '', "tinggi_badan_anak" = '', "lingkar_dada_anak" = '', "lingkar_perut_anak" = '', "gangguan_neurologis" = '0', "ket_gangguan_neurologis" = '', "irama_nafas" = 'Reguler', "retraksi_dada" = '0', "bentuk_dada" = '1', "ket_bentuk_dada" = '', "pola_nafas" = '1', "ket_pola_nafas" = '', "suara_nafas" = '1', "ket_suara_nafas" = '', "nafas_cuping_hidung" = '0', "sianosis_nafas" = '0', "alat_bantu_nafas" = 'Spontan', "ket_kanul" = '', "alat_bantu_nafas_anak_t" = '', "ket_ventilator" = '', "sirkulasi_sianosis" = '0', "sirkulasi_pucat" = '0', "intensitas_nadi" = '{"Kuat":"Kuat","Lemah":"","Bounding":""}', "irama_nadi" = 'Reguler', "sirkulasi_edema" = '0', "sirkulasi_crt" = 'Kurang dari 3', "sirkulasi_akral" = 'Hangat', "sirkulasi_clubing_finger" = '1', "gastro_mulut" = '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', "gastro_muntah" = '0', "ket_gastro_muntah" = '', "gastro_peristaltik" = '', "gastro_mual" = '0', "gastro_ascites" = '0', "gastro_nyeri_ulu_hati" = '0', "bab_pengeluaran" = '{"anus":"Anus","stomata":"","lainnya":""}', "bab_frekuensi" = '', "konsistensi_anak" = '', "normal_anak" = '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', "bab_konsistensi" = '', "bak_pengeluaran" = '{"spontan":"1","kateter_urine":"","cystostomy":""}', "bak_kelainan" = '0', "bak_ket_kelainan" = '', "integumen_warna_kulit" = '{"pucat":"","kuning":"","normal":"1","mootled":""}', "integumen_kelainan" = '0', "integumen_resiko_dubitus" = '0', "integumen_luka" = '0', "kelainan_tulang" = '0', "ket_kelainan_tulang" = '', "gerakan_anak" = 'Bebas', "gentalia_anak" = '1', "ket_gentalia_anak" = '', "nilai_tingkat_nyeri" = '', "nyeri_hilang" = '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "lokasi_nyeri" = '', "durasi_nyeri" = '', "frekuensi_nyeri" = '', "sn_wajah_1" = NULL, "sn_wajah_2" = NULL, "sn_wajah_3" = NULL, "sn_kaki_1" = NULL, "sn_kaki_2" = NULL, "sn_kaki_3" = NULL, "sn_aktivitas_1" = NULL, "sn_aktivitas_2" = NULL, "sn_aktivitas_3" = NULL, "sn_menangis_1" = NULL, "sn_menangis_2" = NULL, "sn_menangis_3" = NULL, "sn_bicara_1" = NULL, "sn_bicara_2" = NULL, "sn_bicara_3" = NULL, "sn_nilai_total" = '0', "prja_umur_1" = NULL, "prja_umur_2" = NULL, "prja_umur_3" = '2', "prja_umur_4" = NULL, "prja_jk_1" = '2', "prja_jk_2" = NULL, "prja_diagnosis_1" = NULL, "prja_diagnosis_2" = NULL, "prja_diagnosis_3" = NULL, "prja_diagnosis_4" = '1', "prja_kognitif_1" = NULL, "prja_kognitif_2" = NULL, "prja_kognitif_3" = '1', "prja_lingkungan_1" = NULL, "prja_lingkungan_2" = NULL, "prja_lingkungan_3" = NULL, "prja_lingkungan_4" = '1', "prja_respon_1" = NULL, "prja_respon_2" = '2', "prja_respon_3" = NULL, "prja_obat_1" = NULL, "prja_obat_2" = NULL, "prja_obat_3" = '1', "prja_nilai_total" = '10', "sg_nilai_1" = '0', "sg_nilai_2" = '0', "sg_nilai_3" = '0', "sg_nilai_4" = '0', "sg_nilai_total" = '0', "daftar_penyakit_malnutrisi" = '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', "skrining_pasien_akhir_kehidupan" = '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "sew_suhu" = '0_3', "sew_pernafasan" = '0_18', "sew_kondisi_pernafasan" = '0_1', "sew_alat_bantu" = '0_1', "sew_saturasi" = '', "sew_nadi" = '0_25', "sew_warna_kulit" = '0_1', "sew_tds" = '0_3', "sew_kesadaran" = '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03', "penunjang_rad" = '2025-05-05', "hasil_lab" = '-', "hsail_rad" = '-', "penunjang_lainnya" = 'CT Brain NK 22/03/25', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '403', "id_verifikasi_dokter_dpjp" = '44', "waktu_ttd_perawat" = '2025-05-31 13:12:00', "ttd_perawat" = '1', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-06-01 11:00:00', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-05-31 13:21:32'
WHERE "id" = '7183'
ERROR - 2025-05-31 13:21:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-03&quot;
LINE 1: ...= '0_3', &quot;sew_total&quot; = 'Hijau', &quot;penunjang_lab&quot; = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:21:40 --> Query error: ERROR:  date/time field value out of range: "25-05-03"
LINE 1: ...= '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_kajian_keperawatan_anak" SET "id_layanan_pendaftaran" = '757606', "waktu_pengkajian_anak" = '2025-05-31 13:10', "cara_tiba_diruangan_anak" = 'Jalan', "informasi_dari_anak" = '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', "keluhan_utama_anak" = 'Cemas', "timbul_keluhan_anak" = '1 hari smrs', "lama_keluhan_anak" = '1 hari smrs', "faktor_pencetus_anak" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan_anak" = 'Akut', "riwayat_penyakit_sekarang_anak" = 'Cemas Akan di lakukan operasi', "riwayat_penyakit_terdahulu" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "riwayat_penyakit_keluarga" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "pernah_dirawat_anak" = '{"dirawat":"1","kapan":"24\/5\/25","dimana":"RSUD Kota Tangerang"}', "obat_dari_luar_anak" = '0', "alergi_anak" = '0', "alergi_obat_anak" = 'Tidak Ada', "alergi_obat_reaksi_anak" = '-', "alergi_makanan_anak" = 'Tidak Ada', "alergi_makanan_reaksi_anak" = '-', "usia_kehamilan" = '39', "berat_badan_lahir" = '3300', "panjang_badan_lahir" = '45', "riwayat_kelahiran_anak" = 'Spontan', "menangis" = '1', "riwayat_kuning" = '0', "riwayat_imunisasi" = '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', "stts_fungsional_mandiri" = '1', "stts_fungsional_ketergantungan" = '0', "stts_fungsional_ket_ketergantungan" = '', "stts_fungsional_perlu_bantuan" = '0', "stts_fungsional_ket_perlu_bantuan" = '', "asi_anak" = '24', "susu_formula" = '23', "tengkurap" = '9', "tumbuh_gigi" = '9', "rtk_bicara" = '10', "rtk_duduk" = '8', "rtk_berdiri" = '9', "rtk_berjalan" = '12', "status_psikologi_anak" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "hubungan_dengan_orang_tua" = '1', "tempat_tinggal_anak" = 'Rumah', "ket_tempat_tinggal_anak" = '', "pekerjaan_ayah" = 'Wiraswasta', "pekerjaan_ibu" = 'IRT', "cara_bayar" = 'BPJS', "cara_bayar_anak_t" = '', "ket_asuransi_cara_bayar" = '', "ket_cara_bayar_lain" = '', "agama_anak" = 'Islam', "ket_agama_lain_anak" = '', "kegiatan_agama_dilakukan" = 'Berdo`a', "kegiatan_spiritual_dilakukan" = '', "wajib_ibadah_anak" = 'Belum Baligh', "ket_wajib_ibadah_halangan_anak" = '', "thaharoh_anak" = 'Berwudhu', "sholat_anak" = 'Berdiri', "kewarganegaraan_anak" = 'WNI', "suku_bangsa" = 'Sunda', "bicara_anak" = '1', "ket_bicara_anak" = '', "perlu_penterjemah" = '0', "ket_penterjemah" = '', "bahasa_isyarat" = '0', "hanbatan_belajar_w" = '0', "h_menerima_edikasi_w" = '', "pendidikan_anak" = '', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '1', "pemahaman_nutrisi_diet" = '1', "pemahaman_spiritual" = '1', "pemahaman_peralatan_medis" = '1', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '0', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', "tensi_sistolik_awal" = '', "tensi_diastolik_awal" = '', "nadi_awal" = '92', "suhu_awal" = '36.2', "nafas_awal_anak" = '20', "berat_badan_awal" = '30', "lingkar_kepala_anak" = '', "tinggi_badan_anak" = '', "lingkar_dada_anak" = '', "lingkar_perut_anak" = '', "gangguan_neurologis" = '0', "ket_gangguan_neurologis" = '', "irama_nafas" = 'Reguler', "retraksi_dada" = '0', "bentuk_dada" = '1', "ket_bentuk_dada" = '', "pola_nafas" = '1', "ket_pola_nafas" = '', "suara_nafas" = '1', "ket_suara_nafas" = '', "nafas_cuping_hidung" = '0', "sianosis_nafas" = '0', "alat_bantu_nafas" = 'Spontan', "ket_kanul" = '', "alat_bantu_nafas_anak_t" = '', "ket_ventilator" = '', "sirkulasi_sianosis" = '0', "sirkulasi_pucat" = '0', "intensitas_nadi" = '{"Kuat":"Kuat","Lemah":"","Bounding":""}', "irama_nadi" = 'Reguler', "sirkulasi_edema" = '0', "sirkulasi_crt" = 'Kurang dari 3', "sirkulasi_akral" = 'Hangat', "sirkulasi_clubing_finger" = '1', "gastro_mulut" = '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', "gastro_muntah" = '0', "ket_gastro_muntah" = '', "gastro_peristaltik" = '', "gastro_mual" = '0', "gastro_ascites" = '0', "gastro_nyeri_ulu_hati" = '0', "bab_pengeluaran" = '{"anus":"Anus","stomata":"","lainnya":""}', "bab_frekuensi" = '', "konsistensi_anak" = '', "normal_anak" = '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', "bab_konsistensi" = '', "bak_pengeluaran" = '{"spontan":"1","kateter_urine":"","cystostomy":""}', "bak_kelainan" = '0', "bak_ket_kelainan" = '', "integumen_warna_kulit" = '{"pucat":"","kuning":"","normal":"1","mootled":""}', "integumen_kelainan" = '0', "integumen_resiko_dubitus" = '0', "integumen_luka" = '0', "kelainan_tulang" = '0', "ket_kelainan_tulang" = '', "gerakan_anak" = 'Bebas', "gentalia_anak" = '1', "ket_gentalia_anak" = '', "nilai_tingkat_nyeri" = '', "nyeri_hilang" = '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "lokasi_nyeri" = '', "durasi_nyeri" = '', "frekuensi_nyeri" = '', "sn_wajah_1" = NULL, "sn_wajah_2" = NULL, "sn_wajah_3" = NULL, "sn_kaki_1" = NULL, "sn_kaki_2" = NULL, "sn_kaki_3" = NULL, "sn_aktivitas_1" = NULL, "sn_aktivitas_2" = NULL, "sn_aktivitas_3" = NULL, "sn_menangis_1" = NULL, "sn_menangis_2" = NULL, "sn_menangis_3" = NULL, "sn_bicara_1" = NULL, "sn_bicara_2" = NULL, "sn_bicara_3" = NULL, "sn_nilai_total" = '0', "prja_umur_1" = NULL, "prja_umur_2" = NULL, "prja_umur_3" = '2', "prja_umur_4" = NULL, "prja_jk_1" = '2', "prja_jk_2" = NULL, "prja_diagnosis_1" = NULL, "prja_diagnosis_2" = NULL, "prja_diagnosis_3" = NULL, "prja_diagnosis_4" = '1', "prja_kognitif_1" = NULL, "prja_kognitif_2" = NULL, "prja_kognitif_3" = '1', "prja_lingkungan_1" = NULL, "prja_lingkungan_2" = NULL, "prja_lingkungan_3" = NULL, "prja_lingkungan_4" = '1', "prja_respon_1" = NULL, "prja_respon_2" = '2', "prja_respon_3" = NULL, "prja_obat_1" = NULL, "prja_obat_2" = NULL, "prja_obat_3" = '1', "prja_nilai_total" = '10', "sg_nilai_1" = '0', "sg_nilai_2" = '0', "sg_nilai_3" = '0', "sg_nilai_4" = '0', "sg_nilai_total" = '0', "daftar_penyakit_malnutrisi" = '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', "skrining_pasien_akhir_kehidupan" = '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "sew_suhu" = '0_3', "sew_pernafasan" = '0_18', "sew_kondisi_pernafasan" = '0_1', "sew_alat_bantu" = '0_1', "sew_saturasi" = '', "sew_nadi" = '0_25', "sew_warna_kulit" = '0_1', "sew_tds" = '0_3', "sew_kesadaran" = '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03', "penunjang_rad" = '2025-05-05', "hasil_lab" = '-', "hsail_rad" = '-', "penunjang_lainnya" = 'CT Brain NK 22/03/25', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '403', "id_verifikasi_dokter_dpjp" = '44', "waktu_ttd_perawat" = '2025-05-31 13:12:00', "ttd_perawat" = '1', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-06-01 11:00:00', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-05-31 13:21:40'
WHERE "id" = '7183'
ERROR - 2025-05-31 13:21:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:21:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:21:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:21:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:21:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:22:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-05-03&quot;
LINE 1: ...= '0_3', &quot;sew_total&quot; = 'Hijau', &quot;penunjang_lab&quot; = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:22:11 --> Query error: ERROR:  date/time field value out of range: "25-05-03"
LINE 1: ...= '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_kajian_keperawatan_anak" SET "id_layanan_pendaftaran" = '757606', "waktu_pengkajian_anak" = '2025-05-31 13:10', "cara_tiba_diruangan_anak" = 'Jalan', "informasi_dari_anak" = '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', "keluhan_utama_anak" = 'Cemas', "timbul_keluhan_anak" = '1 hari smrs', "lama_keluhan_anak" = '1 hari smrs', "faktor_pencetus_anak" = '{"infeksi":"","lain":"","ket_lain":""}', "sifat_keluhan_anak" = 'Akut', "riwayat_penyakit_sekarang_anak" = 'Cemas Akan di lakukan operasi', "riwayat_penyakit_terdahulu" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "riwayat_penyakit_keluarga" = '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"-"}', "pernah_dirawat_anak" = '{"dirawat":"1","kapan":"24\/5\/25","dimana":"RSUD Kota Tangerang"}', "obat_dari_luar_anak" = '0', "alergi_anak" = '0', "alergi_obat_anak" = 'Tidak Ada', "alergi_obat_reaksi_anak" = '-', "alergi_makanan_anak" = 'Tidak Ada', "alergi_makanan_reaksi_anak" = '-', "usia_kehamilan" = '39', "berat_badan_lahir" = '3300', "panjang_badan_lahir" = '45', "riwayat_kelahiran_anak" = 'Spontan', "menangis" = '1', "riwayat_kuning" = '0', "riwayat_imunisasi" = '{"lengkap":"1","tidak_pernah":"","tidak_lengkap":"","imunisasi_lain":""}', "stts_fungsional_mandiri" = '1', "stts_fungsional_ketergantungan" = '0', "stts_fungsional_ket_ketergantungan" = '', "stts_fungsional_perlu_bantuan" = '0', "stts_fungsional_ket_perlu_bantuan" = '', "asi_anak" = '24', "susu_formula" = '23', "tengkurap" = '9', "tumbuh_gigi" = '9', "rtk_bicara" = '10', "rtk_duduk" = '8', "rtk_berdiri" = '9', "rtk_berjalan" = '12', "status_psikologi_anak" = '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', "hubungan_dengan_orang_tua" = '1', "tempat_tinggal_anak" = 'Rumah', "ket_tempat_tinggal_anak" = '', "pekerjaan_ayah" = 'Wiraswasta', "pekerjaan_ibu" = 'IRT', "cara_bayar" = 'BPJS', "cara_bayar_anak_t" = '', "ket_asuransi_cara_bayar" = '', "ket_cara_bayar_lain" = '', "agama_anak" = 'Islam', "ket_agama_lain_anak" = '', "kegiatan_agama_dilakukan" = 'Berdo`a', "kegiatan_spiritual_dilakukan" = '', "wajib_ibadah_anak" = 'Belum Baligh', "ket_wajib_ibadah_halangan_anak" = '', "thaharoh_anak" = 'Berwudhu', "sholat_anak" = 'Berdiri', "kewarganegaraan_anak" = 'WNI', "suku_bangsa" = 'Sunda', "bicara_anak" = '1', "ket_bicara_anak" = '', "perlu_penterjemah" = '0', "ket_penterjemah" = '', "bahasa_isyarat" = '0', "hanbatan_belajar_w" = '0', "h_menerima_edikasi_w" = '', "pendidikan_anak" = '', "pemahaman_penyakit" = '1', "pemahaman_pengobatan" = '1', "pemahaman_nutrisi_diet" = '1', "pemahaman_spiritual" = '1', "pemahaman_peralatan_medis" = '1', "pemahaman_rehab_medik" = '0', "pemahaman_manajemen_nyeri" = '0', "kesadaran" = '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', "tensi_sistolik_awal" = '', "tensi_diastolik_awal" = '', "nadi_awal" = '92', "suhu_awal" = '36.2', "nafas_awal_anak" = '20', "berat_badan_awal" = '30', "lingkar_kepala_anak" = '', "tinggi_badan_anak" = '', "lingkar_dada_anak" = '', "lingkar_perut_anak" = '', "gangguan_neurologis" = '0', "ket_gangguan_neurologis" = '', "irama_nafas" = 'Reguler', "retraksi_dada" = '0', "bentuk_dada" = '1', "ket_bentuk_dada" = '', "pola_nafas" = '1', "ket_pola_nafas" = '', "suara_nafas" = '1', "ket_suara_nafas" = '', "nafas_cuping_hidung" = '0', "sianosis_nafas" = '0', "alat_bantu_nafas" = 'Spontan', "ket_kanul" = '', "alat_bantu_nafas_anak_t" = '', "ket_ventilator" = '', "sirkulasi_sianosis" = '0', "sirkulasi_pucat" = '0', "intensitas_nadi" = '{"Kuat":"Kuat","Lemah":"","Bounding":""}', "irama_nadi" = 'Reguler', "sirkulasi_edema" = '0', "sirkulasi_crt" = 'Kurang dari 3', "sirkulasi_akral" = 'Hangat', "sirkulasi_clubing_finger" = '1', "gastro_mulut" = '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', "gastro_muntah" = '0', "ket_gastro_muntah" = '', "gastro_peristaltik" = '', "gastro_mual" = '0', "gastro_ascites" = '0', "gastro_nyeri_ulu_hati" = '0', "bab_pengeluaran" = '{"anus":"Anus","stomata":"","lainnya":""}', "bab_frekuensi" = '', "konsistensi_anak" = '', "normal_anak" = '{"normal_anak_1":"1","normal_anak_2":null,"normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', "bab_konsistensi" = '', "bak_pengeluaran" = '{"spontan":"1","kateter_urine":"","cystostomy":""}', "bak_kelainan" = '0', "bak_ket_kelainan" = '', "integumen_warna_kulit" = '{"pucat":"","kuning":"","normal":"1","mootled":""}', "integumen_kelainan" = '0', "integumen_resiko_dubitus" = '0', "integumen_luka" = '0', "kelainan_tulang" = '0', "ket_kelainan_tulang" = '', "gerakan_anak" = 'Bebas', "gentalia_anak" = '1', "ket_gentalia_anak" = '', "nilai_tingkat_nyeri" = '', "nyeri_hilang" = '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "lokasi_nyeri" = '', "durasi_nyeri" = '', "frekuensi_nyeri" = '', "sn_wajah_1" = NULL, "sn_wajah_2" = NULL, "sn_wajah_3" = NULL, "sn_kaki_1" = NULL, "sn_kaki_2" = NULL, "sn_kaki_3" = NULL, "sn_aktivitas_1" = NULL, "sn_aktivitas_2" = NULL, "sn_aktivitas_3" = NULL, "sn_menangis_1" = NULL, "sn_menangis_2" = NULL, "sn_menangis_3" = NULL, "sn_bicara_1" = NULL, "sn_bicara_2" = NULL, "sn_bicara_3" = NULL, "sn_nilai_total" = '0', "prja_umur_1" = NULL, "prja_umur_2" = NULL, "prja_umur_3" = '2', "prja_umur_4" = NULL, "prja_jk_1" = '2', "prja_jk_2" = NULL, "prja_diagnosis_1" = NULL, "prja_diagnosis_2" = NULL, "prja_diagnosis_3" = NULL, "prja_diagnosis_4" = '1', "prja_kognitif_1" = NULL, "prja_kognitif_2" = NULL, "prja_kognitif_3" = '1', "prja_lingkungan_1" = NULL, "prja_lingkungan_2" = NULL, "prja_lingkungan_3" = NULL, "prja_lingkungan_4" = '1', "prja_respon_1" = NULL, "prja_respon_2" = '2', "prja_respon_3" = NULL, "prja_obat_1" = NULL, "prja_obat_2" = NULL, "prja_obat_3" = '1', "prja_nilai_total" = '10', "sg_nilai_1" = '0', "sg_nilai_2" = '0', "sg_nilai_3" = '0', "sg_nilai_4" = '0', "sg_nilai_total" = '0', "daftar_penyakit_malnutrisi" = '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', "skrining_pasien_akhir_kehidupan" = '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', "pk_penyakit_menular" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_penurunan_daya_tahan" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', "pk_pasien_kekerasan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "sew_suhu" = '0_3', "sew_pernafasan" = '0_18', "sew_kondisi_pernafasan" = '0_1', "sew_alat_bantu" = '0_1', "sew_saturasi" = '', "sew_nadi" = '0_25', "sew_warna_kulit" = '0_1', "sew_tds" = '0_3', "sew_kesadaran" = '0_3', "sew_total" = 'Hijau', "penunjang_lab" = '25-05-03', "penunjang_rad" = '2025-05-05', "hasil_lab" = '-', "hsail_rad" = '-', "penunjang_lainnya" = 'CT Brain NK 22/03/25', "masalah_keperawatan" = '{"ket_1":"","ket_2":"","ket_3":"1","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', "perencanaan_pulang" = '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', "id_perawat" = '403', "id_verifikasi_dokter_dpjp" = '44', "waktu_ttd_perawat" = '2025-05-31 13:12:00', "ttd_perawat" = '1', "waktu_ttd_verifikasi_dokter_dpjp" = '2025-06-01 11:00:00', "ttd_verifikasi_dokter_dpjp" = '1', "updated_date" = '2025-05-31 13:22:11'
WHERE "id" = '7183'
ERROR - 2025-05-31 13:22:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:22:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:23:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:23:14 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('698853', '756916', '0001438875988', '0223R0380525V014201', '00376123', 'DAREEL FARAND ALVARO', '2014-08-14', 1, '2025-05-31 07:08:46', '2025-05-31 08:56:29', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A16.0', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-05-31 13:23:14', 'normal', 'set_claim_data', 'Z09.8#A16.0', '89.05')
ERROR - 2025-05-31 13:23:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(10) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:23:23 --> Query error: ERROR:  value too long for type character varying(10) - Invalid query: INSERT INTO "sm_resume_keperawatan" ("id_layanan_pendaftaran", "waktu", "ruang_resume_keperawatan", "ek_diagnosa_masuk", "ek_diagnosa_keluar", "ek_tensi_sis", "ek_tensi_dis", "ek_suhu", "ek_nadi", "ek_pernafasan", "diet_khusus", "batasan_cairan", "diet_oral", "diet_ngt", "bab", "bak", "bak_kateter", "luka", "luka_operasi_cairan", "mobilisasi", "alat_bantu", "alat_bantu_lain", "edukasi", "diagnosa_perawat", "diagnosa_perawat_satu", "anjuran_perawat", "anjuran_perawat_satu", "anjuran_perawat_dua", "anjuran_perawat_tiga", "kontraksi", "fundus", "vulva", "perineum", "lochaea", "warna", "bau_lochaea", "hasil_lab", "ekg", "rontgen", "mri", "ct_scan", "usg", "surat_kontrol", "resume", "hasil_satu", "surat_asuransi", "hasil_dua", "summary", "hasil_tiga", "suket_lahir", "hasil_empat", "bayi_diserahkan", "hasil_lima", "lain_lain", "id_perawat_medis", "id_verifikasi_dokter", "id_users", "ek_tanggal_ttd_perawat", "ek_ttd_perawat", "ek_tanggal_verifikasi_dokter", "ek_ttd_verifikasi_dokter", "ek_tanggal_verifikasi_penerima", "penerima", "ek_ttd_pasien", "created_date") VALUES ('755772', '2025-05-31 13:23:23', NULL, NULL, NULL, NULL, NULL, '36.8', NULL, '20', '{"diet_khusus":"","sm_diet_khusus":""}', '{"batasan_cairan":"","sm_batasan_cairan":""}', '1', NULL, 'Normal', 'Normal', NULL, NULL, NULL, 'Dibantu Sebagian', 'Kursi Roda', NULL, '{"edukasi_penyakit":"1","edukasi_perawatan":"","edukasi_dirumah":"","edukasi_ibubayi":"","edukasi_nyeri":"","edukasi_lingkungan":"","edukasi_kb":"","edukasi_rehabilitas":"","edukasi_lain":"","edukasi_lain_input":""}', 'Nausea ', NULL, 'Minum obat teratur', 'Kontrol tepat waktu', 'Istirahat yang cukup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9', NULL, '1', NULL, NULL, 'USG Abdomen Atas Dan Bawah USG Muskuloskeletal 1 Sisi', '1', '0', NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, '158', '657', 'YUANNITA NURAIDA', '2025-05-31 13:07', '1', '2025-05-31 13:07', '1', '2025-05-31 13:07', NULL, '1', '2025-05-31 13:23:23')
ERROR - 2025-05-31 13:23:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:23:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:23:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:23:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(10) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:23:46 --> Query error: ERROR:  value too long for type character varying(10) - Invalid query: INSERT INTO "sm_resume_keperawatan" ("id_layanan_pendaftaran", "waktu", "ruang_resume_keperawatan", "ek_diagnosa_masuk", "ek_diagnosa_keluar", "ek_tensi_sis", "ek_tensi_dis", "ek_suhu", "ek_nadi", "ek_pernafasan", "diet_khusus", "batasan_cairan", "diet_oral", "diet_ngt", "bab", "bak", "bak_kateter", "luka", "luka_operasi_cairan", "mobilisasi", "alat_bantu", "alat_bantu_lain", "edukasi", "diagnosa_perawat", "diagnosa_perawat_satu", "anjuran_perawat", "anjuran_perawat_satu", "anjuran_perawat_dua", "anjuran_perawat_tiga", "kontraksi", "fundus", "vulva", "perineum", "lochaea", "warna", "bau_lochaea", "hasil_lab", "ekg", "rontgen", "mri", "ct_scan", "usg", "surat_kontrol", "resume", "hasil_satu", "surat_asuransi", "hasil_dua", "summary", "hasil_tiga", "suket_lahir", "hasil_empat", "bayi_diserahkan", "hasil_lima", "lain_lain", "id_perawat_medis", "id_verifikasi_dokter", "id_users", "ek_tanggal_ttd_perawat", "ek_ttd_perawat", "ek_tanggal_verifikasi_dokter", "ek_ttd_verifikasi_dokter", "ek_tanggal_verifikasi_penerima", "penerima", "ek_ttd_pasien", "created_date") VALUES ('755772', '2025-05-31 13:23:46', NULL, NULL, NULL, '123', '76', '36.8', '85', '20', '{"diet_khusus":"","sm_diet_khusus":""}', '{"batasan_cairan":"","sm_batasan_cairan":""}', '1', NULL, 'Normal', 'Normal', NULL, NULL, NULL, 'Dibantu Sebagian', 'Kursi Roda', NULL, '{"edukasi_penyakit":"1","edukasi_perawatan":"","edukasi_dirumah":"","edukasi_ibubayi":"","edukasi_nyeri":"","edukasi_lingkungan":"","edukasi_kb":"","edukasi_rehabilitas":"","edukasi_lain":"","edukasi_lain_input":""}', 'Nausea ', NULL, 'Minum obat teratur', 'Kontrol tepat waktu', 'Istirahat yang cukup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9', NULL, '1', NULL, NULL, 'USG Abdomen Atas Dan Bawah USG Muskuloskeletal 1 Sisi', '1', '0', NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, '158', '657', 'YUANNITA NURAIDA', '2025-05-31 13:07', '1', '2025-05-31 13:07', '1', '2025-05-31 13:07', NULL, '1', '2025-05-31 13:23:46')
ERROR - 2025-05-31 13:24:04 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:24:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(10) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:24:08 --> Query error: ERROR:  value too long for type character varying(10) - Invalid query: INSERT INTO "sm_resume_keperawatan" ("id_layanan_pendaftaran", "waktu", "ruang_resume_keperawatan", "ek_diagnosa_masuk", "ek_diagnosa_keluar", "ek_tensi_sis", "ek_tensi_dis", "ek_suhu", "ek_nadi", "ek_pernafasan", "diet_khusus", "batasan_cairan", "diet_oral", "diet_ngt", "bab", "bak", "bak_kateter", "luka", "luka_operasi_cairan", "mobilisasi", "alat_bantu", "alat_bantu_lain", "edukasi", "diagnosa_perawat", "diagnosa_perawat_satu", "anjuran_perawat", "anjuran_perawat_satu", "anjuran_perawat_dua", "anjuran_perawat_tiga", "kontraksi", "fundus", "vulva", "perineum", "lochaea", "warna", "bau_lochaea", "hasil_lab", "ekg", "rontgen", "mri", "ct_scan", "usg", "surat_kontrol", "resume", "hasil_satu", "surat_asuransi", "hasil_dua", "summary", "hasil_tiga", "suket_lahir", "hasil_empat", "bayi_diserahkan", "hasil_lima", "lain_lain", "id_perawat_medis", "id_verifikasi_dokter", "id_users", "ek_tanggal_ttd_perawat", "ek_ttd_perawat", "ek_tanggal_verifikasi_dokter", "ek_ttd_verifikasi_dokter", "ek_tanggal_verifikasi_penerima", "penerima", "ek_ttd_pasien", "created_date") VALUES ('755772', '2025-05-31 13:24:08', NULL, NULL, NULL, '123', '76', '36.8', '85', '20', '{"diet_khusus":"","sm_diet_khusus":""}', '{"batasan_cairan":"","sm_batasan_cairan":""}', '1', NULL, 'Normal', 'Normal', NULL, NULL, NULL, 'Dibantu Sebagian', 'Kursi Roda', NULL, '{"edukasi_penyakit":"1","edukasi_perawatan":"","edukasi_dirumah":"","edukasi_ibubayi":"","edukasi_nyeri":"","edukasi_lingkungan":"","edukasi_kb":"","edukasi_rehabilitas":"","edukasi_lain":"","edukasi_lain_input":""}', 'Nausea ', NULL, 'Minum obat teratur', 'Kontrol tepat waktu', 'Istirahat yang cukup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9', NULL, '1', NULL, NULL, 'USG Abdomen Atas Dan Bawah USG Muskuloskeletal 1 Sisi', '1', '0', NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, '158', '657', 'YUANNITA NURAIDA', '2025-05-31 13:07', '1', '2025-05-31 13:07', '1', '2025-05-31 13:07', NULL, '1', '2025-05-31 13:24:08')
ERROR - 2025-05-31 13:24:12 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:24:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 13:24:24 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:24:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:25:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:25:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:25:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:25:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:25:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:25:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:26:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:26:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:26:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:27:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:27:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:27:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:27:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:28:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:28:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:28:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:28:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:28:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:28:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:28:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 13:30:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:30:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:31:08 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 13:31:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:31:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:32:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:32:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:32:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:32:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:33:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:33:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:33:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:33:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:33:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:33:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:33:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:33:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:33:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:33:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:33:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:33:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:34:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:36:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:36:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:36:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:36:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:36:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:36:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:37:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:38:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:38:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:38:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:38:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:38:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:38:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:40:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:40:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:40:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:40:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:40:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:40:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:40:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858382, '17', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:40:54 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (858382, '17', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858382, '17', '', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 13:42:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:42:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:42:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:42:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:42:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:42:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:43:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:44:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:44:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:44:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:44:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:44:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:45:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:45:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:45:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:45:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:45:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:45:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:46:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:46:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:46:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:46:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:46:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:47:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:47:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:47:52 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:48:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:48:04 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-05-31 13:48:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:48:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:48:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:49:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:49:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:50:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:50:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:50:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:51:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:52:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:52:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:52:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:52:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:53:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:53:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:53:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:53:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:53:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:53:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:54:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:54:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:54:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:54:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:54:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:54:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:55:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:55:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:55:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6616972) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:55:07 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6616972) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '858248'
ERROR - 2025-05-31 13:55:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(10) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:55:47 --> Query error: ERROR:  value too long for type character varying(10) - Invalid query: INSERT INTO "sm_resume_keperawatan" ("id_layanan_pendaftaran", "waktu", "ruang_resume_keperawatan", "ek_diagnosa_masuk", "ek_diagnosa_keluar", "ek_tensi_sis", "ek_tensi_dis", "ek_suhu", "ek_nadi", "ek_pernafasan", "diet_khusus", "batasan_cairan", "diet_oral", "diet_ngt", "bab", "bak", "bak_kateter", "luka", "luka_operasi_cairan", "mobilisasi", "alat_bantu", "alat_bantu_lain", "edukasi", "diagnosa_perawat", "diagnosa_perawat_satu", "anjuran_perawat", "anjuran_perawat_satu", "anjuran_perawat_dua", "anjuran_perawat_tiga", "kontraksi", "fundus", "vulva", "perineum", "lochaea", "warna", "bau_lochaea", "hasil_lab", "ekg", "rontgen", "mri", "ct_scan", "usg", "surat_kontrol", "resume", "hasil_satu", "surat_asuransi", "hasil_dua", "summary", "hasil_tiga", "suket_lahir", "hasil_empat", "bayi_diserahkan", "hasil_lima", "lain_lain", "id_perawat_medis", "id_verifikasi_dokter", "id_users", "ek_tanggal_ttd_perawat", "ek_ttd_perawat", "ek_tanggal_verifikasi_dokter", "ek_ttd_verifikasi_dokter", "ek_tanggal_verifikasi_penerima", "penerima", "ek_ttd_pasien", "created_date") VALUES ('755772', '2025-05-31 13:55:47', NULL, NULL, NULL, '104', '68', '36.9', '98', '20', '{"diet_khusus":"","sm_diet_khusus":""}', '{"batasan_cairan":"","sm_batasan_cairan":""}', '1', NULL, 'Normal', 'Normal', NULL, NULL, NULL, 'Dibantu Sebagian', 'Kursi Roda', NULL, '{"edukasi_penyakit":"1","edukasi_perawatan":"","edukasi_dirumah":"","edukasi_ibubayi":"","edukasi_nyeri":"","edukasi_lingkungan":"","edukasi_kb":"","edukasi_rehabilitas":"","edukasi_lain":"","edukasi_lain_input":""}', 'Nausea ', 'intoleransi aktivitas ', 'Istirahat yang cukup ', 'makan makanan yang bergizi', 'Kontrol Poli sesuai jadwal ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9', NULL, '1', NULL, NULL, 'USG Abdomen Atas Dan Bawah USG Muskuloskeletal 1 Sisi', '1', '0', NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, 'R/ MRCP via poli', '158', '657', 'YUANNITA NURAIDA', '2025-05-31 13:57', '1', '2025-05-31 13:57', '1', '2025-05-31 13:57', NULL, '1', '2025-05-31 13:55:47')
ERROR - 2025-05-31 13:56:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:56:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:56:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:56:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:56:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:56:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:56:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:56:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:56:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:56:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6616972) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:56:53 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6616972) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '858248'
ERROR - 2025-05-31 13:57:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:57:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:57:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:57:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 13:58:57 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 13:59:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 13:59:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 13:59:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 13:59:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 13:59:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 13:59:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 13:59:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:01:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:02:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:02:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:02:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:02:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:02:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:02:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:02:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:02:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:02:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:02:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:02:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:02:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:03:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:03:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:03:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:03:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:03:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:04:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:04:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:04:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:04:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:04:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:04:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:04:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:04:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:04:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:04:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:04:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:04:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:04:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:04:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:05:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:05:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:05:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:05:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:05:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:05:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:05:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6616972) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:05:08 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6616972) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '858248'
ERROR - 2025-05-31 14:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:05:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:05:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:05:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:05:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:05:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:05:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:05:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:05:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:06:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:06:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:06:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:06:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:06:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858394, '4', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:06:20 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858394, '4', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858394, '4', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 14:06:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:06:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:06:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:07:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:07:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:07:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:08:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:08:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:08:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:08:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:08:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:08:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:08:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:08:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:08:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:08:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:08:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:08:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:08:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:09:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:09:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:09:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:09:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:09:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:09:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:10:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:10:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:10:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:10:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:12:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:13:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:13:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:13:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 07:14:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:14:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:14:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:14:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:14:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:14:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:15:29 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 14:15:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-31 14:15:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:15:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:15:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:15:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:15:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:15:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:15:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:15:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:15:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:15:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11727
ERROR - 2025-05-31 14:16:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:16:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:16:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:16:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:16:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:16:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:16:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:16:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:16:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:16:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:17:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:17:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:17:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:17:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:17:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:17:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:17:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:17:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:17:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:17:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:18:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:18:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:18:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:18:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:18:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:18:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:18:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:18:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:19:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:19:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:19:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:19:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:19:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:19:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:19:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:19:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:19:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:19:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:19:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:19:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:19:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:19:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:19:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:19:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:19:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:19:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:19:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:19:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:19:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:19:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:19:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:19:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:20:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:20:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:20:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:20:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:20:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:20:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:20:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:20:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:20:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 07:20:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:20:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:20:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:20:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:20:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:20:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:20:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:20:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:20:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:20:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:20:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:20:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:20:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:20:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:20:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:21:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:21:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:21:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:21:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:21:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:21:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:21:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:21:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 07:21:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:21:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:22:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:22:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:22:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:22:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:23:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:23:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:23:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:23:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:23:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:23:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:23:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:23:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:24:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:24:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:24:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:25:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:25:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:25:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:25:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:26:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:26:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:26:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:26:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:28:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:29:17 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:29:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:29:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:29:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 07:30:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 07:30:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 14:33:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:33:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:33:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:34:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:34:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:36:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:36:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:40:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:45:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:45:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:45:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:47:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:47:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:47:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:47:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:49:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:49:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:49:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:49:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:49:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:49:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:49:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:49:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:49:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:49:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:51:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:51:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:51:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:51:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:51:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:52:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:52:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:52:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:52:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:53:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:53:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:53:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:53:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:53:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:53:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:53:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:53:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:54:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:54:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:54:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:54:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:55:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:55:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:56:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:56:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:56:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:56:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:56:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:56:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:56:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:56:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:56:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 14:57:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:57:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:57:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:57:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:57:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:57:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:57:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:57:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:57:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:58:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:58:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:58:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:58:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:58:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:58:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:58:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:58:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:58:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:58:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:58:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:58:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:58:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:58:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:58:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:59:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:59:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:59:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:59:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:59:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:59:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:59:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:59:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:59:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:59:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:59:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:59:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 14:59:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:59:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:59:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 14:59:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 14:59:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 15:00:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:00:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:00:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 15:00:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:00:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:00:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:00:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:00:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:01:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:01:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:01:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:01:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:01:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(54264) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:01:32 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(54264) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '54264'
ERROR - 2025-05-31 15:01:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:01:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:01:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:01:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:01:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 15:01:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:01:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:01:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:01:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 15:02:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('857988', '8', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:02:59 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('857988', '8', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('857988', '8', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 15:03:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:03:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:03:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:03:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:04:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:04:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:05:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:05:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:05:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:05:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:05:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:05:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:05:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:05:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:05:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:05:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:05:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:06:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:06:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:06:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:06:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:06:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:06:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:06:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:06:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:06:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:06:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:06:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:06:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:07:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:07:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:07:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:07:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:08:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:08:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:08:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:08:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 08:08:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:08:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:08:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:08:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:08:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:08:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:08:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:08:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:09:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:09:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:09:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6306048, '60', 130.8, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:09:56 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6306048, '60', 130.8, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6306048, '60', 130.8, '1', '2.00', NULL, 'null')
ERROR - 2025-05-31 15:10:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:10:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:11:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:12:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:12:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:12:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:12:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:13:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:13:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6306085, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:13:06 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6306085, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6306085, '123', 2386.8, '1', '1.00', NULL, 'null')
ERROR - 2025-05-31 15:13:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:13:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:13:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:13:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:13:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:13:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:14:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 15:14:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:15:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:15:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:15:09 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-31 15:15:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:15:18 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-05-31 15:15:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:15:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:15:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-05-31 08:15:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:15:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:15:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:15:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:15:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 08:15:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:15:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:16:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:16:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:16:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:16:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 08:16:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:16:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:16:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:16:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:17:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 15:17:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:17:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:17:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:17:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:17:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:17:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:17:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:17:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:17:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:17:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:17:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:17:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:18:24 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-31 15:18:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:18:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:18:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:18:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:18:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 15:19:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:19:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:19:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:19:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:20:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:20:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:20:18 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-05-31 15:20:19 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-05-31 15:20:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:20:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:20:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:20:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:21:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:21:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:21:22 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-05-31 15:21:22 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-05-31 15:21:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:21:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:21:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:21:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:22:02 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-05-31 15:22:02 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-05-31 15:22:02 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-05-31 15:22:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:22:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:22:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:22:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:23:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:23:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:24:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:24:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:24:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:24:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:25:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6306294, '219', 7440.552, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:25:02 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6306294, '219', 7440.552, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6306294, '219', 7440.552, '1', '1.00', NULL, 'null')
ERROR - 2025-05-31 15:25:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:25:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:25:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:25:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:26:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:26:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:26:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:26:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:26:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:26:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:27:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:27:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:27:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:27:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:27:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:27:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:29:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:29:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:29:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:29:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:30:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:30:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:30:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:30:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:31:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:31:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:31:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:31:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:31:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:31:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:31:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:31:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:31:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:31:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:31:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:31:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:31:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:31:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:32:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:32:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:32:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:32:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:32:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:32:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:33:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:33:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:33:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:33:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:33:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:34:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:34:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:35:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:35:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:35:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:35:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:35:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:35:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:38:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:39:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:39:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:40:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:40:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:40:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:40:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:40:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:40:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:40:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:41:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 4: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:41:14 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
LINE 4: WHERE "pd"."id" = 'undefined'
                          ^ - Invalid query: SELECT "lp".*
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
WHERE "pd"."id" = 'undefined'
AND "lp"."jenis_layanan" = 'IGD'
ORDER BY "lp"."id" ASC
ERROR - 2025-05-31 15:42:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:43:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:43:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:45:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:45:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:45:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:45:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:45:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 08:45:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:45:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:48:39 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-31 15:48:46 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-31 15:50:08 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-31 08:50:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 08:50:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:51:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 15:52:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:52:49 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 15:52:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 15:52:49 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 15:54:55 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-31 15:56:27 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-31 16:10:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 16:14:52 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-31 16:16:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:16:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:16:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 16:16:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:16:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:17:44 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-31 16:18:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:18:47 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('757624', '2025-05-31 13:25', NULL, 'igd ', NULL, 'Susp Ileus Obstruktif + Syok Sepsis + Susp Massa Mediastinum', NULL, '67', '1', NULL, 'Pasien rujukan dari RS Medika lestari datang dengan keluhan nyeri pada seluruh lapang perut sejak 2 hari lalu. BAB terakhir 5 hari lalu (+) Tidak buang angin sejak 2 hari lalu. Mual (+) Muntah 2x hari ini (+) Demam sejak 2 hari lalu (+) Batuk sejak 2 hari lalu (+) Pusing berputar sejak 1 minggu lalu (+) Pasien sudah terpasang NGT dengan produksi berwarna kuning kehijauan', 'Nefrolitiasis multiple dextra + Susp massa mediastinum dd massa paru kanan - Riw. HT (+) DM (+)', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '1', 'tinggi', '2', '2', '0', NULL, '1', '2025-05-31', '1', '2025-05-31', NULL, NULL, NULL, NULL, '1', '2025-05-31', NULL, NULL, '1', '3', NULL, NULL, NULL, 'OMZ 40 mg iv
ondancentron 8 mg iv 
keterolac 30 mg iv 
pct 1 gr drip iv jam 
ceftriaxone 2 gr iv 
hyosine 10 mg iv 
metoclopramid 10 mg iv 
levofloxacin 500 mg iv 
NAC 200 mg po
pct 500 mg 
sucralfat 15 ml po 
vascon 0,5 mg jalan 26,25 cc/jam', '1', 'DR, GDS,elektrolit,UR,CR', '1', 'abdomen 3 posisi, thorax tgl 31/05/25 dari RS medika lestari', '1', 'EKG ', 'pasang infus,mengambil darah
mengantar ronsen', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '329', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 16:19:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:19:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:21:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:21:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:22:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:22:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:22:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:22:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:22:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:22:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:22:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:22:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:27:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:27:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:27:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:27:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:27:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:27:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:28:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:28:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:28:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:28:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:30:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 16:31:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 16:38:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (6306759, '680', 15031.62, '1000', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:38:26 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (6306759, '680', 15031.62, '1000', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6306759, '680', 15031.62, '1000', '1.00', 'Ya', 'null')
ERROR - 2025-05-31 16:40:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:40:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:40:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:40:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:40:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6306795, '1150', 291.6, '1', '6.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:40:50 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6306795, '1150', 291.6, '1', '6.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6306795, '1150', 291.6, '1', '6.00', 'Ya', 'null')
ERROR - 2025-05-31 16:41:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:41:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:41:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:41:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:42:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:42:43 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-05-31 16:42:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (6306823, '693', 15600.384, '4', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:42:55 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (6306823, '693', 15600.384, '4', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6306823, '693', 15600.384, '4', '2.00', 'Ya', 'null')
ERROR - 2025-05-31 16:46:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6306842, '851', 234000, '250', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:46:04 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6306842, '851', 234000, '250', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6306842, '851', 234000, '250', '1.00', 'Ya', 'null')
ERROR - 2025-05-31 16:46:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 18: AND &quot;b&quot;.&quot;id&quot; = 'undefined'
                        ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:46:36 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 18: AND "b"."id" = 'undefined'
                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, date(pd.tanggal_daftar) as tanggal_daftar, "pd"."tanggal_keluar", "pd"."id_pasien", "pjl"."id_resep", "pjl"."id_resep_tebus", "pd"."no_register", CONCAT_WS(' ', "p"."nama", COALESCE(p.status_pasien, '')) as nama, "p"."tanggal_lahir", "p"."alamat", COALESCE(pj.nama, '') as penjamin, "p"."telp", COALESCE(sp.nama, '') as layanan, COALESCE(pg.nama, '') as dokter, COALESCE(lp.no_antrian, 0) as no_antrian, CONCAT_WS(' ', "b"."nama", 'Kelas', "k"."nama", 'Bed', ri.no_bed) as bed, "pjl"."id" as "id_penjualan", "pd"."jenis_igd"
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_penjualan" as "pjl" ON "pjl"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "d" ON "d"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "d"."id_pegawai"
LEFT JOIN "sm_rawat_inap" as "ri" ON "ri"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_bangsal" as "b" ON "b"."id" = "ri"."id_bangsal"
LEFT JOIN "sm_kelas" as "k" ON "k"."id" = "ri"."id_kelas"
LEFT JOIN "sm_penjamin" as "pj" ON "lp"."id_penjamin" = "pj"."id"
WHERE (p.id ilike '%undefined%' or p.nama ilike '%undefined%')
AND "lp"."tanggal_layanan" BETWEEN '2025-05-31 00:00:00' AND '2025-05-31 23:59:59'
AND "lp"."id" IS NULL
AND "lp"."jenis_layanan" in ('Rawat Inap')
AND  ("pd"."tanggal_keluar" is NULL OR "lp"."tindak_lanjut" = 'cco sementara' ) 
AND "b"."id" = 'undefined'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-05-31 16:48:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:48:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:48:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 16:48:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 09:55:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:55:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:55:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:55:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:56:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:56:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:56:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:56:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:56:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:56:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:57:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 09:57:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 17:00:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(858248) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:00:50 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(858248) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '858248'
ERROR - 2025-05-31 17:01:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(858248) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:01:12 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(858248) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '858248'
ERROR - 2025-05-31 17:01:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(858248) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:01:48 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(858248) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '858248'
ERROR - 2025-05-31 17:02:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(858248) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:02:44 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(858248) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '858248'
ERROR - 2025-05-31 17:05:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:05:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:05:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6306959, '2185', 33599.7, '2', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:05:23 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6306959, '2185', 33599.7, '2', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6306959, '2185', 33599.7, '2', '1.00', NULL, 'null')
ERROR - 2025-05-31 17:05:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:05:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:06:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:06:05 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-05-31 10:07:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 10:07:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 10:07:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 10:07:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 17:13:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:13:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:20:02 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-05-31 17:30:16 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 17:34:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 17:35:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 17:36:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 17:37:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 17:37:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 17:39:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:39:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:41:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:41:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:41:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:41:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:42:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (823, 756647, 586, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 2025-05-31 17:42:55, null, 1848, 698633, 2025-05-31 17:42:55, 2025-05-31 17:43:00). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:42:55 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (823, 756647, 586, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 2025-05-31 17:42:55, null, 1848, 698633, 2025-05-31 17:42:55, 2025-05-31 17:43:00). - Invalid query: INSERT INTO "sm_form_pemberian_informasi" ("id_pendaftaran", "id_layanan_pendaftaran", "is_pasien", "id_dokter_pelaksana_tindakan", "tanggal_jam_pi", "pemberi_informasi", "penerima_informasi", "diagnosis_kerja", "diagnosis_kerja_check", "dasar_diagnosis", "dasar_diagnosis_check", "tindakan_kedokteran", "tindakan_kedokteran_check", "indikasi_tindakan", "indikasi_tindakan_check", "tata_cara", "tata_cara_check", "tujuan", "tujuan_check", "risiko_komplikasi", "risiko_komplikasi_check", "prognosis", "prognosis_check", "alternatif_resiko", "alternatif_resiko_check", "menyelamatkan_pasien", "menyelamatkan_pasien_check", "penggunaan_darah", "penggunaan_darah_check", "analgesia", "analgesia_check", "nama_keluarga", "id_users", "created_date", "updated_on") VALUES ('698633', '756647', NULL, '586', '2025-05-31 17:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1848', '2025-05-31 17:42:55', '2025-05-31 17:42:55')
ERROR - 2025-05-31 17:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 17:44:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858461, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:44:46 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858461, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858461, '2', '', '', '', '', 'PC', '0', '', '0', '', 'RM', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 17:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 17:53:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:53:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:53:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6307074, '314', 7920, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:53:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6307074, '314', 7920, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307074, '314', 7920, '1', '1.00', NULL, 'null')
ERROR - 2025-05-31 17:53:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:53:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:53:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:53:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 17:54:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:54:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 17:54:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 17:54:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 18:03:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 18:03:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 18:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 18:03:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 18:07:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 18:13:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 18:14:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 18:15:47 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16303
ERROR - 2025-05-31 18:16:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16303
ERROR - 2025-05-31 18:20:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 11:43:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:43:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:43:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:43:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:48:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:48:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:49:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:49:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:49:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:49:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:49:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:49:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:49:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 11:49:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 18:51:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 18:59:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 12:02:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 12:02:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 19:04:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:04:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:04:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6307158, '2694', 799.2, '80', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:04:52 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6307158, '2694', 799.2, '80', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307158, '2694', 799.2, '80', '2.00', 'Ya', 'null')
ERROR - 2025-05-31 19:05:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:05:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:09:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:09:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:09:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6307203, '2366', 1202.796, '60', '6.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:09:29 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6307203, '2366', 1202.796, '60', '6.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307203, '2366', 1202.796, '60', '6.00', 'Ya', 'null')
ERROR - 2025-05-31 19:09:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:09:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:10:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:10:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:14:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 19:15:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 19:16:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:16:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:18:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:18:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6307293, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:20:05 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6307293, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307293, '922', 1017.648, '1', '1.00', NULL, 'null')
ERROR - 2025-05-31 19:22:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-31 19:24:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:24:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:35:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858479, '7', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:35:02 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858479, '7', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858479, '7', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 19:41:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:41:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 19:42:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 19:42:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 20:00:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 20:00:50 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('757651', '2025-05-31 19:45', '18', 'pasien mengatakan nyeri dada sebelah kanan di luka operasi yang terpasang selang,  sesak nafas berkurang, nyeri dirasa saat bergerak, nyeri hilang timbul', 'kesadaran CM, GCS 15, EWS Putih (0), akral hangat, nadi teraba kuat, pasien tampak meringis kesakitan, tampak selang WSD dengan undulasi(+), tanda vital TD 141/75 mmhg Nadi 75 x/mnt suhu 36.5 c RR 20x/mnt SpO2 98 Þngan NRM 10 lpm. skala nyeri 3/10 terpasang ivfd RL 15 tpm di tangan kiri tanggal 28/5/2025. terpasang selang WSD di dada kanan dengan undulasi (+), terpasang DC 29/5/2025 , sudah dilakukan pemeriksaan Lab 28/5/25, ro thx+ct brain trauma NK 28/5/25, ro thx 29/5, thx 30/5', 'nyeri akut', 'setelah dilakukan asuhan keperawatan selama 1x24 jam diharapkan tingkat nyeri menurun, dengan kriteria hasil skala nyeri 2/10, pasien tampak tenang', '', '', '', '', '', '', '', '', '1087', '1', '<p><b>R/cek AGD serial besok pagi</b></p><p><b>Fisioterapi/hari</b></p><p><b>bedrest 1/2 duduk</b></p><p><b>diet TPÂ </b></p><p><b>pertahankan selang wsd jangan sampai tertekuk</b></p>', NULL, '1087', 0, NULL, '2025-05-31 20:00:50')
ERROR - 2025-05-31 20:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 20:01:15 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('757651', '2025-05-31 19:45', '18', 'pasien mengatakan nyeri dada sebelah kanan di luka operasi yang terpasang selang,  sesak nafas berkurang, nyeri dirasa saat bergerak, nyeri hilang timbul', 'kesadaran CM, GCS 15, EWS Putih (0), akral hangat, nadi teraba kuat, pasien tampak meringis kesakitan, tampak selang WSD dengan undulasi(+), tanda vital TD 141/75 mmhg Nadi 75 x/mnt suhu 36.5 c RR 20x/mnt SpO2 98 Þngan NRM 10 lpm. skala nyeri 3/10 terpasang ivfd RL 15 tpm di tangan kiri tanggal 28/5/2025. terpasang selang WSD di dada kanan dengan undulasi (+), terpasang DC 29/5/2025 , sudah dilakukan pemeriksaan Lab 28/5/25, ro thx+ct brain trauma NK 28/5/25, ro thx 29/5, thx 30/5', 'nyeri akut', 'setelah dilakukan asuhan keperawatan selama 1x24 jam diharapkan tingkat nyeri menurun, dengan kriteria hasil skala nyeri 2/10, pasien tampak tenang', '', '', '', '', '', '', '', '', '1087', '1', '<p><b>R/cek AGD serial besok pagi</b></p><p><b>Fisioterapi/hari</b></p><p><b>bedrest 1/2 duduk</b></p><p><b>diet TPÂ </b></p><p><b>pertahankan selang wsd jangan sampai tertekuk</b></p>', NULL, '1087', 0, NULL, '2025-05-31 20:01:15')
ERROR - 2025-05-31 20:01:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 20:01:28 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('757651', '2025-05-31 19:45', '18', 'pasien mengatakan nyeri dada sebelah kanan di luka operasi yang terpasang selang,  sesak nafas berkurang, nyeri dirasa saat bergerak, nyeri hilang timbul', 'kesadaran CM, GCS 15, EWS Putih (0), akral hangat, nadi teraba kuat, pasien tampak meringis kesakitan, tampak selang WSD dengan undulasi(+), tanda vital TD 141/75 mmhg Nadi 75 x/mnt suhu 36.5 c RR 20x/mnt SpO2 98Þngan NRM 10 lpm. skala nyeri 3/10 terpasang ivfd RL 15 tpm di tangan kiri tanggal 28/5/2025. terpasang selang WSD di dada kanan dengan undulasi (+), terpasang DC 29/5/2025 , sudah dilakukan pemeriksaan Lab 28/5/25, ro thx+ct brain trauma NK 28/5/25, ro thx 29/5, thx 30/5', 'nyeri akut', 'setelah dilakukan asuhan keperawatan selama 1x24 jam diharapkan tingkat nyeri menurun, dengan kriteria hasil skala nyeri 2/10, pasien tampak tenang', '', '', '', '', '', '', '', '', '1087', '1', '<p><b>R/cek AGD serial besok pagi</b></p><p><b>Fisioterapi/hari</b></p><p><b>bedrest 1/2 duduk</b></p><p><b>diet TPÂ </b></p><p><b>pertahankan selang wsd jangan sampai tertekuk</b></p>', NULL, '1087', 0, NULL, '2025-05-31 20:01:28')
ERROR - 2025-05-31 20:01:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 20:01:40 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('757651', '2025-05-31 19:45', '18', 'pasien mengatakan nyeri dada sebelah kanan di luka operasi yang terpasang selang,  sesak nafas berkurang, nyeri dirasa saat bergerak, nyeri hilang timbul', 'kesadaran CM, GCS 15, EWS Putih (0), akral hangat, nadi teraba kuat, pasien tampak meringis kesakitan, tampak selang WSD dengan undulasi(+), tanda vital TD 141/75 mmhg Nadi 75 x/mnt suhu 36.5 c RR 20x/mnt SpO2 98 Þngan NRM 10 lpm skala nyeri 3/10 terpasang ivfd RL 15 tpm di tangan kiri tanggal 28/5/2025. terpasang selang WSD di dada kanan dengan undulasi (+), terpasang DC 29/5/2025 , sudah dilakukan pemeriksaan Lab 28/5/25, ro thx+ct brain trauma NK 28/5/25, ro thx 29/5, thx 30/5', 'nyeri akut', 'setelah dilakukan asuhan keperawatan selama 1x24 jam diharapkan tingkat nyeri menurun, dengan kriteria hasil skala nyeri 2/10, pasien tampak tenang', '', '', '', '', '', '', '', '', '1087', '1', '<p><b>R/cek AGD serial besok pagi</b></p><p><b>Fisioterapi/hari</b></p><p><b>bedrest 1/2 duduk</b></p><p><b>diet TPÂ </b></p><p><b>pertahankan selang wsd jangan sampai tertekuk</b></p>', NULL, '1087', 0, NULL, '2025-05-31 20:01:40')
ERROR - 2025-05-31 20:10:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858483, '6', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 20:10:08 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (858483, '6', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858483, '6', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 20:15:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6307445, '60', 130.8, '1', '5.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 20:15:40 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6307445, '60', 130.8, '1', '5.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307445, '60', 130.8, '1', '5.00', NULL, 'null')
ERROR - 2025-05-31 20:18:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 20:24:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (858489, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 20:24:01 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (858489, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (858489, '1', '', '', '', '', 'PC', '0', '', '0', '', '4', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-31 20:31:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 13:57:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 13:57:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 21:01:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...', '2025-05-31', '11', '1', '224', '2', '2', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 21:01:16 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...', '2025-05-31', '11', '1', '224', '2', '2', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('699547', '757669', '2025-05-31', '11', '1', '224', '2', '2', '1', '', '2', '2', '2', '2025-05-31 21:00:09', '978')
ERROR - 2025-05-31 21:01:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...', '2025-05-31', '11', '1', '224', '2', '2', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 21:01:26 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...', '2025-05-31', '11', '1', '224', '2', '2', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('699547', '757669', '2025-05-31', '11', '1', '224', '2', '2', '1', '', '2', '2', '2', '2025-05-31 21:00:09', '978')
ERROR - 2025-05-31 21:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 21:09:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 21:09:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 21:09:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 21:09:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 21:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 21:57:02 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 22:06:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6307630, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:06:14 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6307630, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307630, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
ERROR - 2025-05-31 22:11:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:11:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:11:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:11:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:11:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:11:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:13:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:13:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:13:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:13:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:23:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:23:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:23:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6307703, '597', 10236, '5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:23:35 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6307703, '597', 10236, '5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307703, '597', 10236, '5', '1.00', 'Ya', 'null')
ERROR - 2025-05-31 15:23:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:23:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:23:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:23:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 22:23:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:23:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:23:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:23:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:26:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:26:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 22:27:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 22:27:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:27:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 15:37:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 15:37:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 22:58:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:58:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 22:58:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 22:58:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 23:03:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:03:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 23:03:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ES (6307804, '1177', 13264.056, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:03:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ES (6307804, '1177', 13264.056, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307804, '1177', 13264.056, '500', '1.00', 'Ya', 'null')
ERROR - 2025-05-31 23:03:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:03:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 23:04:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:04:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 16:05:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:05:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:05:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:05:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:05:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:05:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:05:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:05:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 23:07:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 23:07:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 23:08:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:08:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 23:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-31 23:14:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ES (6307923, '1177', 13264.056, '500', '3.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:14:07 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ES (6307923, '1177', 13264.056, '500', '3.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6307923, '1177', 13264.056, '500', '3.00', 'Ya', 'null')
ERROR - 2025-05-31 16:14:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 16:14:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 23:15:25 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-31 23:17:12 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-31 23:18:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:18:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 23:27:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;3.7&quot;
LINE 1: ...508', '756541', '1892', '2025-06-01', '50', NULL, '3.7', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:27:09 --> Query error: ERROR:  invalid input syntax for type smallint: "3.7"
LINE 1: ...508', '756541', '1892', '2025-06-01', '50', NULL, '3.7', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('687508', '756541', '1892', '2025-06-01', '50', NULL, '3.7', NULL, NULL, '53.7', '27', NULL, NULL, NULL, NULL, '27', '26.700000000000003', NULL, '100%', NULL, 'CM', 'K', '+', 'PASI', '0:00', '284', '2025-05-31 23:25:31')
ERROR - 2025-05-31 23:27:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;3.7&quot;
LINE 1: ...508', '756541', '1892', '2025-06-01', '50', NULL, '3.7', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:27:24 --> Query error: ERROR:  invalid input syntax for type smallint: "3.7"
LINE 1: ...508', '756541', '1892', '2025-06-01', '50', NULL, '3.7', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('687508', '756541', '1892', '2025-06-01', '50', NULL, '3.7', NULL, NULL, '53.7', '27', NULL, NULL, NULL, NULL, '27', '26.700000000000003', NULL, '100%', NULL, 'CM', 'K', '+', 'PASI', '0:00', '284', '2025-05-31 23:25:31')
ERROR - 2025-05-31 23:32:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:32:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 23:35:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:35:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 23:37:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:37:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 23:37:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:37:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 23:41:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:41:42 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-31 23:41:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:41:42 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-31 23:59:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-31 23:59:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-31 18:30:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 18:30:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 18:31:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 18:31:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 20:01:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 20:01:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 20:02:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 20:02:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 22:25:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-31 22:25:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
