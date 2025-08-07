<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-03-15 00:10:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 00:28:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 00:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 00:39:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5787298, '703', 206.4, '50', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 00:39:20 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5787298, '703', 206.4, '50', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5787298, '703', 206.4, '50', '2.00', 'Ya', 'null')
ERROR - 2025-03-15 00:53:22 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-03-15 00:53:29 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-03-15 02:04:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 02:04:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-15 02:04:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 02:04:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-15 02:04:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 02:21:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot; 00:00:00&quot;
LINE 27: WHERE &quot;r&quot;.&quot;tanggal&quot; BETWEEN ' 00:00:00' AND '2025-03-15 23:5...
                                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 02:21:49 --> Query error: ERROR:  invalid input syntax for type date: " 00:00:00"
LINE 27: WHERE "r"."tanggal" BETWEEN ' 00:00:00' AND '2025-03-15 23:5...
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
WHERE "r"."tanggal" BETWEEN ' 00:00:00' AND '2025-03-15 23:59:59'
ORDER BY "r"."id" DESC, "r"."tanggal" DESC
 LIMIT 10
ERROR - 2025-03-15 02:21:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot; 00:00:00&quot;
LINE 27: WHERE &quot;r&quot;.&quot;tanggal&quot; BETWEEN ' 00:00:00' AND '2025-03-15 23:5...
                                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 02:21:57 --> Query error: ERROR:  invalid input syntax for type date: " 00:00:00"
LINE 27: WHERE "r"."tanggal" BETWEEN ' 00:00:00' AND '2025-03-15 23:5...
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
WHERE "r"."tanggal" BETWEEN ' 00:00:00' AND '2025-03-15 23:59:59'
ORDER BY "r"."id" DESC, "r"."tanggal" DESC
 LIMIT 10
