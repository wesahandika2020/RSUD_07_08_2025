<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-08 00:11:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 00:11:33 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
LINE 11: WHERE "pd"."id" = 'undefined'
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
WHERE "pd"."id" = 'undefined'
ERROR - 2025-06-08 00:12:39 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-06-08 00:20:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 01:26:10 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-08 01:26:10 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-08 01:48:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 01:48:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 01:53:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 01:53:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 01:53:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 01:53:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 01:53:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6353098, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 01:53:38 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6353098, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6353098, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-08 01:53:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 01:53:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 01:54:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 01:54:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 02:16:22 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-08 02:16:24 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-08 02:36:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 03:23:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 03:29:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 03:53:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:53:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:53:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:53:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:54:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:54:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:54:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:54:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:54:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:54:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:59:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:59:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:59:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:59:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:59:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:59:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:59:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 03:59:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:00:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:00:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:00:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:00:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:00:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:00:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:00:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:00:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:00:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:00:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:01:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:01:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:01:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:01:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:02:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:02:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:03:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:03:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:03:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:03:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:05:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:05:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:05:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:05:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:05:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:05:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:06:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:06:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:06:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:06:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:06:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:06:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:07:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:07:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:07:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:07:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:08:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:08:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:10:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:10:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:10:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:10:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:10:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:10:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:10:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:10:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:10:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6353155, '692', 20406, '10', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:10:45 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6353155, '692', 20406, '10', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6353155, '692', 20406, '10', '1.00', 'Ya', 'null')
ERROR - 2025-06-08 04:11:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:11:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:11:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:11:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:11:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:11:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:11:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:11:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:57:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:57:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 04:57:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 04:57:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:15:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:15:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:15:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:15:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:15:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:15:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:16:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:16:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:16:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:16:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:16:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:16:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:17:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:17:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:17:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:17:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:32:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 05:40:40 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-08 05:50:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:50:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 05:51:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 05:51:50 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8403
ERROR - 2025-06-08 06:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 06:32:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:32:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 06:33:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:33:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 06:33:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:33:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 06:33:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:33:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 06:33:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:33:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 06:35:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:35:19 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761836', '2025-06-08 06:31', '18', 'Pasien mengatakan nyeri dada mulai berkurang, nyeri seperti diremas, nyeri dada hilang timbul, nyeri tidak dipengaruhi aktivitas, tidak ada penjalaran, nafas sesak saat nyeri muncul


', 'Keadaan umum: sedang, Kes: Composmentis, GCS 15, EWS : Hijau (2) , Akral hangat, nadi teraba kuat, TD : 130/85  mmHg, Nadi : 86 x/mnt, Suhu : 36,4 C, RR : 20x/mnt, Spo2 : 98Þngan nasal kanul 3 lpm, Skala nyeri 3/10 Lab Tgl 7/6 Hemoglobin L 11.5 Hematokrit L 34 Leukosit 5.0 Trombosit L 133 Troponin T &lt; 40 Ureum H 51 mg/dL Kreatinin H 1.5, Thorax tgl 7/6

', '1. Nyeri akut 2. Penurunan Curah Jantung', '', '', '', '', '', '', '', '', '', '1533', '1', 'C/ UL T`Hasil', NULL, '1533', 0, NULL, '2025-06-08 06:35:19')
ERROR - 2025-06-08 06:35:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:35:31 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761836', '2025-06-08 06:31', '18', 'Pasien mengatakan nyeri dada mulai berkurang, nyeri seperti diremas, nyeri dada hilang timbul, nyeri tidak dipengaruhi aktivitas, tidak ada penjalaran, nafas sesak saat nyeri muncul


', 'Keadaan umum: sedang, Kes: Composmentis, GCS 15, EWS : Hijau (2) , Akral hangat, nadi teraba kuat, TD : 130/85  mmHg, Nadi : 86 x/mnt, Suhu : 36,4 C, RR : 20x/mnt, Spo2 : 98Þngan nasal kanul 3 lpm, Skala nyeri 3/10 Lab Tgl 7/6 Hemoglobin L 11.5 Hematokrit L 34 Leukosit 5.0 Trombosit L 133 Troponin T &lt; 40 Ureum H 51 mg/dL Kreatinin H 1.5, Thorax tgl 7/6

', '1. Nyeri akut 2. Penurunan Curah Jantung', '', '', '', '', '', '', '', '', '', '1533', '1', 'C/ UL T`Hasil', NULL, '1533', 0, NULL, '2025-06-08 06:35:31')
ERROR - 2025-06-08 06:35:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 06:35:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:35:47 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761836', '2025-06-08 06:31', '18', 'Pasien mengatakan nyeri dada mulai berkurang, nyeri seperti diremas, nyeri dada hilang timbul, nyeri tidak dipengaruhi aktivitas, tidak ada penjalaran, nafas sesak saat nyeri muncul


', 'Keadaan umum: sedang, Kes: Composmentis, GCS 15, EWS : Hijau (2) , Akral hangat, nadi teraba kuat, TD : 130/85  mmHg, Nadi : 86 x/mnt, Suhu : 36,4 C, RR : 20x/mnt, Spo2 : 98Þngan nasal kanul 3 lpm, Skala nyeri 3/10 Lab Tgl 7/6 Hemoglobin L 11.5 Hematokrit L 34 Leukosit 5.0 Trombosit L 133 Troponin T &lt; 40 Ureum H 51 mg/dL Kreatinin H 1.5, Thorax tgl 7/6

