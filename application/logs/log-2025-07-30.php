<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-07-30 00:05:39 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-07-30 00:05:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  time zone displacement out of range: &quot;-2025-2607 14:40&quot;
LINE 4: AND &quot;lo_tgl&quot; = '-2025-2607 14:40'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 00:05:39 --> Query error: ERROR:  time zone displacement out of range: "-2025-2607 14:40"
LINE 4: AND "lo_tgl" = '-2025-2607 14:40'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '2043'
AND "lo_tgl" = '-2025-2607 14:40'
AND "id_layanan_pendaftaran" = '796446'
ERROR - 2025-07-30 00:05:45 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-07-30 00:05:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  time zone displacement out of range: &quot;-2025-2607 14:40&quot;
LINE 4: AND &quot;lo_tgl&quot; = '-2025-2607 14:40'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 00:05:45 --> Query error: ERROR:  time zone displacement out of range: "-2025-2607 14:40"
LINE 4: AND "lo_tgl" = '-2025-2607 14:40'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '2043'
AND "lo_tgl" = '-2025-2607 14:40'
AND "id_layanan_pendaftaran" = '796446'
ERROR - 2025-07-30 00:05:55 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-07-30 00:05:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  time zone displacement out of range: &quot;-2025-2607 14:40&quot;
LINE 4: AND &quot;lo_tgl&quot; = '-2025-2607 14:40'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 00:05:55 --> Query error: ERROR:  time zone displacement out of range: "-2025-2607 14:40"
LINE 4: AND "lo_tgl" = '-2025-2607 14:40'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '2043'
AND "lo_tgl" = '-2025-2607 14:40'
AND "id_layanan_pendaftaran" = '796446'
ERROR - 2025-07-30 00:07:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 00:09:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 00:09:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 00:09:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 00:09:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 00:10:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 00:10:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 00:18:46 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 00:18:46 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 00:21:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 00:59:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 01:23:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 01:23:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 01:25:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 01:27:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 01:27:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 01:29:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 01:29:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 01:40:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 01:42:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12804
ERROR - 2025-07-30 01:42:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 01:42:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 01:42:58 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-07-30 03:06:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 03:29:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 03:29:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '396', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-07-30 03:55:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 03:55:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 03:58:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 03:58:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 04:43:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901333, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 04:43:59 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (901333, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901333, '1', '', '', '', '', 'null', '0', '', '0', '', '5', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 05:08:49 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11075
ERROR - 2025-07-30 05:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 05:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:23:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 05:23:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:32:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901339, '12', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 05:32:16 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (901339, '12', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901339, '12', '', '', '', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 1, '2x14ui', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 05:34:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901340, '5', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 05:34:36 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (901340, '5', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901340, '5', '', '', '', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 1, '2x14ui', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 05:42:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 05:42:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:43:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (6739593, '1228', 135621.6, '100', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 05:43:24 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (6739593, '1228', 135621.6, '100', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6739593, '1228', 135621.6, '100', '1.00', 'Ya', 'null')
ERROR - 2025-07-30 05:43:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 05:43:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:22:00 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-07-30 06:24:12 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-07-30 06:26:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:27:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(60265) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 06:27:24 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(60265) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '60265'
ERROR - 2025-07-30 06:29:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:32:28 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 19
ERROR - 2025-07-30 06:32:28 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-07-30 06:32:28 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-07-30 06:36:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 06:36:06 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 06:37:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:37:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:39:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:39:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:41:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:42:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:43:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:43:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:45:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:48:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:50:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:51:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:51:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 06:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:52:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:52:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:52:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 06:52:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:53:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:53:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:53:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 06:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:54:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:55:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:55:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 06:57:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:58:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:58:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300058) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 06:58:14 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300058) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300058', '00383588', '2025-07-30 06:58:12', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Anak', 0, 2, '', '20250730C003')
ERROR - 2025-07-30 06:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:59:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:59:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300065) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 06:59:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300065) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300065', '00381226', '2025-07-30 06:59:40', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003296124911', NULL, '102501020725Y000059', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250730B161')
ERROR - 2025-07-30 06:59:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:59:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:59:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:00:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:01:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:01:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300074) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:01:40 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300074) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300074', '00370067', '2025-07-30 07:01:38', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001794963194', NULL, '0223B1370525P002178', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250730B084')
ERROR - 2025-07-30 07:02:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:02:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:03:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300081) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:03:39 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300081) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300081', '00373606', '2025-07-30 07:03:37', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002441794173', NULL, '0223U1100625Y000082', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250730B131')
ERROR - 2025-07-30 07:04:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:04:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:05:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:05:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:06:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:06:08 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A066%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 07:06:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:07:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:08:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300099) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:09:20 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300099) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300099', '00235619', '2025-07-30 07:09:19', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002042468144', NULL, '022300090625Y000571', 'Lama', NULL, 1768, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250730A113')
ERROR - 2025-07-30 07:09:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:09:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:09:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:11:00 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-07-30 07:11:00 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-07-30 07:11:00 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-07-30 07:11:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:12:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:12:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:12:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:13:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 07:13:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:14:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300115) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:14:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300115) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300115', '00382937', '2025-07-30 07:14:10', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001308318849', NULL, '0223R0380725V012475', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Anak', 0, 2, NULL, '20250730B311')
ERROR - 2025-07-30 07:14:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:15:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:15:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:16:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:16:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:16:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:17:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:17:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:18:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:18:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 07:18:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 07:19:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 07:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:21:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:22:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:22:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:22:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 07:22:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:22:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 07:23:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:24:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:24:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:25:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:27:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:27:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:27:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:27:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:28:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:29:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:29:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:29:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:30:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:31:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:32:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:32:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:32:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300167) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:32:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300167) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300167', '00271527', '2025-07-30 07:32:34', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001229290435', NULL, '102501100625Y004193', 'Lama', NULL, 1773, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250730A015')
ERROR - 2025-07-30 07:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:34:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:34:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:35:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:35:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:35:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 07:35:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:35:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 07:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:36:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:37:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:38:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:38:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:38:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:39:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:39:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:39:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:39:50 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A142%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 07:41:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:41:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 07:41:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 07:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:41:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:42:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:42:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:43:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:43:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:43:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:44:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0x97 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:44:32 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0x97 - Invalid query: UPDATE "sm_cppt" SET "id" = '927174', "id_layanan_pendaftaran" = '798253', "waktu" = '2025-07-30 05:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan masih sesak nafas, Sesak memberat saat beraktivitas dan berjalan. bengkak pada ke 2 kaki. Posisi tidur lebih nyaman dengan 2 bantal. aktivitas dibantu oleh keluarga', "objective" = 'Kesadarn CM GCS 15 EWS H (4), akral hangat, nadi kuat. pasien tampak sesak. TD : 149/100 mmHg Nadi 92 x/mnt Suhu : 36.2 C RR : 19 x/mnt SPO2 : —3LPM. Terpasang IVFD VF. terpasang DC tgl 29/7/25. Pemeriksaan tgl 29/7/25 RO Thorax sedang expertaise diraiologi. Hasi LAB ( HB 14.4 HT 44 Leuko 10.9 Trombo 379 Natrium 136 Kalium 4.6 Klorida 105 Ureum 58 Creatinin 58 Trop T 360 GDS 126)', "assessment" = 'Penurunan Curah Jantung, Intoleransi Aktivitas', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1537', "ttd_nadis" = NULL, "instruksi_ppa" = 'GDS / HARI<br>Fondaparinux 1x2.5 mg sc 3 hr<br>EKG/ Hari<br>Menolak HCU & ICU SP (+)', "id_dokter_dpjp" = NULL, "id_user" = '1990', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-07-30 07:44:32'
WHERE "id" = '927174'
ERROR - 2025-07-30 07:45:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:46:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:46:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:47:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:47:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:48:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:48:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:48:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901377, '2', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:48:27 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (901377, '2', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901377, '2', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 07:48:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:49:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:49:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:50:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:51:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:51:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:51:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 07:51:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:52:11 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 07:52:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 07:52:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:52:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:52:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:52:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:52:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 07:52:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 07:52:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:52:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:53:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:53:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:53:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 07:53:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 07:53:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:53:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:53:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:54:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:54:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300228) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:54:05 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300228) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300228', '00383598', '2025-07-30 07:54:04', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1768', 0, 'Belum', 'Poliklinik Mata', 0, '2', '', '20250730C041')
ERROR - 2025-07-30 07:54:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 07:54:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 07:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:54:41 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-30 07:54:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300233) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 07:54:57 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300233) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300233', '00383600', '2025-07-30 07:54:55', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003769014767', NULL, '022309040725Y002422', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik Anak', 0, '2', '', '20250730F012')
ERROR - 2025-07-30 07:55:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 07:55:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 07:55:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:55:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:55:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:55:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:56:45 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1515
ERROR - 2025-07-30 07:57:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:57:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:58:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:58:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:58:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-30 07:58:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 07:59:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:59:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:59:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:59:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:59:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:00:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:00:08 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-30 08:00:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:00:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:00:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:00:59 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-30 08:01:10 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-30 08:01:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:01:37 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-30 08:01:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:01:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:01:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:02:00 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 08:02:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 08:02:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:02:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:02:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:02:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:02:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:03:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:03:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:03:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:04:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:04:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:04:21 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND "ab"."no_kartu" = '0002447162831'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 08:04:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:04:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:04:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:04:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...i&quot;, &quot;id_users&quot;) VALUES ('735831', '798246', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:04:55 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...i", "id_users") VALUES ('735831', '798246', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_pendaftaran", "id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('735831', '798246', NULL, '', NULL, '2025-07-30 07:30:00', 'Nausea, bersihan jalan napas tidak efektif.', 'Nacl 0,9 persen 500 ml/20 TPM', 'Paru â†’ acc rajal sesuai DPJP. th/Dexamethason iv 2x5 mg tapp off/hari (hari ini jam 24-12) â†’ besok 1x5 mg (jam 12). Konsul jiwa (+) â†’ Saat ini tidak ada terapi medika mentosa. Bila gelisah kembali dapat diberikan injeksi haloperidol 1 ampul IM dan Diazepam 1 ampul IM. Konsul ulang bila perlu. Follow up hasil cek DR ulang.', '145', '146', '961')
ERROR - 2025-07-30 08:05:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:05:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:05:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:05:35 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 08:05:35 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 08:05:35 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-07-30 08:05:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:05:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:06:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300262) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:06:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300262) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300262', '00085828', '2025-07-30 08:06:44', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001297115649', NULL, '0496B0000525Y000099', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250730B236')
ERROR - 2025-07-30 08:06:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:07:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:07:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 08:07:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:07:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:08:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:08:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-07-30 08:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:08:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:09:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:09:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:09:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:09:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:10:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:10:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:10:09 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A165%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 08:10:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:10:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:10:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:10:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:10:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:10:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:11:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:11:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:11:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:11:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:11:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300275) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:11:21 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300275) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300275', '00269921', '2025-07-30 08:11:21', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 9, '0002933360177', NULL, NULL, 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Cemara', 0, 2, NULL, '20250730C048')
ERROR - 2025-07-30 08:11:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:12:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:12:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:12:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:12:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:12:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:12:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:13:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:13:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300285) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:13:17 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300285) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300285', '00068947', '2025-07-30 08:13:15', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049128838', NULL, '0223U0110725P002577', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Mata', 0, 2, NULL, '20250730A173')
ERROR - 2025-07-30 08:13:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:13:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:13:51 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-07-30 08:13:52 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-07-30 08:13:52 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-07-30 08:13:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:13:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:14:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:14:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:14:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 08:15:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:16:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:16:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:16:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:16:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:16:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:16:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:17:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:17:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:17:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:18:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:19:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:19:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:20:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:21:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:21:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:21:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:21:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:21:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:21:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 08:21:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:21:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:21:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:22:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:22:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:22:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:23:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:23:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:23:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:23:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 08:24:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:24:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:24:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:25:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:25:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:25:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 08:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:25:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:25:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:25:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 08:26:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:26:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:26:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:26:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:26:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300327) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:26:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300327) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300327', '00340443', '2025-07-30 08:26:42', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 9, '0002302280335', NULL, NULL, 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik KLINIK NYERI', 0, 2, NULL, '20250730C051')
ERROR - 2025-07-30 08:26:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:27:15 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:27:15 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:28:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:28:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:28:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 08:29:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:29:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:29:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A064%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 08:30:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:30:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:30:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:30:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:30:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:31:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:31:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:32:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:32:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:32:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:33:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:33:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND "ab"."no_kartu" = '0001166828512'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 08:33:19 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-30 08:33:19 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-30 08:33:24 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-30 08:33:24 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-30 08:33:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:33:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:33:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300347) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:33:51 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300347) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300347', '00353238', '2025-07-30 08:33:50', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001730212244', NULL, '102503020725Y004288', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250730B348')
ERROR - 2025-07-30 08:33:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:34:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:35:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:35:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:36:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:36:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:36:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:36:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:37:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:37:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:37:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:37:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:38:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:38:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:38:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
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
ERROR - 2025-07-30 08:38:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:38:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:38:45 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-30 08:38:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:38:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:38:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:38:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:38:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:38:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:38:45 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:38:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:39:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:39:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:39:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300364) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:39:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300364) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300364', '00083283', '2025-07-30 08:39:45', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001878826904', NULL, '100502010725P003466', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250730C068')
ERROR - 2025-07-30 08:40:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:40:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:40:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:40:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:40:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:41:15 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:41:15 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:41:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:41:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 01:41:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 01:41:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:42:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:42:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:42:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:42:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:42:40 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:42:40 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:42:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:42:58 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00382833'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-07-30 08:42:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:42:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:42:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 01:43:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 01:43:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:43:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 08:43:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:43:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:43:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:43:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:43:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:43:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:43:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:43:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:43:48 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 08:43:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:43:48 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 08:44:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:44:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:44:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:44:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:44:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:45:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:45:05 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4893
ERROR - 2025-07-30 08:45:05 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4987
ERROR - 2025-07-30 08:45:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:45:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:45:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:45:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:46:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:46:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:46:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:46:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:46:40 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A076%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 08:46:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:47:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:47:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:47:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:47:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xcc 0x20 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:47:26 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xcc 0x20 - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901516, '1', '8', '8', '', '', 'null', '0', '', '0', '', 'nacl 0,9Ì ', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 08:47:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:47:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:47:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:48:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:48:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:48:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:48:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:49:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:49:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:49:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300387) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:49:28 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300387) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300387', '00383623', '2025-07-30 08:49:27', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001512445814', NULL, '102505040725Y002539', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250730A076')
ERROR - 2025-07-30 08:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:49:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:49:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:50:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:50:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:50:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:50:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:50:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:50:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:50:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:50:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:51:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:51:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300391) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:51:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300391) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300391', '00249435', '2025-07-30 08:51:15', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001298012848', NULL, '022101070725Y002933', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250730A179')
ERROR - 2025-07-30 08:51:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:51:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:51:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:51:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:51:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:51:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:51:49 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_sessiond1d41f01fdeb6350013e49be7fdc6a7e71548f6b /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-07-30 08:51:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:52:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:52:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:52:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:52:22 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-30 08:52:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:52:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:52:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:52:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:52:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:52:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:52:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:52:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:52:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:53:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:53:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:53:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:53:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300403) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:53:34 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300403) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300403', '00383395', '2025-07-30 08:53:29', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001721261687', NULL, '102501040725Y006371', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Obgyn', 0, 2, NULL, '20250730B356')
ERROR - 2025-07-30 08:53:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:54:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:54:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 08:55:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:55:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:56:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-30 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 08:56:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:56:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901530, '5', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:56:27 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (901530, '5', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901530, '5', '', '30', '1 x Sehari 2 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 08:56:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:56:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 08:56:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:56:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 08:56:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:56:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300409) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:56:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300409) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300409', '00140188', '2025-07-30 08:56:51', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001727407078', NULL, '0223B1370725Y001018', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250730A149')
ERROR - 2025-07-30 08:56:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:57:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:57:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:57:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:57:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 08:57:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 08:57:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:58:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:58:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:58:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:58:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:58:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:58:25 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:58:25 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:58:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 08:58:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 08:58:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:59:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:59:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:59:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:00:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:00:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 09:00:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:00:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:00:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:01:06 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-07-30 09:01:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:01:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:02:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:02:22 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-07-30 09:02:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:02:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:02:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:02:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:02:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:03:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:03:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:04:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:04:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 02:04:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 02:04:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 02:04:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 02:04:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:04:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 02:04:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 02:04:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:04:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:04:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:04:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:04:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:04:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 02:05:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 02:05:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:05:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 02:05:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 02:05:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:05:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 02:05:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 02:05:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:05:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:05:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 02:05:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 02:05:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:06:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:06:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:07:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:07:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:07:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:07:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:07:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:07:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:08:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:08:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:08:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:08:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:08:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:09:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:09:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:09:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:09:48 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-07-30 09:09:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:10:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:10:10 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:10:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:10:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:10:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:10:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:10:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:10:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:10:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:11:05 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:11:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:11:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:11:16 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:11:16 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:11:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:11:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:11:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:11:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:11:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:11:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:11:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:12:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:12:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:12:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:12:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:12:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:12:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:12:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:12:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:13:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:13:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:13:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:13:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:13:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:53 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 09:13:53 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 09:13:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-07-30 09:13:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:14:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:14:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:14:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:14:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:14:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:14:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:14:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:16:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:16:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:16:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:16:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:16:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:17:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 9: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:17:03 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
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
ERROR - 2025-07-30 09:17:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:17:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:17:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:17:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:17:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:17:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:18:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:18:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 09:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:18:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 09:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:19:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:19:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:19:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:20:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:20:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:21:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:21:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:21:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:21:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:22:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:22:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:22:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:22:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:22:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:23:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:23:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:23:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:23:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:23:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:24:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:24:33 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-07-30 09:24:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 896
ERROR - 2025-07-30 09:25:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;45 menit&quot;
LINE 1: ...aktu_pemberian&quot; = 'preoperasi', &quot;sirs_jam_satu&quot; = '45 menit'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:25:13 --> Query error: ERROR:  invalid input syntax for type integer: "45 menit"
LINE 1: ...aktu_pemberian" = 'preoperasi', "sirs_jam_satu" = '45 menit'...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '797809', "sirs_diagnosis_masuk" = 'G3P2A0 HAMIL 38 MINGGU DENGAN BSC 1X, LETAK OBLIQ', "sirs_diagnosis_operasi" = NULL, "hbsag" = 'Negatif', "antihcv" = NULL, "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"1","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1', "sirs_menit" = NULL, "sirs_drain" = 'Negatif', "sirs_asascore" = '2', "sirs_jenis_operasi" = 'Kotor', "sirs_tindakan_operasi" = 'Elektif', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":"1 gr"}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = '45 menit', "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = '3', "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = 'Cito', "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = '290', "sirs_ipcn" = NULL, "id_users" = 'CHODIJAH BENAJIR', "sirs_tanggal_diagnosis" = '2025-07-29', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = '1', "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = '2025-07-29 10:30:00', "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-07-30 09:25:13'
WHERE "id" = '58224'
ERROR - 2025-07-30 09:25:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;45 menit&quot;
LINE 1: ...aktu_pemberian&quot; = 'preoperasi', &quot;sirs_jam_satu&quot; = '45 menit'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:25:26 --> Query error: ERROR:  invalid input syntax for type integer: "45 menit"
LINE 1: ...aktu_pemberian" = 'preoperasi', "sirs_jam_satu" = '45 menit'...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '797809', "sirs_diagnosis_masuk" = 'G3P2A0 HAMIL 38 MINGGU DENGAN BSC 1X, LETAK OBLIQ', "sirs_diagnosis_operasi" = NULL, "hbsag" = 'Negatif', "antihcv" = NULL, "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"1","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1', "sirs_menit" = NULL, "sirs_drain" = 'Negatif', "sirs_asascore" = '2', "sirs_jenis_operasi" = 'Kotor', "sirs_tindakan_operasi" = 'Elektif', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":"1 gr"}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = '45 menit', "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = '3', "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = 'Cito', "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = '290', "sirs_ipcn" = NULL, "id_users" = 'CHODIJAH BENAJIR', "sirs_tanggal_diagnosis" = '2025-07-29', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = '1', "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = '2025-07-29 10:30:00', "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-07-30 09:25:26'
WHERE "id" = '58224'
ERROR - 2025-07-30 09:25:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:26:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:26:26 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1524
ERROR - 2025-07-30 09:26:26 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1524
ERROR - 2025-07-30 09:26:26 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1524
ERROR - 2025-07-30 09:26:26 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1524
ERROR - 2025-07-30 09:26:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ... &quot;riwayat_tumbuh_kembang&quot; = NULL, &quot;s_soap&quot; = Array, &quot;o_soap&quot;...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:26:26 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ... "riwayat_tumbuh_kembang" = NULL, "s_soap" = Array, "o_soap"...
                                                             ^ - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '797387', "waktu" = '2025-07-30 09:26:26', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = NULL, "anamnesa_sosial" = NULL, "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = NULL, "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = NULL, "prognosis" = NULL, "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = NULL, "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = NULL, "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = NULL, "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = NULL, "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = Array, "o_soap" = Array, "a_soap" = Array, "p_soap" = Array, "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '797387'
