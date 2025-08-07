<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-03 00:02:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:02:28 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-06-03 00:16:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:19:27&quot;
LINE 1: ...bak&quot; = '2025-05-31 01:59', &quot;waktu_pemberi_tbak&quot; = '2025-06-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:16:52 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:19:27"
LINE 1: ...bak" = '2025-05-31 01:59', "waktu_pemberi_tbak" = '2025-06-3...
                                                             ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_penerima_tbak" = '2025-05-31 01:59', "waktu_pemberi_tbak" = '2025-06-31 12:19:27', "id_nadis_tbak" = '1262', "id_dokter_dpjp_tbak" = '353', "ttd_nadis_tbak" = '1', "ttd_dokter_dpjp_tbak" = '1'
WHERE "id" = '879099'
ERROR - 2025-06-03 00:16:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:19:27&quot;
LINE 1: ...bak&quot; = '2025-05-31 01:59', &quot;waktu_pemberi_tbak&quot; = '2025-06-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:16:56 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:19:27"
LINE 1: ...bak" = '2025-05-31 01:59', "waktu_pemberi_tbak" = '2025-06-3...
                                                             ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_penerima_tbak" = '2025-05-31 01:59', "waktu_pemberi_tbak" = '2025-06-31 12:19:27', "id_nadis_tbak" = '1262', "id_dokter_dpjp_tbak" = '353', "ttd_nadis_tbak" = '1', "ttd_dokter_dpjp_tbak" = '1'
WHERE "id" = '879099'
ERROR - 2025-06-03 00:16:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:19:27&quot;
LINE 1: ...bak&quot; = '2025-05-31 01:59', &quot;waktu_pemberi_tbak&quot; = '2025-06-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:16:58 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:19:27"
LINE 1: ...bak" = '2025-05-31 01:59', "waktu_pemberi_tbak" = '2025-06-3...
                                                             ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_penerima_tbak" = '2025-05-31 01:59', "waktu_pemberi_tbak" = '2025-06-31 12:19:27', "id_nadis_tbak" = '1262', "id_dokter_dpjp_tbak" = '353', "ttd_nadis_tbak" = '1', "ttd_dokter_dpjp_tbak" = '1'
WHERE "id" = '879099'
ERROR - 2025-06-03 00:17:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:19:57&quot;
LINE 1: ...bak&quot; = '2025-05-31 02:00', &quot;waktu_pemberi_tbak&quot; = '2025-06-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:17:23 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:19:57"
LINE 1: ...bak" = '2025-05-31 02:00', "waktu_pemberi_tbak" = '2025-06-3...
                                                             ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_penerima_tbak" = '2025-05-31 02:00', "waktu_pemberi_tbak" = '2025-06-31 12:19:57', "id_nadis_tbak" = '1262', "id_dokter_dpjp_tbak" = '353', "ttd_nadis_tbak" = '1', "ttd_dokter_dpjp_tbak" = '1'
WHERE "id" = '879100'
ERROR - 2025-06-03 00:17:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:19:57&quot;
LINE 1: ...bak&quot; = '2025-05-31 02:00', &quot;waktu_pemberi_tbak&quot; = '2025-06-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:17:25 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:19:57"
LINE 1: ...bak" = '2025-05-31 02:00', "waktu_pemberi_tbak" = '2025-06-3...
                                                             ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_penerima_tbak" = '2025-05-31 02:00', "waktu_pemberi_tbak" = '2025-06-31 12:19:57', "id_nadis_tbak" = '1262', "id_dokter_dpjp_tbak" = '353', "ttd_nadis_tbak" = '1', "ttd_dokter_dpjp_tbak" = '1'
