<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-01-28 00:16:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 00:25:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 00:31:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 00:31:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 00:31:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 00:31:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 00:32:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 00:32:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 00:32:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 00:32:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 00:33:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 00:33:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 00:35:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 01:01:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:01:17 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1881' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-01-28 01:03:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:03:08 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1881' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-01-28 01:24:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:24:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:25:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:25:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 01:35:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('776681', '14', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:35:15 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('776681', '14', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776681', '14', '', '1', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-28 01:47:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 01:47:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1881' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-01-28 01:51:54 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 01:51:54 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 01:51:54 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-01-28 02:18:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 02:18:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 02:18:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 02:18:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 02:19:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 02:19:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 02:20:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 02:20:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 02:24:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 02:24:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 02:27:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 02:27:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 02:27:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 02:27:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 02:33:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 02:33:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 02:46:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 03:20:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 03:35:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 03:38:31 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 03:56:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 03:56:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 04:13:00 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-28 04:13:01 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-28 04:42:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 04:58:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 04:58:27 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-01-28 04:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 05:09:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 05:15:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 05:15:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 05:15:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 05:15:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 05:16:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 05:16:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 05:16:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 05:16:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 05:16:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 05:16:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 05:45:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 05:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 06:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 06:08:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 06:10:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 06:17:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 06:26:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 06:27:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 06:30:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:30:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:31:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:31:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:32:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 06:39:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:39:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:39:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:39:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:40:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:40:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:40:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('776896', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:40:03 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('776896', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776896', '1', '', '', '', '', 'PC', '0', '', '0', '', '***', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-28 06:40:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:40:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:40:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:40:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:40:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:40:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:41:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:41:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:41:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:41:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:41:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:41:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:41:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:41:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:43:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:43:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:43:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:43:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:59:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:59:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 06:59:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 06:59:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 07:01:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 07:01:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 07:01:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 07:01:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 07:01:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 07:01:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 07:01:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 07:01:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 07:10:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:13:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:15:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:16:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:34:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...', '2025-01-28', '10', '1', '217', '4', '1', '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 07:34:26 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...', '2025-01-28', '10', '1', '217', '4', '1', '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('627106', '679613', '2025-01-28', '10', '1', '217', '4', '1', '1', '', '1', '2', '1', '2025-01-28 07:33:28', '971')
ERROR - 2025-01-28 07:37:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:37:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:42:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:47:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:49:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:50:56 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 07:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:52:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:54:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:58:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('776908', '4', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 07:58:39 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('776908', '4', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776908', '4', '', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'null', '0', '', '0', 'MORN, NOON, EVE', 'sebelum makan. lambung*****', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-28 07:59:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 07:59:25 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12271
ERROR - 2025-01-28 08:00:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 08:02:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 08:03:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:03:18 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1629' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-01-28 08:03:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:03:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:04:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:04:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:08:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-28 08:08:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-28 08:08:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-28 08:08:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-28 08:09:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:09:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:10:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 08:10:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 08:15:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 08:15:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:15:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:15:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:15:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-01-28 08:16:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:16:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:16:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:16:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:16:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776916, '2', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:16:14 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (776916, '2', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776916, '2', '', '', '2 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-28 08:16:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 08:19:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:19:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:19:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (5450532, '980', 447.552, '200', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:19:32 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (5450532, '980', 447.552, '200', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5450532, '980', 447.552, '200', '2.00', 'Ya', 'null')
ERROR - 2025-01-28 08:19:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:19:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:19:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:19:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:20:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:20:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:20:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:20:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:20:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:20:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:20:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 08:20:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 08:28:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 08:28:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 08:35:13 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-28 08:35:13 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-28 08:35:32 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-28 08:35:32 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-28 08:35:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 08:37:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 08:37:42 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-28 08:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 09:01:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:01:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:06:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 09:09:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 09:11:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 09:14:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 09:14:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 09:14:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 09:15:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 09:15:33 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 09:24:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776923, '8', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:24:35 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (776923, '8', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776923, '8', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-28 09:25:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:25:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:25:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:25:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:25:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5450643, '528', 2640.024, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:25:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5450643, '528', 2640.024, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5450643, '528', 2640.024, '500', '1.00', 'Ya', 'null')
ERROR - 2025-01-28 09:25:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:25:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:25:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:25:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:27:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._11', '0_1', '0_3', '0_3', 'Hijau', '2025-01-28', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:27:18 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._11', '0_1', '0_3', '0_3', 'Hijau', '2025-01-28', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('680448', '2025-01-28 09:16', 'Kursi Roda', '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', 'demam ,batuk ,bab cair 4x sariawan +', '', '3 hari ', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'Orang tua mrngatakan anaknya demam naik turun sudah 3 hari,batuk 1 minggu ,diare 4x /hari dan sariawan dan ada bercak putih dimulut sudah berobat ke klinik tidak ada perubahan  ', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', '', 'tidak ada', '', '38', '27000', '49', 'Spontan', '0', '0', '{"lengkap":"","tidak_pernah":"","tidak_lengkap":"1","imunisasi_lain":"BCG aja "}', '0', '1', '', '1', '', '17', '17', '4', '8', '0', '8', '15', '17', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'swasta', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'Sholat', 'Doa', 'Belum Baligh', '', 'Berwudhu', 'Duduk', 'WNI', 'Indonesia/betawi', '1', '', '0', '', '0', '0', '', 'Belum sekolah', '0', '0', '0', '0', '0', '0', '0', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '120', '38', '24', '7.1', '0', '0', '0', '0', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '4x', 'cair', '{"normal_anak_1":null,"normal_anak_2":"2","normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, '2', NULL, NULL, '1', NULL, '0', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, '5', '4', NULL, NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '13', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_8', '0_1', '0_1', '0_4', '0_11', '0_1', '0_3', '0_3', 'Hijau', '2025-01-28', '', 'terlampir', '', '', '{"ket_1":"1","ket_2":"1","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"1","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '217', '55', NULL, '2025-01-30 07:21', '1', '1', '2025-01-28 09:27:18')
ERROR - 2025-01-28 09:27:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._11', '0_1', '0_3', '0_3', 'Hijau', '2025-01-28', '', 'terla...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:27:37 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._11', '0_1', '0_3', '0_3', 'Hijau', '2025-01-28', '', 'terla...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_anak" ("id_layanan_pendaftaran", "waktu_pengkajian_anak", "cara_tiba_diruangan_anak", "informasi_dari_anak", "keluhan_utama_anak", "timbul_keluhan_anak", "lama_keluhan_anak", "faktor_pencetus_anak", "sifat_keluhan_anak", "riwayat_penyakit_sekarang_anak", "riwayat_penyakit_terdahulu", "riwayat_penyakit_keluarga", "pernah_dirawat_anak", "obat_dari_luar_anak", "alergi_anak", "alergi_obat_anak", "alergi_obat_reaksi_anak", "alergi_makanan_anak", "alergi_makanan_reaksi_anak", "usia_kehamilan", "berat_badan_lahir", "panjang_badan_lahir", "riwayat_kelahiran_anak", "menangis", "riwayat_kuning", "riwayat_imunisasi", "stts_fungsional_mandiri", "stts_fungsional_ketergantungan", "stts_fungsional_ket_ketergantungan", "stts_fungsional_perlu_bantuan", "stts_fungsional_ket_perlu_bantuan", "asi_anak", "susu_formula", "tengkurap", "tumbuh_gigi", "rtk_bicara", "rtk_duduk", "rtk_berdiri", "rtk_berjalan", "status_psikologi_anak", "hubungan_dengan_orang_tua", "tempat_tinggal_anak", "ket_tempat_tinggal_anak", "pekerjaan_ayah", "pekerjaan_ibu", "cara_bayar", "cara_bayar_anak_t", "ket_asuransi_cara_bayar", "ket_cara_bayar_lain", "agama_anak", "ket_agama_lain_anak", "kegiatan_agama_dilakukan", "kegiatan_spiritual_dilakukan", "wajib_ibadah_anak", "ket_wajib_ibadah_halangan_anak", "thaharoh_anak", "sholat_anak", "kewarganegaraan_anak", "suku_bangsa", "bicara_anak", "ket_bicara_anak", "perlu_penterjemah", "ket_penterjemah", "bahasa_isyarat", "hanbatan_belajar_w", "h_menerima_edikasi_w", "pendidikan_anak", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal_anak", "berat_badan_awal", "lingkar_kepala_anak", "tinggi_badan_anak", "lingkar_dada_anak", "lingkar_perut_anak", "gangguan_neurologis", "ket_gangguan_neurologis", "irama_nafas", "retraksi_dada", "bentuk_dada", "ket_bentuk_dada", "pola_nafas", "ket_pola_nafas", "suara_nafas", "ket_suara_nafas", "nafas_cuping_hidung", "sianosis_nafas", "alat_bantu_nafas", "ket_kanul", "alat_bantu_nafas_anak_t", "ket_ventilator", "sirkulasi_sianosis", "sirkulasi_pucat", "intensitas_nadi", "irama_nadi", "sirkulasi_edema", "sirkulasi_crt", "sirkulasi_akral", "sirkulasi_clubing_finger", "gastro_mulut", "gastro_muntah", "ket_gastro_muntah", "gastro_peristaltik", "gastro_mual", "gastro_ascites", "gastro_nyeri_ulu_hati", "bab_pengeluaran", "bab_frekuensi", "konsistensi_anak", "normal_anak", "bab_konsistensi", "bak_pengeluaran", "bak_kelainan", "bak_ket_kelainan", "integumen_warna_kulit", "integumen_kelainan", "integumen_resiko_dubitus", "integumen_luka", "kelainan_tulang", "ket_kelainan_tulang", "gerakan_anak", "gentalia_anak", "ket_gentalia_anak", "nilai_tingkat_nyeri", "nyeri_hilang", "lokasi_nyeri", "durasi_nyeri", "frekuensi_nyeri", "sn_wajah_1", "sn_wajah_2", "sn_wajah_3", "sn_kaki_1", "sn_kaki_2", "sn_kaki_3", "sn_aktivitas_1", "sn_aktivitas_2", "sn_aktivitas_3", "sn_menangis_1", "sn_menangis_2", "sn_menangis_3", "sn_bicara_1", "sn_bicara_2", "sn_bicara_3", "sn_nilai_total", "prja_umur_1", "prja_umur_2", "prja_umur_3", "prja_umur_4", "prja_jk_1", "prja_jk_2", "prja_diagnosis_1", "prja_diagnosis_2", "prja_diagnosis_3", "prja_diagnosis_4", "prja_kognitif_1", "prja_kognitif_2", "prja_kognitif_3", "prja_lingkungan_1", "prja_lingkungan_2", "prja_lingkungan_3", "prja_lingkungan_4", "prja_respon_1", "prja_respon_2", "prja_respon_3", "prja_obat_1", "prja_obat_2", "prja_obat_3", "prja_nilai_total", "sg_nilai_1", "sg_nilai_2", "sg_nilai_3", "sg_nilai_4", "sg_nilai_total", "daftar_penyakit_malnutrisi", "skrining_pasien_akhir_kehidupan", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_suhu", "sew_pernafasan", "sew_kondisi_pernafasan", "sew_alat_bantu", "sew_saturasi", "sew_nadi", "sew_warna_kulit", "sew_tds", "sew_kesadaran", "sew_total", "penunjang_lab", "penunjang_rad", "hasil_lab", "hsail_rad", "penunjang_lainnya", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('680448', '2025-01-28 09:16', 'Kursi Roda', '{"pasien":"","keluarga":"1","lain":"","ket_lain":""}', 'demam ,batuk ,bab cair 4x sariawan +', '', '3 hari ', '{"infeksi":"1","lain":"","ket_lain":""}', 'Akut', 'Orang tua mrngatakan anaknya demam naik turun sudah 3 hari,batuk 1 minggu ,diare 4x /hari dan sariawan dan ada bercak putih dimulut sudah berobat ke klinik tidak ada perubahan  ', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":""}', '{"dirawat":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada', '', 'tidak ada', '', '38', '27000', '49', 'Spontan', '0', '0', '{"lengkap":"","tidak_pernah":"","tidak_lengkap":"1","imunisasi_lain":"BCG aja "}', '0', '1', '', '1', '', '17', '17', '4', '8', '0', '8', '15', '17', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '1', 'Rumah', '', 'swasta', 'IRT', 'BPJS', '', '', '', 'Islam', '', 'Sholat', 'Doa', 'Belum Baligh', '', 'Berwudhu', 'Duduk', 'WNI', 'Indonesia/betawi', '1', '', '0', '', '0', '0', '', 'Belum sekolah', '0', '0', '0', '0', '0', '0', '0', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5","gcsm_total":"15"}', '', '', '120', '38', '24', '7.1', '0', '0', '0', '0', '0', '', 'Reguler', '0', '1', '', '1', '', '1', '', '0', '0', 'Spontan', '', '', '', '0', '0', '{"Kuat":"Kuat","Lemah":"","Bounding":""}', 'Reguler', '0', 'Kurang dari 3', 'Hangat', '0', '{"mukosa_lembab":"1","mukosa_kering":"","stomatitis":"","labio":"","pendarahan_gusi":"","mulut_lainnya":"","ket_gastro_mulut":""}', '0', '', '18', '0', '0', '0', '{"anus":"Anus","stomata":"","lainnya":""}', '4x', 'cair', '{"normal_anak_1":null,"normal_anak_2":"2","normal_anak_3":null,"normal_anak_4":null,"normal_anak_5":null,"normal_anak_6":null}', '', '{"spontan":"1","kateter_urine":"","cystostomy":""}', '0', '', '{"pucat":"","kuning":"","normal":"1","mootled":""}', '0', '0', '0', '0', '', 'Bebas', '1', '', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '', '', '', NULL, '2', NULL, NULL, '1', NULL, '0', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, '5', '4', NULL, NULL, NULL, NULL, '1', NULL, '3', NULL, NULL, NULL, NULL, '1', NULL, NULL, '2', NULL, NULL, NULL, '1', NULL, NULL, '1', '13', '0', '0', '0', '0', '0', '{"diare_persisten":"","prematuris":"","penyakit_jantung_bawaan":"","kelainan_bawaan":"","wajah_dismorfik":"","penyakit_akut_berat":"","ginjal":"","infeksi_hiv":"","kanker":"","penyakit_hati_kronik":"","penyakit_ginjal_kronik":"","terdapat_stoma":"","trauma":"","kontipasi_berulang":"","gagal_tumbuh":"","penyakit_metabolik":"","retardasi_metabolik":"","keterlambatan_perkembangan":"","luka_bakar":"","rencana_operasi":""}', '{"kriteria_anak_1":"0","kriteria_anak_2":"0","kriteria_anak_3":"0","kriteria_anak_4":"0","kriteria_anak_5":"0"}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_8', '0_1', '0_1', '0_4', '0_11', '0_1', '0_3', '0_3', 'Hijau', '2025-01-28', '', 'terlampir', '', '', '{"ket_1":"1","ket_2":"1","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"1","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_31":"","ket_32":"","ket_33":"","ket_34":"","ket_lain":""}', '{"planning_1":"0","planning_2":"0","planning_3":"1","planning_4":"0","kriteria":{"kriteria_1":"","kriteria_2":"","kriteria_3":"1","kriteria_4":"","kriteria_5":"","kriteria_6":"","kriteria_7":"","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '217', '55', NULL, '2025-01-30 07:21', '1', '1', '2025-01-28 09:27:37')
ERROR - 2025-01-28 09:27:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:27:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:28:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:28:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:28:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:28:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:28:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:28:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:28:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:28:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:28:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 09:28:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 09:36:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 09:42:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 09:50:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 09:56:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 10:00:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:26:38 --> Severity: Notice  --> Undefined index:  /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 1115
ERROR - 2025-01-28 10:32:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 10:38:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 10:38:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 10:38:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 10:38:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 10:38:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 10:38:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 10:39:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:44:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 10:44:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 10:44:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 10:44:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 10:44:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 10:44:02 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 10:44:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 10:44:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 10:44:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 10:44:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 10:44:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 10:44:53 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 10:52:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 10:56:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 10:56:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 10:56:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 10:56:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 10:56:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 10:56:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 10:57:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 10:57:52 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 10:57:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 10:58:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 10:59:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 11:06:19 --> Severity: error  --> Exception: Too few arguments to function Cloud_rsud::print_file_lain(), 0 passed in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/CodeIgniter.php on line 529 and at least 1 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 88
ERROR - 2025-01-28 11:06:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-28 11:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 11:07:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 11:07:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 11:07:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 11:07:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 11:07:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 11:07:50 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 11:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 11:13:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 11:23:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 11:23:36 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 11:23:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 11:23:36 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 11:23:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 11:23:36 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 11:30:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 11:43:11 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-28 11:44:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 11:44:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 11:44:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 11:44:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 11:49:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 11:50:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 11:54:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 11:54:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 11:54:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 11:54:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 11:54:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 11:54:14 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 12:02:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:02:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:03:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:03:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:03:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:03:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:03:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:03:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:10:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:10:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:10:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:13:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:13:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-28 12:13:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:13:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-28 12:14:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:14:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:15:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:15:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:18:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:18:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:19:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:19:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:21:24 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:21:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 12:21:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:21:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:21:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:21:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:22:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:22:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:23:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:23:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:24:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:24:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:27:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 12:29:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 12:33:08 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8677
ERROR - 2025-01-28 12:33:08 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13059
ERROR - 2025-01-28 12:33:08 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13063
ERROR - 2025-01-28 12:33:08 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13073
ERROR - 2025-01-28 12:33:08 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13077
ERROR - 2025-01-28 12:33:08 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8688
ERROR - 2025-01-28 12:33:08 --> Severity: Notice  --> Trying to get property 'id_resep' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8693
ERROR - 2025-01-28 12:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:34:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:38:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 12:38:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 12:38:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 12:38:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 12:38:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 12:38:54 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 12:40:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:40:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:42:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:42:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:42:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:42:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:43:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 12:43:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-28 12:43:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 12:43:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-28 12:43:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 12:43:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-28 12:43:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 12:43:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 12:43:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 12:44:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 12:47:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 12:48:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:48:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:49:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 12:49:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 12:50:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 12:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 12:55:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 12:56:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 12:56:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 13:01:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 13:05:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:05:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:06:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:06:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:06:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:06:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:07:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 13:07:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5451396, '1498', 613.2, '80', '4.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:07:04 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5451396, '1498', 613.2, '80', '4.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5451396, '1498', 613.2, '80', '4.00', 'Ya', 'null')
ERROR - 2025-01-28 13:07:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:07:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:07:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:07:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:13:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 13:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 13:22:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 13:24:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:24:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:24:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:24:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:25:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:25:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:26:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 13:30:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 13:31:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 13:31:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 13:31:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 13:32:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 13:34:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:34:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:35:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:35:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:37:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:37:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:37:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:37:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:37:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:37:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:38:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:38:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:38:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...nis&quot;) VALUES (5451470, '60', 114, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:38:48 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...nis") VALUES (5451470, '60', 114, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5451470, '60', 114, '1', '2.00', NULL, 'null')
ERROR - 2025-01-28 13:38:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:38:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:41:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:41:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:41:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5451508, '367', 76323.6, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:41:37 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5451508, '367', 76323.6, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5451508, '367', 76323.6, '1', '1.00', NULL, 'null')
ERROR - 2025-01-28 13:41:48 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 704
ERROR - 2025-01-28 13:41:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:41:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:42:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:42:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:46:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 13:48:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:48:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:49:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:49:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:49:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:49:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:49:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:49:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:49:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:49:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:49:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:49:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:50:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:50:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 13:51:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 13:51:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 13:54:06 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 13:54:06 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 13:54:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-01-28 13:56:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-01-28 14.00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-01-28 14.00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 13:56:00 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-01-28 14.00"
LINE 4: AND "lo_tgl" = '2025-01-28 14.00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1366'
AND "lo_tgl" = '2025-01-28 14.00'
AND "id_layanan_pendaftaran" = '680440'
ERROR - 2025-01-28 13:56:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 14:02:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 14:02:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 14:04:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 14:04:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:04:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 14:05:46 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 14:06:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 14:06:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 14:07:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:07:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 14:11:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:11:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 14:18:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:18:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 14:18:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:18:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 14:18:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:18:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 14:20:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:20:19 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 14:20:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:20:19 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 14:20:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:20:19 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 14:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 14:30:35 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 14:30:35 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 14:30:35 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-01-28 14:31:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:31:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-28 14:31:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 14:31:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-28 14:49:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 14:56:50 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/keuangan/models/Keuangan_model.php 456
ERROR - 2025-01-28 14:56:50 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/keuangan/models/Keuangan_model.php 456
ERROR - 2025-01-28 14:56:50 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/keuangan/models/Keuangan_model.php 456
ERROR - 2025-01-28 14:56:50 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/keuangan/models/Keuangan_model.php 456
ERROR - 2025-01-28 14:56:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 14:57:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 14:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 14:59:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 15:00:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 15:01:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 15:05:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:05:06 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680372', '2025-01-28 14:56', '8', '', '', '', '', '', '', '', '', 'napas masih tampak cepat, retraksi +, batuk grok grok +, masih lemas', 'TSS, Kes. Cm nadi. 120x./mnt rr . 26x/mnt SpO2 99»8,7 kg', 'BP', 'lapor dr Fellycia,SpA', '1258', '1', '<p>sudah konfirmasi ulang dr Fellycia,SpA</p><p>advis</p><p>nebu naik menjadi 4x</p>', NULL, '1258', '1', NULL, '2025-01-28 15:05:06')
ERROR - 2025-01-28 15:08:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:08:32 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 15:08:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:08:32 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 15:08:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:08:32 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 15:12:25 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-28 15:14:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 15:19:28 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 704
ERROR - 2025-01-28 15:21:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 15:25:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 15:25:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:25:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-28 15:25:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:25:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-28 15:29:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:29:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 15:29:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...al_pasang&quot; = '2025-01-25', &quot;sirs_tanggal_lepas&quot; = '', &quot;sirs_...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:29:18 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...al_pasang" = '2025-01-25', "sirs_tanggal_lepas" = '', "sirs_...
                                                             ^ - Invalid query: UPDATE "sm_pemasangan_alat" SET "sirs_tindakan" = '1922', "sirs_tanggal_pasang" = '2025-01-25', "sirs_tanggal_lepas" = '', "sirs_lokasi" = 'tangan kanan, no. 20', "sirs_alasan_pasang" = 'untuk akses obat dan cairan (dr PKM)', "sirs_alasan_lepas" = 'blpl', "sirs_perawat_pasang" = '595', "sirs_perawat_lepas" = '129'
WHERE "id" = '34058'
ERROR - 2025-01-28 15:29:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...al_pasang&quot; = '2025-01-25', &quot;sirs_tanggal_lepas&quot; = '', &quot;sirs_...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:29:19 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...al_pasang" = '2025-01-25', "sirs_tanggal_lepas" = '', "sirs_...
                                                             ^ - Invalid query: UPDATE "sm_pemasangan_alat" SET "sirs_tindakan" = '1922', "sirs_tanggal_pasang" = '2025-01-25', "sirs_tanggal_lepas" = '', "sirs_lokasi" = 'tangan kanan, no. 20', "sirs_alasan_pasang" = 'untuk akses obat dan cairan (dr PKM)', "sirs_alasan_lepas" = 'blpl', "sirs_perawat_pasang" = '595', "sirs_perawat_lepas" = '129'
WHERE "id" = '34058'
ERROR - 2025-01-28 15:29:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...al_pasang&quot; = '2025-01-25', &quot;sirs_tanggal_lepas&quot; = '', &quot;sirs_...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:29:21 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...al_pasang" = '2025-01-25', "sirs_tanggal_lepas" = '', "sirs_...
                                                             ^ - Invalid query: UPDATE "sm_pemasangan_alat" SET "sirs_tindakan" = '1922', "sirs_tanggal_pasang" = '2025-01-25', "sirs_tanggal_lepas" = '', "sirs_lokasi" = 'tangan kanan, no. 20', "sirs_alasan_pasang" = 'untuk akses obat dan cairan (dr PKM)', "sirs_alasan_lepas" = 'blpl', "sirs_perawat_pasang" = '595', "sirs_perawat_lepas" = '129'
WHERE "id" = '34058'
ERROR - 2025-01-28 15:30:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 15:31:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:31:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 15:38:46 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 15:38:46 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 15:38:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-01-28 15:39:07 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 15:39:07 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-28 15:39:07 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-01-28 15:40:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:40:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 15:45:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:45:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 15:49:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:49:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 15:49:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:49:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 15:54:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:54:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 15:54:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5451951, '680', 16800, '1000', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:54:43 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5451951, '680', 16800, '1000', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5451951, '680', 16800, '1000', '1.00', 'Ya', 'null')
ERROR - 2025-01-28 15:54:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:54:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 15:55:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 15:55:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 16:01:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 16:01:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 16:01:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5451980, '616', 12600, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 16:01:57 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5451980, '616', 12600, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5451980, '616', 12600, '1', '1.00', NULL, 'null')
ERROR - 2025-01-28 16:02:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 16:02:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 16:08:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 16:11:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 16:11:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 16:36:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 16:36:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 16:37:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 16:37:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 16:57:19 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2157
ERROR - 2025-01-28 16:57:19 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2201
ERROR - 2025-01-28 17:04:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 17:04:11 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 17:04:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 17:04:11 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 17:04:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 17:04:11 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-28 17:05:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 17:16:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 17:45:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 17:50:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 17:50:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 17:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 17:58:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 17:58:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 17:59:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 17:59:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 18:03:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-28 18:20:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 18:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 18:26:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 18:26:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 18:28:37 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-28 18:33:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 19:03:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:03:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:03:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:03:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:22:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 19:34:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:34:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:34:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:34:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:34:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:34:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:34:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:34:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:34:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:35:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:35:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:35:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5452179, '833', 43320, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:35:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5452179, '833', 43320, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5452179, '833', 43320, '500', '1.00', 'Ya', 'null')
ERROR - 2025-01-28 19:35:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:35:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:35:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:35:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:35:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:35:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:36:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:36:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:36:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:36:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:36:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:36:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:37:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:37:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 19:47:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-28 19:54:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 19:54:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 20:01:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 20:01:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 20:01:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 20:13:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 20:13:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 20:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 20:46:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 20:59:49 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-28 21:00:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:00:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 21:00:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:00:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 21:00:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:00:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 21:00:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:00:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 21:00:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:00:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 21:00:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:00:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 21:10:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-28 21:22:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 21:34:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:34:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 21:34:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5452352, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:34:39 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5452352, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5452352, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-01-28 21:34:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 21:34:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 21:48:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 22:23:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (777112, '4', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 22:23:51 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (777112, '4', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (777112, '4', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-28 22:29:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 22:29:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 22:52:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-28 23:23:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:23:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 23:38:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:38:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 23:38:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13633
ERROR - 2025-01-28 23:38:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13633
ERROR - 2025-01-28 23:38:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13633
ERROR - 2025-01-28 23:39:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:39:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-28 23:47:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-28 29:47&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:47:40 --> Query error: ERROR:  date/time field value out of range: "2025-01-28 29:47"
LINE 1: ...ria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('680494', '2025-01-28 23:40', 'Brankar', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'Sesak nafas ', '3 jam SMRS', '4 hari', '{"infeksi":"","lain":"1","ket_lain":"Asma eksaserbasi akut, Pneumonia, Susp CHF"}', 'Akut', 'Pasien mengatakan Mengeluh sesak sudah 1 minggu disertai batuk berdahak kuning kehijauan, demam naik turun, mual bila batuk, muntah (-) BAB dak BAK tak ada keluhan', '{"asma":"1","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"Tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '122', '67', '58', '36.4', '22', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":"1"}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Turun', '1', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"1","ket_kateter_warna":"Kuning","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada kelainan"}', 'Hygiene', 'Lain', 'tidak ada kelainan', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"1","ket_lain":"menerima"}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'Shalat', 'Baligh', '', 'Tayamum', 'Berbaring', 'Ujian', '', 'istirahat', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Indonesia', 'Normal', '', '0', '', '0', '1', '1', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '0', '5', '5', '10', '0', '10', '0', '5', '0', '45', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '0', '0', '0', '1', '0', '0', '2', '2', '2', '10', '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '2_4', '0_4', '0_4', '2_1', '0_4', '0_3', '0_1', '0_3', 'Hijau', '{"ket_1":"1","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"1","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"1","planning_3":"1","planning_4":"1","kriteria":{"kriteria_1":"1","kriteria_2":"","kriteria_3":"1","kriteria_4":"1","kriteria_5":"","kriteria_6":"","kriteria_7":"1","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-28 29:47', '1', '1', '2025-01-28 23:47:40')
ERROR - 2025-01-28 23:47:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-28 29:47&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:47:45 --> Query error: ERROR:  date/time field value out of range: "2025-01-28 29:47"
LINE 1: ...ria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('680494', '2025-01-28 23:40', 'Brankar', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'Sesak nafas ', '3 jam SMRS', '4 hari', '{"infeksi":"","lain":"1","ket_lain":"Asma eksaserbasi akut, Pneumonia, Susp CHF"}', 'Akut', 'Pasien mengatakan Mengeluh sesak sudah 1 minggu disertai batuk berdahak kuning kehijauan, demam naik turun, mual bila batuk, muntah (-) BAB dak BAK tak ada keluhan', '{"asma":"1","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"Tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '122', '67', '58', '36.4', '22', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":"1"}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Turun', '1', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"1","ket_kateter_warna":"Kuning","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada kelainan"}', 'Hygiene', 'Lain', 'tidak ada kelainan', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"1","ket_lain":"menerima"}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'Shalat', 'Baligh', '', 'Tayamum', 'Berbaring', 'Ujian', '', 'istirahat', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Indonesia', 'Normal', '', '0', '', '0', '1', '1', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '0', '5', '5', '10', '0', '10', '0', '5', '0', '45', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '0', '0', '0', '1', '0', '0', '2', '2', '2', '10', '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '2_4', '0_4', '0_4', '2_1', '0_4', '0_3', '0_1', '0_3', 'Hijau', '{"ket_1":"1","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"1","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"1","planning_3":"1","planning_4":"1","kriteria":{"kriteria_1":"1","kriteria_2":"","kriteria_3":"1","kriteria_4":"1","kriteria_5":"","kriteria_6":"","kriteria_7":"1","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-28 29:47', '1', '1', '2025-01-28 23:47:45')
ERROR - 2025-01-28 23:47:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-28 29:47&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:47:55 --> Query error: ERROR:  date/time field value out of range: "2025-01-28 29:47"
LINE 1: ...ria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('680494', '2025-01-28 23:40', 'Brankar', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'Sesak nafas ', '3 jam SMRS', '4 hari', '{"infeksi":"","lain":"1","ket_lain":"Asma eksaserbasi akut, Pneumonia, Susp CHF"}', 'Akut', 'Pasien mengatakan Mengeluh sesak sudah 1 minggu disertai batuk berdahak kuning kehijauan, demam naik turun, mual bila batuk, muntah (-) BAB dak BAK tak ada keluhan', '{"asma":"1","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"Tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '122', '67', '58', '36.4', '22', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":"1"}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Turun', '1', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"1","ket_kateter_warna":"Kuning","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada kelainan"}', 'Hygiene', 'Lain', 'tidak ada kelainan', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"1","ket_lain":"menerima"}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'Shalat', 'Baligh', '', 'Tayamum', 'Berbaring', 'Ujian', '', 'istirahat', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Indonesia', 'Normal', '', '0', '', '0', '1', '1', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '0', '5', '5', '10', '0', '10', '0', '5', '0', '45', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '0', '0', '0', '1', '0', '0', '2', '2', '2', '10', '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '2_4', '0_4', '0_4', '2_1', '0_4', '0_3', '0_1', '0_3', 'Hijau', '{"ket_1":"1","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"1","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"1","planning_3":"1","planning_4":"1","kriteria":{"kriteria_1":"1","kriteria_2":"","kriteria_3":"1","kriteria_4":"1","kriteria_5":"","kriteria_6":"","kriteria_7":"1","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-28 29:47', '1', '1', '2025-01-28 23:47:55')
ERROR - 2025-01-28 23:48:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-28 29:47&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:48:10 --> Query error: ERROR:  date/time field value out of range: "2025-01-28 29:47"
LINE 1: ...ria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('680494', '2025-01-28 23:40', 'Brankar', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'Sesak nafas ', '3 jam SMRS', '4 hari', '{"infeksi":"","lain":"1","ket_lain":"Asma eksaserbasi akut, Pneumonia, Susp CHF"}', 'Akut', 'Pasien mengatakan Mengeluh sesak sudah 1 minggu disertai batuk berdahak kuning kehijauan, demam naik turun, mual bila batuk, muntah (-) BAB dak BAK tak ada keluhan', '{"asma":"1","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"Tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '122', '67', '58', '36.4', '22', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":"1"}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Turun', '1', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"1","ket_kateter_warna":"Kuning","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada kelainan"}', 'Hygiene', 'Lain', 'tidak ada kelainan', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"1","ket_lain":"menerima"}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'Shalat', 'Baligh', '', 'Tayamum', 'Berbaring', 'Ujian', '', 'istirahat', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Indonesia', 'Normal', '', '0', '', '0', '1', '1', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '0', '5', '5', '10', '0', '10', '0', '5', '0', '45', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '0', '0', '0', '1', '0', '0', '2', '2', '2', '10', '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '2_4', '0_4', '0_4', '2_1', '0_4', '0_3', '0_1', '0_3', 'Hijau', '{"ket_1":"1","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"1","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"1","planning_3":"1","planning_4":"1","kriteria":{"kriteria_1":"1","kriteria_2":"","kriteria_3":"1","kriteria_4":"1","kriteria_5":"","kriteria_6":"","kriteria_7":"1","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-28 29:47', '1', '1', '2025-01-28 23:48:10')
ERROR - 2025-01-28 23:48:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-28 29:47&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:48:57 --> Query error: ERROR:  date/time field value out of range: "2025-01-28 29:47"
LINE 1: ...ria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('680494', '2025-01-28 23:40', 'Brankar', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'Sesak nafas ', '3 jam SMRS', '4 hari', '{"infeksi":"","lain":"1","ket_lain":"Asma eksaserbasi akut, Pneumonia, Susp CHF"}', 'Akut', 'Pasien mengatakan Mengeluh sesak sudah 1 minggu disertai batuk berdahak kuning kehijauan, demam naik turun, mual bila batuk, muntah (-) BAB dak BAK tak ada keluhan', '{"asma":"1","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"Tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '122', '67', '58', '36.4', '22', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"","bradipnea":"","tachipnea":"1"}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Turun', '1', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"1","ket_kateter_warna":"Kuning","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada kelainan"}', 'Hygiene', 'Lain', 'tidak ada kelainan', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"1","ket_lain":"menerima"}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'Shalat', 'Baligh', '', 'Tayamum', 'Berbaring', 'Ujian', '', 'istirahat', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Indonesia', 'Normal', '', '0', '', '0', '1', '1', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '0', '5', '5', '10', '0', '10', '0', '5', '0', '45', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '0', '0', '0', '1', '0', '0', '2', '2', '2', '10', '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '2_4', '0_4', '0_4', '2_1', '0_4', '0_3', '0_1', '0_3', 'Hijau', '{"ket_1":"1","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"1","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"1","planning_3":"1","planning_4":"1","kriteria":{"kriteria_1":"1","kriteria_2":"","kriteria_3":"1","kriteria_4":"1","kriteria_5":"","kriteria_6":"","kriteria_7":"1","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-28 29:47', '1', '1', '2025-01-28 23:48:57')
ERROR - 2025-01-28 23:49:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-28 29:47&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:49:23 --> Query error: ERROR:  date/time field value out of range: "2025-01-28 29:47"
LINE 1: ...ria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-2...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('680494', '2025-01-28 23:40', 'Brankar', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'Sesak nafas ', '3 jam SMRS', '4 hari', '{"infeksi":"","lain":"1","ket_lain":"Asma eksaserbasi akut, Pneumonia, Susp CHF"}', 'Akut', 'Pasien mengatakan Mengeluh sesak sudah 1 minggu disertai batuk berdahak kuning kehijauan, demam naik turun, mual bila batuk, muntah (-) BAB dak BAK tak ada keluhan', '{"asma":"1","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"","ket_lain":""}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"Tidak ada"}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '122', '67', '58', '36.4', '22', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"","ket_lain":""}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"asites":"","tegang":"","supel":"1","lain":"","ket_lain":""}', 'Turun', '1', '0', '0', '{"normal":"1","konstipasi":"","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"1","ket_kateter_warna":"Kuning","kandung_kemih":"","lain":"","ket_lain":""}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada kelainan"}', '{"pucat":"","sianosis":"","normal":"1","lain":"","ket_lain":""}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"","ket_lain":""}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"","ket_lain":""}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada kelainan"}', 'Hygiene', 'Lain', 'tidak ada kelainan', '{"cemas":"","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"1","ket_lain":"menerima"}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '0', '', '0', '', 'Shalat', 'Baligh', '', 'Tayamum', 'Berbaring', 'Ujian', '', 'istirahat', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Indonesia', 'Normal', '', '0', '', '0', '1', '1', '0', '0', '0', '0', '0', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '0', '0', '10', '0', '5', '5', '10', '0', '10', '0', '5', '0', '45', '', '{"minum_obat":"","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, '0', '0', '0', '1', '0', '0', '2', '2', '2', '10', '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"0","ket_5":"0","ket_6":"0","ket_7":"0","ket_8":"0","ket_9":"0"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '2_4', '0_4', '0_4', '2_1', '0_4', '0_3', '0_1', '0_3', 'Hijau', '{"ket_1":"1","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"1","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"0","planning_2":"1","planning_3":"1","planning_4":"1","kriteria":{"kriteria_1":"1","kriteria_2":"","kriteria_3":"1","kriteria_4":"1","kriteria_5":"","kriteria_6":"","kriteria_7":"1","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '401', '68', '2025-01-28 23:40', '2025-01-28 29:47', '1', '1', '2025-01-28 23:49:23')
ERROR - 2025-01-28 23:51:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-28 23:51:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