ERROR - 2025-07-30 09:26:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300459) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:26:32 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300459) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300459', '00302384', '2025-07-30 09:26:29', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002136141832', NULL, '102501090625Y000466', 'Lama', NULL, 1765, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250730A033')
ERROR - 2025-07-30 09:26:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:26:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:26:55 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:26:55 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:27:01 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:27:01 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:27:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:27:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:27:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:27:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901621, '5', '14', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:27:42 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...5", "jam_pemberian_6") VALUES (901621, '5', '14', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901621, '5', '14', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 09:27:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:28:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:28:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:28:05 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00317170'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-07-30 09:28:08 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:28:08 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:28:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:28:27 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:28:27 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:28:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:29:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:29:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:29:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:29:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:30:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:30:19 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:30:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 09:31:05 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:31:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:31:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:33:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:33:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:33:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:33:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:34:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:34:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:34:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:34:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:34:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:34:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:34:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:34:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:35:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:35:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:35:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:35:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:35:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:36:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:36:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:36:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:36:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 09:36:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:36:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:37:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:37:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:37:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:37:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:38:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:38:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:38:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:38:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:38:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:39:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:39:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:39:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:39:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:39:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:39:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-07-30 09:39:30 --> Severity: Notice  --> Trying to get property 'success' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/controllers/Folder_pasien.php 585
ERROR - 2025-07-30 09:39:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:39:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:40:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:40:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:40:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:41:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:41:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:41:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:41:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:41:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:41:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:42:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:42:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:42:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:42:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:42:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:42:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:43:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:44:18 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 09:44:18 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:28 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 09:44:47 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 09:44:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:45:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:45:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:45:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:45:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:45:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:46:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:46:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:46:14 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-07-30 09:46:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:46:15 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-07-30 09:47:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:47:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:47:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:47:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:47:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:48:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:48:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:48:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:48:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:48:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:48:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 09:48:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:48:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 09:48:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:48:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:49:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:50:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:50:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:50:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:50:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:50:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:51:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:51:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:52:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:52:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:52:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:52:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:53:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 09:53:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:53:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:34 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 09:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:53:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:54:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-07-30 09:58FIT&quot;
LINE 1: ..._pkrj_30&quot;:null}', '2025-07-30 09:42', '427', '1', '2025-07-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:54:17 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-07-30 09:58FIT"
LINE 1: ..._pkrj_30":null}', '2025-07-30 09:42', '427', '1', '2025-07-3...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_keperawatan_rajal" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "keluhan_utama_pkrj", "rpk_pkrj", "riwayat_pkrj", "status_pkrj", "pemeriksaan_pkrj", "pengkajian_pkrj", "status_fung_pkrj", "cidera_pkrj", "sn_penurunan_bb_pkrj", "sn_penurunan_bb_on_pkrj", "sn_asupan_makan_pkrj", "sn_total_pkrj", "keterangan_pkrj", "masalah_kep_pkrj", "tanggal_jam_perawat_pkrj", "perawat_pkrj", "ttd_perawat_pkrj", "tanggal_jam_dokter_pkrj", "dokter_pkrj", "ttd_dokter_pkrj", "created_date") VALUES ('798668', '737806', '785', 'BATUK SESAK NYERI DADA , NYERI SENDI RIW PENGAPURAN ', '{"rpk_pkrj_1":null,"rpk_pkrj_2":"1","rpk_pkrj_3":"1","rpk_pkrj_4":null,"rpk_pkrj_5":null,"rpk_pkrj_6":null,"rpk_pkrj_7":"0","rpk_pkrj_9":null,"rpk_pkrj_10":"0","rpk_pkrj_12":null,"rpk_pkrj_13":"0","rpk_pkrj_15":"1","rpk_pkrj_17":"0","rpk_pkrj_19":null,"rpk_pkrj_20":null,"rpk_pkrj_21":"1","rpk_pkrj_24":null}', '{"riwayat_pkrj_1":"1","riwayat_pkrj_3":"1","riwayat_pkrj_4":null,"riwayat_pkrj_5":null,"riwayat_pkrj_6":null,"riwayat_pkrj_7":null,"riwayat_pkrj_8":null,"riwayat_pkrj_9":null,"riwayat_pkrj_10":null,"riwayat_pkrj_11":null}', '{"status_pkrj_1":"5","status_pkrj_7":null,"status_pkrj_8":"2","status_pkrj_11":null,"status_pkrj_12":"1","status_pkrj_13":"GF"}', '{"pemeriksaan_pkrj_1":"95","pemeriksaan_pkrj_2":"20","pemeriksaan_pkrj_3":"36.5","pemeriksaan_pkrj_4":"170","pemeriksaan_pkrj_5":"73","pemeriksaan_pkrj_6":"170","pemeriksaan_pkrj_7":"100"}', '{"pengkajian_pkrj_1":"shalat 5 waktu","pengkajian_pkrj_2":"1","pengkajian_pkrj_3":null,"pengkajian_pkrj_4":null,"pengkajian_pkrj_6":null,"pengkajian_pkrj_7":"1","pengkajian_pkrj_8":null,"pengkajian_pkrj_9":"1","pengkajian_pkrj_10":null,"pengkajian_pkrj_11":null}', '{"status_fung_pkrj_1":null,"status_fung_pkrj_2":"1","status_fung_pkrj_3":"PENOPANG ","status_fung_pkrj_4":null,"status_fung_pkrj_5":null}', '{"cidera_pkrj_1":"0","cidera_pkrj_3":"1","cidera_pkrj_5":"2"}', '2', NULL, '0', '2', '{"keterangan_pkrj_1":"2","keterangan_pkrj_5":null,"keterangan_pkrj_6":"1","keterangan_pkrj_7":null,"keterangan_pkrj_8":null,"keterangan_pkrj_9":null,"keterangan_pkrj_10":null,"keterangan_pkrj_11":null,"keterangan_pkrj_12":"1","keterangan_pkrj_13":null,"keterangan_pkrj_14":null,"keterangan_pkrj_15":null,"keterangan_pkrj_16":null,"keterangan_pkrj_17":null,"keterangan_pkrj_18":"1","keterangan_pkrj_20":null}', '{"masalah_kep_pkrj_1":null,"masalah_kep_pkrj_2":null,"masalah_kep_pkrj_3":null,"masalah_kep_pkrj_4":null,"masalah_kep_pkrj_5":null,"masalah_kep_pkrj_6":null,"masalah_kep_pkrj_7":null,"masalah_kep_pkrj_8":null,"masalah_kep_pkrj_9":null,"masalah_kep_pkrj_10":null,"masalah_kep_pkrj_11":null,"masalah_kep_pkrj_12":null,"masalah_kep_pkrj_13":null,"masalah_kep_pkrj_14":null,"masalah_kep_pkrj_15":null,"masalah_kep_pkrj_16":null,"masalah_kep_pkrj_17":null,"masalah_kep_pkrj_18":null,"masalah_kep_pkrj_19":null,"masalah_kep_pkrj_20":null,"masalah_kep_pkrj_21":null,"masalah_kep_pkrj_22":null,"masalah_kep_pkrj_23":null,"masalah_kep_pkrj_24":null,"masalah_kep_pkrj_25":null,"masalah_kep_pkrj_26":null,"masalah_kep_pkrj_27":null,"masalah_kep_pkrj_28":null,"masalah_kep_pkrj_29":null,"masalah_kep_pkrj_30":null}', '2025-07-30 09:42', '427', '1', '2025-07-30 09:58FIT', '68', '1', '2025-07-30 09:54:17')
ERROR - 2025-07-30 09:54:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-07-30 09:58FIT&quot;
LINE 1: ..._pkrj_30&quot;:null}', '2025-07-30 09:42', '427', '1', '2025-07-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:54:30 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-07-30 09:58FIT"
LINE 1: ..._pkrj_30":null}', '2025-07-30 09:42', '427', '1', '2025-07-3...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_keperawatan_rajal" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "keluhan_utama_pkrj", "rpk_pkrj", "riwayat_pkrj", "status_pkrj", "pemeriksaan_pkrj", "pengkajian_pkrj", "status_fung_pkrj", "cidera_pkrj", "sn_penurunan_bb_pkrj", "sn_penurunan_bb_on_pkrj", "sn_asupan_makan_pkrj", "sn_total_pkrj", "keterangan_pkrj", "masalah_kep_pkrj", "tanggal_jam_perawat_pkrj", "perawat_pkrj", "ttd_perawat_pkrj", "tanggal_jam_dokter_pkrj", "dokter_pkrj", "ttd_dokter_pkrj", "created_date") VALUES ('798668', '737806', '785', 'BATUK SESAK NYERI DADA , NYERI SENDI RIW PENGAPURAN ', '{"rpk_pkrj_1":null,"rpk_pkrj_2":"1","rpk_pkrj_3":"1","rpk_pkrj_4":null,"rpk_pkrj_5":null,"rpk_pkrj_6":null,"rpk_pkrj_7":"0","rpk_pkrj_9":null,"rpk_pkrj_10":"0","rpk_pkrj_12":null,"rpk_pkrj_13":"0","rpk_pkrj_15":"1","rpk_pkrj_17":"0","rpk_pkrj_19":null,"rpk_pkrj_20":null,"rpk_pkrj_21":"1","rpk_pkrj_24":null}', '{"riwayat_pkrj_1":"1","riwayat_pkrj_3":"1","riwayat_pkrj_4":null,"riwayat_pkrj_5":null,"riwayat_pkrj_6":null,"riwayat_pkrj_7":null,"riwayat_pkrj_8":null,"riwayat_pkrj_9":null,"riwayat_pkrj_10":null,"riwayat_pkrj_11":null}', '{"status_pkrj_1":"5","status_pkrj_7":null,"status_pkrj_8":"2","status_pkrj_11":null,"status_pkrj_12":"1","status_pkrj_13":"GF"}', '{"pemeriksaan_pkrj_1":"95","pemeriksaan_pkrj_2":"20","pemeriksaan_pkrj_3":"36.5","pemeriksaan_pkrj_4":"170","pemeriksaan_pkrj_5":"73","pemeriksaan_pkrj_6":"170","pemeriksaan_pkrj_7":"100"}', '{"pengkajian_pkrj_1":"shalat 5 waktu","pengkajian_pkrj_2":"1","pengkajian_pkrj_3":null,"pengkajian_pkrj_4":null,"pengkajian_pkrj_6":null,"pengkajian_pkrj_7":"1","pengkajian_pkrj_8":null,"pengkajian_pkrj_9":"1","pengkajian_pkrj_10":null,"pengkajian_pkrj_11":null}', '{"status_fung_pkrj_1":null,"status_fung_pkrj_2":"1","status_fung_pkrj_3":"PENOPANG ","status_fung_pkrj_4":null,"status_fung_pkrj_5":null}', '{"cidera_pkrj_1":"0","cidera_pkrj_3":"1","cidera_pkrj_5":"2"}', '2', NULL, '0', '2', '{"keterangan_pkrj_1":"2","keterangan_pkrj_5":null,"keterangan_pkrj_6":"1","keterangan_pkrj_7":null,"keterangan_pkrj_8":null,"keterangan_pkrj_9":null,"keterangan_pkrj_10":null,"keterangan_pkrj_11":null,"keterangan_pkrj_12":"1","keterangan_pkrj_13":null,"keterangan_pkrj_14":null,"keterangan_pkrj_15":null,"keterangan_pkrj_16":null,"keterangan_pkrj_17":null,"keterangan_pkrj_18":"1","keterangan_pkrj_20":null}', '{"masalah_kep_pkrj_1":null,"masalah_kep_pkrj_2":null,"masalah_kep_pkrj_3":null,"masalah_kep_pkrj_4":null,"masalah_kep_pkrj_5":null,"masalah_kep_pkrj_6":null,"masalah_kep_pkrj_7":null,"masalah_kep_pkrj_8":null,"masalah_kep_pkrj_9":null,"masalah_kep_pkrj_10":null,"masalah_kep_pkrj_11":null,"masalah_kep_pkrj_12":null,"masalah_kep_pkrj_13":null,"masalah_kep_pkrj_14":null,"masalah_kep_pkrj_15":null,"masalah_kep_pkrj_16":null,"masalah_kep_pkrj_17":null,"masalah_kep_pkrj_18":null,"masalah_kep_pkrj_19":null,"masalah_kep_pkrj_20":null,"masalah_kep_pkrj_21":null,"masalah_kep_pkrj_22":null,"masalah_kep_pkrj_23":null,"masalah_kep_pkrj_24":null,"masalah_kep_pkrj_25":null,"masalah_kep_pkrj_26":null,"masalah_kep_pkrj_27":null,"masalah_kep_pkrj_28":null,"masalah_kep_pkrj_29":null,"masalah_kep_pkrj_30":null}', '2025-07-30 09:42', '427', '1', '2025-07-30 09:58FIT', '68', '1', '2025-07-30 09:54:30')
ERROR - 2025-07-30 09:54:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:54:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:55:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-07-30 09:58FIT&quot;
LINE 1: ..._pkrj_30&quot;:null}', '2025-07-30 09:42', '427', '1', '2025-07-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:55:01 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-07-30 09:58FIT"
LINE 1: ..._pkrj_30":null}', '2025-07-30 09:42', '427', '1', '2025-07-3...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_keperawatan_rajal" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "keluhan_utama_pkrj", "rpk_pkrj", "riwayat_pkrj", "status_pkrj", "pemeriksaan_pkrj", "pengkajian_pkrj", "status_fung_pkrj", "cidera_pkrj", "sn_penurunan_bb_pkrj", "sn_penurunan_bb_on_pkrj", "sn_asupan_makan_pkrj", "sn_total_pkrj", "keterangan_pkrj", "masalah_kep_pkrj", "tanggal_jam_perawat_pkrj", "perawat_pkrj", "ttd_perawat_pkrj", "tanggal_jam_dokter_pkrj", "dokter_pkrj", "ttd_dokter_pkrj", "created_date") VALUES ('798668', '737806', '785', 'BATUK SESAK NYERI DADA , NYERI SENDI RIW PENGAPURAN ', '{"rpk_pkrj_1":null,"rpk_pkrj_2":"1","rpk_pkrj_3":"1","rpk_pkrj_4":null,"rpk_pkrj_5":null,"rpk_pkrj_6":null,"rpk_pkrj_7":"0","rpk_pkrj_9":null,"rpk_pkrj_10":"0","rpk_pkrj_12":null,"rpk_pkrj_13":"0","rpk_pkrj_15":"1","rpk_pkrj_17":"0","rpk_pkrj_19":null,"rpk_pkrj_20":null,"rpk_pkrj_21":"1","rpk_pkrj_24":null}', '{"riwayat_pkrj_1":"1","riwayat_pkrj_3":"1","riwayat_pkrj_4":null,"riwayat_pkrj_5":null,"riwayat_pkrj_6":null,"riwayat_pkrj_7":null,"riwayat_pkrj_8":null,"riwayat_pkrj_9":null,"riwayat_pkrj_10":null,"riwayat_pkrj_11":null}', '{"status_pkrj_1":"5","status_pkrj_7":null,"status_pkrj_8":"2","status_pkrj_11":null,"status_pkrj_12":"1","status_pkrj_13":"GF"}', '{"pemeriksaan_pkrj_1":"95","pemeriksaan_pkrj_2":"20","pemeriksaan_pkrj_3":"36.5","pemeriksaan_pkrj_4":"170","pemeriksaan_pkrj_5":"73","pemeriksaan_pkrj_6":"170","pemeriksaan_pkrj_7":"100"}', '{"pengkajian_pkrj_1":"shalat 5 waktu","pengkajian_pkrj_2":"1","pengkajian_pkrj_3":null,"pengkajian_pkrj_4":null,"pengkajian_pkrj_6":null,"pengkajian_pkrj_7":"1","pengkajian_pkrj_8":null,"pengkajian_pkrj_9":"1","pengkajian_pkrj_10":null,"pengkajian_pkrj_11":null}', '{"status_fung_pkrj_1":null,"status_fung_pkrj_2":"1","status_fung_pkrj_3":"PENOPANG ","status_fung_pkrj_4":null,"status_fung_pkrj_5":null}', '{"cidera_pkrj_1":"0","cidera_pkrj_3":"1","cidera_pkrj_5":"2"}', '2', NULL, '0', '2', '{"keterangan_pkrj_1":"2","keterangan_pkrj_5":null,"keterangan_pkrj_6":"1","keterangan_pkrj_7":null,"keterangan_pkrj_8":"2","keterangan_pkrj_9":"LUTUT","keterangan_pkrj_10":"5 DETIK","keterangan_pkrj_11":"JIKA AKTIVITAS ","keterangan_pkrj_12":"1","keterangan_pkrj_13":null,"keterangan_pkrj_14":null,"keterangan_pkrj_15":null,"keterangan_pkrj_16":null,"keterangan_pkrj_17":null,"keterangan_pkrj_18":"1","keterangan_pkrj_20":null}', '{"masalah_kep_pkrj_1":null,"masalah_kep_pkrj_2":null,"masalah_kep_pkrj_3":null,"masalah_kep_pkrj_4":null,"masalah_kep_pkrj_5":null,"masalah_kep_pkrj_6":null,"masalah_kep_pkrj_7":null,"masalah_kep_pkrj_8":null,"masalah_kep_pkrj_9":null,"masalah_kep_pkrj_10":null,"masalah_kep_pkrj_11":null,"masalah_kep_pkrj_12":null,"masalah_kep_pkrj_13":null,"masalah_kep_pkrj_14":null,"masalah_kep_pkrj_15":null,"masalah_kep_pkrj_16":null,"masalah_kep_pkrj_17":null,"masalah_kep_pkrj_18":null,"masalah_kep_pkrj_19":null,"masalah_kep_pkrj_20":null,"masalah_kep_pkrj_21":null,"masalah_kep_pkrj_22":null,"masalah_kep_pkrj_23":null,"masalah_kep_pkrj_24":null,"masalah_kep_pkrj_25":null,"masalah_kep_pkrj_26":null,"masalah_kep_pkrj_27":null,"masalah_kep_pkrj_28":null,"masalah_kep_pkrj_29":null,"masalah_kep_pkrj_30":null}', '2025-07-30 09:42', '427', '1', '2025-07-30 09:58FIT', '68', '1', '2025-07-30 09:55:01')
ERROR - 2025-07-30 09:55:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:55:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:55:10 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-30 09:55:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:55:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:55:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:56:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:56:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:56:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:56:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:57:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:57:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:57:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:57:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:57:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:57:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:58:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:58:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:58:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:58:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:58:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:59:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:59:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:59:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 09:59:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 09:59:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:59:39 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 09:59:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:59:39 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 09:59:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 09:59:39 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 09:59:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 10:00:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:00:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:00:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:00:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:00:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 10:00:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:00:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 10:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:00:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:00:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:00:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:00:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:00:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:00:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:00:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:00:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:01:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:01:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:02:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:02:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:02:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901724, '10', '', '7', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:02:47 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (901724, '10', '', '7', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901724, '10', '', '7', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 10:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:02:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:02:55 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 10:02:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:02:55 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 10:02:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:02:55 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 10:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:03:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:03:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:04:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:04:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:04:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:04:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:04:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:04:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:05:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:05:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:05:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:05:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:05:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:05:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:06:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:06:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:06:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:06:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:07:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:07:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:07:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:07:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:08:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:08:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:08:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:09:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:10:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:11:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:11:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:11:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-07-30 09:58FIT&quot;
LINE 1: ..._pkrj_30&quot;:null}', '2025-07-30 09:42', '427', '1', '2025-07-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:11:13 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-07-30 09:58FIT"
LINE 1: ..._pkrj_30":null}', '2025-07-30 09:42', '427', '1', '2025-07-3...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_keperawatan_rajal" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "keluhan_utama_pkrj", "rpk_pkrj", "riwayat_pkrj", "status_pkrj", "pemeriksaan_pkrj", "pengkajian_pkrj", "status_fung_pkrj", "cidera_pkrj", "sn_penurunan_bb_pkrj", "sn_penurunan_bb_on_pkrj", "sn_asupan_makan_pkrj", "sn_total_pkrj", "keterangan_pkrj", "masalah_kep_pkrj", "tanggal_jam_perawat_pkrj", "perawat_pkrj", "ttd_perawat_pkrj", "tanggal_jam_dokter_pkrj", "dokter_pkrj", "ttd_dokter_pkrj", "created_date") VALUES ('798668', '737806', '785', 'BATUK SESAK NYERI DADA , NYERI SENDI RIW PENGAPURAN ', '{"rpk_pkrj_1":null,"rpk_pkrj_2":"1","rpk_pkrj_3":"1","rpk_pkrj_4":null,"rpk_pkrj_5":null,"rpk_pkrj_6":null,"rpk_pkrj_7":"0","rpk_pkrj_9":null,"rpk_pkrj_10":"0","rpk_pkrj_12":null,"rpk_pkrj_13":"0","rpk_pkrj_15":"1","rpk_pkrj_17":"0","rpk_pkrj_19":null,"rpk_pkrj_20":null,"rpk_pkrj_21":"1","rpk_pkrj_24":null}', '{"riwayat_pkrj_1":"1","riwayat_pkrj_3":"1","riwayat_pkrj_4":null,"riwayat_pkrj_5":null,"riwayat_pkrj_6":null,"riwayat_pkrj_7":null,"riwayat_pkrj_8":null,"riwayat_pkrj_9":null,"riwayat_pkrj_10":null,"riwayat_pkrj_11":null}', '{"status_pkrj_1":"5","status_pkrj_7":null,"status_pkrj_8":"2","status_pkrj_11":null,"status_pkrj_12":"1","status_pkrj_13":"GF"}', '{"pemeriksaan_pkrj_1":"95","pemeriksaan_pkrj_2":"20","pemeriksaan_pkrj_3":"36.5","pemeriksaan_pkrj_4":"170","pemeriksaan_pkrj_5":"73","pemeriksaan_pkrj_6":"170","pemeriksaan_pkrj_7":"100"}', '{"pengkajian_pkrj_1":"shalat 5 waktu","pengkajian_pkrj_2":"1","pengkajian_pkrj_3":null,"pengkajian_pkrj_4":null,"pengkajian_pkrj_6":null,"pengkajian_pkrj_7":"1","pengkajian_pkrj_8":null,"pengkajian_pkrj_9":"1","pengkajian_pkrj_10":null,"pengkajian_pkrj_11":null}', '{"status_fung_pkrj_1":null,"status_fung_pkrj_2":"1","status_fung_pkrj_3":"PENOPANG ","status_fung_pkrj_4":null,"status_fung_pkrj_5":null}', '{"cidera_pkrj_1":"0","cidera_pkrj_3":"1","cidera_pkrj_5":"2"}', '2', NULL, '0', '2', '{"keterangan_pkrj_1":"2","keterangan_pkrj_5":null,"keterangan_pkrj_6":"1","keterangan_pkrj_7":null,"keterangan_pkrj_8":"2","keterangan_pkrj_9":"LUTUT","keterangan_pkrj_10":"5 DETIK","keterangan_pkrj_11":"JIKA AKTIVITAS ","keterangan_pkrj_12":"1","keterangan_pkrj_13":null,"keterangan_pkrj_14":null,"keterangan_pkrj_15":null,"keterangan_pkrj_16":null,"keterangan_pkrj_17":null,"keterangan_pkrj_18":"1","keterangan_pkrj_20":null}', '{"masalah_kep_pkrj_1":null,"masalah_kep_pkrj_2":null,"masalah_kep_pkrj_3":null,"masalah_kep_pkrj_4":null,"masalah_kep_pkrj_5":null,"masalah_kep_pkrj_6":null,"masalah_kep_pkrj_7":null,"masalah_kep_pkrj_8":null,"masalah_kep_pkrj_9":null,"masalah_kep_pkrj_10":null,"masalah_kep_pkrj_11":null,"masalah_kep_pkrj_12":null,"masalah_kep_pkrj_13":null,"masalah_kep_pkrj_14":null,"masalah_kep_pkrj_15":null,"masalah_kep_pkrj_16":null,"masalah_kep_pkrj_17":null,"masalah_kep_pkrj_18":null,"masalah_kep_pkrj_19":null,"masalah_kep_pkrj_20":null,"masalah_kep_pkrj_21":null,"masalah_kep_pkrj_22":null,"masalah_kep_pkrj_23":null,"masalah_kep_pkrj_24":null,"masalah_kep_pkrj_25":null,"masalah_kep_pkrj_26":null,"masalah_kep_pkrj_27":null,"masalah_kep_pkrj_28":null,"masalah_kep_pkrj_29":null,"masalah_kep_pkrj_30":null}', '2025-07-30 09:42', '427', '1', '2025-07-30 09:58FIT', '68', '1', '2025-07-30 10:11:13')
ERROR - 2025-07-30 10:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:11:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:13:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:13:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:13:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:14:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:14:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:14:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:14:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:14:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:15:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:15:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:15:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:15:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:15:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:15:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:15:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:15:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:16:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:16:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:16:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:17:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:17:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:17:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:17:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:17:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:17:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:17:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:18:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:18:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:18:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:18:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:18:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:19:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:19:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:19:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:19:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:20:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:20:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:20:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:20:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:21:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:21:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:21:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:21:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:21:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:21:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:22:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300544) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:22:31 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300544) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300544', '00329861', '2025-07-30 10:22:31', 'IGD', 'IGD', 'KELAS III', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002213617274', NULL, NULL, 'Lama', '0', '1771', 0, 'Belum', 'IGD ', 0, '2', '', NULL)
ERROR - 2025-07-30 10:22:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:23:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:23:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:23:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:23:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 10:24:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:24:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:24:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:24:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:24:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:24:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:25:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:25:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:25:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:26:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:26:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:26:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:26:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:27:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:27:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:27:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:27:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:27:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:28:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:28:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:28:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 10:28:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:28:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 10:28:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:28:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:28:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:29:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:29:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:29:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:29:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:29:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:29:50 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:29:50 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:29:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:29:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:29:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:29:53 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:29:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:30:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:30:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:31:20 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 10:31:20 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 10:31:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-07-30 10:31:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:32:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:32:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:32:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:32:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:33:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:33:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:33:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:33:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:33:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:33:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:34:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:34:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:35:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:35:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:35:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:35:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:35:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:35:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:35:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:35:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:35:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:35:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:35:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:35:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:35:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:36:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:36:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:36:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:36:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:36:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:36:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:36:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:36:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:36:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  time zone displacement out of range: &quot;-3671062405247977-07-30&quot;
LINE 7: AND &quot;p&quot;.&quot;tanggal_lahir&quot; between '-3671062405247977-07-30' an...
                                        ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:36:48 --> Query error: ERROR:  time zone displacement out of range: "-3671062405247977-07-30"