', '1. Nyeri akut 2. Penurunan Curah Jantung', '', '', '', '', '', '', '', '', '', '1533', '1', 'C/ UL T`Hasil', NULL, '1533', 0, NULL, '2025-06-08 06:35:47')
ERROR - 2025-06-08 06:36:16 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-08 06:36:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 06:36:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:36:32 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761836', '2025-06-08 06:31', '18', 'Pasien mengatakan nyeri dada mulai berkurang, nyeri seperti diremas, nyeri dada hilang timbul, nyeri tidak dipengaruhi aktivitas, tidak ada penjalaran, nafas sesak saat nyeri muncul
', 'Keadaan umum: sedang, Kes: Composmentis, GCS 15, EWS : Hijau (2) , Akral hangat, nadi teraba kuat, TD : 130/85  mmHg, Nadi : 86 x/mnt, Suhu : 36,4 C, RR : 20x/mnt, Spo2 : 98Þngan nasal kanul 3 lpm, Skala nyeri 3/10 Lab Tgl 7/6 Hemoglobin L 11.5 Hematokrit L 34 Leukosit 5.0 Trombosit L 133 Troponin T &lt; 40 Ureum H 51 mg/dL Kreatinin H 1.5, Thorax tgl 7/6

', '1. Nyeri akut 2. Penurunan Curah Jantung', '', '', '', '', '', '', '', '', '', '1533', '1', '-Cek UL T`Hasil', NULL, '1533', 0, NULL, '2025-06-08 06:36:32')
ERROR - 2025-06-08 06:36:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 06:54:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 06:56:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:56:02 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:56:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:56:04 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:56:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:56:12 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:56:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:56:15 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:56:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:56:22 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:56:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:56:52 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:56:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:56:53 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:06 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:07 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:08 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:08 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:10 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:26 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:28 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:30 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:31 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:32 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:33 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:34 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:34 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:35 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:36 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:38 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:38 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:39 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:40 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:57:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:57:40 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:22 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:24 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:25 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:27 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:28 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:31 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:33 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:34 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:35 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:36 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:37 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:39 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:40 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:58:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:58:40 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:59:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:59:45 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:59:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:59:47 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:59:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:59:48 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:59:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:59:52 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:59:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:59:52 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 06:59:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 06:59:53 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:05:04 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-08 07:05:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 07:05:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 07:07:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 07:08:17 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-08 07:08:17 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-08 07:08:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-08 07:08:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-08 07:10:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:10:08 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:10:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:10:17 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:10:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:10:19 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:10:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:10:25 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:11:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:11:02 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:11:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:11:30 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:11:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:11:32 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:11:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:11:34 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:11:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 07:11:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:11:36 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:11:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:11:37 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:11:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 07:11:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:11:38 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:11:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:11:42 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:33 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:34 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:35 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:36 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:37 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:37 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:50 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:50 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:52 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:53 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:12:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:12:58 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:00 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:01 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:04 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:05 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:09 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:12 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:14 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:15 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:18 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:19 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:19 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:20 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:25 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:43 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:44 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:45 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:56 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:57 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:13:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:13:58 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:14:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot convert infinity to numeric /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:14:02 --> Query error: ERROR:  cannot convert infinity to numeric - Invalid query: SELECT CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "stn"."nama", "sed"."nama", '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, '0') as diskon, CEIL(penjd.harga_jual) harga_jual, "penjd"."qty", ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total, "penjd"."reimburse"
FROM "sm_detail_penjualan" as "penjd"
JOIN "sm_penjualan" as "p" ON "p"."id" = "penjd"."id_penjualan"
JOIN "sm_kemasan_barang" as "kb" ON "kb"."id" = "penjd"."id_kemasan"
JOIN "sm_barang" as "b" ON "b"."id" = "kb"."id_barang"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
LEFT JOIN "sm_sediaan" as "sed" ON "sed"."id" = "b"."id_sediaan"
LEFT JOIN "sm_satuan" as "stn" ON "stn"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "penjd"."id_asuransi"
WHERE "penjd"."id_penjualan" = '1316596'
AND "qty" >0
ERROR - 2025-06-08 07:14:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 07:15:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 07:16:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:16:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 07:17:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:17:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 07:18:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 07:18:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 07:21:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-08 07:21:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 07:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 07:38:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 07:42:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 07:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 07:55:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 07:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 08:00:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 08:04:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 08:04:52 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
LINE 11: WHERE "pd"."id" = 'undefined'
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
WHERE "pd"."id" = 'undefined'
ERROR - 2025-06-08 08:07:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-06-08 08:07:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-06-08 08:07:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-06-08 08:08:03 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-06-08 08:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 08:11:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-06-08 08:11:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-06-08 08:11:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-06-08 08:12:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 08:20:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 08:23:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 01:28:09 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 01:28:09 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 01:28:09 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 01:28:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 01:28:09 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 01:28:09 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 01:28:15 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 01:28:15 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 01:28:15 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 01:28:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 01:28:15 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 01:28:15 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 08:32:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-06-08 08:32:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-06-08 08:32:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-06-08 08:32:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 01:33:19 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 01:33:19 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 01:33:19 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 01:33:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 01:33:19 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 01:33:19 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 08:39:05 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-06-08 08:39:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 08:39:11 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-06-08 08:39:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-06-08 08:39:16 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-06-08 08:43:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 08:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 01:50:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 01:50:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 01:56:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 01:56:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 01:56:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 01:56:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 09:04:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-08 12.00&quot;
LINE 1: ...i_dokter_dpjp&quot;, &quot;created_date&quot;) VALUES ('761912', '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:04:06 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-08 12.00"
LINE 1: ...i_dokter_dpjp", "created_date") VALUES ('761912', '2025-06-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('761912', '2025-06-08 12.00', '', '{"pasien":"","keluarga":"","lain":"","ket_lain":""}', '', '', '', '{"infeksi":"","lain":"","ket_lain":""}', '', '', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"","gcs_m":"","gcs_v":""}', '', '', '', '', '', NULL, NULL, '{"vesikuler":"","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"","lain":"","ket_lain":""}', '', '0', '0', '0', '{"normal":"","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"","lain":"","ket_lain":""}', '{"baik":"","sedang":"","buruk":""}', '{"normal":"","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', '', '', '', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', '', 'Normal', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '{"hambatan_1":"","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', NULL, '358', '2025-06-08 09:03', '2025-06-09 11:06', NULL, '1', '2025-06-08 09:04:06')
ERROR - 2025-06-08 09:04:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:04:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 09:04:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-08 12.00&quot;
LINE 1: ...i_dokter_dpjp&quot;, &quot;created_date&quot;) VALUES ('761912', '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:04:11 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-08 12.00"
LINE 1: ...i_dokter_dpjp", "created_date") VALUES ('761912', '2025-06-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('761912', '2025-06-08 12.00', '', '{"pasien":"","keluarga":"","lain":"","ket_lain":""}', '', '', '', '{"infeksi":"","lain":"","ket_lain":""}', '', '', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"","gcs_m":"","gcs_v":""}', '', '', '', '', '', NULL, NULL, '{"vesikuler":"","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"","lain":"","ket_lain":""}', '', '0', '0', '0', '{"normal":"","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"","lain":"","ket_lain":""}', '{"baik":"","sedang":"","buruk":""}', '{"normal":"","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', '', '', '', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', '', 'Normal', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '{"hambatan_1":"","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', NULL, '358', '2025-06-08 09:03', '2025-06-09 11:06', NULL, '1', '2025-06-08 09:04:11')
ERROR - 2025-06-08 09:04:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:04:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 09:04:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-08 12&quot;
LINE 1: ...i_dokter_dpjp&quot;, &quot;created_date&quot;) VALUES ('761912', '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:04:26 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-08 12"
LINE 1: ...i_dokter_dpjp", "created_date") VALUES ('761912', '2025-06-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('761912', '2025-06-08 12', '', '{"pasien":"","keluarga":"","lain":"","ket_lain":""}', '', '', '', '{"infeksi":"","lain":"","ket_lain":""}', '', '', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"","gcs_m":"","gcs_v":""}', '', '', '', '', '', NULL, NULL, '{"vesikuler":"","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"","lain":"","ket_lain":""}', '', '0', '0', '0', '{"normal":"","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"","lain":"","ket_lain":""}', '{"baik":"","sedang":"","buruk":""}', '{"normal":"","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', '', '', '', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', '', 'Normal', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '{"hambatan_1":"","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', NULL, NULL, '2025-06-08 09:04', NULL, NULL, NULL, '2025-06-08 09:04:26')
ERROR - 2025-06-08 09:04:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-08 10.10&quot;
LINE 1: ...i_dokter_dpjp&quot;, &quot;created_date&quot;) VALUES ('761912', '2025-06-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:04:47 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-08 10.10"
LINE 1: ...i_dokter_dpjp", "created_date") VALUES ('761912', '2025-06-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('761912', '2025-06-08 10.10', '', '{"pasien":"","keluarga":"","lain":"","ket_lain":""}', '', '', '', '{"infeksi":"","lain":"","ket_lain":""}', '', '', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', '', '', '', '', '0', '0', '', '{"composmentis":"","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"","gcs_m":"","gcs_v":""}', '', '', '', '', '', NULL, NULL, '{"vesikuler":"","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":""}', '{"dada":"","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"","ket_lain":""}', '{"asites":"","tegang":"","supel":"","lain":"","ket_lain":""}', '', '0', '0', '0', '{"normal":"","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"","ket_lain":""}', '{"pucat":"","sianosis":"","normal":"","lain":"","ket_lain":""}', '{"baik":"","sedang":"","buruk":""}', '{"normal":"","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"","ket_lain":""}', '', '', '', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', '', 'Baligh', '', 'Berwudhu', 'Berdiri', '', '', '', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', '', 'Normal', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '{"hambatan_1":"","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '', '', '', '', '', '', '', '', '', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"0","planning_3":"0","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', NULL, NULL, '2025-06-08 09:04', NULL, NULL, NULL, '2025-06-08 09:04:47')
ERROR - 2025-06-08 09:09:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 09:09:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 09:16:57 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-08 09:24:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:24:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-08 09:24:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:24:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-08 09:26:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:26:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 09:26:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:26:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 09:27:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 09:28:18 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-08 02:28:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 02:28:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 02:30:45 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 02:30:45 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 02:30:45 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 02:30:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 02:30:45 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 02:30:45 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 02:33:13 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 02:33:13 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 02:33:13 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 02:33:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 02:33:13 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 02:33:13 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 09:40:48 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-08 09:43:31 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-06-08 09:44:42 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-08 09:45:21 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-08 09:45:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-08 09:45:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-08 09:45:27 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-08 09:45:27 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-08 09:50:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:50:49 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761709', '2025-06-08 10:00', '15', 'ibu mengatakan mules hilang timbul, nyeri bertambah saat ada his seperti di remas â€“ remas dan mules berkurang bila rileksasi dan diberikan terapi, dan pasien merasa khawatir dan cemas dengan tindakan yang akan dilakukannya', 'Kesadaran compos mentis, GCS 15 EWS 0 (putih). Pasien tampak meringis kesakitan saat ada his, skala nyeri 3/10, dan pasien merasa cemas dan banyak bertanya tentang keadaannya dan tindakan yang akan dilakukannya.TD 110/75 mmHg, N 87 x/mnt RR 22 x/mnt S 36.5C SPO2 99Þngan O2 3lpm nasal kanul. Tanggal 7/6/2025 IVFD RL 20 tpm (TAKI) DC No 16 pengunci 15cc urine 600cc jernih. Tanggal 7/6/2025 HB 14.1 leukosit 7.2, trombosit 328.000 HIV/HSAG non reaktif. Tanggal 7/6/2025 terpasang laminaria 1 kasa terikat dan 6 kasa bebas. ', 'G5P3A1 Hamil 9-10 minggu ec fetal dimissed dengan nyeri melahirkan dan ansietas', 'Dalam 2x24 jam nyeri di harapkan menurun dengan kriteria hasil skala nyeri 2/10', '', '', '', '', '', '', '', '', '2043', '1', '<div>RENCANA KURET TGL 08/05/2025 Jam 11.00 WIB di VK.</div><div><br></div><div>PP SORE :</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br></div><div>PP MALAM:</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br><div></div><div><br></div><div><br></div><div><br></div><div><br></div><div></div></div>', NULL, '2043', 0, NULL, '2025-06-08 09:50:49')
ERROR - 2025-06-08 09:51:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:51:05 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761709', '2025-06-08 10:00', '15', 'ibu mengatakan mules hilang timbul, nyeri bertambah saat ada his seperti di remas â€“ remas dan mules berkurang bila rileksasi dan diberikan terapi, dan pasien merasa khawatir dan cemas dengan tindakan yang akan dilakukannya', 'Kesadaran compos mentis, GCS 15 EWS 0 (putih). Pasien tampak meringis kesakitan saat ada his, skala nyeri 3/10, dan pasien merasa cemas dan banyak bertanya tentang keadaannya dan tindakan yang akan dilakukannya.TD 110/75 mmHg, N 87 x/mnt RR 22 x/mnt S 36.5C SPO2 99Þngan O2 3lpm nasal kanul. Tanggal 7/6/2025 IVFD RL 20 tpm (TAKI) DC No 16 pengunci 15cc urine 600cc jernih. Tanggal 7/6/2025 HB 14.1 leukosit 7.2, trombosit 328.000 HIV/HSAG non reaktif. Tanggal 7/6/2025 terpasang laminaria 1 kasa terikat dan 6 kasa bebas. ', 'G5P3A1 Hamil 9-10 minggu ec fetal dimissed dengan nyeri melahirkan dan ansietas', 'Dalam 2x24 jam nyeri di harapkan menurun dengan kriteria hasil skala nyeri 2/10', '', '', '', '', '', '', '', '', '2043', '1', '<div>RENCANA KURET TGL 08/05/2025 Jam 11.00 WIB di VK.</div><div><br></div><div>PP SORE :</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br></div><div>PP MALAM:</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br><div></div><div><br></div><div><br></div><div><br></div><div><br></div><div></div></div>', NULL, '2043', 0, NULL, '2025-06-08 09:51:05')
ERROR - 2025-06-08 09:51:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:51:24 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761709', '2025-06-08 10:00', '15', 'ibu mengatakan mules hilang timbul, nyeri bertambah saat ada his seperti di remas â€“ remas dan mules berkurang bila rileksasi dan diberikan terapi, dan pasien merasa khawatir dan cemas dengan tindakan yang akan dilakukannya', 'Kesadaran compos mentis, GCS 15 EWS 0 (putih). Pasien tampak meringis kesakitan saat ada his, skala nyeri 3/10, dan pasien merasa cemas dan banyak bertanya tentang keadaannya dan tindakan yang akan dilakukannya.TD 110/75 mmHg, N 87 x/mnt RR 22 x/mnt S 36.5C SPO2 99Þngan O2 3lpm nasal kanul. Tanggal 7/6/2025 IVFD RL 20 tpm (TAKI) DC No 16 pengunci 15cc urine 600cc jernih. Tanggal 7/6/2025 HB 14.1 leukosit 7.2, trombosit 328.000 HIV/HSAG non reaktif. Tanggal 7/6/2025 terpasang laminaria 1 kasa terikat dan 6 kasa bebas. ', 'G5P3A1 Hamil 9-10 minggu ec fetal dimissed dengan nyeri melahirkan dan ansietas', 'Dalam 2x24 jam nyeri di harapkan menurun dengan kriteria hasil skala nyeri 2/10', '', '', '', '', '', '', '', '', '2043', '1', '<div>RENCANA KURET TGL 08/05/2025 Jam 11.00 WIB di VK.</div><div><br></div><div>PP SORE :</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br></div><div>PP MALAM:</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br><div></div><div><br></div><div><br></div><div><br></div><div><br></div><div></div></div>', NULL, '2043', 0, NULL, '2025-06-08 09:51:24')
ERROR - 2025-06-08 09:54:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 09:55:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:55:55 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761709', '2025-06-08 10:00', '15', 'ibu mengatakan mules hilang timbul, nyeri bertambah saat ada his seperti di remas â€“ remas dan mules berkurang bila rileksasi dan diberikan terapi, dan pasien merasa khawatir dan cemas dengan tindakan yang akan dilakukannya', 'Kesadaran compos mentis, GCS 15 EWS 1 (Hijau). Pasien tampak meringis kesakitan saat ada his, skala nyeri 3/10, dan pasien merasa cemas dan banyak bertanya tentang keadaannya dan tindakan yang akan dilakukannya. Kontraksi (+), Perdarahan pervaginam 100cc tidak aktif. TD 110/75 mmHg, N 87 x/mnt RR 22 x/mnt S 36.5C SPO2 99Þngan O2 3lpm nasal kanul. Tanggal 7/6/2025 IVFD RL 20 tpm (TAKI) DC No 16 pengunci 15cc urine 400cc jernihTanggal 7/6/2025 HB 14.1 leukosit 7.2, trombosit 328.000 HIV/HSAG non reaktif. Tanggal 7/6/2025 terpasang laminaria 1 kasa terikat dan 6 kasa bebas.', 'G5P3A1 Hamil 9-10 minggu ec fetal dimissed dengan nyeri melahirkan dan ansietas', 'Dalam 2x24 jam nyeri di harapkan menurun dengan kriteria hasil skala nyeri 2/10
', '', '', '', '', '', '', '', '', '2043', '1', '<div>RENCANA KURET TGL 8/6/2025 JAM 11.00 WIB DI VK</div><div><br></div><div>PP SORE :</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br></div><div>PP MALAM:</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br><div></div><div><br></div><div><br></div><div><br></div><div><br></div><div></div></div>', NULL, '2043', 0, NULL, '2025-06-08 09:55:55')
ERROR - 2025-06-08 09:56:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:56:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761709', '2025-06-08 10:00', '15', 'ibu mengatakan mules hilang timbul, nyeri bertambah saat ada his seperti di remas â€“ remas dan mules berkurang bila rileksasi dan diberikan terapi, dan pasien merasa khawatir dan cemas dengan tindakan yang akan dilakukannya', 'Kesadaran compos mentis, GCS 15 EWS 1 (Hijau). Pasien tampak meringis kesakitan saat ada his, skala nyeri 3/10, dan pasien merasa cemas dan banyak bertanya tentang keadaannya dan tindakan yang akan dilakukannya. Kontraksi (+), Perdarahan pervaginam 100cc tidak aktif. TD 110/75 mmHg, N 87 x/mnt RR 22 x/mnt S 36.5C SPO2 99Þngan O2 3lpm nasal kanul. Tanggal 7/6/2025 IVFD RL 20 tpm (TAKI) DC No 16 pengunci 15cc urine 400cc jernihTanggal 7/6/2025 HB 14.1 leukosit 7.2, trombosit 328.000 HIV/HSAG non reaktif. Tanggal 7/6/2025 terpasang laminaria 1 kasa terikat dan 6 kasa bebas.', 'G5P3A1 Hamil 9-10 minggu ec fetal dimissed dengan nyeri melahirkan dan ansietas', 'Dalam 2x24 jam nyeri di harapkan menurun dengan kriteria hasil skala nyeri 2/10
', '', '', '', '', '', '', '', '', '2043', '1', '<div>RENCANA KURET TGL 8/6/2025 JAM 11.00 WIB DI VK</div><div><br></div><div>PP SORE :</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br></div><div>PP MALAM:</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br><div></div><div><br></div><div><br></div><div><br></div><div><br></div><div></div></div>', NULL, '2043', 0, NULL, '2025-06-08 09:56:27')
ERROR - 2025-06-08 09:57:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 09:57:05 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761709', '2025-06-08 10:00', '15', 'ibu mengatakan mules hilang timbul, nyeri bertambah saat ada his seperti di remas â€“ remas dan mules berkurang bila rileksasi dan diberikan terapi, dan pasien merasa khawatir dan cemas dengan tindakan yang akan dilakukannya', 'Kesadaran compos mentis, GCS 15 EWS 1 (Hijau). Pasien tampak meringis kesakitan saat ada his, skala nyeri 3/10, dan pasien merasa cemas dan banyak bertanya tentang keadaannya dan tindakan yang akan dilakukannya. Kontraksi (+), Perdarahan pervaginam 100cc tidak aktif. TD 110/75 mmHg, N 87 x/mnt RR 22 x/mnt S 36.5C SPO2 99Þngan O2 3lpm nasal kanul. Tanggal 7/6/2025 IVFD RL 20 tpm (TAKI) DC No 16 pengunci 15cc urine 400cc jernih. Tanggal 7/6/2025 HB 14.1 leukosit 7.2, trombosit 328.000 HIV/HSAG non reaktif. Tanggal 7/6/2025 terpasang laminaria 1 kasa terikat dan 6 kasa bebas.', 'G5P3A1 Hamil 9-10 minggu ec fetal dimissed dengan nyeri melahirkan dan ansietas', 'Dalam 2x24 jam nyeri di harapkan menurun dengan kriteria hasil skala nyeri 2/10
', '', '', '', '', '', '', '', '', '2043', '1', '<div>RENCANA KURET TGL 8/6/2025 JAM 11.00 WIB DI VK</div><div><br></div><div>PP SORE :</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br></div><div>PP MALAM:</div><div>identifikasi skala nyeri</div><div>identifikasi lokasi , karakteristik, durasi, frekuensi , kualiatas, intensitas nyeri</div><div>fasilitasi istirahat dan tidur</div><div>monitor TTV, perubahan uterus kandung kemih, luka operasi. Lochea dan balutan</div><div>kolaborasi pemberian analgetik</div><div><br><div></div><div><br></div><div><br></div><div><br></div><div><br></div><div></div></div>', NULL, '2043', 0, NULL, '2025-06-08 09:57:05')
ERROR - 2025-06-08 10:02:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 10:03:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;1000mg ( minta 2)&quot;
LINE 1: ...ularium&quot;, &quot;kronis&quot;) VALUES (6353566, '60', 130.8, '1000mg ( ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:03:35 --> Query error: ERROR:  invalid input syntax for type double precision: "1000mg ( minta 2)"
LINE 1: ...ularium", "kronis") VALUES (6353566, '60', 130.8, '1000mg ( ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6353566, '60', 130.8, '1000mg ( minta 2)', '1', NULL, '0')
ERROR - 2025-06-08 03:21:56 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 03:21:56 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-06-08 03:21:56 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 03:21:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-06-08 03:21:56 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 03:21:56 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-06-08 10:25:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:25:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 10:30:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:30:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 10:31:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:31:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 10:32:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:32:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 10:34:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:34:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 10:35:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 10:42:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:42:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 10:45:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:45:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 10:45:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:45:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 10:49:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 10:50:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:50:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 03:50:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 03:50:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 03:51:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 03:51:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 03:53:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 03:53:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 03:53:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 03:53:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:57:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...5&quot;, &quot;jam_pemberian_6&quot;) VALUES (863079, '12', '1', '', 'Injek...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:57:16 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...5", "jam_pemberian_6") VALUES (863079, '12', '1', '', 'Injek...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (863079, '12', '1', '', 'Injeksi', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 10:59:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = ''
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 10:59:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
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
ERROR - 2025-06-08 11:03:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 11:03:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 11:05:51 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-08 11:05:51 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-08 11:06:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 11:18:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 11:18:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 11:27:39 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 11:27:39 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 11:27:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-08 11:38:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 11:38:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 11:39:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 11:39:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 11:39:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 11:39:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 11:42:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 11:42:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 11:43:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 11:43:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 11:44:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 11:50:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 11:50:08 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '701880'
AND "lp"."id_pendaftaran" = '701880'
ORDER BY "lp"."id" ASC
ERROR - 2025-06-08 12:11:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (863094, '4', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 12:11:58 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (863094, '4', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (863094, '4', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 05:17:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 05:17:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:17:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 05:18:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 05:18:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:24:51 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-08 12:25:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 12:25:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 12:43:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 12:44:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 13:02:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 13:09:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:09:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:14:52 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 06:22:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 06:22:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 13:28:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:28:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:28:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:28:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:29:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 13:29:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 13:32:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:32:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:33:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:33:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:35:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:35:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:35:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:35:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:38:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:38:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:40:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:38 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:38'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:40:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:40 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:40'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:40:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:41 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:41'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:40:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:44'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:40:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:44'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:40:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:44'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:40:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:44'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:40:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:44'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:40:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xc5 0x30 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:40:46 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xc5 0x30 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '29793', "tanggal_1_fodti" = '2025-06-08', "tanggal_2_fodti" = '2025-06-08', "jam_1_fodti" = '10:23', "bismilah_fodti" = '1', "td_s_fodti" = '130', "td_d_fodti" = '76', "nadi_fodti" = '55', "rr_fodti" = '24', "suhu_fodti" = '36.8', "sat_o2_fodti" = '99', "kategori_fodti" = 'merah', "skala_fodti" = '6', "resiko_fodti" = 'tinggi', "kesadaran_fodti" = 'Cm', "gcs_e_fodti" = '4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '2', "pupil_kanan_fodti" = '2', "pupil_kiri_fodti" = '2', "pemeriksaan_fodti" = '-', "jam_2_fodti" = '13:15', "implementasi_fodti" = 'memasang kondom kateter 
pasien menolak pasang DC, penolakan +
memasang ivfd no 22 tangan kanan Nacl 3Å00c habis dalam 24 jam untuk 1 kali
mengantarkan pasien ke ruang ICU 
', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '591', "updated_at" = '2025-06-08 13:40:46'
WHERE "id" = '29793'
ERROR - 2025-06-08 13:42:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:42:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:42:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:42:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:42:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:42:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:43:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:43:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:48:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:48:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:48:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:48:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:51:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:51:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:52:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:52:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:54:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:54:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 13:55:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 13:56:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 13:56:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:00:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 14:01:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:01:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:01:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:02:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:02:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:02:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:02:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:03:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:03:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:08:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:08:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:11:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 14:12:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:12:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:24:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 14:25:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;8.5&quot;
LINE 1: ...391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:25:47 --> Query error: ERROR:  invalid input syntax for type smallint: "8.5"
LINE 1: ...391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('703391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NULL, NULL, '8.5', NULL, NULL, NULL, NULL, NULL, '0', '8.5', NULL, '100', NULL, 'CM', 'K', NULL, NULL, '12:00', '274', '2025-06-08 14:24:36')
ERROR - 2025-06-08 14:25:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;8.5&quot;
LINE 1: ...391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:25:53 --> Query error: ERROR:  invalid input syntax for type smallint: "8.5"
LINE 1: ...391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('703391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NULL, NULL, '8.5', NULL, NULL, NULL, NULL, NULL, '0', '8.5', NULL, '100', NULL, 'CM', 'K', NULL, NULL, '12:00', '274', '2025-06-08 14:24:36')
ERROR - 2025-06-08 14:26:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;8.5&quot;
LINE 1: ...391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:26:11 --> Query error: ERROR:  invalid input syntax for type smallint: "8.5"
LINE 1: ...391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('703391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NULL, NULL, '8.5', NULL, NULL, NULL, NULL, NULL, '0', '8.5', NULL, '100', NULL, 'CM', 'K', NULL, NULL, '12:00', '274', '2025-06-08 14:24:36')
ERROR - 2025-06-08 14:26:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;8.5&quot;
LINE 1: ...391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:26:33 --> Query error: ERROR:  invalid input syntax for type smallint: "8.5"
LINE 1: ...391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('703391', '761916', '1686', '2025-06-08', NULL, NULL, '8.5', NULL, NULL, '8.5', NULL, NULL, NULL, NULL, NULL, '0', '8.5', NULL, '100', NULL, 'CM', 'K', NULL, NULL, '12:00', '274', '2025-06-08 14:24:36')
ERROR - 2025-06-08 07:34:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 07:34:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 14:46:17 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 14:46:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 07:49:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 07:49:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 07:49:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 07:49:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:50:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 14:56:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 17: AND &quot;b&quot;.&quot;id&quot; = 'undefined'
                        ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 14:56:59 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
AND "lp"."tanggal_layanan" BETWEEN '2025-06-01 00:00:00' AND '2025-06-08 23:59:59'
AND "lp"."id" IS NULL
AND ("lp"."jenis_layanan" = 'Intensive Care' and "pd"."tanggal_keluar" is NULL)
AND "b"."id" = 'undefined'
AND "pd"."no_register" IS NULL
AND  "p"."id" LIKE '%' ESCAPE '!'
AND p.nama ilike '%%'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-06-08 15:00:43 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-08 15:01:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 15:01:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 08:01:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:01:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:01:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:01:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:01:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:01:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 15:13:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 08:29:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:29:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 15:32:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 15:32:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 15:34:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 15:34:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 15:34:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 15:34:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 15:35:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 15:35:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 15:35:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 15:35:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 15:35:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 15:35:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 15:36:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 15:36:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 15:36:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 15:36:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 15:39:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 15:41:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-08 15:43:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 08:44:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:44:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:44:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:44:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:44:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:44:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:44:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:44:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 15:45:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 08:46:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:46:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:46:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:46:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 15:51:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (863149, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 15:51:14 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (863149, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (863149, '2', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 08:52:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:52:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:52:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:52:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:57:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 08:57:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 16:01:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (863157, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:01:31 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (863157, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (863157, '1', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 16:02:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (24245, null, null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 761935, 2025-06-08 16:02:07, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:02:08 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (24245, null, null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 761935, 2025-06-08 16:02:07, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('761935', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2025-06-08 16:02:07')
ERROR - 2025-06-08 16:02:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (24246, null, null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 761935, 2025-06-08 16:02:12, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:02:12 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (24246, null, null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 761935, 2025-06-08 16:02:12, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('761935', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2025-06-08 16:02:12')
ERROR - 2025-06-08 16:30:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 09:38:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 09:38:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 16:44:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:44:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 16:44:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6354649, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:44:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6354649, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6354649, '1264', 28061.244, '1', '1.00', NULL, 'null')
ERROR - 2025-06-08 16:44:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:44:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 16:44:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 16:45:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:45:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 16:45:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6354666, '78', 13200.12, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:45:52 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6354666, '78', 13200.12, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6354666, '78', 13200.12, '1', '1.00', NULL, 'null')
ERROR - 2025-06-08 16:46:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:46:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 16:46:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 16:49:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:49:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 16:50:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-08 18;00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-06-08 18;00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:50:33 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-08 18;00"
LINE 4: AND "lo_tgl" = '2025-06-08 18;00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1381'
AND "lo_tgl" = '2025-06-08 18;00'
AND "id_layanan_pendaftaran" = '761767'
ERROR - 2025-06-08 16:50:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-08 18;00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-06-08 18;00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:50:40 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-08 18;00"
LINE 4: AND "lo_tgl" = '2025-06-08 18;00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1381'
AND "lo_tgl" = '2025-06-08 18;00'
AND "id_layanan_pendaftaran" = '761767'
ERROR - 2025-06-08 16:50:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-08 18;00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-06-08 18;00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 16:50:51 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-08 18;00"
LINE 4: AND "lo_tgl" = '2025-06-08 18;00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1381'
AND "lo_tgl" = '2025-06-08 18;00'
AND "id_layanan_pendaftaran" = '761767'
ERROR - 2025-06-08 16:58:17 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2445
ERROR - 2025-06-08 16:58:17 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2446
ERROR - 2025-06-08 16:58:26 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2445
ERROR - 2025-06-08 16:58:26 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2446
ERROR - 2025-06-08 16:58:35 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2445
ERROR - 2025-06-08 16:58:35 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2446
ERROR - 2025-06-08 09:58:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 09:58:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 09:59:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 09:59:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 17:00:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380625V002429) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:00:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380625V002429) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380625V002429', "no_polish" = '0001082474897'
WHERE "id" = '702522'
ERROR - 2025-06-08 10:00:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:00:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:00:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:00:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 17:03:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 17:04:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:04:15 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '18:00', '1860', '24', 'cm', '36,8', '30', '140', '46', '-', '-', '-', '-', '97%', '-', NULL, NULL, '-', '-', '-', '30', '186', '-', '-', '42', '5', '+', NULL, '279', '2025-06-08 16:56:58')
ERROR - 2025-06-08 17:04:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:04:36 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '15:00', '1860', '24', 'cm', '36,8', '30', '140', '42', '-', '-', '-', '-', '95%', '-', NULL, NULL, '-', '-', '-', '30', '156', '-', '-', '-', '-', '+', NULL, '279', '2025-06-08 16:56:58')
ERROR - 2025-06-08 17:04:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:04:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:04:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:04:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:04:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:04:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:05:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:05:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:05:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:05:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:05:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6354695, '544', 885.6, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:05:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6354695, '544', 885.6, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6354695, '544', 885.6, '500', '1.00', 'Ya', 'null')
ERROR - 2025-06-08 17:05:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:05:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:05:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:05:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:05:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:05:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:05:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:05:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:06:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:06:54 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '15:00', '1860', '24', 'cm', '36,8', '30', '140', '42', '-', '-', '-', '-', '95%', '-', NULL, NULL, '-', '-', '-', '30', '156', '-', '-', '-', '-', '+', NULL, '279', '2025-06-08 16:56:58')
ERROR - 2025-06-08 17:07:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:07:27 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '15:00', '1860', '24', 'cm', '36,8', '30', '140', '42', '-', '-', '-', '-', '95%', '-', NULL, NULL, '-', '-', '-', '30', '156', '-', '-', '-', '-', '+', NULL, '279', '2025-06-08 16:56:58')
ERROR - 2025-06-08 17:07:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:07:55 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '15:00', '1860', '24', 'cm', '36,8', '30', '140', '42', '-', '-', '-', '-', '95%', '-', NULL, NULL, '-', '-', '-', '30', '156', '-', '-', '-', '-', '+', NULL, '279', '2025-06-08 16:56:58')
ERROR - 2025-06-08 17:08:32 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-06-08 17:08:40 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-06-08 17:08:42 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-06-08 17:09:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:09:22 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '15:00', '1860', '24', 'cm', '36,8', '30', '140', '42', '-', '-', '-', '-', '95%', '-', NULL, NULL, '-', '-', '-', '30', '156', '-', '-', '-', '-', '+', NULL, '279', '2025-06-08 16:56:58')
ERROR - 2025-06-08 17:10:19 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-08 17:10:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-08 17:10:22 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-08 17:10:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-08 17:18:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:18:50 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '15:00', '1860', '24', 'cm', '36,8', '30', '140', '42', '-', '-', '-', '-', '95%', '-', NULL, NULL, '-', '-', '-', '30', '156', '-', '-', '-', '-', '+', NULL, '279', '2025-06-08 16:56:58')
ERROR - 2025-06-08 17:21:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:21:42 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '2054', '2025-06-08', '18:00', NULL, NULL, 'CM', '36.6', '-', '150', '50', '-', '-', '-', '-', '100', '-', '-', '36,6', '-', '-', '-', '-', '-', '-', '-', '+', '+', '-', NULL, '617', '2025-06-08 17:21:04')
ERROR - 2025-06-08 17:21:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:21:50 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '2054', '2025-06-08', '18:00', NULL, NULL, 'CM', '36.6', '-', '150', '50', '-', '-', '-', '-', '100', '-', '-', '36,6', '-', '-', '-', '-', '-', '-', '-', '+', '+', '-', NULL, '617', '2025-06-08 17:21:04')
ERROR - 2025-06-08 17:22:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:22:52 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '2054', '2025-06-08', '18:00', NULL, NULL, 'CM', '36.6', '-', '150', '50', '-', '-', '-', '-', '100', '-', '-', '36,6', '-', '-', '-', '-', '-', '-', '-', '+', '+', '-', NULL, '617', '2025-06-08 17:22:13')
ERROR - 2025-06-08 17:23:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:23:37 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P1A0 Post Partum Pervaginam Hecting grade 1 ec PEB, hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:23:37')
ERROR - 2025-06-08 17:23:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:23:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P1A0 Post Partum Pervaginam Hecting grade 1 ec PEB, hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:23:44')
ERROR - 2025-06-08 17:24:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:24:07 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P1A0 Post Partum Pervaginam Hecting grade 1 ec PEB, hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:24:07')
ERROR - 2025-06-08 17:24:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:24:08 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '2054', '2025-06-08', '18:00', NULL, NULL, 'CM', '36.6', '-', '150', '50', '-', '-', '-', '-', '100', '-', '-', '36,6', '-', '-', '-', '-', '-', '-', '-', '+', '+', '-', NULL, '617', '2025-06-08 17:23:27')
ERROR - 2025-06-08 17:24:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:24:11 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P1A0 Post Partum Pervaginam Hecting grade 1 ec PEB, hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:24:11')
ERROR - 2025-06-08 17:24:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:24:20 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P1A0 Post Partum Pervaginam Hecting grade 1 ec PEB, hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:24:20')
ERROR - 2025-06-08 17:24:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:24:52 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P1A0 Post Partum Pervaginam Hecting grade 1 ec PEB, hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:24:52')
ERROR - 2025-06-08 17:26:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:26:31 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P1A0 Post Partum Pervaginam Hecting grade 1 ec PEB, hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:26:31')
ERROR - 2025-06-08 17:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:26:36 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P1A0 Post Partum Pervaginam Hecting grade 1 ec PEB, hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:26:36')
ERROR - 2025-06-08 17:28:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:28:07 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '15:00', '1860', '24', 'cm', '36,8', '30', '140', '42', '-', '-', '-', '-', '95%', '-', NULL, NULL, '-', '-', '-', '30', '156', '-', '-', '-', '-', '+', NULL, '279', '2025-06-08 16:56:58')
ERROR - 2025-06-08 17:29:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 17:31:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:31:19 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 07-05-2025 IVFD MgSo4 40% 6 gram 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm (TAKI), RL + KCL 25 meg/ 6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 21.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. Tanggal 08-06-2025 terpasang DC no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal hasil lab post partum 08/06/2025 Hb: 812,9, Leukosit: 18,5, trmbosit: 338.000, proterin urin ++, elektrolit ekstrase +++, bakteria +. ', 'P5A0 post partum pervaginam hecting grade 2 insersi IUD ec PEB, Hipokalemia dengan nyeri melahirkan.', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:31:19')
ERROR - 2025-06-08 17:33:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 17:33:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (863174, '4', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:33:49 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (863174, '4', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (863174, '4', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 17:36:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:36:57 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '18:00', '1860', '24', 'cm', '36.8', '30', '140', '46', '-', '-', '-', '-', '98%', NULL, NULL, NULL, NULL, NULL, NULL, '30', '186', NULL, NULL, '43', '5', NULL, NULL, '279', '2025-06-08 17:32:17')
ERROR - 2025-06-08 17:37:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:37:53 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('702730', '761183', '1688', '2025-06-08', '18:00', '1860', '24', 'cm', '36.8', '30', '140', '46', '-', '-', '-', '-', '98%', NULL, NULL, NULL, NULL, NULL, NULL, '30', '186', NULL, NULL, '43', '5', NULL, NULL, '279', '2025-06-08 17:32:17')
ERROR - 2025-06-08 17:38:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 17:38:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:38:32 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100 Þngan NK 3 lpm. Tanggal IVFD RL + MgSO4 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm, (TAKI), RL + KCL 25 meg /6 jam (KAKA). Tanggal 08-06-2025 terpasang Dc no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal 06/06/2025 hasil lab post partum Hb: 12,9, Leukosit: 18,5 trmbosit: 338.000. ', 'P5A0 post partum pervaginam hecting grade 2 insersi IUD ec PEB, Hipokalemia dengan nyeri melahirkan.', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:38:32')
ERROR - 2025-06-08 17:38:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:38:38 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100 Þngan NK 3 lpm. Tanggal IVFD RL + MgSO4 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm, (TAKI), RL + KCL 25 meg /6 jam (KAKA). Tanggal 08-06-2025 terpasang Dc no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal 06/06/2025 hasil lab post partum Hb: 12,9, Leukosit: 18,5 trmbosit: 338.000. ', 'P5A0 post partum pervaginam hecting grade 2 insersi IUD ec PEB, Hipokalemia dengan nyeri melahirkan.', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:38:38')
ERROR - 2025-06-08 17:38:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:38:41 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100 Þngan NK 3 lpm. Tanggal IVFD RL + MgSO4 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm, (TAKI), RL + KCL 25 meg /6 jam (KAKA). Tanggal 08-06-2025 terpasang Dc no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal 06/06/2025 hasil lab post partum Hb: 12,9, Leukosit: 18,5 trmbosit: 338.000. ', 'P5A0 post partum pervaginam hecting grade 2 insersi IUD ec PEB, Hipokalemia dengan nyeri melahirkan.', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:38:41')
ERROR - 2025-06-08 17:38:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:38:49 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100 Þngan NK 3 lpm. Tanggal IVFD RL + MgSO4 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm, (TAKI), RL + KCL 25 meg /6 jam (KAKA). Tanggal 08-06-2025 terpasang Dc no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal 06/06/2025 hasil lab post partum Hb: 12,9, Leukosit: 18,5 trmbosit: 338.000. ', 'P5A0 post partum pervaginam hecting grade 2 insersi IUD ec PEB, Hipokalemia dengan nyeri melahirkan.', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:38:49')
ERROR - 2025-06-08 17:38:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:38:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 17:39:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:39:08 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100 Þngan NK 3 lpm. Tanggal IVFD RL + MgSO4 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm, (TAKI), RL + KCL 25 meg /6 jam (KAKA). Tanggal 08-06-2025 terpasang Dc no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal 06/06/2025 hasil lab post partum Hb: 12,9, Leukosit: 18,5 trmbosit: 338.000. ', 'P5A0 post partum pervaginam hecting grade 2 insersi IUD ec PEB, Hipokalemia dengan nyeri melahirkan.', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:39:08')
ERROR - 2025-06-08 10:41:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:41:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:41:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:41:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:41:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:41:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 17:46:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:46:08 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100 Þngan NK 3 lpm. Tanggal IVFD RL + MgSO4 20 tpm (TAKA), RL + 4 ampul oxytosin dan nikardipin 5 mg 12 tpm, (TAKI), RL + KCL 25 meg /6 jam (KAKA). Tanggal 08-06-2025 terpasang Dc no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal 06/06/2025 hasil lab post partum Hb: 12,9, Leukosit: 18,5 trmbosit: 338.000. ', 'P5A0 post partum pervaginam hecting grade 2 insersi IUD ec PEB, Hipokalemia dengan nyeri melahirkan.', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:46:08')
ERROR - 2025-06-08 17:46:39 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 17:46:39 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 17:46:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-08 17:47:38 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 17:47:38 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 17:47:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-08 17:47:58 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 17:47:58 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 17:47:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-08 17:49:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:49:26 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.
', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100 Þngan NK 3 lpm. Tanggal IVFD RL + 4 ampul oxytosin 20 tpm (TAKA), nikardipin 5 mg / jam, (TAKI), RL + KCL 25 meg /6 jam (KAKA). Tanggal 08-06-2025 terpasang Dc no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal 06/06/2025 hasil lab post partum Hb: 12,9, Leukosit: 18,5 trmbosit: 338.000. ', 'P5A0 Post Partum Pervaginam, Hecting grade I, insersi IUD ec PEB dan Hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:49:26')
ERROR - 2025-06-08 17:49:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:49:37 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 17:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat.
', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100 Þngan NK 3 lpm. Tanggal IVFD RL + 4 ampul oxytosin 20 tpm (TAKA), nikardipin 5 mg / jam, (TAKI), RL + KCL 25 meg /6 jam (KAKA). Tanggal 08-06-2025 terpasang Dc no 16 pengunci 15 cc produksi urin 700 cc berwarna merah. tanggal 06/06/2025 hasil lab post partum Hb: 12,9, Leukosit: 18,5 trmbosit: 338.000. ', 'P5A0 Post Partum Pervaginam, Hecting grade I, insersi IUD ec PEB dan Hipokalemia dengan nyeri melahirkan', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:49:37')
ERROR - 2025-06-08 10:50:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 10:50:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 17:54:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 17:55:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 17:56:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 17:57:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 17:57:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 17:57:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 17:58:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:58:11 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 08-05-2025 IVFD RL + 4 ampul oxytosin 20 tpm (TAKA), Nikardipin 5 mg/ jam titrasi dari dosis terendah (TAKI), RL + kcl 25 meg /6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. tanggal 08/06/2025 hasil lab post partum Hb: 12,9  Leukosit: 18.5, trmbosit: 336.000, proterin urin ++, leukosit ekstrase +++, bakteria +. Tanggal 08/06/2025 partus pervaginam bayi di Rawat Gabung. 
', 'P5A0 post partum pervaginam hecting grade 1, insersi IUD ec PEB dan Hipokalemia dengan nyeri melahirkan ', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:58:11')
ERROR - 2025-06-08 17:58:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:58:16 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 08-05-2025 IVFD RL + 4 ampul oxytosin 20 tpm (TAKA), Nikardipin 5 mg/ jam titrasi dari dosis terendah (TAKI), RL + kcl 25 meg /6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. tanggal 08/06/2025 hasil lab post partum Hb: 12,9  Leukosit: 18.5, trmbosit: 336.000, proterin urin ++, leukosit ekstrase +++, bakteria +. Tanggal 08/06/2025 partus pervaginam bayi di Rawat Gabung. 
', 'P5A0 post partum pervaginam hecting grade 1, insersi IUD ec PEB dan Hipokalemia dengan nyeri melahirkan ', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:58:16')
ERROR - 2025-06-08 17:58:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:58:21 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 08-05-2025 IVFD RL + 4 ampul oxytosin 20 tpm (TAKA), Nikardipin 5 mg/ jam titrasi dari dosis terendah (TAKI), RL + kcl 25 meg /6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. tanggal 08/06/2025 hasil lab post partum Hb: 12,9  Leukosit: 18.5, trmbosit: 336.000, proterin urin ++, leukosit ekstrase +++, bakteria +. Tanggal 08/06/2025 partus pervaginam bayi di Rawat Gabung. 
', 'P5A0 post partum pervaginam hecting grade 1, insersi IUD ec PEB dan Hipokalemia dengan nyeri melahirkan ', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:58:21')
ERROR - 2025-06-08 17:58:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 17:58:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('761945', '2025-06-08 20:00', '15', 'Ibu mengatakan nyeri luka hecting seperti tersayat-sayat, nyeri semakin bertambah saat beraktivitas, nyeri berkurang bila diberikan Pereda nyeri dan istirahat', 'Kesadaran : Composmentis, GCS : 15, skala nyeri 3/10, EWS : 2 (hijau), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade I, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 30 CC, tidak aktif. Tanggal 08-05-2025 IVFD RL + 4 ampul oxytosin 20 tpm (TAKA), Nikardipin 5 mg/ jam titrasi dari dosis terendah (TAKI), RL + kcl 25 meg /6 jam (KAKA). TD: 185/86 mmHg, N: 80 x/m, R: 20.x/m, S: 36.7''C,SpO2 100Þngan NK 3 lpm. tanggal 08/06/2025 hasil lab post partum Hb: 12,9  Leukosit: 18.5, trmbosit: 336.000, proterin urin ++, leukosit ekstrase +++, bakteria +. Tanggal 08/06/2025 partus pervaginam bayi di Rawat Gabung. 
', 'P5A0 post partum pervaginam hecting grade 1, insersi IUD ec PEB dan Hipokalemia dengan nyeri melahirkan ', '-', '', '', '', '', '', '', '', '', '2049', '1', '-', NULL, '2049', 0, NULL, '2025-06-08 17:58:27')
ERROR - 2025-06-08 18:14:06 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-06-08 11:15:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 11:15:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 11:35:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 11:35:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 18:46:36 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 18:46:36 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 18:46:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-08 18:51:57 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-08 19:00:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 19:00:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 19:00:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 19:00:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 19:00:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 19:00:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 19:12:07 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-08 19:12:07 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-08 12:16:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:16:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:16:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:16:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:17:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:17:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:17:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:17:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 19:34:49 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 19:34:49 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-08 19:34:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-08 12:35:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:35:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:35:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:35:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:35:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 12:35:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 19:42:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 19:42:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 19:45:25 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-08 19:56:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 19:58:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 19:58:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 20:16:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (863210, '2', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 20:16:20 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (863210, '2', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (863210, '2', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 20:17:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 20:17:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 20:19:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (863213, '3', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 20:19:58 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (863213, '3', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (863213, '3', '', '', 'Injeksi', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 20:25:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 20:27:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 20:27:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 20:27:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6355128, '211', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 20:27:07 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6355128, '211', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6355128, '211', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-08 20:27:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 20:27:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 20:39:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 20:39:46 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '2054', '2025-06-08', '18:00', NULL, NULL, 'CM', '36.6', '-', '145', '45', '-', '-', '-', '-', '99', '-', '-', '36.6', '-', '-', '-', '-', '-', '-', '-', '+', '+', '-', NULL, '617', '2025-06-08 20:38:53')
ERROR - 2025-06-08 20:46:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 14:12:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:12:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:13:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:13:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:13:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:13:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 21:13:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (863223, '3', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:13:34 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (863223, '3', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (863223, '3', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 21:18:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 21:19:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6355230, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:19:14 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6355230, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6355230, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-08 14:19:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:19:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:19:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:19:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:19:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:19:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:20:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:20:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 21:26:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13134
ERROR - 2025-06-08 14:29:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:29:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:29:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:29:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:29:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:29:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 21:29:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 21:30:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:30:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:30:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:30:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 21:30:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:30:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 14:30:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:30:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 21:39:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:39:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-08 21:39:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:39:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-08 21:41:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:41:57 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '2054', '2025-06-09', '0:00', NULL, NULL, 'CM', '36,6', NULL, '145', '44', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '+', NULL, NULL, '295', '2025-06-08 21:40:24')
ERROR - 2025-06-08 21:45:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 21:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:45:09 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.6', NULL, '144', '43', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '+', '-', NULL, NULL, '295', '2025-06-08 21:43:57')
ERROR - 2025-06-08 21:45:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:45:40 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.6', NULL, '144', '43', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '+', '-', NULL, NULL, '295', '2025-06-08 21:43:57')
ERROR - 2025-06-08 14:48:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:48:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 21:51:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:51:03 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703401', '761920', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.5', NULL, '143', '42', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '+', NULL, NULL, '295', '2025-06-08 21:49:34')
ERROR - 2025-06-08 21:51:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:51:30 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703401', '761920', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.5', NULL, '143', '42', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '+', NULL, NULL, '295', '2025-06-08 21:49:34')
ERROR - 2025-06-08 21:51:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:51:40 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703401', '761920', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.5', NULL, '143', '42', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '+', NULL, NULL, '295', '2025-06-08 21:49:34')
ERROR - 2025-06-08 21:51:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 21:51:59 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703401', '761920', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.5', NULL, '143', '42', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '+', NULL, NULL, '295', '2025-06-08 21:49:34')
ERROR - 2025-06-08 14:53:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 14:53:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 22:01:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:01:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:01:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:01:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:04:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 22:11:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:11:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:17:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:17:13 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703389', '761903', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.6', NULL, '143', '41', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '+', NULL, NULL, '295', '2025-06-08 22:15:45')
ERROR - 2025-06-08 22:19:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:19:52 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703389', '761903', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.6', NULL, '144', '42', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL, '295', '2025-06-08 22:15:45')
ERROR - 2025-06-08 22:22:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 22:36:12 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-08 22:36:12 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-08 22:36:12 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-08 22:36:12 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-08 22:36:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:36:12 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('761980', '2025-06-08 22:36:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 22:36:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:36:22 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.6', NULL, '144', '45', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '+', '+', NULL, NULL, '295', '2025-06-08 22:35:43')
ERROR - 2025-06-08 22:36:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:36:44 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36.6', NULL, '144', '45', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '+', '+', NULL, NULL, '295', '2025-06-08 22:35:43')
ERROR - 2025-06-08 22:38:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:38:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:38:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6355453, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:38:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6355453, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6355453, '393', 6526.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-08 22:38:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:38:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:39:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:39:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:39:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:39:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:39:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:39:27 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703401', '761920', '1355', '2025-06-08', '0:00', NULL, NULL, 'CM', '36.5', NULL, '145', '44', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '-', NULL, NULL, '295', '2025-06-08 22:38:44')
ERROR - 2025-06-08 22:43:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 22:44:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 22:44:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 22:44:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 22:44:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 22:44:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 22:44:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-08 22:48:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 22:51:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:51:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:52:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6355488, '725', 8579.412, '100', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:52:12 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6355488, '725', 8579.412, '100', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6355488, '725', 8579.412, '100', '1.00', 'Ya', 'null')
ERROR - 2025-06-08 22:52:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 22:52:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 22:52:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 22:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:00:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:00:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:01:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:06:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:06:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 23:06:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:06:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 23:06:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:09:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:10:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:11:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:11:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:11:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:11:21 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703432', '761975', '1734', '2025-06-08', '21:00', '3230', NULL, 'Composmentis', '36.5', '35', '119', '35', 'CPAP', '7', '+', '30%', '95%', '9 L', '-', '31.1', '7', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, '334', '2025-06-08 23:07:21')
ERROR - 2025-06-08 23:11:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:11:33 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703432', '761975', '1734', '2025-06-08', '21:00', '3230', NULL, 'Composmentis', '36.5', '35', '119', '35', 'CPAP', '7', '+', '30%', '95%', '9 L', '-', '31.1', '7', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, '334', '2025-06-08 23:07:21')
ERROR - 2025-06-08 23:11:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:11:45 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703432', '761975', '1734', '2025-06-08', '21:00', '3230', NULL, 'Composmentis', '36.5', '35', '119', '35', 'CPAP', '7', '+', '30%', '95%', '9 L', '-', '31.1', '7', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, '334', '2025-06-08 23:07:21')
ERROR - 2025-06-08 23:12:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:12:02 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703432', '761975', '1734', '2025-06-08', '21:00', '3230', NULL, 'Composmentis', '36.5', '35', '119', '35', 'CPAP', '7', '+', '30%', '95%', '9 L', '-', '31.1', '7', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, '334', '2025-06-08 23:07:21')
ERROR - 2025-06-08 23:12:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:12:15 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703432', '761975', '1734', '2025-06-08', '21:00', '3230', NULL, 'Composmentis', '36.5', '35', '119', '35', 'CPAP', '7', '+', '30%', '95%', '9 L', '-', '31.1', '7', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, '334', '2025-06-08 23:07:21')
ERROR - 2025-06-08 23:12:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:12:20 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703432', '761975', '1734', '2025-06-08', '21:00', '3230', NULL, 'Composmentis', '36.5', '35', '119', '35', 'CPAP', '7', '+', '30%', '95%', '9 L', '-', '31.1', '7', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, '334', '2025-06-08 23:07:21')
ERROR - 2025-06-08 23:12:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:12:44 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36,6', NULL, '138', '41', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '+', NULL, NULL, '295', '2025-06-08 23:11:58')
ERROR - 2025-06-08 23:13:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:13:11 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703415', '761957', '1355', '2025-06-09', '0:00', NULL, NULL, 'CM', '36,6', NULL, '138', '41', NULL, NULL, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, NULL, 'ASI', NULL, NULL, NULL, '-', '+', NULL, NULL, '295', '2025-06-08 23:11:58')
ERROR - 2025-06-08 23:15:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:15:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1656' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-06-08 23:17:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:17:05 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('703432', '761975', '1734', '2025-06-08', '21:00', '3230', NULL, 'Composmentis', '36.5', '35', '119', '35', 'CPAP', '7', '+', '30', '95', '9 L', '-', '31.1', '7', NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, '334', '2025-06-08 23:12:39')
ERROR - 2025-06-08 23:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:20:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 23:22:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:22:25 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('699569', '761864', '1610', '2025-06-08', '21:00', '2520', '29', 'Composmentis', '37.2', '33', '130', '56', NULL, NULL, NULL, NULL, '96%', NULL, NULL, NULL, '1', NULL, NULL, '30', '231', NULL, NULL, NULL, NULL, NULL, NULL, '409', '2025-06-08 23:19:46')
ERROR - 2025-06-08 23:22:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:22:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 23:22:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  nextval: reached maximum value of sequence &quot;sm_pengawasan_khusus_neonatus_id_seq&quot; (32767) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:22:42 --> Query error: ERROR:  nextval: reached maximum value of sequence "sm_pengawasan_khusus_neonatus_id_seq" (32767) - Invalid query: INSERT INTO "sm_pengawasan_khusus_neonatus" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_pkn", "jam_pkn", "bb_pkn", "lp_pkn", "kesadaran_pkn", "pasien_pkn", "inkubator_pkn", "nadi_pkn", "rr_pkn", "modus_pkn", "peep_pkn", "buble_pkn", "fio2_pkn", "spo2_pkn", "flow_pkn", "air_pkn", "suhu_pkn", "line1_pkn", "line2_pkn", "plebitis_pkn", "oral_pkn", "jml_pkn", "muntah_pkn", "residu_pkn", "bak_pkn", "bab_pkn", "foto_therapy_pkn", "obat_pkn", "perawat_pkn", "created_at") VALUES ('699569', '761864', '1610', '2025-06-08', '21:00', '2520', '29', 'Composmentis', '37.2', '33', '130', '56', NULL, NULL, NULL, NULL, '96%', NULL, NULL, NULL, '1', NULL, NULL, '30', '231', NULL, NULL, NULL, NULL, NULL, NULL, '409', '2025-06-08 23:19:46')
ERROR - 2025-06-08 23:22:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('863256', '5', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:22:51 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('863256', '5', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('863256', '5', '', '1', '', '', 'null', '0', '', '0', '', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-08 23:23:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:23:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 23:27:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-08 23:28:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:39:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:40:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:43:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:43:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 23:43:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:43:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 23:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:45:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:54:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-08 23:54:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-08 23:54:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:55:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 23:55:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-08 22:14:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-08 22:14:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