WHERE "id" = '879100'
ERROR - 2025-06-03 00:17:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:20:14&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-06-31 12:20:...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:17:41 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:20:14"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-31 12:20:...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-31 12:20:14', "id_dokter_dpjp" = '353', "ttd_dokter_dpjp" = '1'
WHERE "id" = '879109'
ERROR - 2025-06-03 00:17:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:20:14&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-06-31 12:20:...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:17:43 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:20:14"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-31 12:20:...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-31 12:20:14', "id_dokter_dpjp" = '353', "ttd_dokter_dpjp" = '1'
WHERE "id" = '879109'
ERROR - 2025-06-03 00:17:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:20:14&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-06-31 12:20:...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:17:43 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:20:14"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-31 12:20:...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-31 12:20:14', "id_dokter_dpjp" = '353', "ttd_dokter_dpjp" = '1'
WHERE "id" = '879109'
ERROR - 2025-06-03 00:19:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-06-31 12:21:35&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-06-31 12:21:...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:19:00 --> Query error: ERROR:  date/time field value out of range: "2025-06-31 12:21:35"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-31 12:21:...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-31 12:21:35', "id_dokter_dpjp" = '353', "ttd_dokter_dpjp" = '1'
WHERE "id" = '879176'
ERROR - 2025-06-03 00:32:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 00:34:55 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11182
ERROR - 2025-06-03 00:35:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:35:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 00:35:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('859592', '1', '1', '', 'Infus...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:35:26 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('859592', '1', '1', '', 'Infus...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('859592', '1', '1', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', 'INFUSAN D5 1/2 NS........', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 00:35:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:35:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 00:35:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:35:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 00:38:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (859600, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:38:03 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (859600, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (859600, '3', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 00:44:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:44:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 00:45:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:45:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 00:46:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 00:47:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:47:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 00:47:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6319633, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:47:43 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6319633, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6319633, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-06-03 00:47:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 00:47:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 01:08:59 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-03 01:59:25 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-03 01:59:25 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-03 02:03:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:03:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 02:03:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:03:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 02:04:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:04:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 02:06:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:06:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 02:10:49 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-03 02:17:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:17:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 02:18:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:18:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 02:18:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:18:47 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '881327', "id_layanan_pendaftaran" = '757744', "waktu" = '2025-06-03 02:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan nyeri pinggang menjalar ke bahu, nyeri seperti tertusuk-tusuk, nyeri bertambah jika bergerak, nyeri berkurang setelah diberikan obat, nyeri terus menerus, sesak nafas dirasakan disertai nyeri ulu hati, aktivitas dibantu oleh keluarga', "objective" = 'kesadaran composmentis GCS 15 EWS K(6) akral hangat nadi kuat, pasien tampak meringis kesakitan VAS 5/10, aktivitas di bantu keluarga, pasien tampak sesak nafas, nafas tampak cepat dan dangkal. TD : 177/94mmHg N : 110x/menit S :36.3 C RR :30 x/menit spo2 : 95�ngan NRM 15 lpm. terpasang venflon tgl 1/6/25. Terpasang DC no 16 tgl 3/6/25. Pemeriksaan tgl 1/6/25 lab ( hb : 10.4 leu : 6.1 torm : 187 ) Vertebrae Lumbosacral Dewasa AP + Lateral, Genu Dewasa 1 Posisi di radiologi .pasien kontrol ke poli jantung tgl 28/2 obat Aspilet 1x80mg, Ramipril 1x5mg, Atorvastatin 1x20mg, Curcuma 2x1. EKG ulang tgl 3/6/25 terlampir. AGD tgl 3/6/25 terlampir', "assessment" = 'Nyeri akut , intoleransi aktivitas', "plan" = '-', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1993', "ttd_nadis" = '1', "instruksi_ppa" = 'Pasien R/ pindah ICU', "id_dokter_dpjp" = NULL, "id_user" = '1993', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-06-03 02:18:47'
WHERE "id" = '881327'
ERROR - 2025-06-03 02:19:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:19:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 02:20:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:20:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 02:20:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 02:20:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 02:31:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 04:14:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:14:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:15:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 05:15:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 05:15:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 05:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:21:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:21:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:21:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:21:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:22:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:22:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:22:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:22:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:27:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:28:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:30:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:30:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:30:54 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A043%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 06:32:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030017) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:32:35 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030017) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030017', '00053375', '2025-06-03 06:32:33', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000566807174', NULL, '022310040425Y002083', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250603B280')
ERROR - 2025-06-03 06:32:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:38:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:40:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:41:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:44:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:44:32 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '881391', "id_layanan_pendaftaran" = '757779', "waktu" = '2025-06-03 23:17', "id_profesi" = '18', "subject" = 'Pasien mengatakan masih merasakan nyeri pada dada, nyeri seperti di tekan, terasa tembus ke belakang. nyerihilang timbul, nafas terasa tidak nyaman sejak kemarin, keluhan nyeri terasa hilang timbul. nyeri ulu hati . nafas terasa sesak terutama bila beraktifitas. membaik dengan istirahat.Aktivitas dibantu keluarga', "objective" = 'Kesadaran Composmentis GCS 15 E4M6V5 EWS H (2) , akral hangat, nadi teraba kuat, Tampak meringis kesakitan sambil memegangi area yang nyeri, VAS 3/10 , aktivitas di bantu keluarga TD: 167/100MMHG N: 60 x/m S: 36.1 C RR: 18 x/m Sat 99�ngan NK 3lpm Pemeriksaan Radiologi tgl 1/6/15 Thorax Dewasa Pa/Ap, Hemoglobin 12.8 g/dL Hematokrit 40 % Leukosit 7.8 10^3/µL Trombosit 408 10^3/µL Eritrosit 4.95 10^6/µL . Ureum L 17 mg/dL Kreatinin 0.7 mg/dL 0.55 - 1.02 Enzimatic Glukosa Sewaktu 84 mg/dl. Troponin T &lt; 40. sempat dilakukan kateteri jantung di RS primaya awal tahun ini, dikatakan pembengkakan jantung. mendapat obat : Nitrokaf 1x2,5. simvastatin 1x20mg, Bisoprolol 1x2.5mg. Tricagrelor 2x1, Nospirinal 1x1, terakhir konsumsi obat obatan ini 2 bulan yg lalu. kontrol ke poli syaraf dg cervicalgia bulan April 2025. mendapat obat amlodipin 1x10, candesartan 1x16, flunarizin 2x1, tramadol 37.5 + Diazepam 1 mg + pct 500mg, 3x1. - tetapi obat sudah habis,
', "assessment" = 'Nyeri Akut, Intoleransi Aktivitas', "plan" = '-', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1993', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '1532', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-06-03 06:44:32'
WHERE "id" = '881391'
ERROR - 2025-06-03 06:44:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030043) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:44:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030043) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030043', '00289315', '2025-06-03 06:44:44', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001472960237', NULL, '0223B1570525P002024', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Mata', 0, 2, NULL, '20250603A157')
ERROR - 2025-06-03 06:47:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:49:31 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 06:52:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:52:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:52:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND "ab"."kode_booking" = '20250603A028'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 06:53:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:54:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:54:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 06:54:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:56:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 06:56:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 06:56:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 06:56:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:56:52 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-06-03 06:56:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:57:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030076) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:57:44 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030076) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030076', '00308375', '2025-06-03 06:57:40', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002205637323', NULL, '102501020525Y001951', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250603A050')
ERROR - 2025-06-03 06:57:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030077) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:57:47 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030077) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030077', '00256177', '2025-06-03 06:57:47', 'Hemodialisa', 'Hemodialisa', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002207847183', NULL, '102503030824Y001606', 'Lama', '0', '1765', 0, 'Belum', 'Hemodialisa ', 0, '2', '', NULL)
ERROR - 2025-06-03 06:58:52 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10744
ERROR - 2025-06-03 06:58:52 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10744
ERROR - 2025-06-03 06:58:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:58:55 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10744
ERROR - 2025-06-03 06:58:55 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10744
ERROR - 2025-06-03 06:59:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:59:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 06:59:52 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND "ab"."kode_booking" = '20250603A038'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 07:00:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 07:00:33 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 07:00:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:02:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 07:02:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 07:03:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:03:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:05:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:06:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:06:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:08:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:09:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:09:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:09:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:11:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:11:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:12:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 07:12:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 07:12:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:12:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:13:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:13:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:13:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:15:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:15:49 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 07:15:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:15:49 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 07:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:17:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:18:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:20:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:20:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 07:20:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:20:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 07:20:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:20:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:20:25 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A040%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 07:20:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:21:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:21:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:24:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030149) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:24:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030149) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030149', '00362393', '2025-06-03 07:24:06', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0003057718623', NULL, '0496B0000525Y001005', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250603B062')
ERROR - 2025-06-03 07:24:09 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-03 07:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:24:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:24:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:24:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:24:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:25:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:25:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:26:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:26:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:26:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:26:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:27:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:27:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:27:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:28:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:28:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:28:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:28:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:28:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030160) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:28:41 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030160) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030160', '00377001', '2025-06-03 07:28:41', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '11', NULL, NULL, NULL, 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Orthopaedi', 0, '2', '', '20250603B305')
ERROR - 2025-06-03 07:31:17 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 07:31:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:31:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:32:06 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 07:32:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:32:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 07:32:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:32:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 07:32:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:33:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:33:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:34:33 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 07:35:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:35:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:35:20 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 07:35:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 07:35:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:35:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:35:54 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 07:36:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:36:31 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-06-03 07:36:31 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-06-03 07:36:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-06-03 07:36:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-06-03 07:37:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:38:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 00:38:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 00:38:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:38:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:38:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 00:38:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 00:38:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:41:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:41:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:41:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:42:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:43:27 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-06-03 07:43:27 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-06-03 07:43:27 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-06-03 07:43:27 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-06-03 07:43:27 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-06-03 07:43:27 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-06-03 07:43:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:43:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:44:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:44:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:44:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:44:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:45:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:45:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:45:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:45:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:45:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:45:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:46:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:46:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:46:52 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A031%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 07:47:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:47:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:47:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:48:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:49:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:49:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:49:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:49:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:49:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:50:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:50:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:50:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:51:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:51:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:51:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:51:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:53:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:53:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:54:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:54:02 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A056%' ESCAPE '!'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 07:54:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:54:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:55:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:55:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:55:51 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A061%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 07:56:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:56:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:56:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:56:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:56:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 07:56:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 07:57:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 07:57:24 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A039%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 07:58:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:59:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:59:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:59:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:00:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030245) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:00:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030245) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030245', '00375852', '2025-06-03 08:00:08', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002934084778', NULL, '102506020425Y002781', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250603B125')
ERROR - 2025-06-03 08:00:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:00:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:00:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:00:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:00:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030246) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:00:20 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030246) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030246', '00375852', '2025-06-03 08:00:20', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002934084778', NULL, '102506020425Y002781', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250603B125')
ERROR - 2025-06-03 08:01:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:01:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:02:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:02:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:02:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:02:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-06-03 08:02:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-06-03 08:02:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:02:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:02:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:02:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:03:07 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-06-03 08:03:07 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-06-03 08:03:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:03:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-06-03 08:03:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-06-03 08:03:33 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-06-03 08:03:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-06-03 08:03:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-06-03 08:03:33 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-06-03 08:03:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:03:34 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A131%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 08:04:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:04:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:05:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:05:01 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-06-03 08:05:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:05:02 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-06-03 08:05:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:05:12 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-06-03 08:05:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:05:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:05:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:06:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:06:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-03 08:06:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:06:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:06:33 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A058%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 08:06:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:06:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:07:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:07:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:07:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:07:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:07:19 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-04'
AND "id" = ''
ERROR - 2025-06-03 08:07:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:07:22 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-04'
AND "id" = ''
ERROR - 2025-06-03 08:07:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:07:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:07:35 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-04'
AND "id" = ''
ERROR - 2025-06-03 08:07:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:07:38 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-04'
AND "id" = ''
ERROR - 2025-06-03 08:07:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:07:44 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-04'
AND "id" = ''
ERROR - 2025-06-03 08:08:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:08:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:09:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:10:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:10:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:10:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:10:52 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2026-06-03'
AND "id" = ''
ERROR - 2025-06-03 08:10:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:11:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:12:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:13:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:13:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:13:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:13:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:13:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:13:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:13:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:14:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:14:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:14:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:14:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:15:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:15:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:15:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 08:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 01:15:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 01:15:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 08:16:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:16:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:16:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:17:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:17:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:17:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:17:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:17:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:18:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:18:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:18:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:18:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:19:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:19:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:19:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:19:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:19:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 01:20:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 01:20:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 01:20:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 01:20:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:20:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:20:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:20:26 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00378189'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-03 08:20:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:20:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 01:20:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 01:20:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:21:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;311:00&quot;
LINE 1: ...er&quot;) VALUES ('758687', 11662, '1', '50', '06:00', '311:00', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:21:15 --> Query error: ERROR:  date/time field value out of range: "311:00"
LINE 1: ...er") VALUES ('758687', 11662, '1', '50', '06:00', '311:00', ...
                                                             ^ - Invalid query: INSERT INTO "sm_diet_cair_2" ("id_layanan_pendaftaran", "id_dpmp", "dc_diet", "dc_item", "dc_jam_1", "dc_jam_2", "dc_jam_3", "dc_jam_4", "dc_jam_5", "dc_jam_6", "dc_jam_7", "dc_jam_8", "dc_keterangan", "dc_gram", "dc_mp", "dc_ms", "dc_mm", "dc_sp", "dc_ss", "dc_sm", "created_date", "id_user") VALUES ('758687', 11662, '1', '50', '06:00', '311:00', '17:00', '21:00', NULL, NULL, NULL, NULL, '4X100CC', '24', '1', '1', '1', NULL, NULL, '1', '2025-06-03 08:21:15', '1436')
ERROR - 2025-06-03 08:21:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:21:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:22:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:22:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:22:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:22:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:22:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:22:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250603B350) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:22:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250603B350) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250603B350', '350', 'B350', 'B', '2025-06-03', '0', '2025-06-03 08:22:51', 'Booking', 'APM', 'Asuransi', 0, '2025-06-03  11:43:30', 0, '1701', '00318972', 672, 37214, 30, 'INT', '083899103258', '3671014312850001', '1985-12-03', 'dr. I GEDE RAI KOSA, Sp.PD', 1, 'Asuransi', 37, '60', '200', 'Ok.', '0', '56362', '0002941963211', 'JKN', NULL, '1', NULL, '102501020525Y003599', 'PUSKESMAS SUKASARI', '2025-08-26', 'INT', '1', NULL, NULL, '30', 'Sudah', 200, 'Ok.')
ERROR - 2025-06-03 08:22:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:23:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:23:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:23:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:23:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:23:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:24:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:24:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:24:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:24:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:25:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:25:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:25:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A055%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 08:25:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:25:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:25:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:26:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 01:26:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 01:26:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:26:44 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-03 08:26:44 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-03 08:26:44 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-03 01:26:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 01:26:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 01:26:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 01:26:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:27:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:27:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:27:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:27:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 08:27:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:27:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 08:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:27:54 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-03 08:27:54 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-03 08:27:54 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-06-03 08:28:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030322) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:28:04 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030322) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030322', '00368905', '2025-06-03 08:28:03', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Okupasi', 0, '2', '', '20250603C010')
ERROR - 2025-06-03 08:28:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:28:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:28:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:28:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:28:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:28:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:28:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:28:58 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A045%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 08:29:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:29:29 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 08:29:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:30:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 01:31:04 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 01:31:04 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 08:31:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:31:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:32:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:33:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:33:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:33:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:34:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:34:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:34:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 08:34:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:34:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:34:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:34:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:34:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:35:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:35:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:35:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:35:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:35:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:35:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:36:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:36:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:36:42 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-03 08:36:42 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-03 08:36:42 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-03 08:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:36:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:36:54 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-04'
AND "id" = ''
ERROR - 2025-06-03 08:36:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:36:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:37:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:37:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:37:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:37:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:37:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:38:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:38:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:38:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:38:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:38:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:39:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:39:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:39:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:39:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:39:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:39:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:39:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('757804', '', '1357'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:39:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('757804', '', '1357'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('757804', '', '1357', '2025-06-03 08:34', '{"cara_tiba_diruangan_pasien":null}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":null,"informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"pasien post partum 2 jam, saat ini keluhan mules (+) nyeri luka heacting perineum (+) "}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"4","anc_2":"pkm","anc_3":null,"anc_4":null,"anc_5":null}', NULL, '2', '0', 'aterm', 'lupa ', '-', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"12","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"5","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":"-","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"8:45","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"8:45","kebutuhan_biologis_5":"6","kebutuhan_biologis_6":"8:45","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:00","kebutuhan_biologis_9":"3 minggu yg lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":"1","status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":null,"status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"-"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":null,"spiritual_8":"1","spiritual_9":null}', '{"budaya_1":null,"budaya_2":"1","budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', NULL, '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', NULL, '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"2 jari bawah pusat","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', '-', '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', NULL, '5', '5', '5', '5', '10', '10', '5', '10', '5', '60', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Sedang"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', NULL, NULL, NULL, NULL, NULL, '20', NULL, '10', '20', '0', NULL, '50', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '5', '6', '15', '{"tekanan_darah_1":"118","tekanan_darah_2":"72","tekanan_darah_3":null}', '{"frekuensi_nadi_1":"78","frekuensi_nadi_2":null}', '{"berat_badan_1":"68","berat_badan_2":null}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', NULL, NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-02', '2025-06-02', 'terlampir ', 'terlampir ', NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-02 08:34', '608', '1', '2025-06-02 08:42', '50', '1', '2025-06-03 08:39:58')
ERROR - 2025-06-03 08:40:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030351) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:40:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030351) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030351', '00200063', '2025-06-03 08:40:01', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001256395151', NULL, '102501040525Y000972', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250603A094')
ERROR - 2025-06-03 08:40:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('757804', '', '1357'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:40:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('757804', '', '1357'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('757804', '', '1357', '2025-06-03 08:34', '{"cara_tiba_diruangan_pasien":null}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":null,"informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"pasien post partum 2 jam, saat ini keluhan mules (+) nyeri luka heacting perineum (+) "}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"4","anc_2":"pkm","anc_3":null,"anc_4":null,"anc_5":null}', NULL, '2', '0', 'aterm', 'lupa ', '-', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"12","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"5","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":"-","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"8:45","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"8:45","kebutuhan_biologis_5":"6","kebutuhan_biologis_6":"8:45","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:00","kebutuhan_biologis_9":"3 minggu yg lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":"1","status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":null,"status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"-"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":null,"spiritual_8":"1","spiritual_9":null}', '{"budaya_1":null,"budaya_2":"1","budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', NULL, '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', NULL, '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"2 jari bawah pusat","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', '-', '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', NULL, '5', '5', '5', '5', '10', '10', '5', '10', '5', '60', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Sedang"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', NULL, NULL, NULL, NULL, NULL, '20', NULL, '10', '20', '0', NULL, '50', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '5', '6', '15', '{"tekanan_darah_1":"118","tekanan_darah_2":"72","tekanan_darah_3":null}', '{"frekuensi_nadi_1":"78","frekuensi_nadi_2":null}', '{"berat_badan_1":"68","berat_badan_2":null}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', NULL, NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-02', '2025-06-02', 'terlampir ', 'terlampir ', NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-02 08:34', '608', '1', '2025-06-02 08:42', '50', '1', '2025-06-03 08:40:04')
ERROR - 2025-06-03 08:40:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:40:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-03 08:40:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('757804', '', '1357'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:40:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('757804', '', '1357'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('757804', '', '1357', '2025-06-03 08:34', '{"cara_tiba_diruangan_pasien":null}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":null,"informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"pasien post partum 2 jam, saat ini keluhan mules (+) nyeri luka heacting perineum (+) "}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"4","anc_2":"pkm","anc_3":null,"anc_4":null,"anc_5":null}', NULL, '2', '0', 'aterm', 'lupa ', '-', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"12","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"5","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":"-","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"8:45","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"8:45","kebutuhan_biologis_5":"6","kebutuhan_biologis_6":"8:45","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:00","kebutuhan_biologis_9":"3 minggu yg lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":"1","status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":null,"status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"-"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":null,"spiritual_8":"1","spiritual_9":null}', '{"budaya_1":null,"budaya_2":"1","budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', NULL, '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', NULL, '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"2 jari bawah pusat","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', '-', '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', NULL, '5', '5', '5', '5', '10', '10', '5', '10', '5', '60', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Sedang"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', NULL, NULL, NULL, NULL, NULL, '20', NULL, '10', '20', '0', NULL, '50', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '5', '6', '15', '{"tekanan_darah_1":"118","tekanan_darah_2":"72","tekanan_darah_3":null}', '{"frekuensi_nadi_1":"78","frekuensi_nadi_2":null}', '{"berat_badan_1":"68","berat_badan_2":null}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', NULL, NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-02', '2025-06-02', 'terlampir ', 'terlampir ', NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-02 08:34', '608', '1', '2025-06-02 08:42', '50', '1', '2025-06-03 08:40:18')
ERROR - 2025-06-03 08:40:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:40:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:40:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:40:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:40:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:40:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:41:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:41:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:41:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:41:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:41:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:42:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:42:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:42:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:42:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:42:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:43:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:43:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:43:46 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = '44'
AND date(tanggal_layanan) = ''
ERROR - 2025-06-03 08:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:44:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:44:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:44:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:44:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:45:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:45:04 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00376909'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-03 08:45:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:45:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:46:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:46:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:46:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:46:42 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-03 08:46:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-03 08:46:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-03 08:46:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:47:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:47:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:47:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (859764, '6', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:47:16 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (859764, '6', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (859764, '6', '', '', '1 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 08:47:20 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 59
ERROR - 2025-06-03 08:47:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:47:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:47:50 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 59
ERROR - 2025-06-03 08:48:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:48:02 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND "ab"."kode_booking" = '20250603A145'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 08:48:09 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 59
ERROR - 2025-06-03 08:48:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:48:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:48:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:48:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:48:32 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 59
ERROR - 2025-06-03 08:48:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:48:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:49:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:49:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:49:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:49:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:49:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7043
ERROR - 2025-06-03 08:49:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:50:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:50:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:50:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'undefined...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:50:49 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'undefined...
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1671' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'undefined'  order by ri.id desc  limit 10 offset 0
ERROR - 2025-06-03 08:51:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:51:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:51:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:51:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:52:05 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7043
ERROR - 2025-06-03 08:52:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:52:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:52:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:53:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (859782, '5', '3', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:53:11 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (859782, '5', '3', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (859782, '5', '3', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 08:53:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:54:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:54:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:54:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:54:47 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 08:54:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:55:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:55:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:56:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:56:18 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 08:56:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:56:43 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-03 08:56:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-03 08:56:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-03 08:56:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:56:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:57:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:57:20 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 08:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:58:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:58:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 08:58:29 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A036%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 08:58:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:58:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:59:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 08:59:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:00:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:00:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:00:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:01:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:01:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:01:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:01:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:02:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:02:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:03:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:03:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:03:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:03:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (859818, '1', '', '60', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:03:39 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (859818, '1', '', '60', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (859818, '1', '', '60', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 09:03:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:03:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:04:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:04:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:05:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:05:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:05:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:05:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:05:26 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A191%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 09:05:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:05:49 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 09:05:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:05:49 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 09:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:06:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:06:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:06:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:07:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:07:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:08:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:08:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:08:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:08:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:09:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:09:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:09:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-03 09:09:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:09:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:09:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:09:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 897
ERROR - 2025-06-03 09:09:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 897
ERROR - 2025-06-03 09:09:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 902
ERROR - 2025-06-03 09:09:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 902
ERROR - 2025-06-03 09:09:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 903
ERROR - 2025-06-03 09:09:42 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 903
ERROR - 2025-06-03 09:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:10:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:10:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:10:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:10:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:10:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:10:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:11:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:11:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:11:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250603A195) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:11:31 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250603A195) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250603A195', '195', 'A195', 'A', '2025-06-03', '0', '2025-06-03 09:11:30', 'Booking', 'APM', 'Prioritas', 0, '2025-06-03  08:07:30', 0, '1948', '00076086', 62, 246933, 25, 'MAT', '081291833400', '3671014606510001', '1951-06-06', 'dr. SANTI MARIA RUGUN, Sp.M', 1, 'Asuransi', 44, '60', '200', 'Ok.', '0', '55378', '0000049354874', 'JKN', NULL, '1', NULL, '022300090625Y000168', 'PUSKESMAS CIKOKOL', '2025-09-01', 'MAT', '1', '1', NULL, '25')
ERROR - 2025-06-03 09:11:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:12:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:12:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:12:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:12:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:12:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:13:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:13:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:13:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:13:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:13:42 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 126
ERROR - 2025-06-03 09:13:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 216
ERROR - 2025-06-03 09:13:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:13:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:14:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:14:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:14:19 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-06-03 09:14:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:14:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:14:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:14:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:14:25 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-06-03 09:14:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:14:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:15:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:15:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:15:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:16:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:16:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:16:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 09:16:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:16:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 09:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:16:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:16:50 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-04'
AND "id" = ''
ERROR - 2025-06-03 09:17:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:17:13 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00339543'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-03 09:18:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 09:18:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:18:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:19:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:19:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (859884, '5', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:19:40 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (859884, '5', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (859884, '5', '', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 09:19:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:19:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:20:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:20:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:21:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:21:05 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A053%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 09:21:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:21:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:22:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:22:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:22:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:22:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:22:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:23:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:24:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:25:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:25:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:26:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:26:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:27:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:27:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:27:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:27:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:28:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:28:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:29:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:29:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:29:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 09:29:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:30:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:30:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:30:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:30:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 09:30:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:30:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:31:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:31:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:31:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:31:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:32:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:32:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:32:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:32:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:33:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:33:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:33:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:33:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:33:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 09:33:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:33:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 09:33:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:34:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:34:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:34:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:35:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:35:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:35:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:35:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:35:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:35:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:37:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:37:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:37:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:37:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:37:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:37:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:38:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:38:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:38:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:38:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:38:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:38:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:38:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:39:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:39:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:40:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 09:40:12 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 46
ERROR - 2025-06-03 09:40:12 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 280
ERROR - 2025-06-03 09:40:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:41:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:41:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:41:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:41:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:42:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:42:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:42:11 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-03 09:42:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 887
ERROR - 2025-06-03 09:42:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:42:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:42:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:42:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:42:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:43:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:43:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:44:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:44:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:44:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:44:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:44:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 09:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:44:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:44:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 09:45:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:45:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 09:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:45:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:45:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:45:50 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:45:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:46:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:47:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:47:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:47:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:47:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:47:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:47:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 09:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:49:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:49:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:50:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:50:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:50:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:51:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030510) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:51:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030510) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030510', '00225675', '2025-06-03 09:51:02', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001878346607', NULL, '0223R0560625B000003', 'Baru', NULL, '1975', 0, 'Belum', 'Poliklinik Periodonti', 0, '2', '', '20250603A193')
ERROR - 2025-06-03 09:51:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:52:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:52:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:52:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:52:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:52:54 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND "ab"."kode_booking" = '20250603A172'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 09:53:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:53:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:53:22 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 09:53:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:53:22 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 09:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:53:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030516) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:53:49 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030516) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030516', '00376367', '2025-06-03 09:53:47', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000814892556', NULL, '102501090525Y001188', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, 2, NULL, '20250603B138')
ERROR - 2025-06-03 09:54:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:54:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:54:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:55:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:55:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:55:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 09:55:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:55:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A122%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 09:56:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:56:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 02:57:10 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-03 02:57:50 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 02:57:50 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 02:58:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 02:58:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 02:58:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 02:58:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 09:58:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506030524) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:58:16 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506030524) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506030524', '00376367', '2025-06-03 09:58:11', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000814892556', NULL, '102501090525Y001188', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, '2', '', '20250603B138')
ERROR - 2025-06-03 09:58:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:58:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:58:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250610B259) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 09:58:53 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250610B259) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250610B259', '259', 'B259', 'B', '2025-06-10', '0', '2025-06-03 09:58:51', 'Booking', 'APM', 'Asuransi', 0, '2025-06-10  09:02:32', 0, '1946', '00301546', 84, 260884, 34, 'IRM', '08227110756', '3671095212800009', '1980-12-12', 'dr. DHANI Sp.KFR', 1, 'Asuransi', 72, '130', '200', 'Ok.', '0', '57735', '0001168240026', 'JKN', '314602', '0', '34', '102504030425Y003293', 'PUSKESMAS BAJA', '2025-07-23', 'SAR', '3', NULL, '0223R0380625V000878', '35', 'Belum', 201, 'Rujukan tidak valid')
ERROR - 2025-06-03 09:58:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:59:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:59:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:00:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:00:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 03:00:34 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-03 10:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:00:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:01:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:01:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:01:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 10:01:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:01:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:01:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:02:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:02:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:02:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:02:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:03:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:03:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:03:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:04:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:04:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:05:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:05:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-06-03 10:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:05:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:05:56 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-06-03 10:06:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:06:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:06:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:06:42 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-06-03 10:06:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:06:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:07:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:07:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:07:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 10:07:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:07:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:07:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:07:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:07:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860006, '3', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:07:55 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (860006, '3', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860006, '3', '', '30', '', '', 'PC', '0', '', '0', 'MORN', NULL, '1', 1, '1x1 pulv', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 10:07:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:08:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:08:21 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-15'
AND "id" = ''
ERROR - 2025-06-03 10:08:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:08:26 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-15'
AND "id" = ''
ERROR - 2025-06-03 10:08:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:08:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:08:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:08:40 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A204%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 10:08:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:08:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:08:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:08:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:09:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:09:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:09:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860013, '3', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:09:16 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (860013, '3', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860013, '3', '', '30', '', '', 'PC', '0', '', '0', '', NULL, '0', 1, '1x1 pulv', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 10:09:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 10:09:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 10:09:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 10:09:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 10:09:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 10:09:29 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 10:09:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:09:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:09:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:10:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:10:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:10:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:10:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:10:33 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-06-03 10:10:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:10:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:10:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:11:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:11:01 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-06-03 10:11:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:11:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:11:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:11:21 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-06-03 10:11:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:11:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:11:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:11:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:11:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:12:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:12:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:12:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:12:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:12:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:12:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:12:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:13:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:13:18 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11182
ERROR - 2025-06-03 10:13:20 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-03 10:13:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 887
ERROR - 2025-06-03 10:13:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:13:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:14:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:14:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 03:14:35 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-03 10:15:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:15:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 897
ERROR - 2025-06-03 10:15:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 897
ERROR - 2025-06-03 10:15:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 902
ERROR - 2025-06-03 10:15:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 902
ERROR - 2025-06-03 10:15:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 903
ERROR - 2025-06-03 10:15:17 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 903
ERROR - 2025-06-03 10:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:15:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:15:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:15:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:15:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:16:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:16:02 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A148%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 10:16:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:16:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:16:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:16:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:16:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:16:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:16:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:16:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:16:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 03:16:16 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-03 10:16:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:17:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:17:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:17:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:17:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:17:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:18:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:18:08 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4639346'
ERROR - 2025-06-03 10:18:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:18:11 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4639346'
ERROR - 2025-06-03 10:18:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:18:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:18:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:19:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:19:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:19:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:19:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:20:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:20:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:20:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:20:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 10:20:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:20:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 10:20:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:20:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:20:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:20:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:21:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:21:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:21:29 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-03 10:21:34 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-03 10:21:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:21:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860046, '3', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:21:55 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (860046, '3', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860046, '3', '', '1', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 10:22:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:22:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:22:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:22:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:22:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 03:22:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:22:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:22:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:22:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:23:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:23:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:24:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:24:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:24:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:24:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:24:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:25:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:26:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:26:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:26:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:27:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:27:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:27:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:27:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:27:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:28:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:28:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:28:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:28:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:31:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:31:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:32:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:33:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:34:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:34:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:34:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:34:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:35:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:35:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:35:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:36:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:36:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:36:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:36:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:36:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:36:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:36:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:36:47 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-03 10:36:47 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-03 10:36:47 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-03 10:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:37:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:38:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:39:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:39:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 10:39:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 10:39:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 10:39:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 10:39:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:39:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:40:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-03 12&quot;
LINE 1: ...NULL, &quot;perawatt_cpo&quot; = '494', &quot;jam_tanggal_cpo&quot; = '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:40:09 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-03 12"
LINE 1: ...NULL, "perawatt_cpo" = '494', "jam_tanggal_cpo" = '2025-06-0...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '757692', "id_pendaftaran" = '699562', "id_users" = '1449', "id_data_catatan_perioperatift" = '3921', "suhu_ckp" = '{"suhu_ckp_1":null,"suhu_ckp_2":null,"suhu_ckp_3":null,"suhu_ckp_4":null,"suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":null,"alergi_ckp_4":null}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":null}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":null,"standar_kewaspadaan_ckp_2":null}', "rencana_tindakan_operasi_ckp" = 'apendiktomy', "dokter_operator_ckp" = '67', "rencana_perawatan_pasca_operasi_ckp" = '-', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":null,"verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":null,"verifikasi_pasien_7":null,"verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":null,"verifikasi_pasien_11":null,"verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":null,"verifikasi_pasien_15":null,"verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":null,"verifikasi_pasien_23":null,"verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":null,"verifikasi_pasien_27":null,"verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":null,"verifikasi_pasien_31":null,"verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":null,"verifikasi_pasien_35":null,"verifikasi_pasien_36":"ro thorax (02\/06\/2026) "}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":null,"persiapan_fisik_pasien_3":null,"persiapan_fisik_pasien_4":"jam 01:00","persiapan_fisik_pasien_5":null,"persiapan_fisik_pasien_6":null,"persiapan_fisik_pasien_7":null,"persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":null,"persiapan_fisik_pasien_10":null,"persiapan_fisik_pasien_11":null,"persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":"1","persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":null,"persiapan_fisik_pasien_22":null,"persiapan_fisik_pasien_23":null,"persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":"1","persiapan_fisik_pasien_30":null,"persiapan_fisik_pasien_31":null,"persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":null,"persiapan_fisik_pasien_39":null,"persiapan_fisik_pasien_40":"ceftriaxone 1 gr (06:00)","persiapan_fisik_pasien_41":null,"persiapan_fisik_pasien_42":null,"persiapan_fisik_pasien_43":null,"persiapan_fisik_pasien_44":null,"persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = '135', "jam_pfp" = NULL, "perawat_penerima_ot_ppo" = NULL, "jam_ppo" = NULL, "site_marketing" = '{"site_marketing":"1"}', "perawat_ot_po" = NULL, "jam_tanggal_po" = '2025-06-03 09:00', "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":null,"asuhan_keperawatan_ak_2":null,"asuhan_keperawatan_ak_3":null,"asuhan_keperawatan_ak_4":null,"asuhan_keperawatan_ak_5":null,"asuhan_keperawatan_ak_6":null,"asuhan_keperawatan_ak_7":null,"asuhan_keperawatan_ak_8":null,"asuhan_keperawatan_ak_9":null,"asuhan_keperawatan_ak_10":null,"asuhan_keperawatan_ak_11":null,"asuhan_keperawatan_ak_12":null,"asuhan_keperawatan_ak_13":null,"asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":null,"asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":null,"asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":null,"asuhan_keperawatan_ak_33":null,"asuhan_keperawatan_ak_58":null,"asuhan_keperawatan_ak_34":null,"asuhan_keperawatan_ak_35":null,"asuhan_keperawatan_ak_36":null,"asuhan_keperawatan_ak_37":null,"asuhan_keperawatan_ak_38":null,"asuhan_keperawatan_ak_39":null,"asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":null,"asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":null,"asuhan_keperawatan_ak_45":null,"asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":null,"asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":null,"asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":null,"asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":"1","asuhan_keperawatan_ak_55":"nyeri","asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = NULL, "perawwat_anastesi_pa" = NULL, "perawwat_kamar_bedah" = NULL, "time_out_ckio" = '{"time_out_ckio_1":null,"time_out_ckio_2":null,"time_out_ckio_4":null,"time_out_ckio_5":null,"time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":null,"time_out_ckio_11":null}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":null,"catatan_keperawatan_intra_operasi_2":null,"catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":null,"catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":null,"catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":null,"catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":null,"catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":null,"catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":null,"catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":null,"catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":null,"catatan_keperawatan_intra_operasi_55":null,"catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":null,"catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":null,"catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":null,"catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":null,"catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":null,"catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":null,"catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":null,"catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = NULL, "perawat_instrument_1" = NULL, "perawat_instrument_2" = NULL, "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":null,"asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":null,"asuhan_keperawatannnnn_ak_72":null,"asuhan_keperawatannnnn_ak_73":null,"asuhan_keperawatannnnn_ak_74":null,"asuhan_keperawatannnnn_ak_75":null,"asuhan_keperawatannnnn_ak_76":null,"asuhan_keperawatannnnn_ak_77":null,"asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":null,"asuhan_keperawatannnnn_ak_80":null,"asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":null,"asuhan_keperawatannnnn_ak_84":null,"asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = NULL, "perawwat_anastesi_paa" = NULL, "perawwat_kamar_bedahh" = NULL, "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":"1","catatan_keperawatan_sesudah_operasi_2":"11:30","catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":"12:00"}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":"1","catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":"1","catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":"1","catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":null,"catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":"2","catatan_keperawatan_sesudah_op_14":null,"catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":"1","catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":null,"catatan_keperawatan_sesudah_op_21":"1","catatan_keperawatan_sesudah_op_22":"1","catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":"1","catatan_keperawatan_sesudah_op_25":null,"catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":null,"catatan_keperawatan_sesudah_op_30":"1","catatan_keperawatan_sesudah_op_31":"1","catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":"1","catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":"1","catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":"1","catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":"1","ceklis_persiapan_operasi_2":"1","ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":"1","ceklis_persiapan_operasi_10":"1","ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":"11:30","ceklis_persiapan_operasiii_2":"rl","ceklis_persiapan_operasiii_3":"30","ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":"12:00","jam_cpo_2":"12:00"}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = '494', "jam_tanggal_cpo" = '2025-06-03 12', "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":null,"asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":null,"asssuhan_keperawatannnnn_ak_49":null,"asssuhan_keperawatannnnn_ak_50":null,"asssuhan_keperawatannnnn_ak_51":null,"asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":null,"asssuhan_keperawatannnnn_ak_55":null,"asssuhan_keperawatannnnn_ak_56":null,"asssuhan_keperawatannnnn_ak_57":null,"asssuhan_keperawatannnnn_ak_58":null,"asssuhan_keperawatannnnn_ak_59":null,"asssuhan_keperawatannnnn_ak_60":null,"asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":null,"asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":null,"asssuhan_keperawatannnnn_ak_70":null,"asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":null,"asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = NULL, "perawwat_ruangan_prrr" = NULL, "perawwat_anastesi_paaa" = '494', "perawwat_kamar_bedahhh" = NULL, "updated_at" = '2025-06-03 10:40:09'
WHERE "id_data_catatan_perioperatift" = '3921'
ERROR - 2025-06-03 10:40:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:40:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:41:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:41:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:41:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:41:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:42:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:42:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:42:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:42:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:42:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:43:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:43:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:43:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 03:44:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:44:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:44:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:44:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:45:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:45:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 03:46:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:46:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:46:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:46:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:46:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:46:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 10:46:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 03:46:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:46:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:46:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 03:46:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:46:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:46:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:46:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:46:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:47:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:47:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:48:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:48:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:49:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:49:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:50:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:50:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:50:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:50:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:51:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:51:31 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-06-03 03:51:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 03:51:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:51:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:51:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:52:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:52:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:52:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:52:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:53:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:54:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:54:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:54:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:54:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:55:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:55:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:55:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:55:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:56:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:56:01 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-07-11'
AND "id" = ''
ERROR - 2025-06-03 10:56:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:56:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:56:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:56:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 10:57:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:57:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:57:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:57:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:58:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 10:58:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 10:58:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:59:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:59:14 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-03 10:59:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 887
ERROR - 2025-06-03 10:59:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:59:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:59:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:00:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:00:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:00:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:00:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:00:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:01:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:01:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:01:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:02:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:03:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:03:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 04:03:31 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-03 11:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:04:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:05:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:05:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:05:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:07:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:07:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:07:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:08:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:08:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:08:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:09:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:09:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:10:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:10:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:10:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:10:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:10:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:11:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:11:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:11:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:11:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:12:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:12:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:12:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:13:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 11:13:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:13:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:13:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:13:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:15:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:16:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:17:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:17:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:17:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:17:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:17:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:17:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:17:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:17:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:17:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:17:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:17:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:18:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:18:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:18:44 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-06-03 11:18:44 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-06-03 11:18:44 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-06-03 11:18:44 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-06-03 11:18:44 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-06-03 11:18:44 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-06-03 11:18:44 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-06-03 11:18:44 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-06-03 11:18:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:19:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:19:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:20:17 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-06-03 11:20:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:20:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:20:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:21:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:21:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:21:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:21:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:21:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_radiologi/controllers/api/Hasil_radiologi.php 420
ERROR - 2025-06-03 11:21:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 15:         where dr.id_radiologi = ''
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:21:49 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 15:         where dr.id_radiologi = ''
                                         ^ - Invalid query: select dr.* , rd.kode, lpr.nama as parent, l.nama as layanan_radiologi, lpr.id as id_root,
        coalesce(pgd.nama, '') as dokter,
        coalesce(prad.nama, '') as radiografer,
        case when rd.waktu_hasil is null then 'Konfirm' else 'Diperiksa' end as konfirmasi
        from sm_detail_radiologi dr
        join sm_radiologi rd on (rd.id = dr.id_radiologi)
        join sm_tarif_pelayanan kt on (kt.id = dr.id_tarif)
        join sm_layanan l on (l.id = kt.id_layanan)
        left join sm_layanan lpr on (lpr.id = l.id_parent)
        left join sm_tenaga_medis as tmd on (tmd.id = dr.id_dokter)
        left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)
        left join sm_tenaga_medis as tmr on (tmr.id = dr.id_radiografer)
        left join sm_pegawai as pgr on (pgr.id = tmr.id_pegawai)
        left join sm_pegawai as prad on (prad.id = dr.id_radiografer)
        where dr.id_radiologi = ''
        order by lpr.id