ERROR - 2025-03-15 04:20:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 04:31:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 05:07:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-15 05:22:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5787485, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 05:22:08 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5787485, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5787485, '922', 1017.648, '1', '1.00', NULL, 'null')
ERROR - 2025-03-15 05:33:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-15 05:39:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 05:39:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 05:39:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 05:39:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 05:39:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 05:39:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 05:42:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 05:49:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:01:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2420
ERROR - 2025-03-15 06:01:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2433
ERROR - 2025-03-15 06:01:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2446
ERROR - 2025-03-15 06:02:19 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2420
ERROR - 2025-03-15 06:02:19 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2433
ERROR - 2025-03-15 06:02:19 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2446
ERROR - 2025-03-15 06:27:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:28:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:30:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:30:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:30:42 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37-38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"1","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":null,"aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":"dbn","aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":"EKG Lead","aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', NULL, '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:30:42')
ERROR - 2025-03-15 06:30:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:30:47 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37-38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"1","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":null,"aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":"dbn","aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":"EKG Lead","aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', NULL, '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:30:47')
ERROR - 2025-03-15 06:31:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:31:08 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37-38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"1","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":null,"aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":"dbn","aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":"EKG Lead","aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', NULL, '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:31:08')
ERROR - 2025-03-15 06:31:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:31:16 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37-38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"1","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":null,"aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":"dbn","aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":"EKG Lead","aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', NULL, '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:31:16')
ERROR - 2025-03-15 06:32:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:32:20 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37-38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"1","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":null,"aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":"dbn","aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":"EKG Lead","aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', NULL, '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:32:20')
ERROR - 2025-03-15 06:32:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:32:42 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37-38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"1","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":null,"aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":"dbn","aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":"EKG Lead","aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', NULL, '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:32:42')
ERROR - 2025-03-15 06:40:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:40:35 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37=38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"0","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":"1","aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":null,"aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":null,"aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', 'asma', '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:40:35')
ERROR - 2025-03-15 06:40:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:40:55 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37=38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"0","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":"1","aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":null,"aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":"1"}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":null,"aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', 'asma', '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:40:55')
ERROR - 2025-03-15 06:41:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:41:10 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37-38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"1","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":null,"aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":"dbn","aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":null}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":"EKG Lead","aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', NULL, '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:41:10')
ERROR - 2025-03-15 06:41:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:41:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:41:30 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37=38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"0","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":"1","aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":null,"aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":"1"}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":null,"aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', 'asma', '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:41:30')
ERROR - 2025-03-15 06:41:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:41:39 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37=38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"0","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":"1","aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":null,"aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":"1"}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":null,"aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', 'asma', '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:41:39')
ERROR - 2025-03-15 06:41:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(32) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:41:49 --> Query error: ERROR:  value too long for type character varying(32) - Invalid query: INSERT INTO "sm_assesmen_awal_anestesi_sedassi" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "aaas_diagnosis", "aaas_rot", "aaas_perawat", "aaas_anamnesa", "aaas_riwayat_anestesi", "aaas_komplikasi", "aaas_konsumsi_obat", "aaas_riwayat_alergi", "aaas_tanda", "aaas_berat", "aaas_skor_nyeri", "aaas_evaluasi", "aaas_pernafasan", "aaas_kardiovaskular", "aaas_neuro", "aaas_renal", "aaas_hepato", "aaas_lain", "aaas_hematologi", "aaas_serum", "aaas_fungsi", "aaas_ginjal", "aaas_edokorin", "aaas_agd", "aaas_pemeriksaan", "baru", "aaas_sedasi", "aaas_ga", "aaas_regional", "aaas_teknik", "aaas_monitoring", "aaas_alat", "aaas_pasca", "aaas_ps", "aaas_penyulit", "aaas_puasa", "aaas_premedikal", "aaas_catatan", "aaas_pemeriksa_asesmen_anestesi", "aaas_tanggal_pemeriksaan_pasien", "aaas_pemeriksa", "created_date") VALUES ('710942', '656217', '815', 'G3P2A0 H 37=38 minggu + BSC 2x', 'SC', '50', '{"aaas_anamnesa":"Pasien","aaas_anamnesa_4":null}', '{"aaas_riwayat_anestesi":"Normal","aaas_riwayat_anestesi_4":"2021"}', '{"aaas_komplikasi":"Kering","aaas_komplikasi_4":null}', NULL, '{"aaas_riwayat_alergi":"Normal","aaas_riwayat_alergi_4":"udang"}', NULL, '{"aaas_berat_1":null,"aaas_berat_2":null,"aaas_berat_3":null,"aaas_berat_4":null,"aaas_berat_5":null,"aaas_berat_6":null}', '{"aaas_skor_nyeri":"2"}', '{"aaas_evaluasi_1":"1","aaas_evaluasi_3":"0","aaas_evaluasi_5":"1","aaas_evaluasi_7":null,"aaas_evaluasi_8":"1","aaas_evaluasi_10":null,"aaas_evaluasi_11":"1","aaas_evaluasi_13":null,"aaas_evaluasi_14":"0","aaas_evaluasi_16":"1","aaas_evaluasi_18":"2","aaas_evaluasi_22":"0","aaas_evaluasi_24":"0","aaas_evaluasi_26":"0","aaas_evaluasi_28":"0"}', '{"aaas_pernafasan_1":"1","aaas_pernafasan_2":null,"aaas_pernafasan_3":null,"aaas_pernafasan_4":null,"aaas_pernafasan_5":null,"aaas_pernafasan_6":null,"aaas_pernafasan_7":null,"aaas_pernafasan_8":null,"aaas_pernafasan_9":null,"aaas_pernafasan_10":null,"aaas_pernafasan_11":null,"aaas_pernafasan_12":null}', '{"aaas_kardiovaskular_1":null,"aaas_kardiovaskular_2":null,"aaas_kardiovaskular_3":null,"aaas_kardiovaskular_4":null,"aaas_kardiovaskular_5":null,"aaas_kardiovaskular_6":null,"aaas_kardiovaskular_7":null,"aaas_kardiovaskular_8":null,"aaas_kardiovaskular_9":null,"aaas_kardiovaskular_10":null,"aaas_kardiovaskular_11":"dbn","aaas_kardiovaskular_12":null}', '{"aaas_neuro_1":null,"aaas_neuro_2":null,"aaas_neuro_3":null,"aaas_neuro_4":null,"aaas_neuro_5":null,"aaas_neuro_6":null,"aaas_neuro_7":null,"aaas_neuro_8":null,"aaas_neuro_9":"dbn","aaas_neuro_10":null}', '{"aaas_renal_1":null,"aaas_renal_2":null,"aaas_renal_3":null,"aaas_renal_4":null,"aaas_renal_5":"dbn","aaas_renal_6":null}', '{"aaas_hepato_1":null,"aaas_hepato_2":null,"aaas_hepato_3":null,"aaas_hepato_4":null,"aaas_hepato_5":null,"aaas_hepato_6":null,"aaas_hepato_7":"dbn","aaas_hepato_8":null}', '{"aaas_lain_1":null,"aaas_lain_2":null,"aaas_lain_3":null,"aaas_lain_4":null,"aaas_lain_5":null,"aaas_lain_6":null,"aaas_lain_7":null,"aaas_lain_8":null,"aaas_lain_9":null,"aaas_lain_10":null,"aaas_lain_11":null,"aaas_lain_12":"dbn","aaas_lain_13":"1"}', '{"aaas_hematologi_1":null,"aaas_hematologi_2":null,"aaas_hematologi_3":null,"aaas_hematologi_4":null,"aaas_hematologi_5":null,"aaas_hematologi_6":null}', '{"aaas_serum_1":null,"aaas_serum_2":null,"aaas_serum_3":null,"aaas_serum_4":null}', '{"aaas_fungsi_1":null,"aaas_fungsi_2":null,"aaas_fungsi_3":null,"aaas_fungsi_4":null,"aaas_fungsi_5":null,"aaas_fungsi_6":null,"aaas_fungsi_7":null,"aaas_fungsi_8":null}', '{"aaas_ginjal_1":null,"aaas_ginjal_2":null}', '{"aaas_edokorin_1":null,"aaas_edokorin_2":null,"aaas_edokorin_3":null,"aaas_edokorin_4":null,"aaas_edokorin_5":null,"aaas_edokorin_6":null}', '{"aaas_agd_1":null,"aaas_agd_2":null,"aaas_agd_3":null,"aaas_agd_4":null,"aaas_agd_5":null}', '{"aaas_pemeriksaan_1":null,"aaas_pemeriksaan_2":null,"aaas_pemeriksaan_3":null,"aaas_pemeriksaan_4":null,"aaas_pemeriksaan_5":null,"aaas_pemeriksaan_6":null}', '{"baru_1":null,"baru_2":null,"baru_3":"1","baru_4":null}', NULL, NULL, '{"aaas_regional_1":"Spinal","aaas_regional_2":null,"aaas_regional_3":null,"aaas_regional_4":null}', '{"aaas_teknik_1":null,"aaas_teknik_2":null,"aaas_teknik_3":null,"aaas_teknik_4":null,"aaas_teknik_5":null}', '{"aaas_monitoring_1":null,"aaas_monitoring_2":"SpO2","aaas_monitoring_3":"NIBP","aaas_monitoring_4":null,"aaas_monitoring_5":null,"aaas_monitoring_6":null,"aaas_monitoring_7":null,"aaas_monitoring_8":null,"aaas_monitoring_9":null,"aaas_monitoring_10":null}', '{"aaas_alat_1":null,"aaas_alat_2":null,"aaas_alat_3":null,"aaas_alat_4":null,"aaas_alat_5":null}', '{"aaas_pasca_1":"Rawat Inap","aaas_pasca_8":null}', '{"aaas_ps_1":"2"}', 'asma', '6 jam sebelum operasi tidak mencukupi', 'Ondansetron 8 mg IV', NULL, '113', '2025-03-15 06:00', '1', '2025-03-15 06:41:49')
ERROR - 2025-03-15 06:43:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:44:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:44:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:45:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:45:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:46:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:47:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:47:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 06:47:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:48:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 06:50:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_antrian_bpjs&quot; violates foreign key constraint &quot;sm_antrian_bpjs_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:50:00 --> Query error: ERROR:  insert or update on table "sm_antrian_bpjs" violates foreign key constraint "sm_antrian_bpjs_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "status_jkn", "usia_pasien", "pasien_baru", "waktu_estimasi", "id_dokter", "status_rm", "nama_dokter", "jenis_kunjungan", "sisa_kuota", "total_kuota", "user_create", "id_jadwal_dokter") VALUES ('20250315F004', '004', 'F004', 'F', '358492', '30', 'INT', '2025-03-15', 0, '2025-03-15 06:50:00', 'Booking', 'rsud', 'NON JKN', 'ltempat', 0, '2025-03-15 07:36:00', 438, 0, 'dr. MARCELLINUS MAHARSIDI, Sp.PD', NULL, 52, 60, '1775', 0)
ERROR - 2025-03-15 06:57:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:57:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-15 06:57:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 06:57:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-15 06:59:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:02:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:02:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150049) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:02:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150049) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150049', '00185292', '2025-03-15 07:02:45', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001280865036', NULL, NULL, 'Lama', '0', '1775', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-03-15 07:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:02:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:02:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:04:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:04:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:04:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150060) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:04:30 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150060) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150060', '00298765', '2025-03-15 07:04:26', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002772462374', NULL, '102501100125Y001535', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250315B034')
ERROR - 2025-03-15 07:05:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:08:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:08:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150082) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:08:51 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150082) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150082', '00212871', '2025-03-15 07:08:48', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002325743739', NULL, '102501090225Y001119', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250315B060')
ERROR - 2025-03-15 07:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:10:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:10:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:10:14 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A001%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:10:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:10:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:10:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:10:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:10:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:10:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:11:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:11:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:11:06 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A063%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:11:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:11:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:11:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:11:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:12:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 07:12:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:12:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 07:12:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:12:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:12:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6080701) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:12:51 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6080701) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '806595'
ERROR - 2025-03-15 07:13:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:13:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150105) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:13:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150105) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150105', '00354802', '2025-03-15 07:13:04', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0003133535488', NULL, '022300090125Y000003', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250315B296')
ERROR - 2025-03-15 07:13:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:13:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:13:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6080701) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:13:19 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6080701) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '806595'
ERROR - 2025-03-15 07:13:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:13:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:13:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6080701) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:13:47 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6080701) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '806595'
ERROR - 2025-03-15 07:15:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:15:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:15:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A058%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:15:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:15:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:15:49 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A059%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:16:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:16:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:17:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:17:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:17:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:17:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:17:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:17:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:17:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:17:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 07:18:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:18:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:18:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:18:48 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A103%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:19:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150133) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:19:16 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150133) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150133', '00343817', '2025-03-15 07:19:14', 'Hemodialisa', 'Hemodialisa', 'Jalan', 1, NULL, NULL, 1, '0002299358272', NULL, '022300091224Y001689', 'Lama', NULL, 1768, 0, 'Belum', 'Poliklinik Hemodialisa', 0, 2, NULL, '20250315B329')
ERROR - 2025-03-15 07:19:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 07:19:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:21:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:22:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:22:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:22:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:23:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150152) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:23:07 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150152) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150152', '00370469', '2025-03-15 07:23:05', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001961077184', NULL, '102506020225Y003754', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250315B152')
ERROR - 2025-03-15 07:23:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:23:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150155) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:23:46 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150155) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150155', '00084585', '2025-03-15 07:23:45', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001830267549', NULL, NULL, 'Lama', '0', '1762', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-03-15 07:24:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:24:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:25:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:25:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:26:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:27:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:27:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A053%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:28:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:28:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:29:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:29:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:29:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:31:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:32:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:32:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:32:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:32:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:32:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:32:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-15 07:32:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:32:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-15 07:32:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:32:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:33:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:33:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:33:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:34:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150191) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:34:31 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150191) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150191', '00337204', '2025-03-15 07:34:29', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002744094936', NULL, '102501020225Y001634', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Anak', 0, 2, NULL, '20250315B073')
ERROR - 2025-03-15 07:35:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:35:58 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 07:35:58 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 07:36:01 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 07:36:01 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 07:36:08 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 07:36:08 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 07:36:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:36:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:36:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:36:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150196) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:36:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150196) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150196', '00074815', '2025-03-15 07:36:53', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001166781554', NULL, NULL, 'Lama', '0', '1762', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-03-15 07:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:37:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:37:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:37:37 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A060%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:37:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:39:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:39:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:40:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:40:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:41:52 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-15 07:41:52 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-15 07:41:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:41:54 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A069%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:42:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:42:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:43:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:43:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:43:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:43:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:44:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:46:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:46:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:46:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:46:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:46:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A065%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 07:47:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:47:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:50:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:50:04 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-03-15 07:51:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808087, '8', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:51:14 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (808087, '8', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808087, '8', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 07:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:53:35 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-15 07:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:54:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_pasien&quot; violates foreign key constraint &quot;sm_reseplog_id_pasien_fkey&quot; on table &quot;sm_reseplog&quot;
DETAIL:  Key (id)=(00352320) is still referenced from table &quot;sm_reseplog&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:54:48 --> Query error: ERROR:  update or delete on table "sm_pasien" violates foreign key constraint "sm_reseplog_id_pasien_fkey" on table "sm_reseplog"
DETAIL:  Key (id)=(00352320) is still referenced from table "sm_reseplog". - Invalid query: DELETE FROM "sm_pasien"
WHERE "id" = '00352320'
ERROR - 2025-03-15 07:54:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_pasien&quot; violates foreign key constraint &quot;sm_reseplog_id_pasien_fkey&quot; on table &quot;sm_reseplog&quot;
DETAIL:  Key (id)=(00352320) is still referenced from table &quot;sm_reseplog&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:54:53 --> Query error: ERROR:  update or delete on table "sm_pasien" violates foreign key constraint "sm_reseplog_id_pasien_fkey" on table "sm_reseplog"
DETAIL:  Key (id)=(00352320) is still referenced from table "sm_reseplog". - Invalid query: DELETE FROM "sm_pasien"
WHERE "id" = '00352320'
ERROR - 2025-03-15 07:55:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:55:09 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-15 07:55:30 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-15 07:55:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:55:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_pasien&quot; violates foreign key constraint &quot;sm_reseplog_id_pasien_fkey&quot; on table &quot;sm_reseplog&quot;
DETAIL:  Key (id)=(00352320) is still referenced from table &quot;sm_reseplog&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:55:49 --> Query error: ERROR:  update or delete on table "sm_pasien" violates foreign key constraint "sm_reseplog_id_pasien_fkey" on table "sm_reseplog"
DETAIL:  Key (id)=(00352320) is still referenced from table "sm_reseplog". - Invalid query: DELETE FROM "sm_pasien"
WHERE "id" = '00352320'
ERROR - 2025-03-15 07:56:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:56:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:56:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_pasien&quot; violates foreign key constraint &quot;sm_reseplog_id_pasien_fkey&quot; on table &quot;sm_reseplog&quot;
DETAIL:  Key (id)=(00352320) is still referenced from table &quot;sm_reseplog&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:56:45 --> Query error: ERROR:  update or delete on table "sm_pasien" violates foreign key constraint "sm_reseplog_id_pasien_fkey" on table "sm_reseplog"
DETAIL:  Key (id)=(00352320) is still referenced from table "sm_reseplog". - Invalid query: DELETE FROM "sm_pasien"
WHERE "id" = '00352320'
ERROR - 2025-03-15 07:57:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:57:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_pasien&quot; violates foreign key constraint &quot;sm_reseplog_id_pasien_fkey&quot; on table &quot;sm_reseplog&quot;
DETAIL:  Key (id)=(00352320) is still referenced from table &quot;sm_reseplog&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:57:29 --> Query error: ERROR:  update or delete on table "sm_pasien" violates foreign key constraint "sm_reseplog_id_pasien_fkey" on table "sm_reseplog"
DETAIL:  Key (id)=(00352320) is still referenced from table "sm_reseplog". - Invalid query: DELETE FROM "sm_pasien"
WHERE "id" = '00352320'
ERROR - 2025-03-15 07:57:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:58:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_pasien&quot; violates foreign key constraint &quot;sm_reseplog_id_pasien_fkey&quot; on table &quot;sm_reseplog&quot;
DETAIL:  Key (id)=(00352320) is still referenced from table &quot;sm_reseplog&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:58:03 --> Query error: ERROR:  update or delete on table "sm_pasien" violates foreign key constraint "sm_reseplog_id_pasien_fkey" on table "sm_reseplog"
DETAIL:  Key (id)=(00352320) is still referenced from table "sm_reseplog". - Invalid query: DELETE FROM "sm_pasien"
WHERE "id" = '00352320'
ERROR - 2025-03-15 07:58:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:58:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150246) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:58:25 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150246) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150246', '00311191', '2025-03-15 07:58:24', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049196608', NULL, '102504020225Y003896', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250315A112')
ERROR - 2025-03-15 07:58:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:58:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 07:58:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_pasien&quot; violates foreign key constraint &quot;sm_reseplog_id_pasien_fkey&quot; on table &quot;sm_reseplog&quot;
DETAIL:  Key (id)=(00352320) is still referenced from table &quot;sm_reseplog&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:58:46 --> Query error: ERROR:  update or delete on table "sm_pasien" violates foreign key constraint "sm_reseplog_id_pasien_fkey" on table "sm_reseplog"
DETAIL:  Key (id)=(00352320) is still referenced from table "sm_reseplog". - Invalid query: DELETE FROM "sm_pasien"
WHERE "id" = '00352320'
ERROR - 2025-03-15 07:58:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_pasien&quot; violates foreign key constraint &quot;sm_reseplog_id_pasien_fkey&quot; on table &quot;sm_reseplog&quot;
DETAIL:  Key (id)=(00352320) is still referenced from table &quot;sm_reseplog&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 07:58:47 --> Query error: ERROR:  update or delete on table "sm_pasien" violates foreign key constraint "sm_reseplog_id_pasien_fkey" on table "sm_reseplog"
DETAIL:  Key (id)=(00352320) is still referenced from table "sm_reseplog". - Invalid query: DELETE FROM "sm_pasien"
WHERE "id" = '00352320'
ERROR - 2025-03-15 07:59:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:00:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...3', '2025-03-15', '9', '1', '551', '2', '2', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:00:29 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...3', '2025-03-15', '9', '1', '551', '2', '2', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('654841', '709463', '2025-03-15', '9', '1', '551', '2', '2', '1', '', '2', '1', '1', '2025-03-15 07:59:48', '1984')
ERROR - 2025-03-15 08:00:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...3', '2025-03-15', '9', '1', '551', '2', '2', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:00:37 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...3', '2025-03-15', '9', '1', '551', '2', '2', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('654841', '709463', '2025-03-15', '9', '1', '551', '2', '2', '1', '', '2', '1', '1', '2025-03-15 07:59:48', '1984')
ERROR - 2025-03-15 08:01:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:01:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:01:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:02:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:02:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:03:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:03:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:03:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:03:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:03:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A049%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 08:04:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:05:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:06:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 08:06:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:06:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:08:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:08:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 08:08:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 08:08:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:09:22 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 08:09:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:09:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:09:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:10:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:10:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 08:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:10:51 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 08:10:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:11:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:11:50 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 08:12:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:12:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:12:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-03-15 08:12:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:13:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:14:04 --> Severity: Notice  --> Undefined variable: kategori_barang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-03-15 08:14:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-03-15 08:14:19 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 08:15:07 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 08:15:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:15:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:16:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:16:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:16:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:17:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:17:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:17:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:17:09 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A062%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 08:18:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:18:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:18:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:18:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 08:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:19:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150313) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:19:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150313) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150313', '00370793', '2025-03-15 08:19:06', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003562636858', NULL, '0223R0380325V001865', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Anak', 0, 2, NULL, '20250315B246')
ERROR - 2025-03-15 08:19:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150314) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:19:10 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150314) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150314', '00370351', '2025-03-15 08:19:09', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '11', NULL, NULL, NULL, 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik THT', 0, '2', '', '20250315F015')
ERROR - 2025-03-15 08:19:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:19:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 08:19:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:20:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:20:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:21:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:22:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:22:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:22:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-15 08:22:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:22:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-15 08:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:22:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:22:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:23:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:23:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:23:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:23:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:23:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:23:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:24:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:24:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:24:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-03-15 08:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:24:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:24:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:24:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:24:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:24:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:25:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:25:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 87
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-03-15 08:25:54 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 91
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 94
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 96
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$nama_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 26
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$id_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 27
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tanggal_lahir_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 28
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$asal_ruangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 41
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 59
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 60
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 65
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 66
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 74
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 75
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 79
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 80
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 84
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 85
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 89
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 90
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 94
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 95
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 99
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 100
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 104
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 105
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 109
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 110
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 114
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 115
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 119
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 120
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 124
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 125
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 130
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 131
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 136
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 137
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 142
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 143
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 148
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 149
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 154
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 155
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 160
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 161
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 169
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 170
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 174
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 175
ERROR - 2025-03-15 08:25:54 --> Severity: Notice  --> Undefined property: stdClass::$updated_on /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 181
ERROR - 2025-03-15 08:25:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:25:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:26:23 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7296
ERROR - 2025-03-15 08:26:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:26:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:26:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:26:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:26:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:26:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-15 08:26:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:26:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-15 08:27:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:27:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:27:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:27:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:27:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150339) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:27:33 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150339) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150339', '00065172', '2025-03-15 08:27:33', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001640856969', NULL, '102503040325Y001121', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik Mata', 0, '2', '', '20250315F018')
ERROR - 2025-03-15 08:27:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:27:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:27:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:28:08 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7296
ERROR - 2025-03-15 08:28:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:28:22 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 08:28:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:28:25 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 08:28:34 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10114
ERROR - 2025-03-15 08:28:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:28:58 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7296
ERROR - 2025-03-15 08:29:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:29:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:29:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:29:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:29:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:29:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:30:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:30:24 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-15 08:30:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:30:57 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-15 08:31:04 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-15 08:31:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:31:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:31:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7296
ERROR - 2025-03-15 08:31:48 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10114
ERROR - 2025-03-15 08:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:32:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:32:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:32:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:32:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:32:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:32:16 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'malihaturosyidah', '2025-03-15 08:32:16')
ERROR - 2025-03-15 08:32:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:32:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:32:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:32:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:32:53 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-15 08:32:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:32:53 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-15 08:32:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:33:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:33:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:33:30 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00209552'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-03-15 08:33:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:33:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:34:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:34:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:34:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:34:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:34:25 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'malihaturosyidah', '2025-03-15 08:34:25')
ERROR - 2025-03-15 08:34:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:34:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:35:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:35:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:35:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:36:06 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10114
ERROR - 2025-03-15 08:36:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:36:07 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-15 08:36:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:36:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:36:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:36:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-15 08:36:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:36:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:37:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:38:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:38:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:38:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 08:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:38:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:38:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 08:39:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:39:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:39:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150371) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:39:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150371) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150371', '00121855', '2025-03-15 08:39:34', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049249427', NULL, '102504020125Y002791', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250315A179')
ERROR - 2025-03-15 08:39:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:39:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:40:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:40:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:40:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:40:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:40:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:40:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:41:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:42:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:42:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:42:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150381) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:42:49 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150381) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150381', '00361832', '2025-03-15 08:42:45', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001196950307', NULL, '0223U1191224P001805', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Konservasi Gigi', 0, 2, NULL, '20250315B409')
ERROR - 2025-03-15 08:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:43:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:43:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:43:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:43:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:44:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:44:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:45:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:45:15 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_diagnosa" ("id_layanan_pendaftaran", "waktu", "id_dokter", "id_golongan_sebab_sakit", "diagnosa_manual", "golongan_sebab_sakit_lain", "diagnosa_klinis", "prioritas", "jenis_kasus", "diagnosa_banding", "diagnosa_akhir", "penyebab_kematian", "is_resume", "post") VALUES ('710217', '2025-03-15 08:45:15', '74', NULL, '1', 'echo 1. LA dilatasi 2. LV dalam batas normal, LVH (-) 3.Fungsi sistolik LV menurun EF by TEich 10.8 % FS 4.66% diskinetik basalmid anteroseptal dan basal mid septal, normokinetik basal mid posterior, basal anterolateral basal anterior, segmen lain hipokinetik Fungsi diastolik LV terganggu E/A 2.6 Fungsi sistolik RV normal TAPSE 19.8 mm 4. Katup AR (+) ringan , kalsifkasi(+) MR trivial PR trivial 5. Trombus (-), SEC (-)', 0, 'Sekunder', '1', '', '', '', 1, 1)
ERROR - 2025-03-15 08:45:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:45:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:47:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:48:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:48:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:48:55 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7296
ERROR - 2025-03-15 08:49:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:49:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 15987
ERROR - 2025-03-15 08:49:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:49:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A076%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 08:49:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:50:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:50:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:51:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:52:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:53:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:53:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:54:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:55:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:55:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:55:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150408) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:55:33 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150408) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150408', '00174819', '2025-03-15 08:55:22', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001283983874', NULL, '0223B1821224Y000588', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Mata', 0, 2, NULL, '20250315B007')
ERROR - 2025-03-15 08:55:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150409) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:55:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150409) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150409', '00174819', '2025-03-15 08:55:52', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001283983874', NULL, '0223B1821224Y000588', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Mata', 0, 2, NULL, '20250315B007')
ERROR - 2025-03-15 08:55:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:56:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:56:10 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A066%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 08:56:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:56:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:56:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:56:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:56:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:56:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:57:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:58:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:58:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:58:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:58:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:59:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:59:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:59:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 08:59:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 08:59:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 08:59:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-03-15 09:00:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:00:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:00:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:01:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:01:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:01:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:02:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:02:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:03:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:03:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:04:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:05:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:05:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:06:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808263, '3', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:06:15 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (808263, '3', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808263, '3', '', '1', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 09:06:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:06:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:06:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:06:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:07:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:08:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:08:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808272, '12', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:08:20 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (808272, '12', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808272, '12', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'NOON', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 09:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:08:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:08:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:09:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:09:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:09:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:10:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:10:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:10:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:10:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:11:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 09:11:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:11:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:11:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:11:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:12:37 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-15 09:12:37 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-15 09:12:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-15 09:12:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-15 09:12:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:13:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:13:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:13:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:14:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:14:04 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '654216'
AND "lp"."id_pendaftaran" = '654216'
ORDER BY "lp"."id" ASC
ERROR - 2025-03-15 09:14:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:14:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250315B427) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:14:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250315B427) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250315B427', '427', 'B427', 'B', '2025-03-15', '0', '2025-03-15 09:14:40', 'Booking', 'APM', 'Asuransi', 0, '2025-03-15  11:21:00', 0, '1701', '00367769', 657, 3643, 30, 'INT', '085966603713', '3671051301720006', '1972-01-13', 'dr. Lydia Sarah Shabrina, Sp.PD', 1, 'Asuransi', 39, '60', '200', 'Ok.', '0', '51779', '0001653110368', 'JKN', '283676', '0', '30', '0223B1570325P000359', 'KLINIK KF MODERNLAND', '2025-06-04', 'INT', '3', NULL, '0223R0380325V003011', '30', 'Sudah', 200, 'Ok.')
ERROR - 2025-03-15 09:14:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:15:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:15:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:16:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:16:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:16:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:16:22 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A056%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 09:16:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:16:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:16:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 09:16:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 09:16:41 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 09:16:41 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 09:16:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:16:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:16:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:16:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:16:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:16:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:17:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:17:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:17:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:17:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:17:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:17:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:17:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:17:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:17:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:17:39 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-15 09:17:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:17:40 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-15 09:17:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:17:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:17:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:17:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:17:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:17:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:17:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:18:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:18:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:18:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:18:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:18:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:18:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:18:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:18:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:18:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:18:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:18:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:18:50 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-15 09:18:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:18:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-15 09:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:19:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:19:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:19:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:19:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:19:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:19:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:19:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:20:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:20:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:20:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:20:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:20:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:20:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:21:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:21:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:21:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:21:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:21:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:21:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:22:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:22:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:23:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:23:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:23:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:23:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:24:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:24:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:24:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:25:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:25:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:25:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:25:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:25:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:25:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:26:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:26:06 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 09:26:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:26:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:26:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:27:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:27:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:27:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:27:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A154%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 09:28:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:28:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:28:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:28:32 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 09:28:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:28:40 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 09:28:40 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 09:28:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:29:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:29:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:30:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:30:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:30:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:30:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:31:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:31:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:32:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:32:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:32:45 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A152%' ESCAPE '!'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 09:33:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:33:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:33:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-03-15 09:33:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:33:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:33:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-03-15 09:33:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:33:55 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "pg"."id" = '787'
ORDER BY "lp"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 09:34:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:34:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:34:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:34:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:34:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:35:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:35:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:35:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:36:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:37:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:37:49 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 09:37:49 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 09:37:51 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 09:37:51 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 09:37:53 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 09:37:53 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 09:38:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:38:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A131%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 09:39:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:39:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:39:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:39:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:39:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:39:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:39:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:39:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:39:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:39:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:40:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:40:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 09:40:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 02:40:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 02:40:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 09:41:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:41:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:41:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:41:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:41:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:42:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:42:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:42:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:42:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:42:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:42:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:42:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:43:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:43:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:43:26 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-15 09:43:26 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-15 09:43:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-03-15 09:43:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 09:43:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 09:43:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 09:43:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 09:43:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:43:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:44:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:45:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:45:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:45:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:47:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:47:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:47:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:48:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:48:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:48:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:48:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:48:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:48:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:48:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:48:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:48:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:48:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:48:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:48:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:49:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:49:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:49:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:49:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 09:49:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:49:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:50:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:50:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:50:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:50:35 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-03-15 09:50:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:51:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:51:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:51:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:51:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:52:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:52:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:52:38 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7296
ERROR - 2025-03-15 09:52:38 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7296
ERROR - 2025-03-15 09:52:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:52:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:53:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:53:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:54:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:54:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:55:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:55:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:55:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:55:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:55:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:56:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:56:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:57:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:57:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:57:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:58:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:58:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:58:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:58:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150541) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 09:58:37 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150541) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150541', '00319967', '2025-03-15 09:58:36', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002617774784', NULL, '0223B1570125P002032', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250315B116')
ERROR - 2025-03-15 09:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:58:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 09:59:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:00:22 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-15 10:00:22 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-15 10:00:22 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-15 10:00:22 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-15 10:00:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:01:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:01:04 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('710221', '2025-03-14 12:05', '11', '', '', '', '', 'BBL 3.250 gr BBS 3600 cm, PB 51 cm Usia Gestasi 41 mgg. HA 0 bulan. BB/U -0.16 SD, PB/U -0.48 SD, BB/PB 0.11 SD. Kesan berat badan normal, perawakan normal, status gizi normal. Riw. Lahir SC di rsudkt karena ketuban kering, lahir sehat, Riw. Kejang (-). kesadaran CM, menangis kuat, gerak aktif, sesak tidak ada, retraksi tidak ada, NCH tidak ada, demam ada S: 39*C, HR: 161 x/m, RR: 52x/m, SpO2: 97%, reflek hisap ada, ASi sedikit, terpasang IVFD N5 10 cc/ jam, BAB 1 kali kuning ampas ,BAK 1 kali 139cc , ', 'Peningkatan kebutuhan energi berkaitan dengan adanya demam ditandai dengan pengkatan kebutuhan 13Úri total energi, dan S: 39*C
', 'Diet Cair PHPRO 8x60 cc. Keb E: 280.5 kkal. P :8.41 gr (12 %) L : 12.47 gr (40 %), KH 33.66 gr (48 %). C : 400 ml. Route diet OGT.Edukasi Gizi', 'Suhu tubuh normal dalam waktu >1 hari; status gizi optimal', '', '', '', '', '1433', '1', 'Diet Cair PHPRO 8x60 cc. Keb E: 280.5 kkal. P :8.41 gr (12 %) L : 12.47 gr (40 %), KH 33.66 gr (48 %). C : 400 ml.&nbsp;', NULL, '1433', 0, NULL, '2025-03-15 10:01:04')
ERROR - 2025-03-15 10:01:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:02:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150546) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:02:07 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150546) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150546', '00370765', '2025-03-15 10:02:06', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002360298892', NULL, '0221B1190225P005105', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250315B318')
ERROR - 2025-03-15 10:02:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:02:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:02:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:02:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:02:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:02:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:02:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:03:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:03:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:04:13 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 10:04:13 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 10:04:13 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-15 10:04:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:05:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:05:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:05:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:06:22 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-15 10:06:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:07:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:07:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:07:17 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 10:07:17 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 10:07:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:07:22 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 10:07:22 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 10:07:32 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 10:07:32 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 10:07:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:08:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:08:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:08:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:08:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:08:26 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('656240', '710965', '0001423134371', '0223R0380325V007228', '00366466', 'REVDA ELVAN HIDAYAT', '2012-05-02', 1, '2025-03-15 06:54:05', '2025-03-15 08:33:44', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A15.2#J06.9', '89.05', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-15 10:08:26', 'normal', 'set_claim_data', 'Z09.8#A15.2#J06.9', '89.05')
ERROR - 2025-03-15 10:08:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:08:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:08:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:08:46 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('656240', '710965', '0001423134371', '0223R0380325V007228', '00366466', 'REVDA ELVAN HIDAYAT', '2012-05-02', 1, '2025-03-15 06:54:05', '2025-03-15 08:33:44', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A15.2#J06.9', '89.05', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-15 10:08:45', 'normal', 'set_claim_data', 'Z09.8#A15.2#J06.9', '89.05')
ERROR - 2025-03-15 10:09:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:10:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:10:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503150567) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:10:41 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503150567) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503150567', '00039266', '2025-03-15 10:10:40', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000813906178', NULL, '102501100225Y002290', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250315A198')
ERROR - 2025-03-15 10:11:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:11:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:11:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:11:30 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-15 00:00:00' AND '2025-03-15 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A070%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-15 10:12:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:12:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:12:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:13:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:13:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:14:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:15:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:15:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:16:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:16:05 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('656240', '710965', '0001423134371', '0223R0380325V007228', '00366466', 'REVDA ELVAN HIDAYAT', '2012-05-02', 1, '2025-03-15 06:54:05', '2025-03-15 08:33:44', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A15.2#J06.9', '89.05', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-15 10:16:05', 'normal', 'set_claim_data', 'Z09.8#A15.2#J06.9', '89.05')
ERROR - 2025-03-15 10:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:16:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:16:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...'0', '270000', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:16:55 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...'0', '270000', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('656273', '710998', '0001388631137', '0223R0380325V007256', '00249924', 'RAMA SAFITRI', '1976-09-13', 2, '2025-03-15 07:03:47', '2025-03-15 08:30:06', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#Z09.8#J34.3#J34.3', '89.05#21.21#18.11#21.21', '0', '0', '100000', '0', '270000', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. LUCYANA ACHWAS  Sp THT-KL', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-15 10:16:54', 'normal', 'set_claim_data', 'Z09.8#Z09.8#J34.3#J34.3', '89.05#21.21#18.11#21.21')
ERROR - 2025-03-15 10:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:17:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...'0', '270000', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:17:12 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...'0', '270000', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('656273', '710998', '0001388631137', '0223R0380325V007256', '00249924', 'RAMA SAFITRI', '1976-09-13', 2, '2025-03-15 07:03:47', '2025-03-15 08:30:06', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#Z09.8#J34.3#J34.3', '89.05#21.21#18.11#21.21', '0', '0', '100000', '0', '270000', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. LUCYANA ACHWAS  Sp THT-KL', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-15 10:17:11', 'normal', 'set_claim_data', 'Z09.8#Z09.8#J34.3#J34.3', '89.05#21.21#18.11#21.21')
ERROR - 2025-03-15 10:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:19:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:19:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:20:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:20:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:21:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:21:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:22:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:23:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:24:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:25:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:25:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:25:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:26:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:26:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:27:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:27:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:28:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:28:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:28:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808493, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:28:42 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (808493, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808493, '1', '', '', '', '', 'PC', '0', '', '0', '', NULL, '1', 1, '2x1 caps', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 10:28:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:28:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:28:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:28:55 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00023887'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-03-15 10:30:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:30:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:30:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:32:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:32:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:32:36 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-15 10:32:36 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-15 10:32:36 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-15 10:32:36 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-15 10:32:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:32:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:33:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:33:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:33:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808500, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:33:33 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (808500, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808500, '3', '', '', '', '', 'PC', '0', '', '0', '', NULL, '1', 1, '2x1 caps', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 10:33:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:33:44 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 10:33:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 10:33:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:35:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:35:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:35:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:35:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 75
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 80
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 80
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 85
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 259
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 261
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 263
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 265
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 267
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 269
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 271
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 273
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 275
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 277
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 279
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 281
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 283
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined variable: mo /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 283
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 90
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 486
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 487
ERROR - 2025-03-15 10:35:52 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 495
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'waktu_order' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 95
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 100
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 105
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 110
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 110
ERROR - 2025-03-15 10:35:52 --> Severity: Notice  --> Trying to get property 'item_pemeriksaan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 116
ERROR - 2025-03-15 10:35:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_radiologi/views/printing/label_radiologi.php 116
ERROR - 2025-03-15 10:36:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:37:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:37:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:38:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:38:08 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('656240', '710965', '0001423134371', '0223R0380325V007228', '00366466', 'REVDA ELVAN HIDAYAT', '2012-05-02', 1, '2025-03-15 06:54:05', '2025-03-15 08:33:44', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A15.2#J06.9', '89.05', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-15 10:38:07', 'normal', 'set_claim_data', 'Z09.8#A15.2#J06.9', '89.05')
ERROR - 2025-03-15 10:39:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:39:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:40:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:40:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:40:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:40:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:40:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:40:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:40:48 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:40:48 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:40:52 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:40:52 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:40:52 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 10:41:03 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-15 10:41:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:41:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:41:23 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-15 10:41:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:41:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:41:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-15 10:41:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:41:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:42:11 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 10:42:11 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 10:42:11 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-15 10:42:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:42:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:42:24 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00112524'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-03-15 10:42:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:42:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:43:03 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-15 10:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:43:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:44:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:44:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:45:06 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 12309
ERROR - 2025-03-15 10:45:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:45:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:45:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:45:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:45:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:45:58 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('656240', '710965', '0001423134371', '0223R0380325V007228', '00366466', 'REVDA ELVAN HIDAYAT', '2012-05-02', 1, '2025-03-15 06:54:05', '2025-03-15 08:33:44', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#A15.2#J06.9', '89.05', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', '0', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-15 10:45:58', 'normal', 'set_claim_data', 'Z09.8#A15.2#J06.9', '89.05')
ERROR - 2025-03-15 10:47:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:47:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:47:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:48:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808523, '2', '10', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:54 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...5", "jam_pemberian_6") VALUES (808523, '2', '10', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808523, '2', '10', '', '', '', 'PC', '0', '', '0', '', NULL, '1', 1, '2x1 pulv', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 10:48:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:48:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:48:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:49:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:49:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:49:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('808517', '7', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:49:21 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('808517', '7', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('808517', '7', '', '1', 'Injeksi', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 10:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:49:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:50:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:50:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:50:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:50:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:50:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:50:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:50:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:50:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:50:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:51:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:51:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:51:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:51:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:51:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:51:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:51:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:51:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:52:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:52:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:53:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 18: AND &quot;b&quot;.&quot;id&quot; = 'undefined'
                        ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:53:01 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
AND "lp"."tanggal_layanan" BETWEEN '2025-03-01 00:00:00' AND '2025-03-15 23:59:59'
AND "lp"."id" IS NULL
AND "lp"."jenis_layanan" in ('Rawat Inap')
AND  ("pd"."tanggal_keluar" is NULL OR "lp"."tindak_lanjut" = 'cco sementara' ) 
AND "b"."id" = 'undefined'
AND "pd"."no_register" IS NULL
AND  "p"."id" LIKE '%' ESCAPE '!'
AND p.nama ilike '%%'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-03-15 10:53:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:53:08 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00334184'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-03-15 10:53:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:53:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:54:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:56:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 10:56:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 10:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:56:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 10:58:57 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-15 10:58:57 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-15 10:58:57 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-15 10:58:57 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-15 10:58:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:00:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:00:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:00:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:00:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;ab&quot;.&quot;id&quot; = ''
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:00:53 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "ab"."id" = ''
                          ^ - Invalid query: SELECT "ab"."hitung_panggil"
FROM "sm_antrian_bpjs" as "ab"
WHERE "ab"."id" = ''
ERROR - 2025-03-15 11:01:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:01:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:01:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:01:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:02:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:02:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:02:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:02:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:02:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:02:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:03:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:03:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:03:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:03:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:03:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:03:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:03:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:04:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:04:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:04:45 --> Severity: Notice  --> Trying to get property 'metaData' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 289
ERROR - 2025-03-15 11:04:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 289
ERROR - 2025-03-15 11:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 04:06:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 04:06:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 11:06:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:06:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:08:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:08:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-15 11:08:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:08:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-15 11:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:11:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:11:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:11:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:11:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:11:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:11:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:11:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:11:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:12:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:12:04 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-03-15 11:12:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-03-15 11:12:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:12:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:12:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:16:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:17:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 11:17:10 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-15 11:17:11 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-15 11:17:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:17:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:17:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:18:15 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 12309
ERROR - 2025-03-15 11:18:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:18:33 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-15 11:18:33 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-15 11:18:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 11:18:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 04:19:13 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 04:19:13 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 11:19:52 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 11:22:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(5) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:22:13 --> Query error: ERROR:  value too long for type character varying(5) - Invalid query: UPDATE "sm_pasien" SET "id" = '00322107', "rm_lama" = '', "tanggal_daftar" = '2025-03-15 11:22:13', "no_identitas" = '3671055404940002', "nama" = 'AYUNINGTYAS BUDI KARTIKA', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'JAKARTA', "tanggal_lahir" = '1994-04-14', "alamat" = 'JL.KENANGA INDAH RT. 07/04 KENANGA CIPONDOH KOTA TANGERANG BANTEN 15146', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '5', "nama_kec" = 'CIPONDOH', "no_kel" = '1005', "nama_kel" = 'KENANGA', "agama" = 'Islam', "gol_darah" = NULL, "id_pendidikan" = '8', "id_pekerjaan" = '18', "status_kawin" = 'Kawin', "nama_ayah" = 'WIDODO', "nama_ibu" = 'BUDIARTI', "telp" = '082213480806', "id_etnis" = '5', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '04RUJUK', "no_rt" = '07', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-03-15 11:22:13'
WHERE "id" = '00322107'
ERROR - 2025-03-15 11:22:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(5) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:22:17 --> Query error: ERROR:  value too long for type character varying(5) - Invalid query: UPDATE "sm_pasien" SET "id" = '00322107', "rm_lama" = '', "tanggal_daftar" = '2025-03-15 11:22:17', "no_identitas" = '3671055404940002', "nama" = 'AYUNINGTYAS BUDI KARTIKA', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'JAKARTA', "tanggal_lahir" = '1994-04-14', "alamat" = 'JL.KENANGA INDAH RT. 07/04 KENANGA CIPONDOH KOTA TANGERANG BANTEN 15146', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '5', "nama_kec" = 'CIPONDOH', "no_kel" = '1005', "nama_kel" = 'KENANGA', "agama" = 'Islam', "gol_darah" = NULL, "id_pendidikan" = '8', "id_pekerjaan" = '18', "status_kawin" = 'Kawin', "nama_ayah" = 'WIDODO', "nama_ibu" = 'BUDIARTI', "telp" = '082213480806', "id_etnis" = '5', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '04RUJUK', "no_rt" = '07', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-03-15 11:22:17'
WHERE "id" = '00322107'
ERROR - 2025-03-15 11:22:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(5) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:22:25 --> Query error: ERROR:  value too long for type character varying(5) - Invalid query: UPDATE "sm_pasien" SET "id" = '00322107', "rm_lama" = '', "tanggal_daftar" = '2025-03-15 11:22:25', "no_identitas" = '3671055404940002', "nama" = 'AYUNINGTYAS BUDI KARTIKA', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'JAKARTA', "tanggal_lahir" = '1994-04-14', "alamat" = 'JL.KENANGA INDAH RT. 07/04 KENANGA CIPONDOH KOTA TANGERANG BANTEN 15146', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '5', "nama_kec" = 'CIPONDOH', "no_kel" = '1005', "nama_kel" = 'KENANGA', "agama" = 'Islam', "gol_darah" = NULL, "id_pendidikan" = '8', "id_pekerjaan" = '18', "status_kawin" = 'Kawin', "nama_ayah" = 'WIDODO', "nama_ibu" = 'BUDIARTI', "telp" = '082213480806', "id_etnis" = '5', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '04RUJUK', "no_rt" = '07', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-03-15 11:22:25'
WHERE "id" = '00322107'
ERROR - 2025-03-15 11:22:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(5) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:22:30 --> Query error: ERROR:  value too long for type character varying(5) - Invalid query: UPDATE "sm_pasien" SET "id" = '00322107', "rm_lama" = '', "tanggal_daftar" = '2025-03-15 11:22:30', "no_identitas" = '3671055404940002', "nama" = 'AYUNINGTYAS BUDI KARTIKA', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'JAKARTA', "tanggal_lahir" = '1994-04-14', "alamat" = 'JL.KENANGA INDAH RT. 07/04 KENANGA CIPONDOH KOTA TANGERANG BANTEN 15146', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '5', "nama_kec" = 'CIPONDOH', "no_kel" = '1005', "nama_kel" = 'KENANGA', "agama" = 'Islam', "gol_darah" = NULL, "id_pendidikan" = '8', "id_pekerjaan" = '18', "status_kawin" = 'Kawin', "nama_ayah" = 'WIDODO', "nama_ibu" = 'BUDIARTI', "telp" = '082213480806', "id_etnis" = '5', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '04RUJUK', "no_rt" = '07', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-03-15 11:22:30'
WHERE "id" = '00322107'
ERROR - 2025-03-15 11:23:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:23:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:23:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:23:22 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-15 11:23:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:23:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-15 11:23:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:23:25 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-15 11:23:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:23:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-15 11:23:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:24:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:24:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808587, '4', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:24:57 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (808587, '4', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808587, '4', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'NIGHT', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 11:25:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:25:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:25:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808592, '2', '', '10', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:25:46 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (808592, '2', '', '10', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808592, '2', '', '10', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 11:26:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:27:16 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 11:29:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:29:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:29:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:35:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:36:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:36:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:36:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:37:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:37:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:38:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:39:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:40:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:40:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:41:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:41:49 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-03-15 11:41:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-03-15 11:41:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:46:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:47:28 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 9936
ERROR - 2025-03-15 11:47:28 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 9936
ERROR - 2025-03-15 11:49:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:51:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:52:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xba /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:52:55 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xba - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('656194', '710908', '00371627', '1436', 'GEA DRS', '2', '1', NULL, NULL, '2', '1', '48 ', NULL, '164 ', NULL, '17,8 ', ' status gizi malnutrisi. ', '2', '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', NULL, NULL, 'Pemeriksaan tgl 14/03/25 LAB (Hemoglobin L 10.6 Hematokrit L 33 Leukosit 6.9 Trombosit 310 Eritrosit L 4.38 Basofil 1 Eosinofil H 4 Neutrofil Segmen 55 Limfosit 30 Monosit H 10 ).pasien tidak di RO Thorax', ' Makan habis 1/4 porsi, ada mual tidak muntah. BAB 1 kali cair. TD : 110/60mmHg Nadi :81 x/mnt Suhu : 36.1 C RR : 19 x/mnt SPO2 : 97 % RA. Abd = supel, BU (+) meningkat, NT (-). ', 'Asupan makan inadekuat 

Gangguan gastrointestinal ', 'penurunan daya terima makan

adanya perubahan fungsi mortilitas usus ', 'cakupan makan &lt;80ºBcair', 'RS', '2', '1700 KKal', '47 gr', '64 gr', '255 gr', NULL, NULL, '1', '3x makan + 2x snack', 'Cakupan makan 2 kali selingan ; BAB perbaikan
', '2025-03-15 11:53', '1436', '1', '440', '1', '2025-03-15 11:52:55')
ERROR - 2025-03-15 11:53:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xba /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:53:59 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xba - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('656194', '710908', '00371627', '1436', 'GEA DRS', '2', '1', NULL, NULL, '2', '1', '48 ', NULL, '164 ', NULL, '17,8 ', ' status gizi malnutrisi. ', '2', '1', '2', '1', '1', '1', '2', '2', '2', '2', '2', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', NULL, NULL, 'Pemeriksaan tgl 14/03/25 LAB (Hemoglobin L 10.6 Hematokrit L 33 Leukosit 6.9 Trombosit 310 Eritrosit L 4.38 Basofil 1 Eosinofil H 4 Neutrofil Segmen 55 Limfosit 30 Monosit H 10 ).pasien tidak di RO Thorax', ' Makan habis 1/4 porsi, ada mual tidak muntah. BAB 1 kali cair. TD : 110/60mmHg Nadi :81 x/mnt Suhu : 36.1 C RR : 19 x/mnt SPO2 : 97 % RA. Abd = supel, BU (+) meningkat, NT (-). ', 'Asupan makan inadekuat 

Gangguan gastrointestinal ', 'penurunan daya terima makan

adanya perubahan fungsi mortilitas usus ', 'cakupan makan &lt;80ºBcair', 'RS', '2', '1700 KKal', '47 gr', '64 gr', '255 gr', NULL, NULL, '1', '3x makan + 2x snack', 'Cakupan makan 2 kali selingan ; BAB perbaikan
', '2025-03-15 11:53', '1436', '1', '440', '1', '2025-03-15 11:53:59')
ERROR - 2025-03-15 11:54:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 11:54:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 11:54:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 11:55:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:56:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:56:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 11:56:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:02:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:03:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 12:04:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:04:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:04:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:04:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:06:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:06:36 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:06:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:08:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 12:08:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 12:13:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:13:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:17:51 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 12:17:51 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 12:17:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:17:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:18:43 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1524
ERROR - 2025-03-15 12:18:43 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1524
ERROR - 2025-03-15 12:18:43 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1524
ERROR - 2025-03-15 12:18:43 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1524
ERROR - 2025-03-15 12:18:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ... &quot;riwayat_tumbuh_kembang&quot; = NULL, &quot;s_soap&quot; = Array, &quot;o_soap&quot;...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:18:43 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ... "riwayat_tumbuh_kembang" = NULL, "s_soap" = Array, "o_soap"...
                                                             ^ - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '711602', "waktu" = '2025-03-15 12:18:43', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = NULL, "anamnesa_sosial" = NULL, "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = NULL, "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = NULL, "prognosis" = NULL, "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = NULL, "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = NULL, "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = NULL, "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = NULL, "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = Array, "o_soap" = Array, "a_soap" = Array, "p_soap" = Array, "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '711602'
ERROR - 2025-03-15 12:18:48 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 12:18:48 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 12:19:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:19:58 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 12:19:58 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 12:20:07 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 12:20:07 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 12:20:18 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 12:20:18 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 12:20:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:21:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:21:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:21:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:21:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:21:56 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:21:56 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:22:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 12:22:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 12:23:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:25:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:26:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:26:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 12:26:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:26:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 12:26:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 12:27:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:28:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:28:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:28:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:28:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:28:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:28:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:28:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:28:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:28:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:28:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:28:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:28:29 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:28:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:30:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:30:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:30:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 12:31:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 12:31:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 12:33:08 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-15 12:34:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:34:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:34:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:34:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:35:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:35:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:35:28 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 12:35:28 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 12:35:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:35:30 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 12:35:30 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 12:35:37 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-15 12:35:37 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-15 12:36:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:36:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:37:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:37:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:37:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:37:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:37:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:37:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:37:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:37:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:38:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:38:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:40:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:40:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:40:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:40:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:40:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:40:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:40:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:40:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:40:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:40:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:40:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:40:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:40:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:40:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:41:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:42:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:42:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:43:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:43:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:43:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:43:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:43:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:43:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:43:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:43:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:43:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:45:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:45:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:45:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:45:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:45:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:45:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:45:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:45:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:46:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:46:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:48:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:48:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:48:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:48:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:48:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:48:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:48:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:48:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:49:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:49:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:50:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:50:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:50:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:50:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:50:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:50:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:50:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:50:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:51:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:51:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:51:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:51:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:52:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:52:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:53:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:53:50 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-03-15 12:53:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:53:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:54:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:54:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:54:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 12:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:57:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:57:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:57:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:57:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:59:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 12:59:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 12:59:03 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7617
ERROR - 2025-03-15 13:00:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:02:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:02:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:02:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:02:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:02:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:02:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:04:01 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 13:04:01 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 13:06:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:06:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:06:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:06:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:06:53 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-15 13:06:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:06:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:09:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:09:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:10:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:10:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:10:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:10:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:10:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:10:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:10:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:10:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:10:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:11:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:11:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:11:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:11:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:11:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:11:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:12:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:12:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:12:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:12:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:13:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:13:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:13:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:13:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:13:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:13:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:13:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:13:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:13:15 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('707236', '2025-03-15 12:54', '18', 'tidak dapat dikaji', 'A: Terpasang ETT no. 3 cm Batas Bibir 7,4 cm (09/3/25), suction di ETT putih kekuningan kental; B: terintubasi on ventilator Pressure SIMV (rate 35, PIP 17/5 PSV 9 FiO2 35%), ada periodik breating sampai 69Ún bradikardi pagi ini 4x, SpO2: 94%, RR: 36x/menit; C: CRT kurang dari 3 detik, akral hangat, nadi teraba mulai adekuat, sianosis perifer tidak ada, terpasang PICC premicath di kaki kanan batas 12 cm (11/3/25) terpasang cairan D10/5 NS: 6 cc/jam, Aminosteril Infant: 2cc/jam, Lipid: 1 cc/jam dan iv line di kaki kiri (15/3/25) untuk obat, HR: 168x/menit ; E : edema anasarka berkurang, lebam dan kebiruan seluruh tubuh, suhu: 37.4*C, abdomen tampak supel, bayi tampak ikterik sudah sampai kaki, terdapat luka di tangan kiri mulai mengering; F: BAB tidak ada, BAK 26 cc, BC: (-)9.2, ; G: terpasang OGT No. 5/40 (9/03/2025) minum 10-12 cc/3 jam (11 cc ), BBL: 1290 gr, BBS: 1.270 gram, LP 20cm. Hasil Lab tanggal 15/3/2025 HB : 9.1, HT : 26, Leukosit : 10.3, Trombosit : 369, PT : 11.8, APTT : 29.2, GDS :95, Biltot : 10.53, Bil direk : 0.62, bil Indirek : 9.91', 'gangguan ventilasi spontan, menyusui tidak efektif, resiko ikterik neonatus', 'Setelah dilakukan tindakan keperawatan selama 7x24 jam diharapakan ventilasi spontan meningkat dengan kriteria hasil: penggunaan otot bantu nafas menurun, gelisah menurun, dispneu menurun, takikardi membaik, PO2 membaik; Setelah dilakukan perawatan 7x24 jam diharapkan status menyusui membaik dengan kriteria hasil : Perlekatan bayi pada payudara ibu meningkat, Kemampuan ibu memposisikan bayi meningkat, Hisapan bayi meningkat, Bayi rewel menurun. Setelah diIakukan intervensi selama 2x24 jam diharapkan intregritas kulit dan jaringan meningkat dengan Kriteria Hasil: Elastisitas meningkat, Perfusi jaringan meningkat, Kerusakan lapisan kulit menurun, Pigmentasi abnormal menurun.', '', '', '', '', '', '', '', '', '1852', '1', 'Intervensi Keperawatan: Monitor adanya kelelahan otot bantu nafas, Monitor status respirasi dan oksigenisasi, Pertahankan kepatenan jalan nafas, Bantu untuk merubah posisi jika diperlukan, Lakukan auskultasi bunyi pernafasan secara teratur, Identifikasi keadaan emosional ibu saat akan dilakukan konseling menyusui, Identifikasi keinginan dan tujuan menyusui, Identifikasi permasalahan yang ibu alami selama proses menyusui, Berikan informasi dan saran menyusui yang benar sesuai kebutuhan ibu, Monitor tanda tanda vital bayi (terutama suhu 36,5- 37,5 derajat celcius), Identifikasi status kesehatan neonatus, Monitor kesadaran/status neurologis, kardiovaskuler, pernafasan, suhu, warna kulit, atau Spo2 dengan mengunakan formulir Newborn Earting Warning System &#40;NEWS&#41;, Atur interval waktu pemantauan sesuai dengan kondisi neonatus.<div></div><p>Kolaborasi: post tranfusi FFP 2 kali selesai terakhir 13/03/25 jam 00.30, weaning setting venti bertahap, minum 10-12 cc/3jam, R/ konsul jantung-> R/ echo jika dr. Ika Sp. Jp visite , R/ Transfusi PRC 15 cc (sedang amprah)</p>', NULL, '1852', 0, NULL, '2025-03-15 13:13:15')
ERROR - 2025-03-15 13:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:13:30 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('707236', '2025-03-15 12:54', '18', 'tidak dapat dikaji', 'A: Terpasang ETT no. 3 cm Batas Bibir 7,4 cm (09/3/25), suction di ETT putih kekuningan kental; B: terintubasi on ventilator Pressure SIMV (rate 35, PIP 17/5 PSV 9 FiO2 35%), ada periodik breating sampai 69Ún bradikardi pagi ini 4x, SpO2: 94%, RR: 36x/menit; C: CRT kurang dari 3 detik, akral hangat, nadi teraba mulai adekuat, sianosis perifer tidak ada, terpasang PICC premicath di kaki kanan batas 12 cm (11/3/25) terpasang cairan D10/5 NS: 6 cc/jam, Aminosteril Infant: 2cc/jam, Lipid: 1 cc/jam dan iv line di kaki kiri (15/3/25) untuk obat, HR: 168x/menit ; E : edema anasarka berkurang, lebam dan kebiruan seluruh tubuh, suhu: 37.4*C, abdomen tampak supel, bayi tampak ikterik sudah sampai kaki, terdapat luka di tangan kiri mulai mengering; F: BAB tidak ada, BAK 26 cc, BC: (-)9.2, ; G: terpasang OGT No. 5/40 (9/03/2025) minum 10-12 cc/3 jam (11 cc ), BBL: 1290 gr, BBS: 1.270 gram, LP 20cm. Hasil Lab tanggal 15/3/2025 HB : 9.1, HT : 26, Leukosit : 10.3, Trombosit : 369, PT : 11.8, APTT : 29.2, GDS :95, Biltot : 10.53, Bil direk : 0.62, bil Indirek : 9.91', 'gangguan ventilasi spontan, menyusui tidak efektif, resiko ikterik neonatus', 'Setelah dilakukan tindakan keperawatan selama 7x24 jam diharapakan ventilasi spontan meningkat dengan kriteria hasil: penggunaan otot bantu nafas menurun, gelisah menurun, dispneu menurun, takikardi membaik, PO2 membaik; Setelah dilakukan perawatan 7x24 jam diharapkan status menyusui membaik dengan kriteria hasil : Perlekatan bayi pada payudara ibu meningkat, Kemampuan ibu memposisikan bayi meningkat, Hisapan bayi meningkat, Bayi rewel menurun. Setelah diIakukan intervensi selama 2x24 jam diharapkan intregritas kulit dan jaringan meningkat dengan Kriteria Hasil: Elastisitas meningkat, Perfusi jaringan meningkat, Kerusakan lapisan kulit menurun, Pigmentasi abnormal menurun.', '', '', '', '', '', '', '', '', '1852', '1', 'Intervensi Keperawatan: Monitor adanya kelelahan otot bantu nafas, Monitor status respirasi dan oksigenisasi, Pertahankan kepatenan jalan nafas, Bantu untuk merubah posisi jika diperlukan, Lakukan auskultasi bunyi pernafasan secara teratur, Identifikasi keadaan emosional ibu saat akan dilakukan konseling menyusui, Identifikasi keinginan dan tujuan menyusui, Identifikasi permasalahan yang ibu alami selama proses menyusui, Berikan informasi dan saran menyusui yang benar sesuai kebutuhan ibu, Monitor tanda tanda vital bayi (terutama suhu 36,5- 37,5 derajat celcius), Identifikasi status kesehatan neonatus, Monitor kesadaran/status neurologis, kardiovaskuler, pernafasan, suhu, warna kulit, atau Spo2 dengan mengunakan formulir Newborn Earting Warning System &#40;NEWS&#41;, Atur interval waktu pemantauan sesuai dengan kondisi neonatus.<div></div><p>Kolaborasi: post tranfusi FFP 2 kali selesai terakhir 13/03/25 jam 00.30, weaning setting venti bertahap, minum 10-12 cc/3jam, R/ konsul jantung-> R/ echo jika dr. Ika Sp. Jp visite , R/ Transfusi PRC 15 cc (sedang amprah)</p>', NULL, '1852', 0, NULL, '2025-03-15 13:13:30')
ERROR - 2025-03-15 13:13:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:14:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:14:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:14:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:14:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:14:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:14:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:14:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:14:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:14:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:14:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:14:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:14:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:14:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:14:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:14:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:15:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('808402', '8', '', '8', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:15:02 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('808402', '8', '', '8', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('808402', '8', '', '8', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 13:15:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:15:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:15:50 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 242
ERROR - 2025-03-15 13:16:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:16:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:16:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:16:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:17:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 13:17:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:17:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:18:05 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7296
ERROR - 2025-03-15 13:18:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:18:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:18:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:18:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:18:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:18:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:18:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:19:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 13:20:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:20:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:20:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 13:20:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 13:21:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:21:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:21:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:21:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:21:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:21:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:21:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:21:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:22:51 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 13:23:10 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-15 13:23:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:23:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:23:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:23:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:24:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:24:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:24:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:24:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:24:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:24:53 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-03-15 13:24:53 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-03-15 13:24:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:24:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:25:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:25:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:25:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:25:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:25:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:26:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:26:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:26:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:26:23 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_penjualan_obat/export.php 98
ERROR - 2025-03-15 13:26:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:26:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:26:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:26:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:26:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:26:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:26:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:26:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:26:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:26:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:26:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:27:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:27:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:27:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:27:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:27:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10114
ERROR - 2025-03-15 13:27:56 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_penjualan_obat/export.php 98
ERROR - 2025-03-15 13:27:58 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10114
ERROR - 2025-03-15 13:28:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10114
ERROR - 2025-03-15 13:28:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:28:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:28:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:28:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:28:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:28:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:28:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:28:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:29:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:29:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:29:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:29:09 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '772' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-03-15 13:29:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:29:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:29:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:29:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:29:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:29:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:29:41 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '772' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-03-15 13:29:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:29:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:29:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:29:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:30:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:30:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:30:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:30:08 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '772' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-03-15 13:30:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:30:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:30:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:30:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:30:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:30:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:30:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:30:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:30:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('808385', '7', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:30:53 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('808385', '7', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('808385', '7', '', '', '2 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 13:30:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808679, '1', '', '60', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:30:57 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (808679, '1', '', '60', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808679, '1', '', '60', '', '', 'AC', '0', '', '0', 'MORN', NULL, '0', 1, '1x2tab', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 13:31:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:31:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:31:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:31:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:31:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:31:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:31:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:31:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:32:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:32:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:32:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:32:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:32:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:32:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:32:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:32:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:32:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:32:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:32:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:32:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:33:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:33:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:33:07 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 13:33:07 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 13:33:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:33:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:33:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 13:33:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 13:33:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:33:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:33:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:33:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:33:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:33:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:35:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:35:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:35:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:35:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:35:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:35:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:35:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:35:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:36:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:36:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:36:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:36:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:36:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:36:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:36:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 13:36:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-15 13:37:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (808684, '3', '', '15', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:37:02 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (808684, '3', '', '15', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (808684, '3', '', '15', '', '', 'PC', '0', '', '0', '', NULL, '1', 1, '3x1 pulvis', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 13:37:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:37:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:38:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:38:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:38:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:38:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:39:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:39:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:39:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:39:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:39:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:39:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:40:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:40:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:40:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:40:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:41:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:41:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:41:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:41:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:41:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:41:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:41:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:42:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:42:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:42:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:42:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:42:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:42:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:42:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:42:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:42:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:42:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:42:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:42:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:43:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:43:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:43:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:43:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:43:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:43:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:43:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:43:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:43:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:44:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:06 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-15 13:44:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-15 13:44:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:44:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:44:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:44:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:44:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:44:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:44:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:44:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:45:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:45:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:45:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:45:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:46:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 13:46:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 13:48:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:49:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 13:49:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:49:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:50:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 13:50:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:50:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:50:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:50:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:51:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:51:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:51:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:51:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:51:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:51:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:52:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:52:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:52:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:52:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:53:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:53:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:53:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:53:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:53:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:53:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:54:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:54:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:54:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:54:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:54:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:54:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:55:00 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 13:55:00 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 13:56:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:56:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:56:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 13:56:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 13:56:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 13:56:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 14:00:03 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 14:00:03 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 14:00:07 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 14:00:07 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 14:00:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:00:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:00:23 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 14:00:23 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 14:01:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:01:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:01:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:01:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:01:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:01:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:01:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:01:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:02:14 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 14:02:14 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 14:02:19 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 14:02:19 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 14:02:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:02:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:04:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:04:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:04:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:04:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:04:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 14:04:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 14:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 14:04:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 14:05:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 14:06:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 14:08:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:08:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:12:45 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 14:12:45 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 14:13:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:13:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:15:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:15:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:16:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:16:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:19:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:19:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:20:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:20:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:20:40 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-15 14:20:40 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-15 14:20:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-03-15 14:20:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-03-15 14:20:49', 1217537, '105', '', '81315...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:20:49 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-03-15 14:20:49', 1217537, '105', '', '81315...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-03-15 14:20:49', 1217537, '105', '', '81315.00', '166633.20', '1', 166633.2, '259', '2026')
ERROR - 2025-03-15 14:22:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:22:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:25:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:25:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:27:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:27:35 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-03-15 14:28:08 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 14:28:08 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 14:28:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 14:28:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 14:30:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:30:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:32:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:32:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:32:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:32:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:35:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 14:35:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 14:35:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 14:40:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 14:41:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 14:42:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 14:43:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 14:49:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 15:02:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:02:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:02:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:02:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:03:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:03:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:03:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:03:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:03:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:03:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:03:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:03:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:03:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:03:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:04:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:04:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:08:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:08:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:08:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:08:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:09:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:09:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:09:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:09:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:10:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:10:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:10:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:10:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:10:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 15:10:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:10:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:10:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 15:10:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:10:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:11:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:11:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:11:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6100700) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:11:36 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6100700) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '808472'
ERROR - 2025-03-15 15:11:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:11:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:11:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:11:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:11:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:11:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:12:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:12:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:12:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:12:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:12:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:12:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:12:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:12:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:13:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:13:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:13:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:13:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:13:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:13:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:14:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6100700) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:14:00 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6100700) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '808472'
ERROR - 2025-03-15 15:14:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:14:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:14:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:14:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:14:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:14:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:15:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:15:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:15:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:15:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:15:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:15:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:15:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 15:16:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:16:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:16:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(808472) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:16:24 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(808472) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '808472'
ERROR - 2025-03-15 15:16:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:16:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:16:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:16:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:16:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:16:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:16:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:16:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:17:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:17:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:17:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:17:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:17:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:17:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:17:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 15:17:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:17:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:17:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:17:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:17:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:17:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:18:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:18:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:18:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:18:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:18:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:18:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:19:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:19:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:20:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:20:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:20:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:20:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:20:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:20:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:20:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:20:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:20:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:21:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:21:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:21:20 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 678
ERROR - 2025-03-15 15:21:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:21:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:21:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:21:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:21:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:21:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:21:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:21:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:22:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:22:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:22:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:22:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:22:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:22:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:22:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:22:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:23:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:23:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:23:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:23:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:24:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:24:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:24:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:25:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:25:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:25:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:25:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:25:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:25:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:25:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:25:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:26:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:26:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:26:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:27:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:27:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:27:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:27:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:28:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:28:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:28:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:28:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:30:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:30:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:30:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:30:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:31:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:31:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:31:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:31:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:31:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:31:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:32:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:32:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:32:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:32:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:33:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:33:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:33:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:33:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:33:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:33:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:33:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:33:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:34:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:34:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:34:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:34:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:34:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:34:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:35:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:35:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:35:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:35:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:35:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:35:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:35:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:35:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:35:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:35:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:36:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:36:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:36:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:36:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:36:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:36:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:37:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:37:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:37:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:37:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:37:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:37:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:37:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:37:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:37:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:37:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:38:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:38:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:38:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:38:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:38:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('808700', '3', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:38:17 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('808700', '3', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('808700', '3', '', '1', 'Injeksi', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 15:38:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:38:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:38:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:38:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:38:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:38:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:39:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:39:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:39:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:39:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:39:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:39:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:39:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:39:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:39:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:39:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:39:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:39:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:39:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:39:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:40:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:40:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:40:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:40:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:40:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:40:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:41:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:41:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:41:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:41:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:42:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:42:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:42:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:42:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:42:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:42:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:42:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:42:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:43:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:43:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:43:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:43:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:43:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 15:43:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 15:51:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 15:58:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 15:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 16:02:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:02:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:03:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 16:07:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 16:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 16:12:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:12:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:29:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 16:29:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:29:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:30:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:30:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:30:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:30:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:30:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (5794035, '548', 1800.864, '200', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:30:17 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (5794035, '548', 1800.864, '200', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5794035, '548', 1800.864, '200', '10.00', 'Ya', 'null')
ERROR - 2025-03-15 16:30:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:30:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:30:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:30:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:30:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:30:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:30:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('808713', '2', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:30:51 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('808713', '2', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('808713', '2', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', '', 'NYERI', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 16:31:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:31:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:31:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:31:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:31:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:31:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:38:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:38:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:38:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:38:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:38:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5794046, '316', 54000, '1', '3.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:38:30 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5794046, '316', 54000, '1', '3.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5794046, '316', 54000, '1', '3.00', NULL, 'null')
ERROR - 2025-03-15 16:38:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:38:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:38:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:38:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:41:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:41:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:41:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:41:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:46:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:46:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:47:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5794095, '123', 2386.8, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:47:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5794095, '123', 2386.8, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5794095, '123', 2386.8, '1', '2.00', NULL, 'null')
ERROR - 2025-03-15 16:47:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:47:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:50:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:50:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:50:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:50:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:50:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5794136, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:50:19 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5794136, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5794136, '237', 9457.2, '1', '1.00', NULL, 'null')
ERROR - 2025-03-15 16:50:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:50:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:50:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:50:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:52:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:52:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:52:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:52:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:53:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 16:53:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:53:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:55:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:55:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 16:55:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 16:55:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 17:10:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 17:10:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 17:10:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5794211, '361', 4262.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 17:10:20 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5794211, '361', 4262.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5794211, '361', 4262.4, '1', '1.00', NULL, 'null')
ERROR - 2025-03-15 17:10:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 17:10:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 17:31:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 17:46:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 17:46:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 17:51:34 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-15 17:51:34 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-15 17:55:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 18:18:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 18:18:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 18:38:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 18:56:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 12:02:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-15 12:02:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-15 19:06:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 19:07:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 19:09:33 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 12:10:20 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-15 12:10:20 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-15 12:10:20 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-15 12:10:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-15 12:10:20 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-15 12:10:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-15 19:11:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 19:11:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 19:11:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-15 19:15:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-15 19:16:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 19:17:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-15 19:26:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 19:32:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 19:48:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 19:51:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 20:03:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 20:03:13 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '652012'
AND "lp"."id_pendaftaran" = '652012'
ORDER BY "lp"."id" ASC
ERROR - 2025-03-15 20:07:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 20:07:17 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('711186', '2025-03-15 17:04', '8', '', '', '', '', '', '', '', '', 'S/ bayi mengalami muntah 2x dok sejak sore ini. Asi ada tapi menyusu tidak aktif,sudah bab (+)miksi (+)
', '
O/ bb : 3010 gr
Ttv saat ini 
S : 36.9
N : 149
Rr : 46
SpO2 : 93 «domen supel,bu +', 'NCB SMK +
 Obs vomitus', 'Lapor ke dr Felly SpA', '1880', '1', 'sudah konfirmasi ulang dr. Felly SpA', NULL, '2058', '1', NULL, '2025-03-15 20:07:17')
ERROR - 2025-03-15 20:07:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 20:07:22 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('711186', '2025-03-15 17:04', '8', '', '', '', '', '', '', '', '', 'S/ bayi mengalami muntah 2x dok sejak sore ini. Asi ada tapi menyusu tidak aktif,sudah bab (+)miksi (+)
', '
O/ bb : 3010 gr
Ttv saat ini 
S : 36.9
N : 149
Rr : 46
SpO2 : 93 «domen supel,bu +', 'NCB SMK +
 Obs vomitus', 'Lapor ke dr Felly SpA', '1880', '1', 'sudah konfirmasi ulang dr. Felly SpA', NULL, '2058', '1', NULL, '2025-03-15 20:07:22')
ERROR - 2025-03-15 20:26:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12882
ERROR - 2025-03-15 20:27:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xba /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 20:27:39 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xba - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('711266', '2025-03-15 15:50', '18', '', '', '', '', '', '', '', '', 'menerima telepon dari petugas laboratorium Fatma', 'Natrium 136 mmol/L 
 Kalium HH 6.6 mmol/L
 Klorida (Cl) 104 mmol/L
Analisa Gas Darah
 pH LL 6.854 
 p CO2 HH 132.2 mm Hg
 p O2 H 125 mm Hg 
 HCO3 23 mEq/L 
 O2 Saturasi L 93.4 ºse Excess L -10.4 mmol/L 
 ctCO2 H 27.5', 'Asidosis Respiratorik
Hiperkalemia', 'Lapor dr jaga (+)', '1645', '1', 'Lapor dr jaga (+)', NULL, '1645', 0, NULL, '2025-03-15 20:27:39')
ERROR - 2025-03-15 20:29:11 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-15 20:29:11 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-15 20:29:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-03-15 20:46:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 20:59:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 21:05:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 21:17:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_laboratorium_kode_idx&quot;
DETAIL:  Key (kode)=(00095879297441) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 21:17:26 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_laboratorium_kode_idx"
DETAIL:  Key (kode)=(00095879297441) already exists. - Invalid query: INSERT INTO "sm_laboratorium" ("kode", "id_layanan_pendaftaran", "id_order_laboratorium", "jenis", "id_dokter", "analis", "id_dokter_pjwb", "kategori", "kelamin_anak", "waktu_konfirm", "id_users") VALUES ('00095879297441', '710933', '297441', 'Patologi Klinik', '74', '1316', '105', 'P', NULL, '2025-03-15 21:17:26', '1318')
ERROR - 2025-03-15 21:17:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_laboratorium_kode_idx&quot;
DETAIL:  Key (kode)=(00095879297441) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 21:17:30 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_laboratorium_kode_idx"
DETAIL:  Key (kode)=(00095879297441) already exists. - Invalid query: INSERT INTO "sm_laboratorium" ("kode", "id_layanan_pendaftaran", "id_order_laboratorium", "jenis", "id_dokter", "analis", "id_dokter_pjwb", "kategori", "kelamin_anak", "waktu_konfirm", "id_users") VALUES ('00095879297441', '710933', '297441', 'Patologi Klinik', '74', '1316', '105', 'P', NULL, '2025-03-15 21:17:30', '1318')
ERROR - 2025-03-15 21:20:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('808736', '1', '', '3.00'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 21:20:58 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('808736', '1', '', '3.00'...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('808736', '1', '', '3.00', '3 x Sehari 1 Tablet/Kapsul', '', 'null', '0', '', '0', 'MORN, NOON, EVE', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-15 21:22:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 21:26:04 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-15 21:26:04 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-15 21:56:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 21:56:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 21:58:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 21:58:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 22:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 22:07:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 22:10:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 22:10:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 22:10:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 22:10:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 22:11:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 22:11:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 22:12:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 15987
ERROR - 2025-03-15 22:50:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 22:51:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 22:51:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 22:51:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5794557, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 22:51:42 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5794557, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5794557, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-03-15 22:51:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 22:51:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 22:54:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 22:54:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 22:58:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 22:58:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:08:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:08:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:08:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:08:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:08:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:08:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:08:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5794650, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:08:17 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5794650, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5794650, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-03-15 23:08:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:08:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:08:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:08:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:09:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:09:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:09:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:09:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:10:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:10:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:11:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:11:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:11:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:11:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:11:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:11:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:11:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:11:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:26:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 23:26:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 23:31:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 23:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 23:56:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-15 23:57:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:57:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:58:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:58:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:58:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:58:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:59:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:59:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-15 23:59:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-15 23:59:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
