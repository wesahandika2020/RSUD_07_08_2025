<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-04-16 00:13:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 00:30:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 00:30:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 00:31:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 00:31:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 00:32:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 00:32:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 01:05:21 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-16 01:05:21 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-16 01:15:20 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 01:15:28 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 01:23:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 01:23:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 01:43:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 01:47:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 01:47:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 01:47:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5979563, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 01:47:37 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5979563, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5979563, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-04-16 01:54:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot; 00:00:00&quot;
LINE 27: WHERE &quot;r&quot;.&quot;tanggal&quot; BETWEEN ' 00:00:00' AND '2025-04-16 23:5...
                                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 01:54:42 --> Query error: ERROR:  invalid input syntax for type date: " 00:00:00"
LINE 27: WHERE "r"."tanggal" BETWEEN ' 00:00:00' AND '2025-04-16 23:5...
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
WHERE "r"."tanggal" BETWEEN ' 00:00:00' AND '2025-04-16 23:59:59'
AND "r"."no_rm" = '00354767'
ORDER BY "r"."id" DESC, "r"."tanggal" DESC
 LIMIT 10
ERROR - 2025-04-16 03:17:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 03:17:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 03:17:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 03:17:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 03:47:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 03:47:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 03:47:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 03:47:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 03:47:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 05:21:04 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-16 05:29:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 05:29:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 05:46:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 05:48:50 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-04-16 05:58:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 05:58:50 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1665' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-04-16 06:09:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:09:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 06:09:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 06:10:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:30:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:32:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:32:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160011) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 06:32:35 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160011) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160011', '00018597', '2025-04-16 06:32:33', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001475906106', NULL, '0223B0720425Y000918', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Paru', 0, '2', '', '20250416C001')
ERROR - 2025-04-16 06:32:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:33:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160014) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 06:33:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160014) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160014', '00162995', '2025-04-16 06:33:16', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001421444259', NULL, '102501060325Y000198', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250416A097')
ERROR - 2025-04-16 06:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:37:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 06:37:35 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A052%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 06:37:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:38:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160026) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 06:38:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160026) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160026', '00071247', '2025-04-16 06:38:00', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002033121227', NULL, '102501040225P005969', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250416A005')
ERROR - 2025-04-16 06:38:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:38:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 06:38:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 06:38:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:42:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:45:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:50:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:53:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:54:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:54:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:56:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:57:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 06:57:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:00:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:00:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:00:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 07:00:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:00:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 07:02:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:03:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:03:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1659' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-04-16 07:03:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:03:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1659' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-04-16 07:05:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:05:39 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A084%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:06:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:07:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:07:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160096) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:07:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160096) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160096', '00373811', '2025-04-16 07:07:01', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002315661671', NULL, '0223B1570425P000715', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik Syaraf', 0, '2', '', '20250416A123')
ERROR - 2025-04-16 07:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:08:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:08:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:09:18 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 07:09:18 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 07:09:29 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 07:09:29 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 07:09:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:11:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:11:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:11:34 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A051%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:11:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:12:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 07:13:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:13:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:13:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160115) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:13:53 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160115) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160115', '00049430', '2025-04-16 07:13:46', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000166150956', NULL, '102501020425Y000250', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250416A163')
ERROR - 2025-04-16 07:14:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:14:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:14:53 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A073%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:14:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:15:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:15:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 07:15:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:15:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 07:15:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:16:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:16:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:16:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:17:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:17:01 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 07:17:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:17:01 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 07:17:28 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 07:17:28 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 07:18:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:18:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:19:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:19:19 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 07:19:19 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 07:19:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 07:20:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:20:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:20:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:21:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:21:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 07:21:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:21:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:21:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 07:21:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:21:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 07:23:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:23:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:23:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:23:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (842929, 727764, null, 10, nyeri perut (+), bab darah (-) , ku; sedang kes; cmc , Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemo..., Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Rani..., , 2120, 1, Ivfd RL/12jam + ketorolac 1amp&lt;div&gt;Inj. Ceftriaxon 2x1gr&lt;/div&gt;..., null, null, 2120, 2025-04-16 07:23:52, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:23:52 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (842929, 727764, null, 10, nyeri perut (+), bab darah (-) , ku; sedang kes; cmc , Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemo..., Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Rani..., , 2120, 1, Ivfd RL/12jam + ketorolac 1amp<div>Inj. Ceftriaxon 2x1gr</div>..., null, null, 2120, 2025-04-16 07:23:52, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('727764', NULL, '10', 'nyeri perut (+), bab darah (-) ', 'ku; sedang kes; cmc ', 'Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemoroid Externa Grade 1
', 'Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Ranitidin 2x1
Ondan 3x4mg po 
Pct 3x500 
Traneksamat 3x500 po 
Konsul bedah
Usg abdomen
', '', '', '', '', '', '', '', '', '2120', '1', 'Ivfd RL/12jam + ketorolac 1amp<div>Inj. Ceftriaxon 2x1gr</div><div>Inj. Ranitidin 2x1</div><div>Ondan 3x4mg po </div><div>Pct 3x500 </div><div>Traneksamat 3x500 po </div><div>Konsul bedah</div><div>Usg abdomen</div>', NULL, '2120', 0, NULL, '2025-04-16 07:23:52')
ERROR - 2025-04-16 07:23:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (842930, 727764, null, 10, nyeri perut (+), bab darah (-) , ku; sedang kes; cmc , Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemo..., Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Rani..., , 2120, 1, Ivfd RL/12jam + ketorolac 1amp&lt;div&gt;Inj. Ceftriaxon 2x1gr&lt;/div&gt;..., null, null, 2120, 2025-04-16 07:23:57, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:23:57 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (842930, 727764, null, 10, nyeri perut (+), bab darah (-) , ku; sedang kes; cmc , Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemo..., Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Rani..., , 2120, 1, Ivfd RL/12jam + ketorolac 1amp<div>Inj. Ceftriaxon 2x1gr</div>..., null, null, 2120, 2025-04-16 07:23:57, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('727764', NULL, '10', 'nyeri perut (+), bab darah (-) ', 'ku; sedang kes; cmc ', 'Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemoroid Externa Grade 1
', 'Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Ranitidin 2x1
Ondan 3x4mg po 
Pct 3x500 
Traneksamat 3x500 po 
Konsul bedah
Usg abdomen
', '', '', '', '', '', '', '', '', '2120', '1', 'Ivfd RL/12jam + ketorolac 1amp<div>Inj. Ceftriaxon 2x1gr</div><div>Inj. Ranitidin 2x1</div><div>Ondan 3x4mg po </div><div>Pct 3x500 </div><div>Traneksamat 3x500 po </div><div>Konsul bedah</div><div>Usg abdomen</div>', NULL, '2120', 0, NULL, '2025-04-16 07:23:57')
ERROR - 2025-04-16 07:24:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (842931, 727764, null, 10, nyeri perut (+), bab darah (-) , ku; sedang kes; cmc , Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemo..., Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Rani..., , 2120, 1, Ivfd RL/12jam + ketorolac 1amp&lt;div&gt;Inj. Ceftriaxon 2x1gr&lt;/div&gt;..., null, null, 2120, 2025-04-16 07:24:06, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:24:06 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (842931, 727764, null, 10, nyeri perut (+), bab darah (-) , ku; sedang kes; cmc , Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemo..., Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Rani..., , 2120, 1, Ivfd RL/12jam + ketorolac 1amp<div>Inj. Ceftriaxon 2x1gr</div>..., null, null, 2120, 2025-04-16 07:24:06, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('727764', NULL, '10', 'nyeri perut (+), bab darah (-) ', 'ku; sedang kes; cmc ', 'Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemoroid Externa Grade 1
', 'Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Ranitidin 2x1
Ondan 3x4mg po 
Pct 3x500 
Traneksamat 3x500 po 
Konsul bedah
Usg abdomen
', '', '', '', '', '', '', '', '', '2120', '1', 'Ivfd RL/12jam + ketorolac 1amp<div>Inj. Ceftriaxon 2x1gr</div><div>Inj. Ranitidin 2x1</div><div>Ondan 3x4mg po </div><div>Pct 3x500 </div><div>Traneksamat 3x500 po </div><div>Konsul bedah</div><div>Usg abdomen</div>', NULL, '2120', 0, NULL, '2025-04-16 07:24:06')
ERROR - 2025-04-16 07:24:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (842932, 727764, null, 10, nyeri perut (+), bab darah (-) , ku; sedang kes; cmc , Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemo..., Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Rani..., , 2120, 1, Ivfd RL/12jam + ketorolac 1amp&lt;div&gt;Inj. Ceftriaxon 2x1gr&lt;/div&gt;..., null, null, 2120, 2025-04-16 07:24:09, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:24:09 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (842932, 727764, null, 10, nyeri perut (+), bab darah (-) , ku; sedang kes; cmc , Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemo..., Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Rani..., , 2120, 1, Ivfd RL/12jam + ketorolac 1amp<div>Inj. Ceftriaxon 2x1gr</div>..., null, null, 2120, 2025-04-16 07:24:09, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('727764', NULL, '10', 'nyeri perut (+), bab darah (-) ', 'ku; sedang kes; cmc ', 'Abdominal Pain ec susp ISK dd appendisitis + Hematokezia ec Hemoroid Externa Grade 1
', 'Ivfd RL/12jam + ketorolac 1amp
Inj. Ceftriaxon 2x1gr
Inj. Ranitidin 2x1
Ondan 3x4mg po 
Pct 3x500 
Traneksamat 3x500 po 
Konsul bedah
Usg abdomen
', '', '', '', '', '', '', '', '', '2120', '1', 'Ivfd RL/12jam + ketorolac 1amp<div>Inj. Ceftriaxon 2x1gr</div><div>Inj. Ranitidin 2x1</div><div>Ondan 3x4mg po </div><div>Pct 3x500 </div><div>Traneksamat 3x500 po </div><div>Konsul bedah</div><div>Usg abdomen</div>', NULL, '2120', 0, NULL, '2025-04-16 07:24:09')
ERROR - 2025-04-16 07:24:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:25:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:25:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:25:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:25:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:25:47 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A057%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:26:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:26:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 07:26:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:27:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:27:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160159) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:27:46 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160159) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160159', '00339573', '2025-04-16 07:27:44', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001460998361', NULL, '022310040225Y000410', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250416B046')
ERROR - 2025-04-16 07:29:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:29:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:29:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A055%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:29:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:30:03 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-16 07:30:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-16 07:30:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:30:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A101%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:31:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:31:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:31:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:32:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:32:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:32:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:33:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:33:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:33:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:33:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:34:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:34:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:34:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 07:34:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:34:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 07:34:34 --> Severity: Notice  --> Undefined index:  /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pembayaran_rajal/views/index.php 17
ERROR - 2025-04-16 07:34:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:35:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:35:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:35:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:35:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:35:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:35:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:35:49 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A096%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:36:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:37:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:37:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:37:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:38:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:38:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:38:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:38:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:38:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:39:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:39:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:39:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:39:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 07:39:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:39:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 07:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:40:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:41:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:41:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:41:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:42:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:43:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:43:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:43:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:43:59 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A063%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:44:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:44:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:44:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:44:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:44:45 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-16 07:45:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:45:21 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A056%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:45:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:45:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:46:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:46:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:46:36 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-16 07:46:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;undefined&quot;
LINE 5:                 WHERE jd.tanggal='undefined' AND jd.shift_po...
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:46:47 --> Query error: ERROR:  invalid input syntax for type date: "undefined"
LINE 5:                 WHERE jd.tanggal='undefined' AND jd.shift_po...
                                         ^ - Invalid query: SELECT jd.id_poli,  jd.tanggal, jd.nama_poli,jd.shift_poli, array_to_string((string_to_array(jd.nama_dokter, ' '))[1:2], ' ') AS nama_dokter, 
                jd.kuota, jd.jml_kunjung jadwal_jml, vm_jd.jumlah_kunjungan real_kunjungan
                FROM sm_jadwal_dokter jd
                LEFT JOIN vm_jml_jadwal_dokter_2shift vm_jd ON vm_jd.id = jd.id
                WHERE jd.tanggal='undefined' AND jd.shift_poli='undefined'
                ORDER BY jd.nama_poli
ERROR - 2025-04-16 07:46:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:46:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:47:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:47:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:48:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:48:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:49:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:49:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160208) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:49:23 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160208) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160208', '00373819', '2025-04-16 07:49:22', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001744928379', NULL, '0221B1830425Y000363', 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250416A175')
ERROR - 2025-04-16 07:50:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:50:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:50:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:50:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:50:58 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A060%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 07:51:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:52:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:52:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 07:52:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:52:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 07:52:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:52:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:53:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:53:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:54:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:54:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:54:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 00:55:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 00:55:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 07:55:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:56:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12881
ERROR - 2025-04-16 07:56:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:56:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:57:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160232) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 07:57:05 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160232) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160232', '00373292', '2025-04-16 07:57:02', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001731036069', NULL, '0223R0380425V003013', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Anak', 0, 2, NULL, '20250416B255')
ERROR - 2025-04-16 07:57:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12881
ERROR - 2025-04-16 07:58:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:58:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:58:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12881
ERROR - 2025-04-16 07:58:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 07:58:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:59:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 07:59:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 07:59:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:00:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:00:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:01:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:01:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:01:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:01:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:01:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:02:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:02:15 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:02:15 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 08:02:20 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:02:20 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 01:02:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 01:02:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 08:02:48 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-16 08:03:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:03:09 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A116%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 08:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:03:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:03:48 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-16 08:04:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:04:21 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-16 08:04:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:04:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:05:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (826815, '31', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:05:05 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (826815, '31', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (826815, '31', '', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 08:05:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:05:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:06:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:06:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:06:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:06:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:07:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:07:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:07:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:07:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:07:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:07:45 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-16 08:07:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-16 08:07:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-16 08:07:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:08:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:08:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:08:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:09:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:09:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:09:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A054%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 08:10:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:10:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 08:10:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:10:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 08:11:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:11:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:11:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:12:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:13:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160280) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:13:10 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160280) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160280', '00360311', '2025-04-16 08:13:07', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000094542344', NULL, '0117U0740325P001031', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250416A002')
ERROR - 2025-04-16 08:13:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380425V006140) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:13:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380425V006140) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380425V006140', "no_polish" = '0002189451554'
WHERE "id" = '671892'
ERROR - 2025-04-16 08:13:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:13:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A134%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 08:13:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:14:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:14:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11714
ERROR - 2025-04-16 08:15:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:15:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:15:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:15:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:16:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:16:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:16:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:16:34 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-04-16 08:17:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:17:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:18:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:18:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (826840, '20', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:18:26 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (826840, '20', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (826840, '20', '', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 08:18:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160300) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:18:32 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160300) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160300', '00242594', '2025-04-16 08:18:30', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000048991645', NULL, '022300060325Y001937', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250416B342')
ERROR - 2025-04-16 08:19:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:19:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:19:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:19:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:19:31 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A083%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 08:19:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:20:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:20:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:20:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:20:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:21:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:21:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:23:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:23:52 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:23:52 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 08:23:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:24:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160323) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:24:13 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160323) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160323', '00326677', '2025-04-16 08:24:12', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001320729208', NULL, '102501060125Y002587', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Syaraf', 0, '2', '', '20250416A038')
ERROR - 2025-04-16 08:24:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:25:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:25:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:26:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:26:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:26:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:26:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:27:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:27:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:27:33 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:27:33 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 08:27:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:27:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 08:27:37 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:27:37 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 08:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:28:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:28:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:28:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:29:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:29:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:29:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:29:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:29:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-04-16 08:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:30:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:30:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:30:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:30:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:30:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:30:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:30:54 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 08:30:54 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 08:30:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:31:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:31:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (826865, '3', '', '10', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:31:07 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (826865, '3', '', '10', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (826865, '3', '', '10', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 08:31:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:31:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:31:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:32:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:32:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:32:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:32:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160353) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:32:48 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160353) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160353', '00373832', '2025-04-16 08:32:48', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1762', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250416B341')
ERROR - 2025-04-16 08:33:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:33:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:33:11 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A100%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 08:33:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250416B356) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:33:16 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250416B356) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "status_jkn", "usia_pasien", "pasien_baru", "waktu_estimasi", "id_dokter", "status_rm", "nama_dokter", "jenis_kunjungan", "sisa_kuota", "total_kuota", "user_create", "id_jadwal_dokter") VALUES ('20250416B356', '356', 'B356', 'B', 280400, 44, 'MCU', '2025-04-16', 0, '2025-04-16 08:33:16', 'Booking', 'rsud', 'NON JKN', 'Asuransi', 0, '2025-04-16 19:20:00', 42, 0, 'dr. ANGGI SAPUTRI', NULL, 42, 60, '1945', 55477)
ERROR - 2025-04-16 08:33:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:33:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:33:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:33:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:33:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '353', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-04-16 08:33:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:33:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '353', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-04-16 08:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:34:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:34:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:34:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:34:40 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00087804'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-04-16 08:34:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:34:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:35:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:35:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:35:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:36:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:36:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:37:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:37:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:37:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:38:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:38:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:38:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:39:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:39:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:39:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A196%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 08:39:15 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:39:15 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 08:39:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:39:22 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:39:22 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 08:39:22 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 08:39:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:39:27 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 08:39:27 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 08:39:27 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 08:39:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:39:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:39:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:39:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:40:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:40:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:40:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:41:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:42:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:42:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:42:25 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 08:42:25 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 08:42:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:44:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 01:44:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-16 01:44:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-16 08:44:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160385) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:44:35 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160385) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160385', '00373839', '2025-04-16 08:44:34', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002124447118', NULL, '102506010425Y001016', 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Obgyn', 0, 2, '', '20250416A196')
ERROR - 2025-04-16 08:44:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:44:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 08:45:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:45:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:45:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:46:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:46:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:46:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-04-16 08:46:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160391) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:46:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160391) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160391', '00314971', '2025-04-16 08:46:43', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001809254463', NULL, '102501040425Y001689', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250416B266')
ERROR - 2025-04-16 08:47:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 08:49:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:49:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 17350
ERROR - 2025-04-16 01:49:06 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 01:49:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 08:49:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 17350
ERROR - 2025-04-16 01:49:27 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 01:49:27 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 08:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:49:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:49:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:49:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:50 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%l%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:50 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%la%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:50 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lan%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:51 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lans%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:51 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lanso%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:53 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lans%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:53 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%lan%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:53 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%la%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 08:49:53 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00346414' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%l%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 08:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:50:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:50:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:50:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:50:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:50:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11714
ERROR - 2025-04-16 08:51:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:51:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:51:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:51:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:51:41 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-16 08:51:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:51:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:51:53 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-16 08:52:05 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-16 08:52:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:52:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:53:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:53:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:54:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:54:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:55:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:56:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:56:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:56:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:57:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:58:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:58:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 08:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:59:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 08:59:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:00:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:00:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:00:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:00:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:00:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:01:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:02:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (826954, '7', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:02:59 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (826954, '7', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (826954, '7', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 02:03:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 02:03:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 09:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:03:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:04:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:04:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:04:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:04:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5980794, '63', 22377.6, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:04:54 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5980794, '63', 22377.6, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5980794, '63', 22377.6, '1', '1.00', NULL, 'null')
ERROR - 2025-04-16 09:05:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:05:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:05:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:05:22 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 09:05:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:05:22 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 09:05:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:05:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:05:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:05:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:05:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:05:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:06:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:06:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:07:19 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-16 09:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:08:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:08:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250419A150) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:08:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250419A150) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250419A150', '150', 'A150', 'A', '2025-04-19', '0', '2025-04-16 09:08:52', 'Booking', 'APM', 'Prioritas', 0, '2025-04-19  08:25:09', 0, '1945', '00370496', 84, 260884, 34, 'IRM', '081398604998', '3671016609630003', '1963-09-26', 'dr. DHANI Sp.KFR', 1, 'Asuransi', 87, '130', '200', 'Ok.', '0', '54628', '0000049345479', 'JKN', '297173', '0', '34', '0223B1340325P000367', 'KLINIK GARUDA SENTRA MEDIKA 1', '2025-05-29', 'KLT', '3', NULL, '0223R0380325V004738', '24', 'Belum', 201, 'Rujukan tidak valid')
ERROR - 2025-04-16 09:08:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:09:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:10:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:10:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:10:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:10:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:10:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:10:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:10:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:11:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:12:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 09:12:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 09:12:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:12:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:13:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:13:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:13:31 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A021%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 09:13:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:14:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:14:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:14:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:14:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:14:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:14:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:14:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:14:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5980972, '773', 7384.608, '0.9', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:14:35 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5980972, '773', 7384.608, '0.9', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5980972, '773', 7384.608, '0.9', '1.00', 'Ya', 'null')
ERROR - 2025-04-16 09:14:43 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:14:43 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:14:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:14:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:14:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:15:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:15:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:15:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:15:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:15:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:15:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:17:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:17:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:17:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:17:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:17:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:17:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:17:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:17:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:18:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:18:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:18:42 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%t%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 09:18:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:18:42 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%tr%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 09:18:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:18:42 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00110198' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%tri%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-04-16 09:18:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:18:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:18:50 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A065%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 09:19:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:19:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A066%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 09:19:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:19:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160474) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:19:23 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160474) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160474', '00219327', '2025-04-16 09:19:23', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '19', NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Klinik Akasia', 0, '2', '', '20250416G023')
ERROR - 2025-04-16 09:19:44 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-04-16 09:19:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:19:52 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A058%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 09:20:00 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-16 09:20:00 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-16 09:20:00 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-16 09:20:11 --> Severity: error  --> Exception: Too few arguments to function Pengkodean_icd_x::cetak_resume_medis_intensive_care(), 1 passed in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/CodeIgniter.php on line 529 and at least 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 719
ERROR - 2025-04-16 09:20:11 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 09:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:20:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:20:30 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:20:30 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:20:31 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 09:20:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:31 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:20:31 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:20:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:20:38 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:20:38 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:20:38 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 09:20:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:38 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:20:48 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-04-16 09:20:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-04-16 09:21:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:21:40 --> Severity: Notice  --> Undefined variable: metode_bayar /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/views/coding-grouping/modal_eklaim.php 288
ERROR - 2025-04-16 09:21:40 --> Severity: Notice  --> Undefined variable: cob_list /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/views/coding-grouping/modal_eklaim.php 294
ERROR - 2025-04-16 09:21:40 --> Severity: Notice  --> Undefined variable: cara_masuk /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/views/coding-grouping/modal_eklaim.php 390
ERROR - 2025-04-16 09:21:40 --> Severity: Notice  --> Undefined variable: cara_pulang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/views/coding-grouping/modal_eklaim.php 524
ERROR - 2025-04-16 09:21:40 --> Severity: Notice  --> Undefined variable: kode_tarif /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/views/coding-grouping/modal_eklaim.php 535
ERROR - 2025-04-16 09:22:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:22:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827004, '1', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:22:28 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (827004, '1', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827004, '1', '', '', '1 x Sehari 2 Tablet', '', 'PC', '0', '', '0', 'NIGHT', '2', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 09:22:43 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:22:43 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:22:43 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 09:22:43 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:22:43 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:22:43 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:22:43 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:22:43 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:22:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:22:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:23:23 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:23:23 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:23:23 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 09:23:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:23:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:23:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:23:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:23:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:23:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:24:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:25:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:26:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:26:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:26:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:26:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:26:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:26:45 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:26:45 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:27:15 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:27:15 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:27:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:27:25 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:27:25 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:27:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:27:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:27:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:28:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:28:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:28:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:28:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:29:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:29:31 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:29:31 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:29:31 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 09:29:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:29:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:29:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:29:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:29:31 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:29:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:29:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:29:56 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-04-16 09:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:29:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:29:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-04-16 02:31:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 02:31:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 02:31:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 02:31:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 09:31:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:31:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:31:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:31:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:31:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:32:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:32:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:32:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:32:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:32:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:33:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160522) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:33:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160522) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160522', '00331731', '2025-04-16 09:33:08', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0003068849373', NULL, '0221R0080425B000096', 'Lama', NULL, 1765, 0, 'Belum', 'Poliklinik THT', 0, 2, NULL, '20250416B399')
ERROR - 2025-04-16 09:34:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:34:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160531) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:34:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160531) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160531', '00373872', '2025-04-16 09:34:36', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001441258694', NULL, '1025R0140225B000149', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik THT', 0, '2', '', '20250416F027')
ERROR - 2025-04-16 09:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:34:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160532) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:34:44 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160532) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160532', '00211365', '2025-04-16 09:34:42', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000815166088', NULL, '0223R0380425V001035', 'Lama', NULL, 1951, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250416A082')
ERROR - 2025-04-16 09:35:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:35:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 09:35:26 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:35:26 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:36:09 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:36:09 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:36:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:36:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:36:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:36:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:36:52 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:36:52 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:36:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:37:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:37:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:37:49 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-16 09:37:50 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-16 09:37:50 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-16 09:38:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:38:12 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:38:12 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:38:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:38:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 09:38:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:39:07 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:39:07 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:39:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160548) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:39:27 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160548) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160548', '00207203', '2025-04-16 09:39:25', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002230204948', NULL, '0223R0380425V003752', 'Lama', NULL, 1951, 0, 'Belum', 'Poliklinik Anak', 0, 2, NULL, '20250416B258')
ERROR - 2025-04-16 09:40:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:40:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:40:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:40:34 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A059%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 09:40:40 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8390
ERROR - 2025-04-16 09:41:58 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:41:58 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:43:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:43:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...nerima_pagi&quot;, &quot;id_users&quot;) VALUES ('727351', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:43:08 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...nerima_pagi", "id_users") VALUES ('727351', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('727351', NULL, '', NULL, '2025-04-16 13:30:00', 'hipertermia, bersihan jalan nafas tidak efektif, nausea', 'D51/2NS 18tpm', 'R/ BLPL', '218', '217', '971')
ERROR - 2025-04-16 09:43:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:43:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:43:51 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00372203'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-04-16 09:44:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:45:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:45:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:45:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:46:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:47:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:47:09 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = '14'
AND date(tanggal_layanan) = ''
ERROR - 2025-04-16 09:47:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:47:37 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 09:47:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:47:37 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 09:48:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:48:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:48:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:49:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:49:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-04-16 09:49:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:49:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:49:59 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-16 09:50:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:50:06 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A149%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 09:50:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:50:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:50:48 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = '14'
AND date(tanggal_layanan) = ''
ERROR - 2025-04-16 09:50:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250419B291) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:50:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250419B291) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250419B291', '291', 'B291', 'B', '2025-04-19', '0', '2025-04-16 09:50:53', 'Booking', 'APM', 'Asuransi', 0, '2025-04-19  07:09:00', 0, '1701', '00047578', 44, 37704, 13, 'BSY', '085129874896', '3671075212790002', '1979-12-12', 'dr. ACHMAD JANA MAULANA, Sp.BS', 1, 'Asuransi', 58, '60', '200', 'Ok.', '0', '51458', '0001336030716', 'JKN', '297343', '0', '13', '1005R0010325B000403', 'RSUD KABUPATEN TANGERANG', '2025-06-22', 'BSY', '3', NULL, '0223R0380325V014031', '13', 'Sudah', 200, 'Ok.')
ERROR - 2025-04-16 09:51:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:51:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:51:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 09:51:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:51:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 09:51:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:51:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827073, '6', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:51:48 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (827073, '6', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827073, '6', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 09:52:19 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:52:19 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:52:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:52:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:52:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:53:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:53:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:53:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:53:34 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00022388'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-04-16 09:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:53:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:54:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:54:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 09:54:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:54:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 09:54:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:54:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:54:36 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = '28'
AND date(tanggal_layanan) = ''
ERROR - 2025-04-16 09:55:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:55:11 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:55:11 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:55:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:55:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:04 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:56:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:56:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:32 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:56:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:56:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:56:55 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11862
ERROR - 2025-04-16 09:57:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827087, '4', '', '', 'B...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:57:04 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (827087, '4', '', '', 'B...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827087, '4', '', '', 'BHP', '', 'PC', '0', '', '0', 'MORN', 'bhp', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 09:57:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:58:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-04-16 09:58:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160592) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:58:28 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160592) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160592', '00318727', '2025-04-16 09:58:27', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002914213724', NULL, '0496B0000325Y000261', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250416B196')
ERROR - 2025-04-16 09:58:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:58:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:59:04 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:59:04 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:59:07 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 09:59:07 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 09:59:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:59:12 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-04-16 09:59:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:59:13 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-04-16 09:59:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 09:59:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:59:16 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-04-16 09:59:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:59:17 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-04-16 09:59:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:59:18 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-04-16 09:59:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 09:59:18 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-04-16 10:00:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:01:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:02:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:02:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:03:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:04:28 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 10:04:28 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 10:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:05:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:06:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (843084, 727363, null, 10, neyri pinggang , gcs 15, radikulopati lumbalis, megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
, , 1247, 1, megatic oles&lt;div&gt;diazepam 0-0-2 mg&lt;/div&gt;&lt;div&gt;mp 3x8 mg&lt;/div&gt;&lt;..., null, null, 1247, 2025-04-16 10:06:54, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:06:54 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (843084, 727363, null, 10, neyri pinggang , gcs 15, radikulopati lumbalis, megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
, , 1247, 1, megatic oles<div>diazepam 0-0-2 mg</div><div>mp 3x8 mg</div><..., null, null, 1247, 2025-04-16 10:06:54, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('727363', NULL, '10', 'neyri pinggang ', 'gcs 15', 'radikulopati lumbalis', 'megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
', '', '', '', '', '', '', '', '', '1247', '1', 'megatic oles<div>diazepam 0-0-2 mg</div><div>mp 3x8 mg</div><div>tramadol 2x50mg</div>', NULL, '1247', 0, NULL, '2025-04-16 10:06:54')
ERROR - 2025-04-16 10:06:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (843085, 727363, null, 10, neyri pinggang , gcs 15, radikulopati lumbalis, megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
, , 1247, 1, megatic oles&lt;div&gt;diazepam 0-0-2 mg&lt;/div&gt;&lt;div&gt;mp 3x8 mg&lt;/div&gt;&lt;..., null, null, 1247, 2025-04-16 10:06:57, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:06:57 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (843085, 727363, null, 10, neyri pinggang , gcs 15, radikulopati lumbalis, megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
, , 1247, 1, megatic oles<div>diazepam 0-0-2 mg</div><div>mp 3x8 mg</div><..., null, null, 1247, 2025-04-16 10:06:57, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('727363', NULL, '10', 'neyri pinggang ', 'gcs 15', 'radikulopati lumbalis', 'megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
', '', '', '', '', '', '', '', '', '1247', '1', 'megatic oles<div>diazepam 0-0-2 mg</div><div>mp 3x8 mg</div><div>tramadol 2x50mg</div>', NULL, '1247', 0, NULL, '2025-04-16 10:06:57')
ERROR - 2025-04-16 10:07:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (843086, 727363, null, 10, neyri pinggang , gcs 15, radikulopati lumbalis, megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
, , 1247, 1, megatic oles&lt;div&gt;diazepam 0-0-2 mg&lt;/div&gt;&lt;div&gt;mp 3x8 mg&lt;/div&gt;&lt;..., null, null, 1247, 2025-04-16 10:07:02, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:07:02 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (843086, 727363, null, 10, neyri pinggang , gcs 15, radikulopati lumbalis, megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
, , 1247, 1, megatic oles<div>diazepam 0-0-2 mg</div><div>mp 3x8 mg</div><..., null, null, 1247, 2025-04-16 10:07:02, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('727363', NULL, '10', 'neyri pinggang ', 'gcs 15', 'radikulopati lumbalis', 'megatic oles
diazepam 0-0-2 mg
mp 3x8 mg
tramadol 2x50mg
', '', '', '', '', '', '', '', '', '1247', '1', 'megatic oles<div>diazepam 0-0-2 mg</div><div>mp 3x8 mg</div><div>tramadol 2x50mg</div>', NULL, '1247', 0, NULL, '2025-04-16 10:07:02')
ERROR - 2025-04-16 10:07:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:07:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:08:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:08:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:08:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827123, '6', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:08:46 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (827123, '6', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827123, '6', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 10:09:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:10:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:11:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:11:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:11:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:11:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:12:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:13:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:13:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:13:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:14:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:15:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:15:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:15:57 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-04-16 10:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:17:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:21:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:23:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:23:24 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-04-16 10:23:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:24:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:24:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:25:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:25:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:27:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:27:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:27:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 10:27:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:27:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:27:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:28:21 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:28:21 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:29:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:29:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 10:29:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:29:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 10:29:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5982172, '346', 6607.2, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:29:33 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5982172, '346', 6607.2, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5982172, '346', 6607.2, '1', '1.00', NULL, 'null')
ERROR - 2025-04-16 10:30:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:30:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 10:31:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:31:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:31:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:32:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:32:27 --> Severity: Notice  --> Undefined index: id_pegawai /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/views/index.php 8
ERROR - 2025-04-16 10:32:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:32:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:33:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:33:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:33:34 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A093%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 10:34:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:36:17 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:36:17 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:36:21 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:36:21 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:36:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:36:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:37:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 10:37:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 10:37:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:37:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:38:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;no_kab&quot;
LINE 3: WHERE &quot;NO_PROP&quot; = 'no_kab'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:38:27 --> Query error: ERROR:  invalid input syntax for type integer: "no_kab"
LINE 3: WHERE "NO_PROP" = 'no_kab'
                          ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = 'no_kab'
AND "NO_KAB" IS NULL
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 10:38:45 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-16 10:38:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:38:51 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:38:51 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:39:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:39:46 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:39:46 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:39:53 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:39:53 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:39:54 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:39:54 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:39:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:41:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:43:08 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:43:08 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:43:11 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:43:11 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:43:15 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:43:15 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:43:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:43:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:44:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:44:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:46:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:46:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:47:18 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-16 10:47:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:47:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:48:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:49:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:49:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:50:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160661) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:50:27 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160661) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160661', '00358863', '2025-04-16 10:50:26', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0000370557764', NULL, '0223B1570325P000081', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250416A146')
ERROR - 2025-04-16 10:50:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:50:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 10:51:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:51:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:51:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 10:51:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:51:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 10:51:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:52:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 10:52:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:52:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 10:52:59 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:52:59 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:52:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:53:56 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:53:56 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:54:04 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 10:54:04 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 10:54:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:54:40 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00373526'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-04-16 10:55:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:56:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:57:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:57:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A212%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 10:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:58:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:58:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 10:58:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:58:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 10:58:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:58:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:59:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160672) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:59:24 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160672) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160672', '00003977', '2025-04-16 10:59:15', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000195039718', NULL, '0223B1450425Y001068', 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Radiologi Gigi', 0, '2', '', '20250416A212')
ERROR - 2025-04-16 10:59:39 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-16 10:59:40 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-16 10:59:40 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-16 10:59:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 10:59:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...nerima_pagi&quot;, &quot;id_users&quot;) VALUES ('728869', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 10:59:47 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...nerima_pagi", "id_users") VALUES ('728869', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('728869', NULL, '', NULL, '2025-04-16 10:58:00', 'nyeri akut, nausea', 'IVFD RL 8 jam/kolf', 'cek GDP/GD2PP + URINALISA. inj Apidra 3x12 iu sc. nj Lavemir 1x14 iu sc
cek ulang DR , Cr tgl 18/4/25', '51', '402', '1607')
ERROR - 2025-04-16 10:59:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:00:44 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-04-16 11:00:44 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-04-16 11:00:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:00:49 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-04-16 11:00:49 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-04-16 11:00:54 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-04-16 11:00:54 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-04-16 11:00:57 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-04-16 11:00:58 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-04-16 11:01:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:01:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:01:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:02:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:02:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:02:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 11:04:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:04:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:04:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:04:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:04:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:05:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:05:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:06:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:06:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:06:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 11:06:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:06:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 11:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:08:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:10:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:11:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 11:12:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 11:15:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:15:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:15:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:15:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:15:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:15:33 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 11:15:56 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 11:16:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:19:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:19:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:19:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:22:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:22:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:22:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:22:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:22:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:22:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:22:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:22:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:22:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2504160698) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:22:53 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2504160698) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2504160698', '00325774', '2025-04-16 11:22:52', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003524883388', NULL, '0223B0660225P002510', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250416B248')
ERROR - 2025-04-16 11:23:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:23:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:23:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:23:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:23:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:24:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:24:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:24:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:26:32 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:26:32 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:27:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:31:32 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-16 11:31:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827293, '9', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:31:43 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (827293, '9', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827293, '9', '', '', '1 x Sehari 1/2 Tablet', '', 'PC', '0', '', '0', 'MORN', 'udd', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 11:33:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 11:34:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250416B449) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:34:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250416B449) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250416B449', '449', 'B449', 'B', '2025-04-16', '0', '2025-04-16 11:34:11', 'Booking', 'APM', 'Asuransi', 0, '2025-04-16  08:25:30', 0, '1765', '00324696', 61, 246919, 25, 'MAT', '089668955121', '3671115410850013', '1985-10-14', 'dr. ETY DARMELA, Sp.M', 1, 'Asuransi', 40, '60', '200', 'Ok.', '0', '51630', '0002355508528', 'JKN', NULL, '1', NULL, '102501100425Y001694', 'PUSKESMAS PANUNGGANGAN', '2025-07-13', 'MAT', '1', '0', NULL, '25', 'Sudah', 200, 'Ok.')
ERROR - 2025-04-16 11:34:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:34:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:34:40 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8051
ERROR - 2025-04-16 11:34:59 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 9657
ERROR - 2025-04-16 11:35:05 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 9657
ERROR - 2025-04-16 11:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:38:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:38:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:39:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:40:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:40:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-04-16 00:00:00' AND '2025-04-16 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = '35'
AND "pg"."id" = '2123'
ORDER BY "lp"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-04-16 11:40:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:41:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:43:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:43:54 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-04-16 11:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:43:55 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-04-16 11:44:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:45:12 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:45:43 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-16 11:47:49 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:47:49 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:49:12 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:49:12 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:49:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:49:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:49:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:49:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:49:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:49:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:49:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:49:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:50:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:51:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:51:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:51:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:51:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:52:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:52:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:53:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:53:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:53:25 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:53:25 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:53:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:53:49 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:53:49 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:54:47 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:54:47 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:54:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:55:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 11:55:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:55:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 11:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:56:39 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:56:39 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:57:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:57:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:57:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:57:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:57:29 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:57:29 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:58:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:58:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:58:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:58:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 11:58:52 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 11:58:52 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 11:58:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-16 12.00&quot;
LINE 1: ...rawatan_intra_op_50&quot;:null}', &quot;tanggal_jam_ckio&quot; = '2025-04-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:58:58 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-16 12.00"
LINE 1: ...rawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-04-1...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '728074', "id_pendaftaran" = '671708', "id_users" = '2068', "id_data_catatan_perioperatift" = '3475', "suhu_ckp" = '{"suhu_ckp_1":null,"suhu_ckp_2":null,"suhu_ckp_3":null,"suhu_ckp_4":null,"suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":"-"}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"precaution standart","standar_kewaspadaan_ckp_2":"stt frontali sinistra"}', "rencana_tindakan_operasi_ckp" = 'eksisi', "dokter_operator_ckp" = '582', "rencana_perawatan_pasca_operasi_ckp" = 'ranap jati', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":"1","verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":"1","verifikasi_pasien_7":"1","verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":"1","verifikasi_pasien_11":"1","verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":"1","verifikasi_pasien_15":"1","verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":"1","verifikasi_pasien_23":"1","verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":"1","verifikasi_pasien_27":"1","verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":"1","verifikasi_pasien_31":"1","verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":null,"verifikasi_pasien_35":null,"verifikasi_pasien_36":"thorax, cranium"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":"1","persiapan_fisik_pasien_3":"1","persiapan_fisik_pasien_4":"puasa jam 02.00","persiapan_fisik_pasien_5":"1","persiapan_fisik_pasien_6":"1","persiapan_fisik_pasien_7":"1","persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":"1","persiapan_fisik_pasien_10":null,"persiapan_fisik_pasien_11":null,"persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":"1","persiapan_fisik_pasien_22":"1","persiapan_fisik_pasien_23":"1","persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":"1","persiapan_fisik_pasien_30":"1","persiapan_fisik_pasien_31":"1","persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":null,"persiapan_fisik_pasien_39":null,"persiapan_fisik_pasien_40":null,"persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":"1","persiapan_fisik_pasien_44":"1","persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = NULL, "jam_pfp" = NULL, "perawat_penerima_ot_ppo" = '633', "jam_ppo" = '11:30', "site_marketing" = '{"site_marketing":"1"}', "perawat_ot_po" = '633', "jam_tanggal_po" = '2025-04-16 11:30', "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":"1","asuhan_keperawatan_ak_2":"1","asuhan_keperawatan_ak_3":"1","asuhan_keperawatan_ak_4":null,"asuhan_keperawatan_ak_5":"1","asuhan_keperawatan_ak_6":"1","asuhan_keperawatan_ak_7":"1","asuhan_keperawatan_ak_8":"1","asuhan_keperawatan_ak_9":"1","asuhan_keperawatan_ak_10":"1","asuhan_keperawatan_ak_11":"1","asuhan_keperawatan_ak_12":"1","asuhan_keperawatan_ak_13":"1","asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":"1","asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":null,"asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":null,"asuhan_keperawatan_ak_33":null,"asuhan_keperawatan_ak_58":"1","asuhan_keperawatan_ak_34":"1","asuhan_keperawatan_ak_35":"1","asuhan_keperawatan_ak_36":"1","asuhan_keperawatan_ak_37":"1","asuhan_keperawatan_ak_38":"1","asuhan_keperawatan_ak_39":"1","asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":"1","asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":"1","asuhan_keperawatan_ak_45":"1","asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":"1","asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":"1","asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":"1","asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = '477', "perawwat_anastesi_pa" = '487', "perawwat_kamar_bedah" = '633', "time_out_ckio" = '{"time_out_ckio_1":"1","time_out_ckio_2":"11:50","time_out_ckio_4":"1","time_out_ckio_5":"11:45","time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":"12:00","time_out_ckio_11":"12:45"}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":"Eksisi ","catatan_keperawatan_intra_operasi_2":"1","catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":"1","catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":"1","catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":"1","catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":null,"catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":"1","catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":"1","catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":"1","catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":"1","catatan_keperawatan_intra_operasi_55":"1","catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":"1","catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":"1","catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":"1","catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":"1","catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":"0","catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":"1","catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":"1","catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-04-16 12.00', "perawat_instrument_1" = '539', "perawat_instrument_2" = '477', "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":"1","asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":"1","asuhan_keperawatannnnn_ak_72":"1","asuhan_keperawatannnnn_ak_73":"1","asuhan_keperawatannnnn_ak_74":"1","asuhan_keperawatannnnn_ak_75":"1","asuhan_keperawatannnnn_ak_76":"1","asuhan_keperawatannnnn_ak_77":"1","asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":"1","asuhan_keperawatannnnn_ak_80":"1","asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":"1","asuhan_keperawatannnnn_ak_84":"1","asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = '477', "perawwat_anastesi_paa" = '487', "perawwat_kamar_bedahh" = '633', "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":null,"catatan_keperawatan_sesudah_operasi_2":null,"catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":null}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":null,"catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":null,"catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":null,"catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":null,"catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":null,"catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":null,"catatan_keperawatan_sesudah_op_21":null,"catatan_keperawatan_sesudah_op_22":null,"catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":null,"catatan_keperawatan_sesudah_op_25":null,"catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":null,"catatan_keperawatan_sesudah_op_30":null,"catatan_keperawatan_sesudah_op_31":null,"catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":null,"catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":null,"catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":null,"catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":null,"ceklis_persiapan_operasi_2":null,"ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":null,"ceklis_persiapan_operasi_10":null,"ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":null,"ceklis_persiapan_operasii_2":null,"ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":null,"ceklis_persiapan_operasii_10":null,"ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":null,"ceklis_persiapan_operasiii_2":null,"ceklis_persiapan_operasiii_3":null,"ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":null,"jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = NULL, "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":"1","asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":"1","asssuhan_keperawatannnnn_ak_49":"1","asssuhan_keperawatannnnn_ak_50":"1","asssuhan_keperawatannnnn_ak_51":"1","asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":"1","asssuhan_keperawatannnnn_ak_55":"1","asssuhan_keperawatannnnn_ak_56":null,"asssuhan_keperawatannnnn_ak_57":"1","asssuhan_keperawatannnnn_ak_58":"1","asssuhan_keperawatannnnn_ak_59":null,"asssuhan_keperawatannnnn_ak_60":"1","asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":null,"asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":null,"asssuhan_keperawatannnnn_ak_70":null,"asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":null,"asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = '539', "perawwat_ruangan_prrr" = '477', "perawwat_anastesi_paaa" = '487', "perawwat_kamar_bedahhh" = '633', "updated_at" = '2025-04-16 11:58:58'
WHERE "id_data_catatan_perioperatift" = '3475'
ERROR - 2025-04-16 11:59:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-16 12.00&quot;
LINE 1: ...rawatan_intra_op_50&quot;:null}', &quot;tanggal_jam_ckio&quot; = '2025-04-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:02 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-16 12.00"
LINE 1: ...rawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-04-1...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '728074', "id_pendaftaran" = '671708', "id_users" = '2068', "id_data_catatan_perioperatift" = '3475', "suhu_ckp" = '{"suhu_ckp_1":null,"suhu_ckp_2":null,"suhu_ckp_3":null,"suhu_ckp_4":null,"suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":"-"}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"precaution standart","standar_kewaspadaan_ckp_2":"stt frontali sinistra"}', "rencana_tindakan_operasi_ckp" = 'eksisi', "dokter_operator_ckp" = '582', "rencana_perawatan_pasca_operasi_ckp" = 'ranap jati', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":"1","verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":"1","verifikasi_pasien_7":"1","verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":"1","verifikasi_pasien_11":"1","verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":"1","verifikasi_pasien_15":"1","verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":"1","verifikasi_pasien_23":"1","verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":"1","verifikasi_pasien_27":"1","verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":"1","verifikasi_pasien_31":"1","verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":null,"verifikasi_pasien_35":null,"verifikasi_pasien_36":"thorax, cranium"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":"1","persiapan_fisik_pasien_3":"1","persiapan_fisik_pasien_4":"puasa jam 02.00","persiapan_fisik_pasien_5":"1","persiapan_fisik_pasien_6":"1","persiapan_fisik_pasien_7":"1","persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":"1","persiapan_fisik_pasien_10":null,"persiapan_fisik_pasien_11":null,"persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":"1","persiapan_fisik_pasien_22":"1","persiapan_fisik_pasien_23":"1","persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":"1","persiapan_fisik_pasien_30":"1","persiapan_fisik_pasien_31":"1","persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":null,"persiapan_fisik_pasien_39":null,"persiapan_fisik_pasien_40":null,"persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":"1","persiapan_fisik_pasien_44":"1","persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = NULL, "jam_pfp" = NULL, "perawat_penerima_ot_ppo" = '633', "jam_ppo" = '11:30', "site_marketing" = '{"site_marketing":"1"}', "perawat_ot_po" = '633', "jam_tanggal_po" = '2025-04-16 11:30', "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":"1","asuhan_keperawatan_ak_2":"1","asuhan_keperawatan_ak_3":"1","asuhan_keperawatan_ak_4":null,"asuhan_keperawatan_ak_5":"1","asuhan_keperawatan_ak_6":"1","asuhan_keperawatan_ak_7":"1","asuhan_keperawatan_ak_8":"1","asuhan_keperawatan_ak_9":"1","asuhan_keperawatan_ak_10":"1","asuhan_keperawatan_ak_11":"1","asuhan_keperawatan_ak_12":"1","asuhan_keperawatan_ak_13":"1","asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":"1","asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":null,"asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":null,"asuhan_keperawatan_ak_33":null,"asuhan_keperawatan_ak_58":"1","asuhan_keperawatan_ak_34":"1","asuhan_keperawatan_ak_35":"1","asuhan_keperawatan_ak_36":"1","asuhan_keperawatan_ak_37":"1","asuhan_keperawatan_ak_38":"1","asuhan_keperawatan_ak_39":"1","asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":"1","asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":"1","asuhan_keperawatan_ak_45":"1","asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":"1","asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":"1","asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":"1","asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = '477', "perawwat_anastesi_pa" = '487', "perawwat_kamar_bedah" = '633', "time_out_ckio" = '{"time_out_ckio_1":"1","time_out_ckio_2":"11:50","time_out_ckio_4":"1","time_out_ckio_5":"11:45","time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":"12:00","time_out_ckio_11":"12:45"}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":"Eksisi ","catatan_keperawatan_intra_operasi_2":"1","catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":"1","catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":"1","catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":"1","catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":null,"catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":"1","catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":"1","catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":"1","catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":"1","catatan_keperawatan_intra_operasi_55":"1","catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":"1","catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":"1","catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":"1","catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":"1","catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":"0","catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":"1","catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":"1","catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-04-16 12.00', "perawat_instrument_1" = '539', "perawat_instrument_2" = '477', "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":"1","asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":"1","asuhan_keperawatannnnn_ak_72":"1","asuhan_keperawatannnnn_ak_73":"1","asuhan_keperawatannnnn_ak_74":"1","asuhan_keperawatannnnn_ak_75":"1","asuhan_keperawatannnnn_ak_76":"1","asuhan_keperawatannnnn_ak_77":"1","asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":"1","asuhan_keperawatannnnn_ak_80":"1","asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":"1","asuhan_keperawatannnnn_ak_84":"1","asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = '477', "perawwat_anastesi_paa" = '487', "perawwat_kamar_bedahh" = '633', "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":null,"catatan_keperawatan_sesudah_operasi_2":null,"catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":null}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":null,"catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":null,"catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":null,"catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":null,"catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":null,"catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":null,"catatan_keperawatan_sesudah_op_21":null,"catatan_keperawatan_sesudah_op_22":null,"catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":null,"catatan_keperawatan_sesudah_op_25":null,"catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":null,"catatan_keperawatan_sesudah_op_30":null,"catatan_keperawatan_sesudah_op_31":null,"catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":null,"catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":null,"catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":null,"catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":null,"ceklis_persiapan_operasi_2":null,"ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":null,"ceklis_persiapan_operasi_10":null,"ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":null,"ceklis_persiapan_operasii_2":null,"ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":null,"ceklis_persiapan_operasii_10":null,"ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":null,"ceklis_persiapan_operasiii_2":null,"ceklis_persiapan_operasiii_3":null,"ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":null,"jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = NULL, "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":"1","asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":"1","asssuhan_keperawatannnnn_ak_49":"1","asssuhan_keperawatannnnn_ak_50":"1","asssuhan_keperawatannnnn_ak_51":"1","asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":"1","asssuhan_keperawatannnnn_ak_55":"1","asssuhan_keperawatannnnn_ak_56":null,"asssuhan_keperawatannnnn_ak_57":"1","asssuhan_keperawatannnnn_ak_58":"1","asssuhan_keperawatannnnn_ak_59":null,"asssuhan_keperawatannnnn_ak_60":"1","asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":null,"asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":null,"asssuhan_keperawatannnnn_ak_70":null,"asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":null,"asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = '539', "perawwat_ruangan_prrr" = '477', "perawwat_anastesi_paaa" = '487', "perawwat_kamar_bedahhh" = '633', "updated_at" = '2025-04-16 11:59:02'
WHERE "id_data_catatan_perioperatift" = '3475'
ERROR - 2025-04-16 11:59:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 11:59:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 11:59:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-16 12.00&quot;
LINE 1: ...rawatan_intra_op_50&quot;:null}', &quot;tanggal_jam_ckio&quot; = '2025-04-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:14 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-16 12.00"
LINE 1: ...rawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-04-1...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '728074', "id_pendaftaran" = '671708', "id_users" = '2068', "id_data_catatan_perioperatift" = '3475', "suhu_ckp" = '{"suhu_ckp_1":null,"suhu_ckp_2":null,"suhu_ckp_3":null,"suhu_ckp_4":null,"suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":"-"}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"precaution standart","standar_kewaspadaan_ckp_2":"stt frontali sinistra"}', "rencana_tindakan_operasi_ckp" = 'eksisi', "dokter_operator_ckp" = '582', "rencana_perawatan_pasca_operasi_ckp" = 'ranap jati', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":"1","verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":"1","verifikasi_pasien_7":"1","verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":"1","verifikasi_pasien_11":"1","verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":"1","verifikasi_pasien_15":"1","verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":"1","verifikasi_pasien_23":"1","verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":"1","verifikasi_pasien_27":"1","verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":"1","verifikasi_pasien_31":"1","verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":null,"verifikasi_pasien_35":null,"verifikasi_pasien_36":"thorax, cranium"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":"1","persiapan_fisik_pasien_3":"1","persiapan_fisik_pasien_4":"puasa jam 02.00","persiapan_fisik_pasien_5":"1","persiapan_fisik_pasien_6":"1","persiapan_fisik_pasien_7":"1","persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":"1","persiapan_fisik_pasien_10":null,"persiapan_fisik_pasien_11":null,"persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":"1","persiapan_fisik_pasien_22":"1","persiapan_fisik_pasien_23":"1","persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":"1","persiapan_fisik_pasien_30":"1","persiapan_fisik_pasien_31":"1","persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":null,"persiapan_fisik_pasien_39":null,"persiapan_fisik_pasien_40":null,"persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":"1","persiapan_fisik_pasien_44":"1","persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = NULL, "jam_pfp" = NULL, "perawat_penerima_ot_ppo" = '633', "jam_ppo" = '11:30', "site_marketing" = '{"site_marketing":"1"}', "perawat_ot_po" = '633', "jam_tanggal_po" = '2025-04-16 11:30', "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":"1","asuhan_keperawatan_ak_2":"1","asuhan_keperawatan_ak_3":"1","asuhan_keperawatan_ak_4":null,"asuhan_keperawatan_ak_5":"1","asuhan_keperawatan_ak_6":"1","asuhan_keperawatan_ak_7":"1","asuhan_keperawatan_ak_8":"1","asuhan_keperawatan_ak_9":"1","asuhan_keperawatan_ak_10":"1","asuhan_keperawatan_ak_11":"1","asuhan_keperawatan_ak_12":"1","asuhan_keperawatan_ak_13":"1","asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":"1","asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":null,"asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":null,"asuhan_keperawatan_ak_33":null,"asuhan_keperawatan_ak_58":"1","asuhan_keperawatan_ak_34":"1","asuhan_keperawatan_ak_35":"1","asuhan_keperawatan_ak_36":"1","asuhan_keperawatan_ak_37":"1","asuhan_keperawatan_ak_38":"1","asuhan_keperawatan_ak_39":"1","asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":"1","asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":"1","asuhan_keperawatan_ak_45":"1","asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":"1","asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":"1","asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":"1","asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = '477', "perawwat_anastesi_pa" = '487', "perawwat_kamar_bedah" = '633', "time_out_ckio" = '{"time_out_ckio_1":"1","time_out_ckio_2":"11:50","time_out_ckio_4":"1","time_out_ckio_5":"11:45","time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":"12:00","time_out_ckio_11":"12:45"}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":"Eksisi ","catatan_keperawatan_intra_operasi_2":"1","catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":"1","catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":"1","catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":"1","catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":null,"catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":"1","catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":"1","catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":"1","catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":"1","catatan_keperawatan_intra_operasi_55":"1","catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":"1","catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":"1","catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":"1","catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":"1","catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":"0","catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":"1","catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":"1","catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-04-16 12.00', "perawat_instrument_1" = '539', "perawat_instrument_2" = '477', "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":"1","asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":"1","asuhan_keperawatannnnn_ak_72":"1","asuhan_keperawatannnnn_ak_73":"1","asuhan_keperawatannnnn_ak_74":"1","asuhan_keperawatannnnn_ak_75":"1","asuhan_keperawatannnnn_ak_76":"1","asuhan_keperawatannnnn_ak_77":"1","asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":"1","asuhan_keperawatannnnn_ak_80":"1","asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":"1","asuhan_keperawatannnnn_ak_84":"1","asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = '477', "perawwat_anastesi_paa" = '487', "perawwat_kamar_bedahh" = '633', "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":null,"catatan_keperawatan_sesudah_operasi_2":null,"catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":null}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":null,"catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":null,"catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":null,"catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":null,"catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":null,"catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":null,"catatan_keperawatan_sesudah_op_21":null,"catatan_keperawatan_sesudah_op_22":null,"catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":null,"catatan_keperawatan_sesudah_op_25":null,"catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":null,"catatan_keperawatan_sesudah_op_30":null,"catatan_keperawatan_sesudah_op_31":null,"catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":null,"catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":null,"catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":null,"catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":null,"ceklis_persiapan_operasi_2":null,"ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":null,"ceklis_persiapan_operasi_10":null,"ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":null,"ceklis_persiapan_operasiii_2":null,"ceklis_persiapan_operasiii_3":null,"ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":null,"jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = NULL, "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":"1","asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":"1","asssuhan_keperawatannnnn_ak_49":"1","asssuhan_keperawatannnnn_ak_50":"1","asssuhan_keperawatannnnn_ak_51":"1","asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":"1","asssuhan_keperawatannnnn_ak_55":"1","asssuhan_keperawatannnnn_ak_56":null,"asssuhan_keperawatannnnn_ak_57":"1","asssuhan_keperawatannnnn_ak_58":"1","asssuhan_keperawatannnnn_ak_59":null,"asssuhan_keperawatannnnn_ak_60":"1","asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":null,"asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":null,"asssuhan_keperawatannnnn_ak_70":null,"asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":null,"asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = '539', "perawwat_ruangan_prrr" = '477', "perawwat_anastesi_paaa" = '487', "perawwat_kamar_bedahhh" = '633', "updated_at" = '2025-04-16 11:59:14'
WHERE "id_data_catatan_perioperatift" = '3475'
ERROR - 2025-04-16 11:59:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:59:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:59:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:59:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:59:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:59:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 11:59:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-04-16 12.00&quot;
LINE 1: ...rawatan_intra_op_50&quot;:null}', &quot;tanggal_jam_ckio&quot; = '2025-04-1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 11:59:42 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-04-16 12.00"
LINE 1: ...rawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-04-1...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '728074', "id_pendaftaran" = '671708', "id_users" = '2068', "id_data_catatan_perioperatift" = '3475', "suhu_ckp" = '{"suhu_ckp_1":null,"suhu_ckp_2":null,"suhu_ckp_3":null,"suhu_ckp_4":null,"suhu_ckp_5":null,"suhu_ckp_6":null,"suhu_ckp_7":null}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":"-","alergi_ckp_4":"-"}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"-","gol_darah_ckp_2":"-"}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"precaution standart","standar_kewaspadaan_ckp_2":"stt frontali sinistra"}', "rencana_tindakan_operasi_ckp" = 'eksisi', "dokter_operator_ckp" = '582', "rencana_perawatan_pasca_operasi_ckp" = 'ranap jati', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":"1","verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":"1","verifikasi_pasien_7":"1","verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":"1","verifikasi_pasien_11":"1","verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":"1","verifikasi_pasien_15":"1","verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":"1","verifikasi_pasien_23":"1","verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":"1","verifikasi_pasien_27":"1","verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":"1","verifikasi_pasien_31":"1","verifikasi_pasien_32":null,"verifikasi_pasien_33":"1","verifikasi_pasien_34":null,"verifikasi_pasien_35":null,"verifikasi_pasien_36":"thorax, cranium"}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":"1","persiapan_fisik_pasien_3":"1","persiapan_fisik_pasien_4":"puasa jam 02.00","persiapan_fisik_pasien_5":"1","persiapan_fisik_pasien_6":"1","persiapan_fisik_pasien_7":"1","persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":"1","persiapan_fisik_pasien_10":null,"persiapan_fisik_pasien_11":null,"persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":null,"persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":null,"persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":"1","persiapan_fisik_pasien_22":"1","persiapan_fisik_pasien_23":"1","persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":null,"persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":"1","persiapan_fisik_pasien_30":"1","persiapan_fisik_pasien_31":"1","persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":null,"persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":null,"persiapan_fisik_pasien_39":null,"persiapan_fisik_pasien_40":null,"persiapan_fisik_pasien_41":"20","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":"1","persiapan_fisik_pasien_44":"1","persiapan_fisik_pasien_45":null,"persiapan_fisik_pasien_46":null,"persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":null}', "perawat_ruangan_pfp" = NULL, "jam_pfp" = NULL, "perawat_penerima_ot_ppo" = '633', "jam_ppo" = '11:30', "site_marketing" = '{"site_marketing":"1"}', "perawat_ot_po" = '633', "jam_tanggal_po" = '2025-04-16 11:30', "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":"1","asuhan_keperawatan_ak_2":"1","asuhan_keperawatan_ak_3":"1","asuhan_keperawatan_ak_4":null,"asuhan_keperawatan_ak_5":"1","asuhan_keperawatan_ak_6":"1","asuhan_keperawatan_ak_7":"1","asuhan_keperawatan_ak_8":"1","asuhan_keperawatan_ak_9":"1","asuhan_keperawatan_ak_10":"1","asuhan_keperawatan_ak_11":"1","asuhan_keperawatan_ak_12":"1","asuhan_keperawatan_ak_13":"1","asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":"1","asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":null,"asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":null,"asuhan_keperawatan_ak_33":null,"asuhan_keperawatan_ak_58":"1","asuhan_keperawatan_ak_34":"1","asuhan_keperawatan_ak_35":"1","asuhan_keperawatan_ak_36":"1","asuhan_keperawatan_ak_37":"1","asuhan_keperawatan_ak_38":"1","asuhan_keperawatan_ak_39":"1","asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":"1","asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":"1","asuhan_keperawatan_ak_45":"1","asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":"1","asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":"1","asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":"1","asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = '477', "perawwat_anastesi_pa" = '487', "perawwat_kamar_bedah" = '633', "time_out_ckio" = '{"time_out_ckio_1":"1","time_out_ckio_2":"11:50","time_out_ckio_4":"1","time_out_ckio_5":"11:45","time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":"12:00","time_out_ckio_11":"12:45"}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":"Eksisi ","catatan_keperawatan_intra_operasi_2":"1","catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":"1","catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":"1","catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":"1","catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":null,"catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":"1","catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":"1","catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":"1","catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":"1","catatan_keperawatan_intra_operasi_55":"1","catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":"1","catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":"1","catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":"1","catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":"1","catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":"0","catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":"1","catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":"1","catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = '2025-04-16 12.00', "perawat_instrument_1" = '539', "perawat_instrument_2" = '477', "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":"1","asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":"1","asuhan_keperawatannnnn_ak_72":"1","asuhan_keperawatannnnn_ak_73":"1","asuhan_keperawatannnnn_ak_74":"1","asuhan_keperawatannnnn_ak_75":"1","asuhan_keperawatannnnn_ak_76":"1","asuhan_keperawatannnnn_ak_77":"1","asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":"1","asuhan_keperawatannnnn_ak_80":"1","asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":"1","asuhan_keperawatannnnn_ak_84":"1","asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = '477', "perawwat_anastesi_paa" = '487', "perawwat_kamar_bedahh" = '633', "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":null,"catatan_keperawatan_sesudah_operasi_2":null,"catatan_keperawatan_sesudah_operasi_3":null,"catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":null}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":null,"catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":null,"catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":null,"catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":null,"catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":null,"catatan_keperawatan_sesudah_op_14":null,"catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":null,"catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":null,"catatan_keperawatan_sesudah_op_21":null,"catatan_keperawatan_sesudah_op_22":null,"catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":null,"catatan_keperawatan_sesudah_op_25":null,"catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":null,"catatan_keperawatan_sesudah_op_30":null,"catatan_keperawatan_sesudah_op_31":null,"catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":null,"catatan_keperawatan_sesudah_op_34":null,"catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":null,"catatan_keperawatan_sesudah_op_38":null,"catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":null,"catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":null,"ceklis_persiapan_operasi_2":null,"ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":null,"ceklis_persiapan_operasi_10":null,"ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":null,"ceklis_persiapan_operasiii_2":null,"ceklis_persiapan_operasiii_3":null,"ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":null,"jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = NULL, "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":"1","asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":"1","asssuhan_keperawatannnnn_ak_49":"1","asssuhan_keperawatannnnn_ak_50":"1","asssuhan_keperawatannnnn_ak_51":"1","asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":"1","asssuhan_keperawatannnnn_ak_55":"1","asssuhan_keperawatannnnn_ak_56":null,"asssuhan_keperawatannnnn_ak_57":"1","asssuhan_keperawatannnnn_ak_58":"1","asssuhan_keperawatannnnn_ak_59":null,"asssuhan_keperawatannnnn_ak_60":"1","asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":null,"asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":null,"asssuhan_keperawatannnnn_ak_70":null,"asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":null,"asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = '539', "perawwat_ruangan_prrr" = '477', "perawwat_anastesi_paaa" = '487', "perawwat_kamar_bedahhh" = '633', "updated_at" = '2025-04-16 11:59:42'
WHERE "id_data_catatan_perioperatift" = '3475'
ERROR - 2025-04-16 11:59:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 11:59:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:00:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:00:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:00:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:00:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5983458, '373', 7440.552, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:00:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5983458, '373', 7440.552, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5983458, '373', 7440.552, '1', '1.00', NULL, 'null')
ERROR - 2025-04-16 12:00:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:00:34 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:00:34 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:00:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:00:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:00:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:00:37 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:00:37 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:00:40 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:00:40 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:00:41 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:00:41 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:00:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:00:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:00:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:00:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:01:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:01:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:01:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:01:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:01:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:01:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:01:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:01:28 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:01:28 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:01:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:01:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:01:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:01:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:01:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:01:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:01:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:01:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:01:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:02:02 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:02:02 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:02:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:02:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:02:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6291791) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:02:16 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6291791) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '826875'
ERROR - 2025-04-16 12:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:02:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:02:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:02:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:02:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:02:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6291791) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:02:38 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6291791) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '826875'
ERROR - 2025-04-16 12:02:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:02:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:02:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:03:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:03:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:03:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6291791) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:03:11 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6291791) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '826875'
ERROR - 2025-04-16 12:03:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:03:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:04:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:04:25 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:04:25 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:06:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:07:02 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:07:02 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:07:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:07:12 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:07:12 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:07:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:07:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:09:12 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:09:12 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 05:09:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-16 05:09:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-16 12:09:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:09:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:10:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:10:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:11:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:11:23 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT "kode_bpjs"
FROM "sm_tenaga_medis"
WHERE "id" = ''
ERROR - 2025-04-16 12:11:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:11:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:11:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:11:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:11:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:11:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:12:23 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:12:23 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:12:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:13:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:14:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:14:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:14:31 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:14:31 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:14:31 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-04-16 12:17:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:18:39 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 242
ERROR - 2025-04-16 12:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:18:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 12:18:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:18:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 12:19:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5983801, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:19:39 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5983801, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5983801, '237', 9457.2, '1', '1.00', NULL, 'null')
ERROR - 2025-04-16 12:19:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:20:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:20:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:20:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 12:20:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:20:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 12:20:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:21:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:21:46 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:21:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:21:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:22:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:22:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:22:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:22:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:22:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:22:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:22:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:23:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827396, '4', '', '14', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:23:47 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (827396, '4', '', '14', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827396, '4', '', '14', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 12:23:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:24:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:24:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:24:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:24:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:24:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:24:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:24:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:25:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:25:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:25:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:25:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:25:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:25:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:25:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:25:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:25:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:25:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:25:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('827351', '6', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:25:45 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('827351', '6', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('827351', '6', '', '1', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 12:26:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:26:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:26:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:26:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:26:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:26:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:27:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:27:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:27:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5983885, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:27:22 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5983885, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5983885, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-04-16 12:27:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:27:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:28:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:28:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:28:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5983905, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:28:23 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5983905, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5983905, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-16 12:28:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:28:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:28:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:29:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:29:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:29:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:29:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:29:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:30:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 12:30:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:30:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:30:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:31:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:31:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:31:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:31:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:31:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:31:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:31:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rb&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:31:48 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 11: WHERE "rb"."id" = 'undefined'
                           ^ - Invalid query: SELECT "rr"."id", "rr"."r_no", "rr"."ket_aturan_pakai", "rr"."aturan_pakai", "rb"."waktu", "lp"."id_penjamin", "pjm"."nama" as "penjamin", "lp"."cara_bayar", date(r.waktu) as tanggal, "pj"."id" as "id_jual_resep", "pg"."nama" as "dokter", "p"."tanggal_lahir", "p"."nama" as "pasien", "lp"."jenis_layanan", "p"."alamat" as "alamat_pasien", "p"."id" as "no_rm", "rb"."id_resep", "rr"."keterangan_resep", case when rr.aturan_pakai_manual = '0' then rr.aturan_pakai else rr.ket_aturan_pakai_manual end as aturan_pakai
FROM "sm_resep_tebus_r" as "rr"
JOIN "sm_resep_tebus" as "rb" ON "rb"."id" = "rr"."id_resep_tebus"
JOIN "sm_resep" as "r" ON "r"."id" = "rb"."id_resep"
JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "r"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjamin" as "pjm" ON "pjm"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id"
WHERE "rb"."id" = 'undefined'
ERROR - 2025-04-16 12:32:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:32:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:32:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:32:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:32:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:32:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:32:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:33:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:33:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 12:33:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:33:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:34:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:34:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:36:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:37:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:38:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:38:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:38:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 12:38:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:38:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:38:24 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:38:24 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:38:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:38:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:38:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 12:38:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 12:38:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 12:38:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 12:38:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:38:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:39:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:39:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:40:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:40:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:40:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:40:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:40:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:40:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:40:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:40:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-16 12:40:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:40:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-16 12:40:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:40:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-16 12:40:53 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:40:53 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:41:05 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:41:05 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:41:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:41:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:43:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:43:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:44:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:44:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:45:03 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:45:03 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:45:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:45:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:45:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:45:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-16 12:45:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:45:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:46:01 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8390
ERROR - 2025-04-16 12:46:29 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:46:29 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:46:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:47:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:47:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:47:24 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-16 12:47:38 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-04-16 12:47:38 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-04-16 12:47:38 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-04-16 12:47:38 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-04-16 12:47:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:47:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:47:52 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:47:52 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:48:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:48:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:48:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:48:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:48:34 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:48:34 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:48:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:48:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:48:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:48:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:49:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:49:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:49:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:49:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827424, '5', '', '21', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:49:25 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (827424, '5', '', '21', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827424, '5', '', '21', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 12:49:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:50:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:50:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:50:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:50:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:51:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:51:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:51:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:51:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:51:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:51:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:51:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:51:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:51:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:51:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:51:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:51:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:52:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:52:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:52:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:52:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:52:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:52:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:52:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:52:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:53:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:53:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:53:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:53:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:54:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:54:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:54:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:55:09 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:55:09 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:55:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:55:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:56:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:56:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:56:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:56:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:57:17 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 12:57:17 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 12:58:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 12:59:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:59:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 12:59:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...S (5984316, '1256', 129227.976, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:59:34 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...S (5984316, '1256', 129227.976, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5984316, '1256', 129227.976, '500', '1.00', 'Ya', 'null')
ERROR - 2025-04-16 12:59:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 12:59:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:00:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:00:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:00:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:00:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:00:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:01:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:01:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:02:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:02:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:03:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:03:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:04:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:04:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:04:34 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:04:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:05:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:05:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:06:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:09:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:09:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:11:45 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:12:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:15:00 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-04-16 13:15:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:15:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:15:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:16:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:16:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:16:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:16:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:16:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:16:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:16:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:16:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:18:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:18:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:18:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:18:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:18:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:18:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:19:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:20:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:20:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:20:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:20:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:20:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:20:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:20:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:20:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:21:19 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 13:21:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 13:21:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 13:21:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 13:21:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 13:21:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 13:22:04 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 13:22:04 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 13:22:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:22:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:22:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:22:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:23:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:23:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:23:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:23:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:25:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:25:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:25:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:25:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:25:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:25:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:25:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:26:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:26:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:26:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:26:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:26:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:26:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:27:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:27:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:27:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:27:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:28:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:28:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:28:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:28:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:29:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:29:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:29:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:29:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:29:35 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-04-16 13:30:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:30:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:30:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:30:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:30:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:30:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:30:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:30:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:31:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:31:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:31:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:31:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:31:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:31:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:31:41 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 13:31:41 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 13:32:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:32:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:32:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:32:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:32:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:32:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:32:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:32:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:33:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:33:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:33:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:33:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:33:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:33:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:33:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:34:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:34:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:34:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:34:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:35:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:35:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:35:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:35:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:35:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:35:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:35:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:35:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:35:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:35:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:36:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:36:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:36:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:36:47 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:36:52 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:37:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:37:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:37:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:37:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:37:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:37:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:37:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:37:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:38:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:38:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:38:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:38:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:38:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:38:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:38:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:38:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:38:54 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:39:26 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:39:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:39:46 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4430623'
ERROR - 2025-04-16 13:40:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:40:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:40:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:40:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:40:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:40:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:40:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:40:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:41:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  deadlock detected
DETAIL:  Process 35632 waits for ShareLock on transaction 35307014; blocked by process 37850.
Process 37850 waits for ShareLock on transaction 35307025; blocked by process 35632.
HINT:  See server log for query details.
CONTEXT:  while rechecking updated tuple (734,21) in relation &quot;sm_akses_satu_sehat&quot; /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:41:13 --> Query error: ERROR:  deadlock detected
DETAIL:  Process 35632 waits for ShareLock on transaction 35307014; blocked by process 37850.
Process 37850 waits for ShareLock on transaction 35307025; blocked by process 35632.
HINT:  See server log for query details.
CONTEXT:  while rechecking updated tuple (734,21) in relation "sm_akses_satu_sehat" - Invalid query: UPDATE "sm_akses_satu_sehat" SET "token" = '9m5fCYbACubX3DOolNMpTOKPv9df', "timeissued" = '1744785559890', "app_name" = '891dab0d-d89e-402d-9c12-67493227a651', "tanggal" = '2025-04-16 13:41:10'
WHERE "userakses" = 1334
ERROR - 2025-04-16 13:41:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:41:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:41:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:41:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:41:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:41:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:41:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:41:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:42:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:42:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:42:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:43:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:43:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:43:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:43:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:44:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:44:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:44:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:44:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:44:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:44:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:44:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:44:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:44:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:44:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:45:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:45:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:45:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:45:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:45:24 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:45:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:45:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:45:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:45:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:46:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:46:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:46:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:46:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:46:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:46:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:46:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:46:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:46:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:46:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:46:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:46:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:46:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:46:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:46:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:47:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:47:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:47:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:47:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:47:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:47:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:48:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:48:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:48:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:48:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:48:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:48:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:48:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:48:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:48:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:48:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:48:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:48:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:48:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:49:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:49:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:49:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:49:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:49:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:49:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:49:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:50:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:50:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:51:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:51:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:51:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:51:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:51:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:51:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:51:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:51:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:52:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:52:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:52:21 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-16 13:52:21 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-16 13:52:21 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-16 13:52:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:52:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:52:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('827376', '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:52:36 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('827376', '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('827376', '1', '', '1', 'Injeksi', '', 'null', '0', '', '0', 'MORN', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 13:52:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:52:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:52:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:53:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:53:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:53:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:53:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:54:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:54:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:54:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:54:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:54:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:54:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:54:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:54:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5985215, '78', 13200, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:54:26 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5985215, '78', 13200, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5985215, '78', 13200, '1', '1.00', NULL, 'null')
ERROR - 2025-04-16 13:54:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:54:42 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-04-16 13:54:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:55:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:55:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:55:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:55:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:55:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 13:55:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 13:55:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 13:55:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 13:55:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:55:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:56:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:56:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:56:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:56:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:56:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:56:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:56:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:56:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:56:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:56:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:56:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:56:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:56:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:56:39 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-04-16 13:56:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:56:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:56:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:57:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:57:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:57:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:57:06 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-04-16 13:57:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:57:09 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-04-16 13:57:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:57:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:57:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:57:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:58:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:58:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:58:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:58:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:58:11 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 13:58:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:58:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 13:58:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 13:58:55 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-04-16 14:00:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:00:01 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-04-16 14:00:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:00:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:00:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:00:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:00:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:00:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:00:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:00:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:00:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:00:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:01:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:01:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:01:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:01:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:01:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:01:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:01:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:01:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:01:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:01:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:01:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:01:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:07 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-04-16 14:02:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827465, '4', '1', '', '1 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:23 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (827465, '4', '1', '', '1 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827465, '4', '1', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 14:02:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:02:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:02:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:03:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:03:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:03:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:03:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:03:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827467, '2', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:03:38 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (827467, '2', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827467, '2', '2', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 14:03:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:03:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:03:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:03:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:03:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:03:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:04:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:04:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:04:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:04:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:04:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827468, '3', '4', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:04:29 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (827468, '3', '4', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827468, '3', '4', '', '3 X SEHARI 2 TABLET', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 14:04:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:04:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:05:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:05:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:05:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:05:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:05:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:05:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:05:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:05:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:05:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827471, '2', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:05:52 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (827471, '2', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827471, '2', '2', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 14:06:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:06:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:06:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:06:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:06:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:06:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:06:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:06:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:06:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:06:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:06:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:06:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:06:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:06:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5985659, '697', 6000, '40', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:12 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5985659, '697', 6000, '40', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5985659, '697', 6000, '40', '1.00', 'Ya', 'null')
ERROR - 2025-04-16 14:07:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:07:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:07:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:08:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:08:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:08:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:08:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:08:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827476, '3', '3', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:08:15 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (827476, '3', '3', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827476, '3', '3', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 14:08:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:08:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:08:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:08:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:08:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:09:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:09:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:09:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:09:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:09:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827480, '2', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:09:18 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (827480, '2', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827480, '2', '2', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 14:09:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:09:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:09:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:09:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:09:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827481, '1', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:09:35 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (827481, '1', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827481, '1', '2', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 14:09:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:09:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:09:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:09:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:10:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:10:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:10:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:10:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:10:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('827268', '8', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:10:22 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('827268', '8', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('827268', '8', '', '1', '1 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 14:10:39 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_session9eaa2996c20f30616693b5808f676ff0bc9b9f70 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-04-16 14:10:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:10:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:10:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:10:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:11:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:11:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:11:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:11:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:11:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:11:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:11:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:11:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:11:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:11:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:11:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:11:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:11:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:12:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:12:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:12:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:12:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:12:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:12:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:12:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:12:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:12:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:12:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:12:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:12:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:12:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:12:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:13:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:13:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:13:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:13:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:13:04 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-04-16 14:13:05 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-04-16 14:13:05 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-04-16 14:13:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:13:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:13:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:13:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:13:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:13:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:13:30 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 14:13:30 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 14:13:34 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 14:13:34 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 14:13:37 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 14:13:37 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 14:13:41 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 14:13:41 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 14:14:01 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:14:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:14:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:15:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:15:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:15:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:15:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:15:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:15:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:15:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:15:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:15:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:15:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:15:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:15:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:15:33 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 14:15:33 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 14:16:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:16:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:16:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:16:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:17:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:17:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:17:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:17:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:17:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:17:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:17:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:17:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:17:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:17:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:17:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:17:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:17:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:18:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:18:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:18:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:18:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:18:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:19:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:19:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:20:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:20:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:20:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:20:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:20:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:20:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:21:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:21:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:21:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:21:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:21:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:21:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:21:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:21:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:22:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:23:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:23:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:23:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:23:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:23:41 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 14:23:41 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 14:23:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:23:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:25:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:25:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:25:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:25:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:25:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:25:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:25:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:25:44 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-16 14:25:48 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-16 14:25:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:25:54 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-16 14:26:02 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-16 14:26:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:26:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:26:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:26:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:26:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:26:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:26:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:26:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:27:32 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-04-16 14:28:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:28:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:28:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:28:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:28:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:28:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:29:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:29:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:29:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:29:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:29:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:29:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:29:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:29:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:29:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:29:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:30:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:30:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:30:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:30:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:30:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:30:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:30:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:30:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:30:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:30:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:30:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:30:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:31:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:31:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:32:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:32:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:32:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:32:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:32:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:32:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:32:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:32:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:32:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:32:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:32:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:32:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:32:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:33:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:33:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:34:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (623, 726443, 110, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 2025-04-16 14:34:15, null, 812, 670461, 2025-04-16 14:34:15, 2025-04-16 16:00:00). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:34:15 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (623, 726443, 110, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 2025-04-16 14:34:15, null, 812, 670461, 2025-04-16 14:34:15, 2025-04-16 16:00:00). - Invalid query: INSERT INTO "sm_form_pemberian_informasi" ("id_layanan_pendaftaran", "id_pendaftaran", "is_pasien", "id_dokter_pelaksana_tindakan", "tanggal_jam_pi", "pemberi_informasi", "penerima_informasi", "diagnosis_kerja", "diagnosis_kerja_check", "dasar_diagnosis", "dasar_diagnosis_check", "tindakan_kedokteran", "tindakan_kedokteran_check", "indikasi_tindakan", "indikasi_tindakan_check", "tata_cara", "tata_cara_check", "tujuan", "tujuan_check", "risiko_komplikasi", "risiko_komplikasi_check", "prognosis", "prognosis_check", "alternatif_resiko", "alternatif_resiko_check", "menyelamatkan_pasien", "menyelamatkan_pasien_check", "penggunaan_darah", "penggunaan_darah_check", "analgesia", "analgesia_check", "nama_keluarga", "id_users", "created_date", "updated_on") VALUES ('726443', '670461', NULL, '110', '2025-04-16 16:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '812', '2025-04-16 14:34:15', '2025-04-16 14:34:15')
ERROR - 2025-04-16 14:34:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:34:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:34:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:34:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:34:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:34:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:34:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:34:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:35:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:35:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:35:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:36:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:36:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:36:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:36:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:37:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:37:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:37:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:37:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 07:37:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-16 07:37:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-16 14:37:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:37:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:37:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:37:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:37:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:37:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:38:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:38:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:38:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:38:18 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11862
ERROR - 2025-04-16 14:40:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 14:40:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 14:40:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 14:40:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 14:40:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 14:40:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 14:40:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:40:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:40:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:40:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:40:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:40:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:40:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:40:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:41:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:41:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:42:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:42:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:42:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:42:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:42:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:42:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:42:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:42:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:43:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:44:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:44:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:44:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:44:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:45:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:45:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:45:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:45:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:46:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:46:44 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 14:46:49 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 14:46:56 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 14:47:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:47:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:47:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:47:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:47:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:47:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:49:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:49:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:49:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:49:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:49:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:49:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:49:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 14:49:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 14:50:58 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 14:52:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 14:55:59 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 14:56:05 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 14:57:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 14:58:13 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 15:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:09:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:10:22 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-04-16 15:13:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:13:44 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-04-16 15:15:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 15:15:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 15:15:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:15:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:15:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:15:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:16:37 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('728193', '2025-04-16 04:00', '2025-04-16 15:09', 'IGD', 'cendana 2', 'CKR, fracture os maxilla sinistra, susp closed fracture os scapula sinistra, Multiple VE', NULL, '353', NULL, NULL, 'post KLL datang dalam keadaan tidak sadarkan diri dan mengoceh tidak jelas setelah ditemukan tergeletak di trotoar dengan motornya pkl 02.30 wib. Saat datang di IGD, terdapat bengkak pada kelopak mata kiri, tampak kebiruan (+) Terdapat luka lecet di pipi kiri, Punggung tangan & kiri, lutut kiri. Semua anggota gerak masih bisa di gerakkan, namun pasien tidak bisa diajak berkomunikasi karena terus mengoceh hal yg tidak jelas', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', NULL, NULL, NULL, NULL, '130', '86', '36.6', '97', '23', '0', NULL, '1', '5', '1', 'Sedang', '1', '1', '0', NULL, '1', '2025-04-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IVFD RL 20 tpm', 'inj ketorolac 30 mg IV 
inj Rantidin 50 mg IV 
inj. citicolin 500 mg iv
inj. asam tranexamat 500 mg iv', '1', 'DR', '1', 'CT SCAN BRAIN NK TRAUMA DAN THORAX', NULL, NULL, 'Melakukan triage
Melakukan wound toliet pada leka lecet
Pasien composmentis
Urine buang 780 ml', 'Fraktur maksila sinistra , pro : rekonstruksi + open reduksi miniplate
=> hasil pemeriksaan dan kondisi pasien sudah dijelaskan oleh dr hesti, saran pro : rekonstruksi + open reduksi miniplate, tetapi keluarga menolak, surat penolakan tindakan (+)', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', 'tidak ada', 'tidak ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 15:18', NULL, '444', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 15:16:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:16:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:16:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:16:55 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('728193', '2025-04-16 04:00', '2025-04-16 15:09', 'IGD', 'cendana 2', 'CKR, fracture os maxilla sinistra, susp closed fracture os scapula sinistra, Multiple VE', NULL, '353', NULL, NULL, 'post KLL datang dalam keadaan tidak sadarkan diri dan mengoceh tidak jelas setelah ditemukan tergeletak di trotoar dengan motornya pkl 02.30 wib. Saat datang di IGD, terdapat bengkak pada kelopak mata kiri, tampak kebiruan (+) Terdapat luka lecet di pipi kiri, Punggung tangan & kiri, lutut kiri. Semua anggota gerak masih bisa di gerakkan, namun pasien tidak bisa diajak berkomunikasi karena terus mengoceh hal yg tidak jelas', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', NULL, NULL, NULL, NULL, '130', '86', '36.6', '97', '23', '0', NULL, '1', '5', '1', 'Sedang', '1', '1', '0', NULL, '1', '2025-04-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IVFD RL 20 tpm', 'inj ketorolac 30 mg IV 
inj Rantidin 50 mg IV 
inj. citicolin 500 mg iv
inj. asam tranexamat 500 mg iv', '1', 'DR', '1', 'CT SCAN BRAIN NK TRAUMA DAN THORAX', NULL, NULL, 'Melakukan triage
Melakukan wound toliet pada leka lecet
Pasien composmentis
Urine buang 780 ml', 'Fraktur maksila sinistra , pro : rekonstruksi + open reduksi miniplate
hasil pemeriksaan dan kondisi pasien sudah dijelaskan oleh dr hesti, saran pro : rekonstruksi + open reduksi miniplate, tetapi keluarga menolak, surat penolakan tindakan (+)', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', 'tidak ada', 'tidak ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 15:18', NULL, '444', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 15:17:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:17:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:17:44 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-04-16 15:17:44 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-04-16 15:18:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:18:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:18:19 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('728193', '2025-04-16 04:00', '2025-04-16 15:09', 'IGD', 'cendana 2', 'CKR, fracture os maxilla sinistra, susp closed fracture os scapula sinistra, Multiple VE', NULL, '353', NULL, NULL, 'post KLL datang dalam keadaan tidak sadarkan diri dan mengoceh tidak jelas setelah ditemukan tergeletak di trotoar dengan motornya pkl 02.30 wib. Saat datang di IGD, terdapat bengkak pada kelopak mata kiri, tampak kebiruan (+) Terdapat luka lecet di pipi kiri, Punggung tangan & kiri, lutut kiri. Semua anggota gerak masih bisa di gerakkan, namun pasien tidak bisa diajak berkomunikasi karena terus mengoceh hal yg tidak jelas', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', NULL, NULL, NULL, NULL, '130', '86', '36.6', '97', '23', '0', NULL, '1', '5', '1', 'Sedang', '1', '1', '0', NULL, '1', '2025-04-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IVFD RL 20 tpm', 'inj ketorolac 30 mg iv
inj Rantidin 50 mg iv 
inj. citicolin 500 mg iv
inj. asam tranexamat 500 mg iv', '1', 'DR', '1', 'CT SCAN BRAIN NK TRAUMA DAN THORAX', NULL, NULL, 'Melakukan triage
Melakukan wound toliet pada leka lecet
Pasien composmentis
Urine buang 780 ml', 'Fraktur maksila sinistra, pro rekonstruksi dan open reduksi miniplate
hasil pemeriksaan dan kondisi pasien sudah dijelaskan oleh dr hesti
saran pro : rekonstruksi dan open reduksi miniplate, tetapi keluarga menolak, surat penolakan tindakan terlampir', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', 'tidak ada', 'tidak ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 15:18', NULL, '444', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 15:18:31 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-04-16 15:18:32 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-04-16 15:18:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:18:47 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('728193', '2025-04-16 04:00', '2025-04-16 15:09', 'IGD', 'cendana 2', 'CKR, fracture os maxilla sinistra, susp closed fracture os scapula sinistra, Multiple VE', NULL, '353', NULL, NULL, 'post KLL datang dalam keadaan tidak sadarkan diri dan mengoceh tidak jelas setelah ditemukan tergeletak di trotoar dengan motornya pkl 02.30 wib. Saat datang di IGD, terdapat bengkak pada kelopak mata kiri, tampak kebiruan (+) Terdapat luka lecet di pipi kiri, Punggung tangan & kiri, lutut kiri. Semua anggota gerak masih bisa di gerakkan, namun pasien tidak bisa diajak berkomunikasi karena terus mengoceh hal yg tidak jelas', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', NULL, NULL, NULL, NULL, '130', '86', '36.6', '97', '23', '0', NULL, '1', '5', '1', 'Sedang', '1', '1', '0', NULL, '1', '2025-04-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IVFD RL 20 tpm', 'inj ketorolac 30 mg iv
inj Rantidin 50 mg iv 
inj. citicolin 500 mg iv
inj. asam tranexamat 500 mg iv', '1', 'DR', '1', 'CT SCAN BRAIN NK TRAUMA DAN THORAX', NULL, NULL, 'Melakukan triage
Melakukan wound toliet pada leka lecet
Pasien composmentis
Urine buang 780 ml', 'Fraktur maksila sinistra, pro rekonstruksi dan open reduksi miniplate
hasil pemeriksaan dan kondisi pasien sudah dijelaskan oleh dr hesti
saran pro : rekonstruksi dan open reduksi miniplate, tetapi keluarga menolak, surat penolakan tindakan terlampir', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', 'tidak ada', 'tidak ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 15:18', NULL, '444', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 15:18:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:18:56 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('728193', '2025-04-16 04:00', '2025-04-16 15:09', 'IGD', 'cendana 2', 'CKR, fracture os maxilla sinistra, susp closed fracture os scapula sinistra, Multiple VE', NULL, '353', NULL, NULL, 'post KLL datang dalam keadaan tidak sadarkan diri dan mengoceh tidak jelas setelah ditemukan tergeletak di trotoar dengan motornya pkl 02.30 wib. Saat datang di IGD, terdapat bengkak pada kelopak mata kiri, tampak kebiruan (+) Terdapat luka lecet di pipi kiri, Punggung tangan & kiri, lutut kiri. Semua anggota gerak masih bisa di gerakkan, namun pasien tidak bisa diajak berkomunikasi karena terus mengoceh hal yg tidak jelas', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', NULL, NULL, NULL, NULL, '130', '86', '36.6', '97', '23', '0', NULL, '1', '5', '1', 'Sedang', '1', '1', '0', NULL, '1', '2025-04-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IVFD RL 20 tpm', 'inj ketorolac 30 mg iv
inj Rantidin 50 mg iv 
inj. citicolin 500 mg iv
inj. asam tranexamat 500 mg iv', '1', 'DR', '1', 'CT SCAN BRAIN NK TRAUMA DAN THORAX', NULL, NULL, 'Melakukan triage
Melakukan wound toliet pada leka lecet
Pasien composmentis
Urine buang 780 ml', 'Fraktur maksila sinistra, pro rekonstruksi dan open reduksi miniplate
hasil pemeriksaan dan kondisi pasien sudah dijelaskan oleh dr hesti
saran pro : rekonstruksi dan open reduksi miniplate, tetapi keluarga menolak, surat penolakan tindakan terlampir', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', 'tidak ada', 'tidak ada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 15:18', NULL, '444', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 15:19:19 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_penjualan_obat/export.php 98
ERROR - 2025-04-16 15:19:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:20:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:20:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:20:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:20:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:24:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:24:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:24:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:24:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:25:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:27:48 --> Severity: Warning  --> mime_content_type(/home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/resources/pdf_mcu/esign_mcu_ket_bebas_narkoba_2501240349.pdf): failed to open stream: No such file or directory /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/controllers/api/Hasil_mcu_kirim_online.php 318
ERROR - 2025-04-16 15:28:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:29:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:30:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:30:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:30:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:31:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:32:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:33:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:33:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:33:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:34:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 15:35:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:35:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:35:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:35:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:35:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:35:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:35:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:36:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:36:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:36:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:36:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:37:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:37:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:37:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:37:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:37:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:37:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:37:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:37:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:38:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:38:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:38:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:38:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:38:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:38:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:38:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:38:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:38:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:38:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:39:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:39:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:39:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:39:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:40:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:40:18 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 15:40:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:40:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:40:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:40:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:41:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:41:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:42:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:42:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:42:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:42:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:42:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:42:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:43:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:43:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:43:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:43:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:43:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:43:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:43:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:44:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:44:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:44:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:44:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:45:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:45:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:45:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:45:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:46:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:46:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:46:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:46:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:46:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:46:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:46:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:46:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:47:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:47:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:47:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:47:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:47:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:47:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:47:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:47:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:48:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:48:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:48:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:48:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:49:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:49:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:49:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:49:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:49:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:49:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:49:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:49:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:49:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:49:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:50:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:50:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:50:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:50:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:51:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:51:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:51:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:51:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 15:51:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 15:51:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 16:01:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 16:03:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 16:05:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 16:07:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 16:07:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 16:20:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 16:21:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 16:21:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 16:23:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 16:23:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 16:25:09 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 16:27:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 16:35:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 16:35:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 17:18:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 17:18:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 17:31:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 17:45:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (827532, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 17:45:05 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (827532, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (827532, '1', '', '', '', '', 'null', '0', '', '0', '', 'racik', '1', 1, '1x1', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-16 10:47:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-16 10:47:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-04-16 17:56:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 18:08:58 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 18:12:35 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 18:12:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 18:12:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 18:14:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 18:22:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 18:35:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 18:42:20 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-04-16 18:42:20 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-04-16 18:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 18:52:15 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('728902', '2025-04-16 18:00', '18', 'Keluarga pasien mengatakan pasien tidak bisa diajak komunikasi, pasien cenderung tidur dan gelisah, aktivitas masih dibantu oleh keluarga

', 'kesadaran apatis E2M5V4 EWS K(5) akral hangat nadi teraba kuat, aktivitas di bantuk keluarga kekuatan otot pasien tampak lemah kekuatan otot ekstremitas atas 3333/5555 TD: 152/90mmhg N: 87x/mnt S: 36.1 C R: 19 x/mnt Spo2: 99Þngan nk O2 3 Lpm. Terpasang IVFD NS 20 Tpm. Terpasang NGT dan DC tgl 16/04/25. Pemreiksaan tgl 16/04/25 EKG,ct scan, Thorax Dewasa Pa/Ap diradiologi, Lab 15/4/25 Hemoglobin 15.8 Hematokrit 46 Leukosit 5.5 Trombosit 226 NAT: 142 KAL: 4.2 UR:36 CREA:1.1 Glukosa Sewaktu 124', 'PENURUNAN KAPASITAS ADAPTIF INTRAKRANIAL, GANGGUANG MOBILITAS FISIK', '', '', '', '', '', '', '', '', '', '1991', '1', 'R/ Konsul RM', NULL, '1991', 0, NULL, '2025-04-16 18:52:15')
ERROR - 2025-04-16 19:08:05 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-16 19:08:05 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-04-16 19:08:05 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-04-16 19:08:08 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 19:19:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 19:19:04 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '843513', "id_layanan_pendaftaran" = '728939', "waktu" = '2025-04-16 18:15', "id_profesi" = '18', "subject" = 'pasien mengatakan pusing dan badan terasa lemas sejak 1 bulan ini, memberat 1 minggu terakhir, bila berjalan terasa lemas, mual , muntah, kadang, nyeri perut bawah sudah lama, terutama memberat bila berjalan
', "objective" = 'Kesadaran : Compos Mentis GCS : 15. EWS : 3 Hijau Pasien tampak lemas Makan Habis 1/4 Porsi. Muntah tidak ada. TD: 111/50mmhg HR: 93kali / menit reguler RR: 20 kali/ menit T: 36,8 derajat celcius Spo2: 99Þngan 3lpm RA IVFD :B Fluid /12 jam. RPD: Hipertensi tidak rutin minum obat. lab 16/07/25 hemoglobin 3,5 hematokrit 12 leukosit 7,3 trombosit 712 ureum 30 creatinin 1.1 GDS 98
', "assessment" = 'perfusi perifer tidak efektif nausea', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2003', "ttd_nadis" = '1', "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '2003', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-16 19:19:04'
WHERE "id" = '843513'
ERROR - 2025-04-16 19:19:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 19:19:49 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '843513', "id_layanan_pendaftaran" = '728939', "waktu" = '2025-04-16 18:15', "id_profesi" = '18', "subject" = 'pasien mengatakan pusing dan badan terasa lemas sejak 1 bulan ini, memberat 1 minggu terakhir, bila berjalan terasa lemas, mual , muntah, kadang, nyeri perut bawah sudah lama, terutama memberat bila berjalan
', "objective" = 'Kesadaran : Compos Mentis GCS : 15. EWS : 3 Hijau Pasien tampak lemas Makan Habis 1/4 Porsi. Muntah tidak ada. TD: 111/50mmhg HR: 93kali / menit reguler RR: 20 kali/ menit T: 36,8 derajat celcius Spo2: 99Þngan 3lpm RA IVFD :B Fluid /12 jam. RPD: Hipertensi tidak rutin minum obat. lab 16/07/25 hemoglobin 3,5 hematokrit 12 leukosit 7,3 trombosit 712 ureum 30 creatinin 1.1 GDS 98
', "assessment" = 'perfusi perifer tidak efektif nausea', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2003', "ttd_nadis" = '1', "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '2003', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-16 19:19:49'
WHERE "id" = '843513'
ERROR - 2025-04-16 19:19:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 19:19:50 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '843513', "id_layanan_pendaftaran" = '728939', "waktu" = '2025-04-16 18:15', "id_profesi" = '18', "subject" = 'pasien mengatakan pusing dan badan terasa lemas sejak 1 bulan ini, memberat 1 minggu terakhir, bila berjalan terasa lemas, mual , muntah, kadang, nyeri perut bawah sudah lama, terutama memberat bila berjalan
', "objective" = 'Kesadaran : Compos Mentis GCS : 15. EWS : 3 Hijau Pasien tampak lemas Makan Habis 1/4 Porsi. Muntah tidak ada. TD: 111/50mmhg HR: 93kali / menit reguler RR: 20 kali/ menit T: 36,8 derajat celcius Spo2: 99Þngan 3lpm RA IVFD :B Fluid /12 jam. RPD: Hipertensi tidak rutin minum obat. lab 16/07/25 hemoglobin 3,5 hematokrit 12 leukosit 7,3 trombosit 712 ureum 30 creatinin 1.1 GDS 98
', "assessment" = 'perfusi perifer tidak efektif nausea', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2003', "ttd_nadis" = '1', "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '2003', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-16 19:19:50'
WHERE "id" = '843513'
ERROR - 2025-04-16 19:20:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 19:20:08 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '843513', "id_layanan_pendaftaran" = '728939', "waktu" = '2025-04-16 18:15', "id_profesi" = '18', "subject" = 'pasien mengatakan pusing dan badan terasa lemas sejak 1 bulan ini, memberat 1 minggu terakhir, bila berjalan terasa lemas, mual , muntah, kadang, nyeri perut bawah sudah lama, terutama memberat bila berjalan
', "objective" = 'Kesadaran : Compos Mentis GCS : 15. EWS : 3 Hijau Pasien tampak lemas Makan Habis 1/4 Porsi. Muntah tidak ada. TD: 111/50mmhg HR: 93kali / menit reguler RR: 20 kali/ menit T: 36,8 derajat celcius Spo2: 99Þngan 3lpm RA IVFD :B Fluid /12 jam. RPD: Hipertensi tidak rutin minum obat. lab 16/07/25 hemoglobin 3,5 hematokrit 12 leukosit 7,3 trombosit 712 ureum 30 creatinin 1.1 GDS 98. sedang jalan PRC bag 2
', "assessment" = 'perfusi perifer tidak efektif nausea', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2003', "ttd_nadis" = '1', "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '2003', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-16 19:20:08'
WHERE "id" = '843513'
ERROR - 2025-04-16 19:24:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 19:27:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 19:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 19:32:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 19:36:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 19:40:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 19:51:28 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 19:56:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 20:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 20:12:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 20:12:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 20:17:03 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 20:25:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 20:26:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-16 20:36:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 20:49:48 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 21:04:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:04:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:04:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:04:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:06:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:06:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:06:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:06:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:06:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:06:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:06:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:06:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:06:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:06:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:07:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:07:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:07:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:07:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:07:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:07:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:07:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:07:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:07:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:07:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:26:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 21:26:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 21:26:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 21:26:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-16 21:26:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:26:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:26:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 21:27:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:27:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:28:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:28:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:29:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:29:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:29:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:29:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:29:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:29:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:29:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:29:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:30:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 21:41:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 21:45:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:45:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:47:43 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 21:48:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:48:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:48:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:48:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-16 21:48:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:48:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-16 21:51:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 21:53:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:53:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:56:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:56:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:58:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 21:58:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 21:59:13 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 22:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 22:05:22 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-16 22:05:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-16 22:08:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:08:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:08:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:08:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:14:20 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 22:14:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 22:16:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 22:18:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:18:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:18:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:18:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:18:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:18:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:19:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:19:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:19:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:19:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:19:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:19:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:19:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:19:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:41:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 22:41:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 22:42:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 22:50:42 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 23:06:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 23:06:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 23:26:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 23:32:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 23:35:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 23:43:51 --> 404 Page Not Found --> /index
ERROR - 2025-04-16 23:48:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 23:48:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-16 23:59:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-16 23:59:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