ERROR - 2025-06-03 11:21:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:22:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:22:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 04:22:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 04:22:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:22:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('859927', '11', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:22:11 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('859927', '11', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('859927', '11', '', '', '2 X SEHARI 1 BUNGKUS', '', 'null', '0', '', '0', 'MORN, EVE', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 11:22:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:22:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:22:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:22:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:22:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:22:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:22:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:23:08 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-03 11:23:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 887
ERROR - 2025-06-03 11:23:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:24:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:24:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 11:24:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:24:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:24:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:24:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:24:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:25:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:25:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:25:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:25:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:26:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:26:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:26:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:26:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:27:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:27:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:27:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;id&quot; = ''
                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:27:56 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "id" = ''
                   ^ - Invalid query: SELECT "kuota", "jml_kunjung" as "kuota_terpakai", "shift_poli"
FROM "sm_jadwal_dokter"
WHERE "id_poli" =0
AND "tanggal" = '2025-06-03'
AND "id" = ''
ERROR - 2025-06-03 11:27:58 --> Severity: Notice  --> Trying to get property 'nama_poli' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1122
ERROR - 2025-06-03 11:27:58 --> Severity: Notice  --> Trying to get property 'tanggal_kunjungan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1122
ERROR - 2025-06-03 11:27:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;)&quot;
LINE 10:                  )
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:27:58 --> Query error: ERROR:  syntax error at or near ")"
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
								WHERE id = 582206
ERROR - 2025-06-03 11:28:09 --> Severity: Notice  --> Trying to get property 'nama_poli' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1122
ERROR - 2025-06-03 11:28:09 --> Severity: Notice  --> Trying to get property 'tanggal_kunjungan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1122
ERROR - 2025-06-03 11:28:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;)&quot;
LINE 10:                  )
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:28:09 --> Query error: ERROR:  syntax error at or near ")"
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
								WHERE id = 582206