LINE 7: AND "p"."tanggal_lahir" between '-3671062405247977-07-30' an...
                                        ^ - Invalid query: SELECT "p".*, "pp"."no_polish", CONCAT_WS(' ', "p"."nama", COALESCE(p.status_pasien, '')) as nama, coalesce(pd.nama, '') as pendidikan, coalesce(pk.nama, '') as pekerjaan, CONCAT_WS(', ', "p"."nama_kel", "p"."nama_kec", "p"."nama_kab", p.nama_prop) as wilayah
FROM "sm_pasien" as "p"
JOIN "sm_pendidikan" as "pd" ON "pd"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_penjamin_pasien" "pp" ON "p"."id" = "pp"."id_pasien" AND "pp"."id_penjamin" = 1 AND "pp"."no_polish" IS NOT NULL AND "pp"."no_polish" <> ''
WHERE "pd"."id" is not null
AND "p"."tanggal_lahir" between '-3671062405247977-07-30' and '-3671062405247976-07-30'
ORDER BY "p"."id"
 LIMIT 10
ERROR - 2025-07-30 10:37:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:37:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:37:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:37:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:37:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:37:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 10:38:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:38:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:38:57 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00377895'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-07-30 10:39:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:39:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:39:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:39:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:39:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:40:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:40:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:40:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:40:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:40:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:40:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:40:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:41:15 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 10:41:15 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 10:41:16 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 10:41:16 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 10:41:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:42:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:42:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:42:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 10:42:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:43:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:43:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:43:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:44:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:44:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:44:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 10:44:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:44:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:44:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:45:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:45:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 10:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 03:45:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:45:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:45:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:45:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:45:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:45:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:45:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:46:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:47:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:48:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:48:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;Udd00&quot;
LINE 1: ...ronis&quot;) VALUES (6742981, '680', 15031.62, '1000', 'Udd00', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:48:13 --> Query error: ERROR:  invalid input syntax for type double precision: "Udd00"
LINE 1: ...ronis") VALUES (6742981, '680', 15031.62, '1000', 'Udd00', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6742981, '680', 15031.62, '1000', 'Udd00', 'Ya', '0')
ERROR - 2025-07-30 10:48:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:49:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:49:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:49:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 10:49:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:49:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:50:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:50:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:50:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:50:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:50:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 03:50:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:50:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:50:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:50:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:50:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:50:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:50:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 03:50:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:51:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:51:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:51:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:51:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:51:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:52:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:52:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:52:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:52:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 10:52:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:52:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 10:52:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:52:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:52:48 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-07-30 10:52:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:53:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:53:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:53:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:53:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:54:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:55:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:55:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:55:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:56:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:56:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:57:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:57:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:57:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 10:57:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 10:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:57:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:00:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:00:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:00:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 04:00:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:00:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:00:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:00:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 04:00:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:00:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:00:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:00:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:00:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 04:00:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:00:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:00:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:00:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:01:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:01:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:01:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:02:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:02:14 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:02:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:02:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:03:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:03:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:03:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:03:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:04:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:04:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:04:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:04:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:04:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 11:04:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:04:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 11:04:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:04:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 11:04:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:04:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:05:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:05:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:05:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 11:05:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:05:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 11:05:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:05:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 11:05:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:05:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 11:05:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:05:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:06:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:06:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:06:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:06:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:06:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:06:46 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-07-30 11:06:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:07:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:08:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:09:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:09:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:09:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 04:09:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:09:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:09:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:09:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:09:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:09:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:09:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 04:10:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:10:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:10:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:10:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:10:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:10:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:10:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:10:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:11:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:11:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:11:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:11:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:12:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:12:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:12:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:12:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:12:53 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 11:12:53 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 11:13:04 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10788
ERROR - 2025-07-30 11:13:04 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10788
ERROR - 2025-07-30 11:13:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:13:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:13:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:13:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:13:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:13:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:14:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:14:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:14:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:14:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:14:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:14:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:15:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:15:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:15:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:15:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:15:51 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-07-30 00:00:00' AND '2025-07-30 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A070%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-07-30 11:16:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2507300605) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:16:25 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2507300605) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2507300605', '00325774', '2025-07-30 11:16:24', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003524883388', NULL, '0223B0660525Y002637', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250730A199')
ERROR - 2025-07-30 11:16:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:16:45 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-30 11:16:45 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-30 11:16:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:16:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:16:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:16:55 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-30 11:16:55 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-30 11:17:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:17:14 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-30 11:17:14 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-30 11:17:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:17:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:18:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:18:25 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-07-30 11:18:25 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-07-30 11:18:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 11:18:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:19:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:19:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:20:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:20:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:21:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:21:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 11:21:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:21:44 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-07-30 11:22:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:23:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:23:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:23:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901885, '4', '', '14', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:23:56 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (901885, '4', '', '14', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901885, '4', '', '14', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 11:24:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:25:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:25:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:25:50 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 59
ERROR - 2025-07-30 11:25:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:26:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:26:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:26:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:26:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:27:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:27:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:28:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:28:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:28:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 04:29:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:29:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:29:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:29:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:29:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:29:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:29:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:29:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:29:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:29:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:29:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:29:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:29:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901893, '8', '', '3', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:29:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (901893, '8', '', '3', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901893, '8', '', '3', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 11:29:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:29:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:30:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:30:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:30:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:30:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:30:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:30:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:31:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:31:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:31:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:31:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:31:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:31:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:31:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:32:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:32:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:34:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901903, '2', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:34:24 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (901903, '2', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901903, '2', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 11:34:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:34:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (901904, '11', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:34:33 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (901904, '11', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (901904, '11', '', '1', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 11:34:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:34:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:34:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:34:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:34:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:34:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:35:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:35:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:35:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:35:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:35:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:35:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:35:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:36:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:36:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:36:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:36:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:37:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:37:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:37:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:37:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:37:56 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00158409'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-07-30 11:37:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:38:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:38:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 04:39:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:39:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:39:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 04:39:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:39:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:39:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 04:39:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:39:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:40:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:40:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:40:18 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4883907'
ERROR - 2025-07-30 11:40:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:41:15 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 11:41:15 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 11:41:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:41:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:41:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:42:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:42:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:43:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:43:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:43:13 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4885211'
ERROR - 2025-07-30 11:43:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:43:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:44:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:44:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:45:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:46:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:46:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:46:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:48:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:48:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:48:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:49:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:49:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:49:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:50:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:50:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:50:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:50:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:50:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:50:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:50:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:50:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:51:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:51:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:51:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:51:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:52:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:52:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:53:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:53:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:53:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 5: AND &quot;sk&quot;.&quot;id_spesialisasi&quot; = ''
                                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 11:53:57 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 5: AND "sk"."id_spesialisasi" = ''
                                     ^ - Invalid query: SELECT count(sk.id) as jumlah
FROM "sm_surat_kontrol" "sk"
LEFT JOIN "sm_antrian_bpjs" "ab" ON "sk"."id" = "ab"."id_skd"
WHERE "sk"."id_layanan_pendaftaran" = '797379'
AND "sk"."id_spesialisasi" = ''
AND ("ab"."id" IS NULL OR "ab"."status" <> 'Batal')
ERROR - 2025-07-30 11:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:54:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:54:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:54:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:54:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:54:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:54:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:56:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:56:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:57:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:58:50 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 11:58:50 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 11:58:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:59:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 11:59:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:00:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:00:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:00:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:01:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:01:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:01:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:01:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:01:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:01:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:01:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:01:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:01:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:01:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:01:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:02:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:02:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:02:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:02:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:02:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:03:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:03:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:03:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:03:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:03:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:03:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:03:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:03:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:03:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:03:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:03:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:03:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:04:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:04:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:04:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:04:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:04:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:04:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:04:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:05:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:05:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:05:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:05:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:05:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:05:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:06:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:06:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:06:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:06:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:06:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:06:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:06:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:06:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:06:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:06:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:06:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:07:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:07:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:07:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 12:07:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:07:26 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 12:07:26 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 12:07:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-07-30 12:07:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:07:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:08:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:08:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:08:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 12:09:37 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-07-30 12:09:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:09:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:09:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:09:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:09:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:10:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:10:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:10:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:10:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:10:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:10:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:10:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:10:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:10:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:10:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:10:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:10:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:10:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:10:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:10:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:10:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:10:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:10:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:11:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:11:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:11:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:11:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:11:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:11:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:11:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:11:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 12:11:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 12:11:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:11:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:11:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:11:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:12:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:12:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:14:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 12:14:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:14:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:14:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:15:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:15:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:15:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:15:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:15:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:15:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:15:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:15:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:15:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:15:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:15:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:15:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:16:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:16:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:16:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:17:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:17:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:17:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:17:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:19:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:19:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:19:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:19:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:19:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:19:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:20:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:20:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:20:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:20:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:21:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:22:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:22:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:23:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:23:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:24:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:25:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:25:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:25:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:26:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:26:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:26:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:26:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:26:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:27:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:27:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:27:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:27:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:27:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:27:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:27:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:28:06 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:28:20 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:28:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:28:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:28:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:28:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:28:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:28:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:28:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:28:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:28:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:28:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:29:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:29:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:29:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:29:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:29:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:29:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:29:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:29:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:29:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:29:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 12:29:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:29:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 12:29:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:29:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 12:29:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:29:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:30:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:30:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:30:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:30:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:31:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:31:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:31:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:31:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:31:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:31:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:32:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:33:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:33:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:33:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:34:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:34:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:34:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:35:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:36:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:36:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:38:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:38:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:39:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:39:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:39:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:39:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:40:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:40:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:40:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:40:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:40:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:40:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:40:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:41:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:41:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:41:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:41:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:41:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:41:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:41:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:41:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:42:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:42:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:42:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:42:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:42:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:43:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:43:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:43:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:43:56 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:43:56 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:43:56 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:43:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:43:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:43:56 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:43:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:43:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:43:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:44:00 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:44:00 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:44:00 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:44:00 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:44:00 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:44:00 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:44:00 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:44:00 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:44:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:44:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:44:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:44:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:44:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:44:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:44:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:44:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:44:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:44:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:45:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:45:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:45:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:45:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:45:44 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-30 12:46:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:46:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:46:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:46:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:46:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:46:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:46:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:46:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:46:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:46:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:46:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:46:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:46:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:46:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:47:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:47:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:47:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:47:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:47:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:47:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:47:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:47:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:47:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:47:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 12:47:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:47:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:47:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:47:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:48:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:48:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:48:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:48:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:48:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:48:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:48:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:48:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:48:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:48:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:48:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:48:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:48:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:48:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:48:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:48:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:49:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:49:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:49:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:49:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:49:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:49:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:49:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:49:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:49:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:50:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:50:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:50:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:50:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:50:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'nama_penanggung_jawab' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 38
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'tempat_lahir_pj' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 42
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'umur_tanggal_lahir_pj' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 46
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'alamat_pj' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 50
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'hubungan_keluarga' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 54
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'tlp_pj' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 58
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 65
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'tempat_lahir_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 69
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 73
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 73
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 74
ERROR - 2025-07-30 12:50:18 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'alamat_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 78
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'waktu_pengantaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 82
ERROR - 2025-07-30 12:50:18 --> Severity: Notice  --> Trying to get property 'nama_pjwb' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemulasaran_jenazah/views/printing/cetak_transportasi_pribadi.php 98
ERROR - 2025-07-30 12:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:50:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:50:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:50:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:50:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:50:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:50:43 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:50:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:50:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:50:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:50:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:50:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:50:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:51:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:51:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:51:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:51:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:51:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:51:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:51:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:51:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:51:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:52:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:52:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:52:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:52:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:52:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:52:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:52:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:52:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:52:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:52:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:53:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 05:53:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 05:53:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:53:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:53:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:53:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:53:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:54:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:54:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:54:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:54:38 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 12:54:38 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 12:54:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...osa&quot;, &quot;ruang&quot;) VALUES ('798897', '737854', '814', '', 'NURHA...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:54:53 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...osa", "ruang") VALUES ('798897', '737854', '814', '', 'NURHA...
                                                             ^ - Invalid query: INSERT INTO "sm_indikasi_pasien_icu_tambahan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_user", "tanggal_ipi", "nama_pasien", "diagnosa", "ruang") VALUES ('798897', '737854', '814', '', 'NURHAYATI', 'batu ginjal kanan (Utama).', 'Jati')
ERROR - 2025-07-30 12:55:10 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 12:55:10 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 12:55:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:55:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:56:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:56:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 12:57:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 12:57:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 05:57:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 05:57:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 12:58:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:49 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:50 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 12:58:50 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 12:58:50 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 12:58:50 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:50 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 12:58:50 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 12:58:50 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 12:58:50 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 06:01:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:01:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:01:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:01:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:01:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:03:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('901782', '8', '', '3', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:03:53 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('901782', '8', '', '3', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('901782', '8', '', '3', 'Injeksi', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 13:03:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 13:04:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:04:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:04:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:04:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 13:04:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:06:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:06:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:06:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:06:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:06:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:07:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:07:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:08:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:08:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:08:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:08:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:08:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 13:10:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 13:10:15 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:10:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:10:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:11:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 13:11:28 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 13:11:28 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 13:11:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:11:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:11:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:11:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:12:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:12:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:12:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:12:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:12:56 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:13:50 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:13:50 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:13:50 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:13:50 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:50 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:50 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:13:50 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:50 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:51 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:13:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 06:13:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:13:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:13:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:13:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 06:14:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:14:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:14:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:14:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:14:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:14:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:14:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:14:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:14:29 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:14:29 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:14:29 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:14:29 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:14:29 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:14:29 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:14:29 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:14:29 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:14:30 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 13:14:30 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 13:14:30 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 13:14:30 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:14:30 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 13:14:30 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 13:14:30 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 13:14:30 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 06:14:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:14:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:14:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:14:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:14:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:15:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:15:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:15:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:15:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:15:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:15:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:15:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:15:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:16:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:16:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:16:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:16:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:16:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:16:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:16:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:16:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:17:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:17:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:17:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:17:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:17:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:17:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:18:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:18:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:18:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:18:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:18:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:18:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:19:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:19:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:19:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:19:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:20:52 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-07-30 13:20:56 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-07-30 13:22:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:22:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:22:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:22:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:22:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:22:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:23:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:23:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:23:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:23:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:23:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:23:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:23:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:23:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:23:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:23:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:23:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 06:23:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:23:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:23:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:23:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:24:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:24:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:24:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:25:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:26:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:26:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:26:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:26:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:26:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:26:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:26:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:27:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:27:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:27:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:27:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:29:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:29:54 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:30:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:30:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:30:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:31:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:31:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:31:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:31:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-07-30 13:31:44', 1386041, '105', '', '81315...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:31:44 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-07-30 13:31:44', 1386041, '105', '', '81315...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-07-30 13:31:44', 1386041, '105', '', '81315.00', '108311.58', '1', 108311.58, '259', '2037')
ERROR - 2025-07-30 13:32:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:32:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 13:32:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:32:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 13:33:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:34:51 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:37:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:37:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:37:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:37:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:39:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:39:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
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
ERROR - 2025-07-30 13:40:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:40:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:40:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:40:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:41:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:41:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:41:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:42:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:42:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:42:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 13:42:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:42:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:42:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:42:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-07-30 247&quot;
LINE 1: ...t_3&quot;:null,&quot;tindak_lanjut_4&quot;:null}', '331', '603', '2025-07-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:42:37 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-07-30 247"
LINE 1: ...t_3":null,"tindak_lanjut_4":null}', '331', '603', '2025-07-3...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_triase_igd" ("id_layanan_pendaftaran", "waktu_igd", "cara_datang_pasien_igd", "kesadaran_igd", "gcs_e_igd", "gcs_m_igd", "gcs_v_igd", "gcs_total_igd", "tekanan_darah_igd", "frekuensi_nadi_igd", "tinggi_badan_igd", "s_o2", "jalan_nafas_igd", "pernafasan_igd", "sirkulasi_igd", "kesadaran_igd_w", "asesment_triage_igd", "tindak_lanjut_igd", "id_perawatt_igd", "id_dokterr_igd", "tgl_jam_perawat", "ttd_perawat_igd", "ttd_dokter_igd", "tampilan_saga_1", "tampilan_saga_2", "tampilan_saga_3", "tampilan_saga_4", "tampilan_saga_5", "usaha_saga_1", "usaha_saga_2", "usaha_saga_3", "usaha_saga_4", "sirkulasi_saga_1", "sirkulasi_saga_2", "sirkulasi_saga_3", "gambarsaga_1", "gambarsaga_2", "gambarsaga_3", "gambarsaga_4", "gambarsaga_5", "gambarsaga_6", "created_date") VALUES ('798939', '2025-07-30 12:46', '{"cara_datang_pasien_igd_1":null,"cara_datang_pasien_igd_2":null,"cara_datang_pasien_igd_3":null,"cara_datang_pasien_igd_4":"1","cara_datang_pasien_igd_5":"pkm pondok bahar","cara_datang_pasien_igd_6":null,"cara_datang_pasien_igd_7":"1","cara_datang_pasien_igd_8":null,"cara_datang_pasien_igd_9":"1","cara_datang_pasien_igd_10":null,"cara_datang_pasien_igd_11":null,"cara_datang_pasien_igd_12":null}', '{"kesadaran_igd_1":"1","kesadaran_igd_2":null,"kesadaran_igd_3":null,"kesadaran_igd_4":null,"kesadaran_igd_5":null}', '4', '6', '5', '15', '{"tekanan_darah_igd_1":"124","tekanan_darah_igd_2":"81","tekanan_darah_igd_3":"37"}', '{"frekuensi_igd_1":"108","frekuensi_igd_2":"20"}', '{"tinggi_badan_igd_1":null,"tinggi_badan_igd_2":null}', '{"imunisasi_igd_1":"98","imunisasi_igd_2":null,"imunisasi_igd_3":null}', '{"jalan_nafas_igd_1":null,"jalan_nafas_igd_2":null,"jalan_nafas_igd_3":"1","jalan_nafas_igd_4":null,"jalan_nafas_igd_5":null,"jalan_nafas_igd_6":null}', '{"pernafasan_igd_1":null,"pernafasan_igd_2":null,"pernafasan_igd_3":"1","pernafasan_igd_4":null,"pernafasan_igd_5":null,"pernafasan_igd_6":null,"pernafasan_igd_7":null,"pernafasan_igd_8":null}', '{"sirkulasi_igd_1":null,"sirkulasi_igd_2":null,"sirkulasi_igd_3":"1","sirkulasi_igd_4":null,"sirkulasi_igd_5":null,"sirkulasi_igd_6":null,"sirkulasi_igd_7":null,"sirkulasi_igd_8":"1","sirkulasi_igd_9":null,"sirkulasi_igd_10":null,"sirkulasi_igd_11":null,"sirkulasi_igd_12":null,"sirkulasi_igd_13":null,"sirkulasi_igd_14":"1","sirkulasi_igd_15":null,"sirkulasi_igd_16":null,"sirkulasi_igd_17":null,"sirkulasi_igd_18":null,"sirkulasi_igd_19":null,"sirkulasi_igd_20":null,"sirkulasi_igd_21":null}', '{"kesadaran_igdd_1":null,"kesadaran_igdd_2":null,"kesadaran_igdd_3":null,"kesadaran_igdd_4":"1","kesadaran_igdd_5":null,"kesadaran_igdd_6":null,"kesadaran_igdd_7":null,"kesadaran_igdd_8":null,"kesadaran_igdd_9":null,"kesadaran_igdd_10":null,"kesadaran_igdd_11":null,"kesadaran_igdd_12":null,"kesadaran_igdd_13":null,"kesadaran_igdd_14":null,"kesadaran_igdd_15":"1"}', '{"asesment_triage_1":null,"asesment_triage_2":null,"asesment_triage_3":null,"asesment_triage_4":"1","asesment_triage_5":null,"asesment_triage_6":null,"asesment_triage_7":null,"asesment_triage_8":null,"asesment_triage_9":null,"asesment_triage_10":null}', '{"tindak_lanjut_1":null,"tindak_lanjut_2":"1","tindak_lanjut_3":null,"tindak_lanjut_4":null}', '331', '603', '2025-07-30 247', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-30 13:42:37')
ERROR - 2025-07-30 13:42:44 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:42:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:42:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:42:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:42:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:43:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:43:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:43:41 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-30 13:43:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:43:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:43:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:43:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:44:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:44:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:44:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:44:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:44:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 13:44:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:44:50 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-30 06:45:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:45:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:45:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:45:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:45:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:45:15 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-07-30 13:45:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:45:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:45:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:45:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:45:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:45:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:47:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:47:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:48:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:48:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:48:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:48:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:48:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:48:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:48:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:48:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:48:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:48:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:48:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:48:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:50:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:50:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:50:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:50:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:50:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:50:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 13:50:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:50:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:50:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:51:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:51:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:51:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:51:20 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('797468', '2025-07-30 13:34', '11', '', '', '', '', 'BB :70 Kg, TB :144 Cm, IMT : 33,7 kg/m2, ( Status Gizi : Obese III ) ABW : 51,76 kg TD MRS: 146/109 mmHg. Dyspneu ec myasthenia gravis + HT mual, nafsu makan turun, makan hanya 1/2P. Os mengaku tidak suka makanan terlalu manis dan terlalu asin. RR : 29x/menit, terpasang O2 NK 4Lpm, O2 Saturasi 99%, pengembangan dada simetris, Rhonki -/-whezing -/- C: Akral hangat, nadi kuat, CRT &lt; 3 detik, TD : 137/71 mmHg (MAP 81mmHg), Nadi : 103x/menit. Tgl 25/7/25 terpasang IVFD di TAKI no 22 . Ringer Laktat 20 TPM D: Kesadaran compos mentis, GCS E4M6V5 Pupil 2/2 RC +/+, kekuatan otot 5/5/5/5 E: suhu 36,4 C. Terpasang DC tanggal 25/7/2025 produksi urine (+). Diuresis : 1,4 cc/kgBB/jam, tidak ada luka dekubitus. Lab tanggal 28/7/25. pH H 7.486, p CO2 35.5 mm Hg, p O2 H 99 mm, HCO3 H 27 mEq/L, Base Excess H 3.4 mmol/L, Hasil LAB (HB 14.5 HT 44 Leuko 15.0 Trombo 447 Natrium 146 Kalium 3.9)', 'Inadekuat oral intake berkaitan dengan penurunan daya terima makan ditandai dengan mual, nafsu makan turun, makan hanya 1/4P, asupan &lt;80% kebutuhan - Penurunan kebutuhan zat gizi Na berkaitan dengan riwayat hi[ertensi ditandai dengan TD MRS: 146/109 HR : 112 x/m', 'Diet BB RG DL 1500 Kkal P : 56,25 Gr L : 33,3 Gr KH : 243,3 Gr Cairan 2100 ml. bentuk makanan lunak, rute oral, freuensi 3x makan utama 2x snack. Edukasi Gizi dan konsultasi gizi tentang diet lambung dan rendah garam ke pasien', 'Target Asupan >=80% kebutuhan - TD terkontrol
30/7/25 MRS 146/109 mmHg menjadi TD : 137/71 mmHg, asupan makan sebelumnya 25% menjadi 50 Úri kebutuhan
', '', '', '', '', '1433', '1', '<p>Diet BB RG DL 1500 Kkal P : 56,25 Gr L : 33,3 Gr KH : 243,3 Gr Cairan 2100 ml.</p><p><br></p><p>Edukasi Gizi dan konsultasi gizi tentang diet lambung dan rendah garam ke pasien</p>', NULL, '1433', 0, NULL, '2025-07-30 13:51:20')
ERROR - 2025-07-30 13:51:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:51:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:51:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:51:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:52:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:52:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:52:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:52:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 06:52:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:52:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:52:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:52:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 06:52:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:52:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:53:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:53:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:53:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:53:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:53:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:53:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:53:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:53:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:53:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:53:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:53:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:53:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:54:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:54:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:54:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:54:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:54:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:54:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:54:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:54:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 06:54:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:54:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:54:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:54:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:54:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:54:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 06:54:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:54:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:54:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:54:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:54:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:54:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:57:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:57:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:57:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:57:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:57:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 13:57:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 13:57:53 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:58:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:58:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 13:58:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 13:59:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 06:59:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:59:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:59:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 06:59:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:00:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:00:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 07:00:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:00:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:00:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:00:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:00:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:00:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:01:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:01:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:01:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:01:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:01:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:01:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:02:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:02:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:02:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:02:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:02:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:02:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:02:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:03:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:03:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:03:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:03:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:03:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:03:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:03:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 14:03:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:03:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:03:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:03:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 14:03:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:03:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:03:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:03:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:03:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 07:03:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 14:03:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:03:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 07:03:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:03:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 14:04:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:04:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 07:04:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 07:04:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 264
ERROR - 2025-07-30 14:04:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:04:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:04:57 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:05:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:06:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:06:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:06:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:06:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:06:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:06:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:06:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:07:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:07:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:07:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:08:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:08:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:11:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:11:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:11:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:11:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:11:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 14:11:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 14:11:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:12:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:13:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:13:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:13:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('901545', '10', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:13:56 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('901545', '10', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('901545', '10', '', '1', '1 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 14:16:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:16:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:16:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:16:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:16:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:16:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:16:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:16:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:16:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:16:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:18:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:18:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:19:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:19:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:20:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:20:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:20:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:20:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:20:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:20:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:20:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:21:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:21:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:21:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:21:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:23:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:23:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:23:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:24:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:24:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:24:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:24:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:25:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:25:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:25:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:26:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:26:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:26:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:26:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:26:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:26:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:26:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:26:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:27:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:27:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:27:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:27:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:27:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:27:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:27:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:27:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:27:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:27:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 14:28:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 14:28:15 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 14:28:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:28:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:28:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:28:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:29:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:29:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 07:30:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:30:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:31:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:31:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:31:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:31:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:31:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 07:31:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:31:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:31:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:31:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:31:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:31:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:31:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:31:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:31:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:31:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:31:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:31:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:32:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:32:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:32:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:32:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:32:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:32:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:32:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('902042', '2', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:32:42 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('902042', '2', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('902042', '2', '', '1', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 14:33:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:33:10 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:33:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:33:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:33:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:33:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:33:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:33:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:34:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:34:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:34:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:34:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:34:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:34:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:34:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:34:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:34:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:34:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:35:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:35:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:35:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:35:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:36:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:36:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:36:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:37:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:37:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:37:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:37:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:37:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:37:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:37:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:37:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:37:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:38:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:38:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:38:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:38:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:38:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:39:11 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-07-30 14:39:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:40:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:40:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:41:10 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:41:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 07:41:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 07:41:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:42:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:42:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:42:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:43:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:43:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:43:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:44:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:44:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:44:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:44:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:44:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:47:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:47:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:48:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:48:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:51:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:53:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 14:53:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:53:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:53:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:53:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 14:54:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:55:05 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:55:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:55:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 14:56:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:56:22 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-07-30 14:56:22 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-07-30 14:56:22 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-07-30 14:56:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 14:57:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 14:57:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 14:57:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 14:57:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:58:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:58:10 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:58:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:58:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:58:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:58:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:59:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:59:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:59:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:59:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:59:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:59:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:59:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:59:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:59:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:59:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 14:59:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 14:59:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:00:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7043
ERROR - 2025-07-30 08:03:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:03:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:03:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:03:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 15:04:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:04:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:05:34 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-07-30 15:06:35 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:06:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:07:25 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:07:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:07:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:07:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:07:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 15:08:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:08:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:08:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:09:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:09:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:09:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:09:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:09:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 15:09:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:09:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 15:10:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:10:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 15:10:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 15:10:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:10:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:10:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:10:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:10:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:10:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:11:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:11:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:11:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:11:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:11:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:11:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:11:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:11:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:11:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:12:03 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:12:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:13:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:13:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:13:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:13:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:13:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:13:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:14:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:14:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:14:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:15:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:15:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:15:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:15:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:15:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:15:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:15:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:15:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:15:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 15:15:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:16:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:16:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:16:50 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:17:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:17:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:17:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:17:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:18:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:18:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:18:34 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:19:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:20:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:21:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:22:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:23:33 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:23:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:24:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:24:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:25:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 15:25:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 15:25:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:27:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:28:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:28:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:29:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:29:34 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8967
ERROR - 2025-07-30 15:29:34 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12394
ERROR - 2025-07-30 15:29:34 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12398
ERROR - 2025-07-30 15:29:34 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12408
ERROR - 2025-07-30 15:29:34 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12412
ERROR - 2025-07-30 15:29:34 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8982
ERROR - 2025-07-30 15:29:34 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8987
ERROR - 2025-07-30 15:30:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_rm /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 122
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_ktp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 130
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 136
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: kelamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 142
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tempat_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tanggal_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: agama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 154
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_telp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 160
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 166
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: alamat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 172
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: status_kawin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 225
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: penjamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 231
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: jenis_pendaftaran /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 237
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 243
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_rm /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 122
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_ktp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 130
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 136
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: kelamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 142
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tempat_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tanggal_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: agama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 154
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_telp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 160
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 166
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: alamat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 172
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: status_kawin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 225
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: penjamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 231
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: jenis_pendaftaran /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 237
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 243
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_rm /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 122
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_ktp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 130
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 136
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: kelamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 142
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tempat_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tanggal_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: agama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 154
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_telp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 160
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 166
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: alamat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 172
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: status_kawin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 225
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: penjamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 231
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: jenis_pendaftaran /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 237
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 243
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_rm /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 122
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_ktp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 130
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 136
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: kelamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 142
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tempat_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tanggal_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: agama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 154
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_telp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 160
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 166
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: alamat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 172
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: status_kawin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 225
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: penjamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 231
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: jenis_pendaftaran /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 237
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 243
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_rm /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 122
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_ktp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 130
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 136
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: kelamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 142
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tempat_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tanggal_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: agama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 154
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_telp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 160
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 166
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: alamat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 172
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: status_kawin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 225
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: penjamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 231
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: jenis_pendaftaran /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 237
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 243
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_rm /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 122
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_ktp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 130
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 136
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: kelamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 142
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tempat_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: tanggal_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: agama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 154
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: no_telp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 160
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 166
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: alamat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 172
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: status_kawin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 225
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: penjamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 231
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: jenis_pendaftaran /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 237
ERROR - 2025-07-30 15:31:25 --> Severity: Notice  --> Undefined variable: nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 243
ERROR - 2025-07-30 15:31:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:33:19 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:34:00 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:34:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:34:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:35:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:35:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:35:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:36:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:39:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:40:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:40:30 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:40:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:41:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:42:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:42:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:42:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:43:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:44:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:44:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:47:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:48:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:48:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:50:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:50:25 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:50:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 15:52:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:53:05 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:53:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 08:54:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:54:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 15:54:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:55:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 08:55:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 08:55:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 15:55:53 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-07-30 15:56:26 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-07-30 15:56:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:56:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:56:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:57:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:57:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 15:57:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 15:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:57:42 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 15:57:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(62241) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:57:48 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(62241) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '62241'
ERROR - 2025-07-30 15:57:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(62241) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:57:57 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(62241) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '62241'
ERROR - 2025-07-30 15:58:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(62241) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:58:10 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(62241) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '62241'
ERROR - 2025-07-30 15:58:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(62241) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:58:29 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(62241) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '62241'
ERROR - 2025-07-30 15:59:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(62241) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 15:59:28 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(62241) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '62241'
ERROR - 2025-07-30 15:59:54 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:00:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:00:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:00:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:00:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:01:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:02:35 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:02:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:02:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:02:47 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:02:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:03:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:03:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:04:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:04:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:04:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: no_rm /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 122
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: no_ktp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 130
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 136
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: kelamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 142
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: tempat_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: tanggal_lahir /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 148
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: agama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 154
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: no_telp /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 160
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 166
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: alamat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 172
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: status_kawin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 225
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: penjamin /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 231
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: jenis_pendaftaran /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 237
ERROR - 2025-07-30 16:05:52 --> Severity: Notice  --> Undefined variable: nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran_igd/views/printing/identitas_pasien.php 243
ERROR - 2025-07-30 16:05:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:06:05 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:06:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:07:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:07:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:07:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:07:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:09:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:09:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:09:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:09:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 09:09:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:09:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:09:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:09:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:09:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 09:10:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:10:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:10:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:10:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 09:10:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:10:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:10:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:10:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:10:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:10:59 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:11:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:11:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:11:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 16:11:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 16:11:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:12:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:12:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:12:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:12:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:13:10 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:14:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:14:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:14:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:14:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:15:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:15:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:15:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:17:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:17:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:17:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:17:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:18:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('901685', '8', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:18:02 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('901685', '8', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('901685', '8', '1', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 16:18:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:18:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:18:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:19:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:19:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:19:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:19:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:19:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:19:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:20:23 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:20:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:20:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:20:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:20:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:20:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:21:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:21:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:21:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:22:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:22:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:22:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:22:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:22:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:22:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:23:17 --> Severity: error  --> Exception: Too few arguments to function Pelayanan::get_detail_pasien_skd_get(), 0 passed and exactly 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 13488
ERROR - 2025-07-30 16:23:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 16:23:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:23:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:24:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:24:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:24:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:24:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:25:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:25:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:25:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:26:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:26:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:26:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:26:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:27:36 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:28:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:28:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:28:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:28:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:28:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 09:33:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 09:33:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:33:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:38:41 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:39:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:40:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:40:46 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:40:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:40:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:41:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:41:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:43:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:43:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:44:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 16:44:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:46:47 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 16:47:48 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 16:53:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 16:59:40 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:01:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 17:04:08 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:09:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 17:09:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 17:12:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:12:09 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 17:12:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:12:09 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 17:12:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:12:09 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-07-30 10:12:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:12:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:12:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:12:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:12:45 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:13:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:13:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:13:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:13:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:14:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 17:17:00 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:17:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:17:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:17:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:17:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:17:23 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 17:17:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:17:35 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:17:47 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:22:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:22:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:23:29 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:24:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:24:02 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-07-30 17:25:01 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:26:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:26:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:26:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 17:26:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 17:27:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:27:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:27:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6747582, '550', 10800, '100', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:27:57 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6747582, '550', 10800, '100', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6747582, '550', 10800, '100', '1.00', 'Ya', 'null')
ERROR - 2025-07-30 17:28:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:28:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:28:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 17:28:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:28:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:28:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 17:28:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 17:28:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:28:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:30:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:30:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:38:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:38:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:38:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:38:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:38:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:38:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:41:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:41:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 17:41:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:41:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 17:43:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 17:46:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:46:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:49:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:49:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:49:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6747624, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:49:55 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6747624, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6747624, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-07-30 17:50:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 17:50:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 17:52:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 10:52:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:52:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:52:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:52:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:52:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:52:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:53:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:53:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:54:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:55:58 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:56:32 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 10:57:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:57:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:57:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 10:57:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 18:00:23 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 18:03:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:03:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:03:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6747718, '689', 8287.2, '0.9', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:03:07 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6747718, '689', 8287.2, '0.9', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6747718, '689', 8287.2, '0.9', '2.00', 'Ya', 'null')
ERROR - 2025-07-30 18:03:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:03:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:04:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:04:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:04:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:04:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:04:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:04:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 11:05:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 11:05:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 18:05:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:05:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:12:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 18:20:51 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 18:20:51 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 18:20:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-07-30 18:22:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:22:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:25:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 18:27:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:27:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:32:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 18:33:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 18:33:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:33:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 18:33:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:33:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 18:33:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 18:50:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:50:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:52:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 18:52:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 18:57:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 18:57:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 19:03:09 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 19:03:12 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 19:03:17 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 19:03:20 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 12:04:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:04:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:12:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 19:13:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:13:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 19:13:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:13:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:53 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:54 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:55 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:56 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:57 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:13:57 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:13:57 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:13:57 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:57 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:13:57 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:13:57 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:13:57 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:15:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:15:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 19:15:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:15:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 19:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 19:22:18 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 19:29:30 --> Severity: Notice  --> Trying to get property 'id_barang' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6690
ERROR - 2025-07-30 19:29:30 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6691
ERROR - 2025-07-30 19:29:30 --> Severity: Notice  --> Trying to get property 'id_integrasi_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6853
ERROR - 2025-07-30 19:29:30 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:29:30 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6856
ERROR - 2025-07-30 19:29:30 --> Severity: Notice  --> Trying to get property 'id_medication_request' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6865
ERROR - 2025-07-30 19:29:30 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:29:30 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/satu_sehat/controllers/api/Satu_sehat.php 6868
ERROR - 2025-07-30 19:29:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:29:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 19:30:27 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 19:36:38 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 19:36:38 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-07-30 19:36:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-07-30 19:38:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:38:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 19:41:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 19:42:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:42:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 19:42:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:42:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 19:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 19:45:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 19:48:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 19:53:07 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 19:54:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 19:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:57:42 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-07-30 19:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 19:57:42 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-07-30 19:59:10 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 12:59:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 12:59:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 20:03:01 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 20:03:01 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 20:03:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:03:28 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 20:03:28 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-07-30 13:04:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 13:04:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 20:05:16 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 20:06:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:09:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:09:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:15:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:15:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:16:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:16:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:20:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:20:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:20:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:20:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:20:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:20:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:20:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:20:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:20:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:20:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:20:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:20:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:22:10 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:23:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:26:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:26:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:31:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 20:35:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:36:38 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 20:38:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:41:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:45:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:48:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:48:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:50:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:52:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:52:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:52:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 20:52:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 20:53:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 20:53:11 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 20:53:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 20:59:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:01:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:03:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:03:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:04:54 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:06:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:07:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:08:28 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 21:09:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:09:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:10:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:10:25 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:13:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:14:00 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:16:19 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:17:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:18:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:18:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:19:02 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 21:19:33 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:19:56 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:19:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:20:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 21:20:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 21:21:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 21:22:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:22:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:24:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:26:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:26:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:26:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:27:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:27:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:28:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:28:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:31:56 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:32:03 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:32:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:33:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:33:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:35:23 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:35:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:35:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 21:35:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 21:35:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:38:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:38:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:39:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:40:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:41:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;43.8&quot;
LINE 1: ...600', '797408', '1686', '2025-07-30', NULL, '40', '43.8', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 21:41:05 --> Query error: ERROR:  invalid input syntax for type smallint: "43.8"
LINE 1: ...600', '797408', '1686', '2025-07-30', NULL, '40', '43.8', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('736600', '797408', '1686', '2025-07-30', NULL, '40', '43.8', '18', NULL, '101.8', '31', NULL, NULL, NULL, NULL, '31', '70.8', NULL, '99', 'cpap 7', 'cm', 'M', NULL, NULL, '0:00', '274', '2025-07-30 21:39:12')
ERROR - 2025-07-30 21:41:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:41:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:44:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('902178', '2', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 21:44:51 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('902178', '2', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('902178', '2', '', '', 'Injeksi', '', 'null', '0', '', '0', 'MORN', 'mersibion', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 21:45:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:47:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:48:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:50:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 21:50:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 21:50:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 21:50:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 21:50:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:50:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:50:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 21:51:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 14:51:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 14:51:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 21:54:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:54:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 21:54:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 21:54:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 21:57:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 21:57:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 21:58:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:02:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:04:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:04:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:08:13 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 22:09:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 22:11:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 22:11:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 22:15:18 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:15:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:18:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:18:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:18:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:18:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:21:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:21:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:22:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:23:21 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 22:24:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:24:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:24:52 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 22:28:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:28:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:29:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:29:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:30:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:30:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:30:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:30:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:30:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:30:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:30:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:30:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:31:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:31:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:31:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:31:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:31:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:31:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:33:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:36:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:40:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:40:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 22:40:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:40:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:41:15 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 22:41:15 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 22:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 22:49:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:49:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:49:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:49:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:53:16 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 22:57:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:57:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:57:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('902202', '1', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:57:44 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('902202', '1', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('902202', '1', '2', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', '***', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 22:57:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:57:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 22:58:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('902202', '1', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:58:08 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('902202', '1', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('902202', '1', '2', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', '', '***', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 22:58:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 22:58:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 23:01:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:01:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 23:02:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 23:02:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-07-30 23:03:25 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1515
ERROR - 2025-07-30 23:03:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1515
ERROR - 2025-07-30 23:03:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1515
ERROR - 2025-07-30 23:03:31 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1515
ERROR - 2025-07-30 23:05:24 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 23:06:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:06:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:07:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:07:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:07:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:07:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:08:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:08:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:08:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:08:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:08:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:08:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:09:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:09:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:16:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-07-30 23:16:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-07-30 23:26:28 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 23:26:28 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 16:27:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:27:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:27:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:27:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:27:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:27:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:37:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:37:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 23:38:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:38:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:39:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:39:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:39:04 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 23:41:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-07-30 23:41:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-07-30 23:41:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:41:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 23:41:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('902227', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:41:44 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('902227', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('902227', '2', '', '', '', '', 'PC', '0', '', '0', '', 'suction no 16 ', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 23:42:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:42:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 23:42:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('902227', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:42:24 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('902227', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('902227', '2', '', '', '', '', 'PC', '0', '', '0', '', 'suction no 16 ', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-07-30 23:43:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:43:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 16:45:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 16:45:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:48:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:48:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 23:56:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:56:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 23:57:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-07-30 23:57:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-07-30 23:57:55 --> 404 Page Not Found --> /index
ERROR - 2025-07-30 17:14:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:14:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:14:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:14:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:14:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:14:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:14:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:14:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:15:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 17:15:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 18:24:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 18:24:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 18:24:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 18:24:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 18:26:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 18:26:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:00:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:00:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:00:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:00:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:01:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:01:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:01:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:01:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:01:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:01:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:16:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:16:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:16:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:16:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:29:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:29:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:51:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:51:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:52:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:52:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:52:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:52:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:52:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:52:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:52:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:52:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:54:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:54:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:54:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 19:54:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 20:18:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 20:18:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 22:35:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 22:35:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 22:35:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 22:35:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 22:46:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 22:46:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 22:46:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 22:46:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:48:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:48:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:50:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:50:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:51:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:51:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:51:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-07-30 23:51:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