ERROR - 2025-06-03 11:28:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:28:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:28:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:28:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:28:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:28:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:29:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:29:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:29:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:29:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:29:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:29:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:29:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:29:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:30:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:30:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:30:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:30:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:31:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:31:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:32:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:32:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:32:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:33:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:33:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:33:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:34:28 --> Severity: Notice  --> Undefined index: barcode0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 136
ERROR - 2025-06-03 11:34:28 --> Severity: Notice  --> Undefined index: kemasan0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 137
ERROR - 2025-06-03 11:34:28 --> Severity: Notice  --> Undefined index: isi0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 138
ERROR - 2025-06-03 11:34:28 --> Severity: Notice  --> Undefined index: satuan0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 139
ERROR - 2025-06-03 11:34:28 --> Severity: Notice  --> Undefined index: isi_kecil0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 140
ERROR - 2025-06-03 11:34:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;barcode&quot; violates not-null constraint
DETAIL:  Failing row contains (5014, 3778, null, null, null, null, null, 0). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:34:28 --> Query error: ERROR:  null value in column "barcode" violates not-null constraint
DETAIL:  Failing row contains (5014, 3778, null, null, null, null, null, 0). - Invalid query: INSERT INTO "sm_kemasan_barang" ("id_barang", "barcode", "id_kemasan", "isi", "id_satuan", "isi_satuan") VALUES (3778, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 11:34:31 --> Severity: Notice  --> Undefined index: barcode0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 136
ERROR - 2025-06-03 11:34:31 --> Severity: Notice  --> Undefined index: kemasan0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 137
ERROR - 2025-06-03 11:34:31 --> Severity: Notice  --> Undefined index: isi0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 138
ERROR - 2025-06-03 11:34:31 --> Severity: Notice  --> Undefined index: satuan0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 139
ERROR - 2025-06-03 11:34:31 --> Severity: Notice  --> Undefined index: isi_kecil0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 140
ERROR - 2025-06-03 11:34:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;barcode&quot; violates not-null constraint
DETAIL:  Failing row contains (5015, 3779, null, null, null, null, null, 0). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:34:31 --> Query error: ERROR:  null value in column "barcode" violates not-null constraint
DETAIL:  Failing row contains (5015, 3779, null, null, null, null, null, 0). - Invalid query: INSERT INTO "sm_kemasan_barang" ("id_barang", "barcode", "id_kemasan", "isi", "id_satuan", "isi_satuan") VALUES (3779, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 11:34:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:35:03 --> Severity: Notice  --> Undefined index: barcode0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 136
ERROR - 2025-06-03 11:35:03 --> Severity: Notice  --> Undefined index: kemasan0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 137
ERROR - 2025-06-03 11:35:03 --> Severity: Notice  --> Undefined index: isi0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 138
ERROR - 2025-06-03 11:35:03 --> Severity: Notice  --> Undefined index: satuan0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 139
ERROR - 2025-06-03 11:35:03 --> Severity: Notice  --> Undefined index: isi_kecil0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/barang_rumah_tangga/models/Barang_rumah_tangga_model.php 140
ERROR - 2025-06-03 11:35:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;barcode&quot; violates not-null constraint
DETAIL:  Failing row contains (5016, 3780, null, null, null, null, null, 0). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:35:03 --> Query error: ERROR:  null value in column "barcode" violates not-null constraint
DETAIL:  Failing row contains (5016, 3780, null, null, null, null, null, 0). - Invalid query: INSERT INTO "sm_kemasan_barang" ("id_barang", "barcode", "id_kemasan", "isi", "id_satuan", "isi_satuan") VALUES (3780, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 11:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:35:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:35:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:35:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:36:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:37:03 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 11:37:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:37:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 11:37:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 11:37:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 11:37:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 11:37:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 11:37:39 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 11:37:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:37:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 11:38:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 04:38:54 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-03 11:39:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:39:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:40:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 11:40:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:40:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 04:40:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 04:40:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:40:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:41:04 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 11:41:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:41:25 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD: mmHg, N: x/mn. RR: 20x/mn. S: *C. SPO2: % IVFD: RL/8jam ', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan &lt;80%


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan >80% ; Hasil lab SGOT/SGPT/Biltot/direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:41:25')
ERROR - 2025-06-03 11:41:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:41:35 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD: mmHg, N: x/mn. RR: 20x/mn. S: *C. SPO2: % IVFD: RL/8jam ', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan &lt;80%


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan >80 persen ; Hasil lab SGOT/SGPT/Biltot/direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:41:35')
ERROR - 2025-06-03 11:41:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:41:43 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD: mmHg, N: x/mn. RR: 20x/mn. S: *C. SPO2: % IVFD: RL/8jam ', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan &lt;80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan >80 persen ; Hasil lab SGOT/SGPT/Biltot/direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:41:43')
ERROR - 2025-06-03 11:42:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:42:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:42:22 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 % RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan &lt;80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan >80 persen ; Hasil lab SGOT/SGPT/Biltot/direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:42:22')
ERROR - 2025-06-03 11:42:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:42:31 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan &lt;80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan >80 persen ; Hasil lab SGOT/SGPT/Biltot/direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:42:31')
ERROR - 2025-06-03 11:42:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:42:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:42:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:43:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:03 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan &lt;80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan >80 persen ; Hasil lab SGOT/SGPT/Biltot/direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:03')
ERROR - 2025-06-03 11:43:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:43:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:43:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:29 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT/SGPT/Biltot/direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:29')
ERROR - 2025-06-03 11:43:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:43:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:42 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:42')
ERROR - 2025-06-03 11:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:55 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:55')
ERROR - 2025-06-03 11:43:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:56 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:56')
ERROR - 2025-06-03 11:43:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:56 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:56')
ERROR - 2025-06-03 11:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:57 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:57')
ERROR - 2025-06-03 11:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:57 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:57')
ERROR - 2025-06-03 11:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:57 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:57')
ERROR - 2025-06-03 11:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:57 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:57')
ERROR - 2025-06-03 11:43:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:43:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:58 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:58')
ERROR - 2025-06-03 11:43:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:58 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:58')
ERROR - 2025-06-03 11:43:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:58 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:58')
ERROR - 2025-06-03 11:43:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:58 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:58')
ERROR - 2025-06-03 11:43:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:59 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:59')
ERROR - 2025-06-03 11:43:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:43:59 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:43:59')
ERROR - 2025-06-03 11:44:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:44:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:45:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:45:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:46:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:46:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:46:19 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-03 00:00:00' AND '2025-06-03 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A143%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-03 11:46:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:46:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:47:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 897
ERROR - 2025-06-03 11:47:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 897
ERROR - 2025-06-03 11:47:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 902
ERROR - 2025-06-03 11:47:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 902
ERROR - 2025-06-03 11:47:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 903
ERROR - 2025-06-03 11:47:43 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 903
ERROR - 2025-06-03 11:47:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:47:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:48:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:49:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:49:05 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76 ', NULL, '170 ', NULL, '26,2 ', 'Status gizi obesitas. ', NULL, '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat


Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  

penurunan daya terima makan', ' asupan makan kurang 80 persen


SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', ' 1700 Kkal', '37 gr', '64 gr', '276 gr', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:11', '1436', '1', '440', '1', '2025-06-03 11:49:05')
ERROR - 2025-06-03 11:49:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:49:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:49:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:49:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:49:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:50:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:51:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:51:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:51:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:51:52 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-03 11:51:52 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-03 11:51:52 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-03 11:52:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pasien_id_idx_copy1&quot;
DETAIL:  Key (id)=(00378269) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:52:04 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pasien_id_idx_copy1"
DETAIL:  Key (id)=(00378269) already exists. - Invalid query: INSERT INTO "sm_pasien" ("id", "rm_lama", "tanggal_daftar", "no_identitas", "nama", "status_pasien", "kelamin", "tempat_lahir", "tanggal_lahir", "alamat", "no_prop", "nama_prop", "no_kab", "nama_kab", "no_kec", "nama_kec", "no_kel", "nama_kel", "agama", "gol_darah", "id_pendidikan", "id_pekerjaan", "status_kawin", "nama_ayah", "nama_ibu", "telp", "id_etnis", "etnis_lainnya", "hamkom", "hamkom_lainnya", "status", "disabilitas", "no_rw", "no_rt", "no_rumah", "kode_pos", "is_pegawai_rsud", "email", "last_active") VALUES ('00378269', '', '2025-06-03 11:52:03', '3671065404560002', 'HUSNIMAH', NULL, 'P', 'MEDAN', '1956-04-14', 'KP.DUREN SAWIT NO.54', '36', NULL, '71', NULL, '6', 'CILEDUG', '1004', 'TAJUR', 'Islam', NULL, '2', NULL, 'Belum Kawin', NULL, NULL, '081294764488', '2', NULL, '', NULL, 'Hidup', 0, '004', '004', NULL, NULL, 0, NULL, '2025-06-03 11:52:04')
ERROR - 2025-06-03 11:52:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:52:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:52:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:52:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:52:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:53:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:53:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:53:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:53:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:53:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:53:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:53:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:53:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:53:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:53:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:53:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:53:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:53:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:54:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:54:01 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76', NULL, '170', NULL, '26,2', 'Obesitas', '2', '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat



Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  


penurunan daya terima makan', ' asupan makan kurang 80 persen



SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', '1700', '37', '64', '276', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:24', '1436', '1', '440', '1', '2025-06-03 11:54:01')
ERROR - 2025-06-03 11:54:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 11:54:12 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('700406', '758652', '00139361', '1436', 'Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA Obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis + Low Intake +Hiponatremia 123+ Trombositopenia + GEA ', '2', '1', NULL, NULL, '2', '1', '76', NULL, '170', NULL, '26,2', 'Obesitas', '2', '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '5', NULL, '(2/6/25) RO Thorax diradiologi, HB: 12.0 HT:34 Leu: 8.9 Trom: 127 Nat:123 Kal:4.4 UR: 15 CR: 0.8 SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59 gds: 145mg/dl, HBsAg non reaktif, USG Abdomen (+) exp (-)
', 'Tidak ada alergi makanan. Makan habis 1/4 porsi, wajah meringgis kesakitan, VAS: 5/10, TD : 121/69 mmHg HR : 81 kali/ menit RR: 20 x/menit SpO2 : 99 persen RA S: 36. 6 C', 'Asupan makan inadekuat



Perubahan nilai lab terkait gizi', 'obs jaundice ec Transaminitis susp Hepatitis dd kongesti Hepar +Susp choledocholithiasis  


penurunan daya terima makan', ' asupan makan kurang 80 persen



SGOT:401 SGPT:302 Biltot: 17.27 direk:13.68 indirek:3.59', 'Diet BB RL DJ', '2', '1700', '37', '64', '276', NULL, NULL, '1', '3x makan 2x snack', 'Cakupan makan lebih dari 80 persen ; Hasil lab SGOT,SGPT,Biltot,direk dan indirek mendekati normal', '2025-06-03 11:24', '1436', '1', '440', '1', '2025-06-03 11:54:12')
ERROR - 2025-06-03 11:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:54:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:55:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:55:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:56:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:56:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 04:57:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 04:57:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:57:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:57:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:57:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:57:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:58:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:58:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 11:59:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 04:59:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 04:59:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 04:59:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 04:59:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 04:59:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 04:59:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:00:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:00:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:02:02 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-03 12:02:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 887
ERROR - 2025-06-03 12:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:03:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:03:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:04:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:05:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:06:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:06:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:08:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:10:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:10:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:11:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:11:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 12:11:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:11:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:11:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:11:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 12:12:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 12:12:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:12:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:12:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 12:12:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:12:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 12:12:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:13:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:14:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:14:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 05:15:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 05:15:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:15:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:15:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:16:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:17:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:17:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:18:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:18:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:18:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 12:18:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:19:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:20:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:22:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:23:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:23:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:23:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 12:24:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:24:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:24:49 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-06-03 12:25:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-03 19;00&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-06-03 19;00'...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:25:45 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-03 19;00"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-03 19;00'...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-03 19;00', "id_dokter_dpjp" = '673', "ttd_dokter_dpjp" = '1'
WHERE "id" = '880151'
ERROR - 2025-06-03 12:25:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-03 19;00&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-06-03 19;00'...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:25:46 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-03 19;00"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-03 19;00'...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-03 19;00', "id_dokter_dpjp" = '673', "ttd_dokter_dpjp" = '1'
WHERE "id" = '880151'
ERROR - 2025-06-03 12:26:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-03 19;00&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-06-03 19;00'...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:26:01 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-03 19;00"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-03 19;00'...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-03 19;00', "id_dokter_dpjp" = '673', "ttd_dokter_dpjp" = '1'
WHERE "id" = '880023'
ERROR - 2025-06-03 12:26:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-03 19;00&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-06-03 19;00'...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:26:17 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-03 19;00"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-03 19;00'...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-06-03 19;00', "id_dokter_dpjp" = '673', "ttd_dokter_dpjp" = '1'
WHERE "id" = '879882'
ERROR - 2025-06-03 12:29:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:30:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:30:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 12:30:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:30:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:30:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:31:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:31:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:31:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:31:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:33:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:33:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:33:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:34:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:34:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:34:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:39:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 12:41:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:45:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:47:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:47:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 12:49:19 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 12:49:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 12:49:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 12:49:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 12:49:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 12:49:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 12:49:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 12:49:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 12:50:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:51:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 12:54:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...&quot;lt_bidan&quot;, &quot;lt_perawat&quot;, &quot;created_date&quot;) VALUES ('', '', '8...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:54:49 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ..."lt_bidan", "lt_perawat", "created_date") VALUES ('', '', '8...
                                                             ^ - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('', '', '814', 'pemasangan cvc', 'adhf , edema anasarka, EF 18,8 %', 'adhf , edema anasarka, EF 18,8 %', NULL, 'PERDARAHAN', '10 cc', '2025-06-03', '13:00', '13:15', '0 jam 15 menit', 'Dilakukan pemasangan cvc 
diaseptik , diberi lidocain
dimasukkan cvc melalui v. femoralis (d)
difixasi , dihecting dan diplester
', '1', NULL, NULL, '112', NULL, NULL, '2025-06-03 12:54:49')
ERROR - 2025-06-03 12:55:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...&quot;lt_bidan&quot;, &quot;lt_perawat&quot;, &quot;created_date&quot;) VALUES ('', '', '8...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:55:23 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ..."lt_bidan", "lt_perawat", "created_date") VALUES ('', '', '8...
                                                             ^ - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('', '', '814', 'pemasangan cvc', 'adhf , edema anasarka, EF 18,8 %', 'adhf , edema anasarka, EF 18,8 %', NULL, 'PERDARAHAN', '10 cc', '2025-06-03', '13:00', '13:15', '0 jam 15 menit', 'Dilakukan pemasangan cvc 
diaseptik , diberi lidocain
dimasukkan cvc melalui v. femoralis (d)
difixasi , dihecting dan diplester
', '1', NULL, NULL, '112', NULL, NULL, '2025-06-03 12:55:23')
ERROR - 2025-06-03 12:55:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:55:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 12:56:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...&quot;lt_bidan&quot;, &quot;lt_perawat&quot;, &quot;created_date&quot;) VALUES ('', '', '8...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:56:00 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ..."lt_bidan", "lt_perawat", "created_date") VALUES ('', '', '8...
                                                             ^ - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('', '', '814', 'pemasangan cvc', 'adhf , edema anasarka, EF 18,8 %', 'adhf , edema anasarka, EF 18,8 %', NULL, 'PERDARAHAN', '10 cc', '2025-06-03', '13:00', '13:15', '0 jam 15 menit', 'Dilakukan pemasangan cvc 
diaseptik , diberi lidocain
dimasukkan cvc melalui v. femoralis (d)
difixasi , dihecting dan diplester
', '1', NULL, NULL, '112', NULL, NULL, '2025-06-03 12:56:00')
ERROR - 2025-06-03 12:56:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...&quot;lt_bidan&quot;, &quot;lt_perawat&quot;, &quot;created_date&quot;) VALUES ('', '', '8...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:56:28 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ..."lt_bidan", "lt_perawat", "created_date") VALUES ('', '', '8...
                                                             ^ - Invalid query: INSERT INTO "sm_laporan_tindakan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "lt_nama_tindakan", "lt_diagnosa_sebelum", "lt_diagnosa_sesudah", "lt_pa", "lt_komplikasi", "lt_pendarahan", "lt_tanggal", "lt_waktu_mulai", "lt_waktu_selesai", "lt_lama_waktu", "lt_laporan_tindakan", "lt_paraf_dokter", "lt_paraf_bidan", "lt_paraf_perawat", "lt_dokter", "lt_bidan", "lt_perawat", "created_date") VALUES ('', '', '814', 'pemasangan cvc', 'adhf , edema anasarka, EF 18,8 %', 'adhf , edema anasarka, EF 18,8 %', NULL, 'PERDARAHAN', '10 cc', '2025-06-03', '13:00', '13:15', '0 jam 15 menit', 'Dilakukan pemasangan cvc 
diaseptik , diberi lidocain
dimasukkan cvc melalui v. femoralis (d)
difixasi , dihecting dan diplester
', '1', NULL, '1', '112', NULL, '74', '2025-06-03 12:56:28')
ERROR - 2025-06-03 12:56:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:56:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 12:57:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 12:57:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:57:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 12:59:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 12:59:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:01:30 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-06-03 13:01:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-03 13:02:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:02:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:02:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:03:12 --> Severity: Notice  --> Undefined variable: shifpoli /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/index.php 28
ERROR - 2025-06-03 13:03:28 --> Severity: Notice  --> Undefined variable: shifpoli /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/index.php 28
ERROR - 2025-06-03 13:03:41 --> Severity: Notice  --> Undefined variable: shifpoli /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/index.php 28
ERROR - 2025-06-03 13:03:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:03:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:04:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:04:21 --> Severity: Notice  --> Undefined variable: shifpoli /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/index.php 28
ERROR - 2025-06-03 13:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:04:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:04:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:05:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:05:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 06:05:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 06:05:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 13:05:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 06:05:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 06:05:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 06:05:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 06:05:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 13:05:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:05:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:09:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:10:34 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-03 06:10:47 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-03 13:11:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:11:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:11:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:11:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 06:12:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 06:12:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 06:12:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 06:12:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 13:13:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:15:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:15:32 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-06-03 13:15:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:16:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:19:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:21:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:25:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:25:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:26:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:27:13 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_query_builder.php 486
ERROR - 2025-06-03 13:27:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:27:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:28:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:29:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:31:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:31:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-03 13:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:32:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:34:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 13:35:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:36:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:36:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 13:36:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:36:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 13:36:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:38:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:39:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:39:21 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
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
ERROR - 2025-06-03 13:41:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-06-03 13:41:21 --> Severity: Notice  --> Trying to get property 'success' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-06-03 13:41:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:41:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:42:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:44:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:44:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:44:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:44:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:44:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:44:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:45:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:45:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:45:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:45:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:46:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:46:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 06:46:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 06:46:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 13:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:48:38 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-03 13:48:38 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-03 13:48:38 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-03 13:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:50:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:52:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:52:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:52:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:52:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:52:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:53:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:54:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 13:55:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:55:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:55:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:55:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:55:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:55:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:55:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:55:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:57:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:57:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:57:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:57:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:58:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:58:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:59:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 13:59:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 13:59:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:59:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:59:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:59:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:59:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:59:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:59:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 13:59:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:00:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:00:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:00:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:00:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:00:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:00:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:00:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:00:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:00:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:00:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:00:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:00:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:00:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:00:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:01:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:01:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:01:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:01:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:01:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:01:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:01:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:02:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:02:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:02:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:02:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:02:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:02:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:02:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:02:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:02:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:02:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:02:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:02:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:02:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:02:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:03:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:03:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:04:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:04:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:04:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:04:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:04:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:04:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:04:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:04:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:05:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:05:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:05:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:05:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:05:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:05:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:06:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:06:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:06:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:06:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:06:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:06:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:06:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:06:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:07:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:07:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:08:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:08:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:08:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:08:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:08:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:08:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:09:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:09:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:09:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:09:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:09:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:09:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:09:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:09:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:10:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:10:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:12:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:12:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:12:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:12:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:12:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:12:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:12:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:12:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:13:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:13:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:13:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:13:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:13:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:13:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:13:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:13:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:13:38 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-03 14:13:39 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-03 14:13:39 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-03 14:13:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:13:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:13:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:13:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:14:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:14:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:14:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6325144, '704', 1499.832, '4', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:14:41 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6325144, '704', 1499.832, '4', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6325144, '704', 1499.832, '4', '1.00', 'Ya', 'null')
ERROR - 2025-06-03 14:14:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:14:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:14:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:14:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:14:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:14:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:16:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:16:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:16:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:16:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:16:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:16:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:17:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:17:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:17:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:17:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:17:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:17:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:17:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:17:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:17:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:18:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:18:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:18:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:18:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:18:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:18:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:18:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:18:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:18:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:18:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:18:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:18:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:18:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:18:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:18:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:18:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:19:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-03 14:19:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:19:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:19:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:20:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:20:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:20:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:20:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:20:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:20:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:20:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:20:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:20:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:20:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:20:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:21:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:21:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:21:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:21:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:21:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:21:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:21:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:21:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:21:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:21:44 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-06-03 14:23:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:23:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:23:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:23:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:23:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:23:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:23:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:23:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:23:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:23:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:23:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:23:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:24:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:24:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:24:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:24:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:24:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:24:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:24:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:24:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:24:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:24:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:25:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:06 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:22 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:27 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:31 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:36 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:41 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:47 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:48 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:51 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:52 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:58 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:25:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:25:59 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:10 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:14 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:17 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:26 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:41 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:42 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:51 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:26:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:26:57 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:27:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:27:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:27:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:27:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:27:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:27:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:27:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:27:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:27:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:27:38 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:27:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:27:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:27:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:27:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:27:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:27:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:27:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:27:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:28:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:28:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:28:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:28:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:28:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:28:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:28:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:28:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:28:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:28:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:28:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:28:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:28:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:31 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:37 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:48 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:28:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:28:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:28:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:28:56 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:29:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:29:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:29:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:29:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:29:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:29:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:29:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:29:04 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:29:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:29:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:29:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:29:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:29:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:29:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:30:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:30:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:30:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:30:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:30:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:30:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:30:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:30:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:30:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:31 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:30:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:30:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:53 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:30:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:30:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:30:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:30:57 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:31:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:31:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:31:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:31:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:31:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:31:06 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:31:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:31:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:31:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:31:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:31:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:31:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:31:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:31:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:31:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:31:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:31:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:32:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:32:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:32:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:32:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:32:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:32:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:32:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:32:23 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:32:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:32:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:32:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:32:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:32:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:32:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:32:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:32:28 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:32:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:32:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:33:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:33:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:33:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:33:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:34:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:34:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:34:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:34:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:34:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:34:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:35:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:35:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:35:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:35:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:35:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:35:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:35:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:35:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:35:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:36:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:36:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:36:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:36:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:36:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:36:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:37:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:37:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 07:37:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:37:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:38:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:38:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:38:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:38:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:38:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:38:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:38:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:38:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:39:07 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-06-03 14:39:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:39:15 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-06-03 14:39:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:39:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:39:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:39:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:39:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11902
ERROR - 2025-06-03 14:39:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11902
ERROR - 2025-06-03 07:39:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:39:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:39:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11902
ERROR - 2025-06-03 07:39:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:39:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:39:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:39:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:40:00 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11902
ERROR - 2025-06-03 07:40:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:40:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:40:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:40:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:40:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:40:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:40:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:40:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:40:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:40:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:40:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:40:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:41:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:41:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:41:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:41:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:41:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 07:41:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:41:41 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8923
ERROR - 2025-06-03 14:41:41 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12515
ERROR - 2025-06-03 14:41:41 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12519
ERROR - 2025-06-03 14:41:41 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12529
ERROR - 2025-06-03 14:41:41 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12533
ERROR - 2025-06-03 14:41:41 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8938
ERROR - 2025-06-03 14:41:41 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8943
ERROR - 2025-06-03 14:41:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:41:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:41:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:41:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:41:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:41:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:41:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:41:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:41:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:41:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:41:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:41:50 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:41:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:41:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:42:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:42:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:42:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:42:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:42:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:42:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:42:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:42:09 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 07:42:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:42:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:42:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:42:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:42:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:42:18 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 07:42:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:42:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:42:27 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 07:42:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:42:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:42:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:42:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 07:42:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:42:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:43:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 07:43:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:43:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:43:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:43:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 14:43:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:43:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:43:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:43:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:43:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:43:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 07:43:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:43:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:43:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:43:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:43:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:43:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:43:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:43:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:43:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:43:32 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 07:43:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:43:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:43:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:43:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:43:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:43:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:43:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:43:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:43:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:43:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:43:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:43:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 07:43:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:43:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 07:44:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-06-03 14:44:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:44:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:45:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:45:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:45:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:45:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:45:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:45:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:45:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:46:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:46:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:46:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:46:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:46:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:46:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:46:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:46:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:46:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:46:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:46:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:46:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:46:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:46:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:47:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:47:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:47:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:47:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:47:27 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-03 14:47:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:47:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:47:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:47:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:48:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:48:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:48:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:48:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:48:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:48:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:48:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:48:24 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:48:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:48:26 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:48:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:48:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:48:36 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:49:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:49:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:49:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:49:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:49:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:49:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:49:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:49:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:49:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:49:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:49:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:49:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:50:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:50:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:50:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:50:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:50:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:50:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:50:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:50:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:50:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:50:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:50:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:50:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:50:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:50:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:50:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:50:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:51:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:51:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:51:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:51:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:51:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:51:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:51:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:22 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-03 14:52:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:22 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-03 14:52:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:22 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-03 14:52:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:52:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:52:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:53:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:53:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:53:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:53:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:54:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:54:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:54:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:23 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:27 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:30 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:54:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:54:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:54:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:54:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:47 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:49 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:54:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:52 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:54:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:54:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:54:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:55:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:55:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:55:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:55:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:55:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-06-03 14:55:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-06-03 14:55:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-06-03 14:55:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:55:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:55:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:55:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:55:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:55:13 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:55:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:55:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:55:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:55:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:55:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:55:15 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:55:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-06-03 14:55:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-06-03 14:55:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-06-03 14:56:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:56:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:56:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:23 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:56:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:56:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:27 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:29 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:32 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:56:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:56:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:56:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:56:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:56:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:56:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:56:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:56:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:56:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:57:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:57:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:57:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:57:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:57:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:57:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:57:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:57:04 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:57:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:57:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:57:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:57:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:57:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:57:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:57:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:57:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:57:09 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:57:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:57:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:57:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:57:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:57:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:57:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:57:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:57:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:58:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:58:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:58:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:58:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:58:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:58:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:58:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:58:04 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:58:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:58:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:58:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:58:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:58:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:58:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:58:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:58:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:58:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 14:58:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:58:38 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 14:58:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:58:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:58:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:58:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:59:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:59:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:59:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:59:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:59:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 14:59:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:00:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:00:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:00:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 15:00:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 15:00:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 15:00:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 878
ERROR - 2025-06-03 15:00:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 15:00:11 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 881
ERROR - 2025-06-03 15:00:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:00:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:00:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:00:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:00:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:00:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:00:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:01:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:01:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:02:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:02:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:02:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:02:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:02:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:02:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:02:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:02:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:02:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:02:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:03:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:03:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:03:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:03:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:03:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:03:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:03:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:03:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:03:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:04:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:04:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:04:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:04:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:04:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:04:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:04:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:05:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:05:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:05:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:05:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:05:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:05:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:05:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:05:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:05:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:05:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:05:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:06:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:06:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:07:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:07:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:07:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:07:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:07:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:07:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:07:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:07:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:07:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:07:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:07:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:07:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:08:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:08:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:08:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:08:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:08:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:08:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:09:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:09:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:09:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:09:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:10:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:10:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:10:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:10:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:10:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:10:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:10:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:11:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:11:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:11:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:11:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:11:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:11:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:11:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:11:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:11:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:12:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:12:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:12:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:12:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:12:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:12:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:12:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:12:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:12:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:12:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:13:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:13:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:13:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:13:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:14:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:14:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:14:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:14:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:14:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:14:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:14:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:14:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:15:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:15:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:16:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:16:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:16:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:16:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:16:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:16:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:16:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:16:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:16:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:16:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:17:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:17:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:17:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:17:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:17:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:17:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:17:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:17:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:17:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:17:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:17:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:17:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:18:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:18:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:18:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:18:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:18:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:18:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:18:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:18:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:19:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:19:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:19:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:19:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:19:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:19:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:19:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:19:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:19:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:19:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:19:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:19:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:19:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:19:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:20:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:20:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:20:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:20:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:20:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:20:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:20:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:20:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:21:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:21:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:21:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:21:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:21:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:21:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:21:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:21:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:22:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:22:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:22:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:22:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:22:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:22:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:22:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:22:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 08:23:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:23:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:23:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:23:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:23:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:23:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:23:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:23:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:24:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:24:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:24:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:24:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 08:24:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:24:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:24:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:24:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 08:24:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:24:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:24:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:24:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:24:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:24:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:24:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:25:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:25:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:26:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:26:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:26:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:26:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:26:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:26:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:26:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:26:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:26:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:26:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:27:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:27:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:27:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:27:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:27:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:27:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:27:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:27:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:27:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:28:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:28:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:28:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:28:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:28:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:28:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:28:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 15:29:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:29:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:29:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:29:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:30:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:30:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:30:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:30:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:32:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:32:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:32:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:32:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:32:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:32:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:32:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 08:32:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 08:32:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:33:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:33:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:34:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:34:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:34:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:34:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:35:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:35:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:35:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:35:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:35:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:36:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:36:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:36:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:36:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:38:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:38:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:38:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:38:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:38:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6326635, '887', 1272, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:38:46 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6326635, '887', 1272, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6326635, '887', 1272, '1', '1.00', NULL, 'null')
ERROR - 2025-06-03 15:40:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:40:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:40:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:40:14 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-03 15:40:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:40:14 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-03 15:40:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:40:14 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-03 15:40:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:40:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:40:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:40:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:40:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:40:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:41:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 15:43:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:43:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:43:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:44:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:44:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:44:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 15:48:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6326699, '678', 192, '4', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 15:48:25 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6326699, '678', 192, '4', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6326699, '678', 192, '4', '10.00', 'Ya', 'null')
ERROR - 2025-06-03 15:54:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 15:59:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 16:00:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('860275', '5', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 16:00:32 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('860275', '5', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('860275', '5', '', '2', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 16:02:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 16:02:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 16:02:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 16:03:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 09:04:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:04:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:05:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:06:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:08:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:08:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:08:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 09:08:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:10:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Pelayanan' does not have a method 'index_get' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 16:10:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Pelayanan' does not have a method 'index_get' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 16:10:17 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Pelayanan' does not have a method 'index_get' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 16:17:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6326754, '922', 1017.648, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 16:17:36 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6326754, '922', 1017.648, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6326754, '922', 1017.648, '1', '2.00', NULL, 'null')
ERROR - 2025-06-03 16:24:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 16:25:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 16:25:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 16:28:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 09:29:48 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-03 09:30:05 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-03 16:41:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 16:41:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 09:42:03 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-03 16:42:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 16:42:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 16:43:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 16:43:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 09:45:28 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-03 16:50:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 16:50:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 16:54:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 16:58:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 16:58:26 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-03 10:02:31 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-03 17:09:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:13:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:13:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:17:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 17:17:57 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('758688', '2025-06-03 17:16', '8', '', '', '', '', '', '', '', '', 'Nyeri pinggang', '139/85 Nadi : 98x/mnt, Suhu : 36.2C, RR : 20 x/mnt, SPO2 : 98 �domen: supel, bu(+), nte (+)
', 'LBP ec fracture L1 + HT urgensi + susp nefrolitiasis + anemia', 'lapor hasil usg dengan dr. Ryandri, Sp.PD ', '738', '1', '<p>sudah konfirmasi ulang  hasil usg dengan dr. Ryandri, Sp.PD </p><p>advice: </p><p>konsul Urologi </p>', NULL, '738', '1', NULL, '2025-06-03 17:17:57')
ERROR - 2025-06-03 17:18:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 17:18:01 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('758688', '2025-06-03 17:16', '8', '', '', '', '', '', '', '', '', 'Nyeri pinggang', '139/85 Nadi : 98x/mnt, Suhu : 36.2C, RR : 20 x/mnt, SPO2 : 98 �domen: supel, bu(+), nte (+)
', 'LBP ec fracture L1 + HT urgensi + susp nefrolitiasis + anemia', 'lapor hasil usg dengan dr. Ryandri, Sp.PD ', '738', '1', '<p>sudah konfirmasi ulang  hasil usg dengan dr. Ryandri, Sp.PD </p><p>advice: </p><p>konsul Urologi </p>', NULL, '738', '1', NULL, '2025-06-03 17:18:01')
ERROR - 2025-06-03 17:18:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 17:18:55 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('758688', '2025-06-03 17:18', '8', '', '', '', '', '', '', '', '', 'Nyeri pinggang', 'TD C139/85 Nadi : 98x/mnt, Suhu : 36.2C, RR : 20 x/mnt, SPO2 : 98 �domen: supel, bu(+), nte (+)
', 'LBP ec fracture L1 + HT urgensi + susp nefrolitiasis + anemia', 'lapor hasil usg dengan dr. Ryandri, Sp.PD ', '738', '1', 'sudah konfirmasi ulang  hasil usg dengan dr. Ryandri, Sp.PD <div></div><div>advice: </div><div>konsul Urologi </div><div></div>', NULL, '738', '1', NULL, '2025-06-03 17:18:55')
ERROR - 2025-06-03 17:19:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 17:19:04 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('758688', '2025-06-03 17:18', '8', '', '', '', '', '', '', '', '', 'Nyeri pinggang', 'TD C139/85 Nadi : 98x/mnt, Suhu : 36.2C, RR : 20 x/mnt, SPO2 : 98 �domen: supel, bu(+), nte (+)
', 'LBP ec fracture L1 + HT urgensi + susp nefrolitiasis + anemia', 'lapor hasil usg dengan dr. Ryandri, Sp.PD ', '738', '1', 'sudah konfirmasi ulang  hasil usg dengan dr. Ryandri, Sp.PD <div></div><div>advice: </div><div>konsul Urologi </div><div></div>', NULL, '738', '1', NULL, '2025-06-03 17:19:04')
ERROR - 2025-06-03 17:19:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:20:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:20:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:20:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:20:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:20:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:20:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:20:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:20:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:22:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 17:22:33 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('758667', '2025-06-03 17:19', '8', '', '', '', '', '', '', '', '', 'Lemas anggota gerak sisi kiri
', 'Kesadaran : ComposMentis GCS : 15.
TD : 130/101 Nadi : 91x/mnt, Suhu : 36.2C, RR : 20 x/mnt, SPO2 : 98 �domen: supel, bu(+), nte (+)', 'hemiparese sinistra susp. CVD + HT+ DM', 'lapor hasil lab HBa1c dengan dr. Ryandri, Sp.PD ', '738', '1', '<p>sudah konfirmasi ulang hasil lab HBa1c dengan dr. Ryandri, Sp.PD </p><p>advice: </p>', NULL, '738', '1', NULL, '2025-06-03 17:22:33')
ERROR - 2025-06-03 17:30:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 17:39:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 17:39:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 17:46:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 10:47:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:47:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:47:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:47:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:48:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:48:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:48:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 10:48:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:59:12 --> Severity: Notice  --> Undefined index: id_pegawai /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/views/index.php 8
ERROR - 2025-06-03 18:00:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 18:00:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 18:00:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (6326905, '525', 3545.784, '25', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 18:00:15 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (6326905, '525', 3545.784, '25', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6326905, '525', 3545.784, '25', '1.00', NULL, 'null')
ERROR - 2025-06-03 18:00:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 18:00:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 11:06:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:06:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 11:07:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 18:11:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-04 12&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '159', '97', '2025-06-03 16:00', '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 18:11:27 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-04 12"
LINE 1: ...ria_lain":""}}', '159', '97', '2025-06-03 16:00', '2025-06-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('759441', '2025-06-03 15:00', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'nyeri ', '4 hari sebelum masuk rs ', '4 hari sebelum masuk Rs ', '{"infeksi":"","lain":"","ket_lain":""}', '', 'pasien mengatakan  bengkak pada pipi kiri dan terasa nyeri. gigi bolong di kiri bawah  bagian belakang . pasien hanya bia membuka mulut 1 jari saja ', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada "}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada "}', '{"dirawat":"1","kapan":"sc 2023 ","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada ', 'tidak ada ', 'tidak ada ', 'tidak ada ', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '121', '75', '90', '36.7', '20', NULL, '50', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"1","ket_lain":"sulit membuka mulut "}', '{"tidak_ada_kelainan":"","caries":"","goyang":"","palsu":"","lain":"1","ket_lain":"gigi bolong "}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"1","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', '', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', 'Hygiene', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'ibadah , sholat ', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'istirahat ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', '', 'Normal', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', 'Ringan', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', '0', NULL, NULL, '20', '0', NULL, NULL, '0', NULL, '20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"1","kriteria_7":"","kriteria_8":"1","kriteria_9":"","kriteria_lain":""}}', '159', '97', '2025-06-03 16:00', '2025-06-04 12', NULL, '1', '2025-06-03 18:11:27')
ERROR - 2025-06-03 18:11:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-04 12&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '159', '97', '2025-06-03 16:00', '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 18:11:32 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-04 12"
LINE 1: ...ria_lain":""}}', '159', '97', '2025-06-03 16:00', '2025-06-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('759441', '2025-06-03 15:00', 'Kursi Roda', '{"pasien":"1","keluarga":"","lain":"","ket_lain":""}', 'nyeri ', '4 hari sebelum masuk rs ', '4 hari sebelum masuk Rs ', '{"infeksi":"","lain":"","ket_lain":""}', '', 'pasien mengatakan  bengkak pada pipi kiri dan terasa nyeri. gigi bolong di kiri bawah  bagian belakang . pasien hanya bia membuka mulut 1 jari saja ', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada "}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada "}', '{"dirawat":"1","kapan":"sc 2023 ","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada ', 'tidak ada ', 'tidak ada ', 'tidak ada ', '0', '0', '', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '121', '75', '90', '36.7', '20', NULL, '50', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"1","ket_lain":"sulit membuka mulut "}', '{"tidak_ada_kelainan":"","caries":"","goyang":"","palsu":"","lain":"1","ket_lain":"gigi bolong "}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"1","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', '', '0', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', 'Hygiene', '', '', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'ibadah , sholat ', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'istirahat ', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', '', 'Normal', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', 'Ringan', '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', '0', NULL, NULL, '20', '0', NULL, NULL, '0', NULL, '20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"1","kriteria_7":"","kriteria_8":"1","kriteria_9":"","kriteria_lain":""}}', '159', '97', '2025-06-03 16:00', '2025-06-04 12', '1', '1', '2025-06-03 18:11:32')
ERROR - 2025-06-03 18:30:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 18:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 18:46:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 18:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 18:52:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:52:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:52:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:52:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:52:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:52:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:02 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:02 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:02 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:02 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:02 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 18:53:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 18:54:19 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-06-03 18:54:19 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-06-03 18:54:19 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-06-03 18:54:19 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-06-03 18:55:07 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-03 18:55:07 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-03 18:55:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-03 18:56:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 18:56:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 18:56:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 18:56:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 18:56:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 19:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 19:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 19:12:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6327017, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:12:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6327017, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6327017, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
ERROR - 2025-06-03 19:14:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:14:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 19:14:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:14:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 12:16:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:16:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:26:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:26:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:26:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:26:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:27:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:27:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:27:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:27:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:27:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 12:27:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 19:32:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (860338, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:32:06 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (860338, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (860338, '2', '', '', '', '', 'PC', '0', '', '0', '', 'untuk infus', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-03 19:32:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 19:32:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:32:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 19:32:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:32:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 19:32:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:32:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 19:34:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:34:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 19:34:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:34:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 19:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 19:43:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11727
ERROR - 2025-06-03 19:48:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-03 19:58:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 19:58:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 20:09:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 20:09:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 13:13:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 13:13:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 20:14:44 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-03 20:16:54 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 20:16:54 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 13:16:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 13:16:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 20:17:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 20:17:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 20:17:22 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 20:17:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 20:19:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6327138, '78', 13200.12, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 20:19:23 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6327138, '78', 13200.12, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6327138, '78', 13200.12, '1', '1.00', NULL, 'null')
ERROR - 2025-06-03 20:19:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 20:19:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 20:19:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-03 20:24:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 20:24:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 20:24:42 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 20:24:42 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 20:25:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 20:25:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 20:30:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 20:30:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 20:39:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 21:01:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 21:14:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 21:22:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6327183, '887', 1272, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 21:22:04 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6327183, '887', 1272, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6327183, '887', 1272, '1', '2.00', NULL, 'null')
ERROR - 2025-06-03 21:23:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 21:23:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 21:24:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 14:30:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:30:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:30:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:30:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:30:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:30:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 21:34:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 21:41:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 21:41:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 14:42:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:42:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:42:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 14:42:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 21:47:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 21:47:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 21:51:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11727
ERROR - 2025-06-03 22:02:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 22:02:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 22:02:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 22:02:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 22:04:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 22:04:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 22:04:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 22:07:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 22:07:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-03 22:07:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 22:07:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-03 15:13:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:13:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:13:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:13:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:14:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:14:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:14:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:14:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 22:30:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 22:35:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6327361, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 22:35:15 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6327361, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6327361, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-06-03 22:47:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 22:47:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 22:48:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 22:48:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 15:49:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:49:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:52:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:52:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:52:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:52:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:52:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 15:52:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 22:59:50 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-03 16:00:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:00:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:01:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:01:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:01:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:01:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:01:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:01:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:08:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 16:08:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 23:09:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:09:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:09:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:09:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:09:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:09:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:10:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:10:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:10:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:10:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:10:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:10:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:11:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:11:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:17:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 23:25:24 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-03 23:25:24 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-03 23:25:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-03 23:25:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:25:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:25:44 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-03 23:25:44 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-03 23:25:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-03 23:29:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-03 23:37:04 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 23:37:04 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 23:37:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-03 23:37:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-03 23:38:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:38:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:38:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:38:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-03 23:45:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6327569, '60', 130.8, '1', '5.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-03 23:45:54 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6327569, '60', 130.8, '1', '5.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6327569, '60', 130.8, '1', '5.00', NULL, 'null')
ERROR - 2025-06-03 17:02:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:02:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:03:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:03:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:03:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:03:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:03:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:03:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:03:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:03:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:09:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:09:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:09:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:09:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:09:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:09:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:09:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:09:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:11:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:11:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-03 17:13:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
