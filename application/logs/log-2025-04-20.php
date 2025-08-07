<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-04-20 00:00:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 00:00:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 00:01:15 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 00:01:15 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 00:03:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 00:17:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:17:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-20 00:17:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:17:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-20 00:29:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 00:37:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:37:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:37:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6005652, '419', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:37:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6005652, '419', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6005652, '419', 8858.4, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 00:37:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:37:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:38:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:38:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:38:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:38:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:38:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:38:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:39:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:39:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:39:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:39:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:39:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:39:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:39:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 00:39:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 00:46:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 01:00:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6005707, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 01:00:54 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6005707, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6005707, '701', 1598.4, '25', '1.00', 'Ya', 'null')
ERROR - 2025-04-20 01:33:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 01:33:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 01:34:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 01:34:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 01:34:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 01:34:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 01:34:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 01:34:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 01:42:30 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 01:58:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 02:46:45 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 02:46:45 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 02:53:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (829347, '3', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 02:53:17 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (829347, '3', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (829347, '3', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-20 03:10:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 03:10:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 03:50:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6005817, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 03:50:22 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6005817, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6005817, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 05:10:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 05:21:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6c /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 05:21:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6c - Invalid query: INSERT INTO "sm_formulir_observasi_igd" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tanggal_1_fodti", "tanggal_2_fodti", "jam_1_fodti", "bismilah_fodti", "td_s_fodti", "td_d_fodti", "nadi_fodti", "rr_fodti", "suhu_fodti", "sat_o2_fodti", "kategori_fodti", "skala_fodti", "resiko_fodti", "kesadaran_fodti", "gcs_e_fodti", "gcs_m_fodti", "gcs_v_fodti", "total_gcs_fodti", "pupil_kanan_fodti", "pupil_kiri_fodti", "pemeriksaan_fodti", "jam_2_fodti", "implementasi_fodti", "alhamdulilah_fodti", "ttd_fodti", "perawat_fodti", "created_at") VALUES ('674474', '730679', '2034', '2025-04-20', '2025-04-20', '5:30', '1', '86', '52', '108', '26', '37', '96', 'merah ', '6', 'tinggi', 'CM', '4', '6', '5', '15', '+/2 mm', '2/+mm', '-', '5:30', 'Ceftriaxon 1 gr iv dalam NS 0,90ml
Vascon 4mg + NS 0,9Úlam spuit 50cc
BB : 60kg
Vascon start 0,05Mcg/kgbb/jam', '1', '1', '598', '2025-04-20 05:18:04')
ERROR - 2025-04-20 06:12:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 06:12:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '2039' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-04-20 06:30:06 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 06:34:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 06:34:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 06:43:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 06:53:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 06:53:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 06:53:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 06:53:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 06:53:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 06:53:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 06:56:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6c /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 06:56:24 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6c - Invalid query: UPDATE "sm_cppt" SET "id" = '845716', "id_layanan_pendaftaran" = '728953', "waktu" = '2025-04-19 22:16', "id_profesi" = '8', "subject" = '', "objective" = '', "assessment" = '', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = 'nyeri dan bengkak pada tangan kiri, lengan kiri mulai kehitaman, pasien lemas + TD mulai stabil on vascon 0.4 mcg/kgbb/mnt. post koreksi albumin ', "sbar_background" = 'TSB . Cm TD: 134/74mmhg N:93x/mnt S: 36.7C R: 19x/mnt Spo2: 97% O2 3Lpm
s1s2 irreguler, gallop - murmur - 
rh-/+. wh -/- v +/+ 
oedem tangan +/+ kaki -/- 
status lokalis : oedem pada lengan kiri + jaringan necrotik + ', "sbar_assesment" = 'Syok hipovolemik- Abdominal pain - Gastropathy NSAID - HT - PAC - PPOK - Susp ISK - cyst gallbladder - AKI Stage IIIb ec nefropati obstruksi ec BPH+ cyst kidney+ Retensio urin - Hipoglikemia- Selulitis + DVT + Hiponatremia (124)', "sbar_recommend" = 'renc cek albumin dan elektrolit ulang post koreksi (belum ada) 
ekg ulang 
lapor dr sarah USG doppler vascular tidak ada, pasien dengan DVT apakah ada rencna pemberian heparin? 
IC keluarga', "id_nadis" = '757', "ttd_nadis" = NULL, "instruksi_ppa" = '<p>Sudah konfirmai dr sarah Sp.PDÂ </p><p>advise :Â </p><p>Tn. Sukarno</p><p>Th/</p><p>- Bolus heparin 5000 unit (1 cc)</p><p>- dilanjutkan drip Heparin 10.000 unit (2 cc) dalam 48 cc NaCl 0,9Úlam syringe pump mulai kecepatan 5cc/ jam iv (selama 5 hari)</p><p>P/</p><p>- cek ulang PT/APTT / 6jam</p>', "id_dokter_dpjp" = NULL, "id_user" = '757', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-20 06:56:24'
WHERE "id" = '845716'
ERROR - 2025-04-20 06:56:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6c /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 06:56:32 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6c - Invalid query: UPDATE "sm_cppt" SET "id" = '845716', "id_layanan_pendaftaran" = '728953', "waktu" = '2025-04-19 22:16', "id_profesi" = '8', "subject" = '', "objective" = '', "assessment" = '', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = 'nyeri dan bengkak pada tangan kiri, lengan kiri mulai kehitaman, pasien lemas + TD mulai stabil on vascon 0.4 mcg/kgbb/mnt. post koreksi albumin ', "sbar_background" = 'TSB . Cm TD: 134/74mmhg N:93x/mnt S: 36.7C R: 19x/mnt Spo2: 97% O2 3Lpm
s1s2 irreguler, gallop - murmur - 
rh-/+. wh -/- v +/+ 
oedem tangan +/+ kaki -/- 
status lokalis : oedem pada lengan kiri + jaringan necrotik + ', "sbar_assesment" = 'Syok hipovolemik- Abdominal pain - Gastropathy NSAID - HT - PAC - PPOK - Susp ISK - cyst gallbladder - AKI Stage IIIb ec nefropati obstruksi ec BPH+ cyst kidney+ Retensio urin - Hipoglikemia- Selulitis + DVT + Hiponatremia (124)', "sbar_recommend" = 'renc cek albumin dan elektrolit ulang post koreksi (belum ada) 
ekg ulang 
lapor dr sarah USG doppler vascular tidak ada, pasien dengan DVT apakah ada rencna pemberian heparin? 
IC keluarga', "id_nadis" = '757', "ttd_nadis" = NULL, "instruksi_ppa" = '<p>Sudah konfirmai dr sarah Sp.PDÂ </p><p>advise :Â </p><p>Tn. Sukarno</p><p>Th/</p><p>- Bolus heparin 5000 unit (1 cc)</p><p>- dilanjutkan drip Heparin 10.000 unit (2 cc) dalam 48 cc NaCl 0,9Úlam syringe pump mulai kecepatan 5cc/ jam iv (selama 5 hari)</p><p>P/</p><p>- cek ulang PT/APTT / 6jam</p>', "id_dokter_dpjp" = NULL, "id_user" = '757', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-20 06:56:32'
WHERE "id" = '845716'
ERROR - 2025-04-20 06:56:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6c /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 06:56:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6c - Invalid query: UPDATE "sm_cppt" SET "id" = '845716', "id_layanan_pendaftaran" = '728953', "waktu" = '2025-04-19 22:16', "id_profesi" = '8', "subject" = '', "objective" = '', "assessment" = '', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = 'nyeri dan bengkak pada tangan kiri, lengan kiri mulai kehitaman, pasien lemas + TD mulai stabil on vascon 0.4 mcg/kgbb/mnt. post koreksi albumin ', "sbar_background" = 'TSB . Cm TD: 134/74mmhg N:93x/mnt S: 36.7C R: 19x/mnt Spo2: 97 O2 3Lpm
s1s2 irreguler, gallop - murmur - 
rh-/+. wh -/- v +/+ 
oedem tangan +/+ kaki -/- 
status lokalis : oedem pada lengan kiri + jaringan necrotik + ', "sbar_assesment" = 'Syok hipovolemik- Abdominal pain - Gastropathy NSAID - HT - PAC - PPOK - Susp ISK - cyst gallbladder - AKI Stage IIIb ec nefropati obstruksi ec BPH+ cyst kidney+ Retensio urin - Hipoglikemia- Selulitis + DVT + Hiponatremia (124)', "sbar_recommend" = 'renc cek albumin dan elektrolit ulang post koreksi (belum ada) 
ekg ulang 
lapor dr sarah USG doppler vascular tidak ada, pasien dengan DVT apakah ada rencna pemberian heparin? 
IC keluarga', "id_nadis" = '757', "ttd_nadis" = NULL, "instruksi_ppa" = '<p>Sudah konfirmai dr sarah Sp.PDÂ </p><p>advise :Â </p><p>Tn. Sukarno</p><p>Th/</p><p>- Bolus heparin 5000 unit (1 cc)</p><p>- dilanjutkan drip Heparin 10.000 unit (2 cc) dalam 48 cc NaCl 0,9Úlam syringe pump mulai kecepatan 5cc/ jam iv (selama 5 hari)</p><p>P/</p><p>- cek ulang PT/APTT / 6jam</p>', "id_dokter_dpjp" = NULL, "id_user" = '757', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-04-20 06:56:44'
WHERE "id" = '845716'
ERROR - 2025-04-20 07:01:50 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 07:05:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:05:03 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-20 07:05:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:05:03 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-20 07:05:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:05:03 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-04-20 07:05:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 07:09:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:09:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:13:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:13:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:14:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:14:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:15:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:15:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:17:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:17:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:17:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6006108, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:17:40 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6006108, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6006108, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 07:17:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:17:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:20:55 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 07:23:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:23:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:27:02 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 07:28:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:28:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:28:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:28:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:29:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:29:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:29:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:29:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:31:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:31:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:31:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:31:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:33:59 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 07:45:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:45:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 07:46:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6006195, '584', 226.44, '5', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:46:08 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6006195, '584', 226.44, '5', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6006195, '584', 226.44, '5', '10.00', 'Ya', 'null')
ERROR - 2025-04-20 07:46:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 07:46:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 08:00:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 08:00:19 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 08:03:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:03:27 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:11:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 08:11:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 08:11:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:15:15 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:22:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-04-20 08:22:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-04-20 08:22:34 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-04-20 08:26:05 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:39:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16288
ERROR - 2025-04-20 08:42:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:56:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 08:59:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 08:59:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:01:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:01:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:02:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:02:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:02:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:02:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:05:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 09:07:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 09:09:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:09:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:14:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:14:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:20:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:20:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '353', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-04-20 09:20:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:20:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '353', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-04-20 09:23:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:23:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:24:40 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 09:35:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:35:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-20 09:35:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:35:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-20 09:36:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:36:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:39:00 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 09:47:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:47:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:51:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:51:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:53:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:53:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:53:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:53:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:53:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:53:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:54:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:54:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:54:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6006393, '314', 7920, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:54:11 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6006393, '314', 7920, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6006393, '314', 7920, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 09:54:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:54:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:54:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:54:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 09:54:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 09:54:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 10:06:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:06:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 10:08:40 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-04-20 10:09:33 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 10:14:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:14:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 10:15:42 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 10:15:42 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 10:16:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:16:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 10:16:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:16:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 10:17:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:17:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 10:27:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;id_saksi_2&quot; violates not-null constraint
DETAIL:  Failing row contains (134, 729677, 199, null, 0, evi rumiyati, istri, 1979-01-01, Perempuan, pinang, 04/01, , kelurahan pinang, kecamatan pinang, cucu darah , 2025-04-20 10:27:47). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:27:47 --> Query error: ERROR:  null value in column "id_saksi_2" violates not-null constraint
DETAIL:  Failing row contains (134, 729677, 199, null, 0, evi rumiyati, istri, 1979-01-01, Perempuan, pinang, 04/01, , kelurahan pinang, kecamatan pinang, cucu darah , 2025-04-20 10:27:47). - Invalid query: INSERT INTO "sm_form_penolakan_tindakan_kedokteran" ("id_layanan_pendaftaran", "id_saksi_1", "id_saksi_2", "nama_keluarga", "tanggal_lahir", "jenis_kelamin", "alamat", "hubungan_keluarga", "tindakan", "updated_on", "is_pasien") VALUES ('729677', '199', NULL, 'evi rumiyati', '1979-01-01', 'Perempuan', 'pinang, 04/01, , kelurahan pinang, kecamatan pinang', 'istri', 'cucu darah ', '2025-04-20 10:27:47', 0)
ERROR - 2025-04-20 10:27:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;id_saksi_2&quot; violates not-null constraint
DETAIL:  Failing row contains (135, 729677, 199, null, 0, evi rumiyati, ISTRI, 1979-01-01, Perempuan, pinang, 04/01, , kelurahan pinang, kecamatan pinang, cucu darah , 2025-04-20 10:27:55). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:27:55 --> Query error: ERROR:  null value in column "id_saksi_2" violates not-null constraint
DETAIL:  Failing row contains (135, 729677, 199, null, 0, evi rumiyati, ISTRI, 1979-01-01, Perempuan, pinang, 04/01, , kelurahan pinang, kecamatan pinang, cucu darah , 2025-04-20 10:27:55). - Invalid query: INSERT INTO "sm_form_penolakan_tindakan_kedokteran" ("id_layanan_pendaftaran", "id_saksi_1", "id_saksi_2", "nama_keluarga", "tanggal_lahir", "jenis_kelamin", "alamat", "hubungan_keluarga", "tindakan", "updated_on", "is_pasien") VALUES ('729677', '199', NULL, 'evi rumiyati', '1979-01-01', 'Perempuan', 'pinang, 04/01, , kelurahan pinang, kecamatan pinang', 'ISTRI', 'cucu darah ', '2025-04-20 10:27:55', 0)
ERROR - 2025-04-20 10:28:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;id_saksi_2&quot; violates not-null constraint
DETAIL:  Failing row contains (136, 729677, 199, null, 0, evi rumiyati, ISTRI, 1979-01-01, Perempuan, pinang, 04/01, , kelurahan pinang, kecamatan pinang, cuci darah , 2025-04-20 10:28:08). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:28:08 --> Query error: ERROR:  null value in column "id_saksi_2" violates not-null constraint
DETAIL:  Failing row contains (136, 729677, 199, null, 0, evi rumiyati, ISTRI, 1979-01-01, Perempuan, pinang, 04/01, , kelurahan pinang, kecamatan pinang, cuci darah , 2025-04-20 10:28:08). - Invalid query: INSERT INTO "sm_form_penolakan_tindakan_kedokteran" ("id_layanan_pendaftaran", "id_saksi_1", "id_saksi_2", "nama_keluarga", "tanggal_lahir", "jenis_kelamin", "alamat", "hubungan_keluarga", "tindakan", "updated_on", "is_pasien") VALUES ('729677', '199', NULL, 'evi rumiyati', '1979-01-01', 'Perempuan', 'pinang, 04/01, , kelurahan pinang, kecamatan pinang', 'ISTRI', 'cuci darah ', '2025-04-20 10:28:08', 0)
ERROR - 2025-04-20 10:29:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;id_saksi_2&quot; violates not-null constraint
DETAIL:  Failing row contains (137, 729677, 199, null, 0, eti rumiyati, istri, 1979-01-01, Perempuan, pinang 04/01, cuci darah, 2025-04-20 10:29:18). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:29:18 --> Query error: ERROR:  null value in column "id_saksi_2" violates not-null constraint
DETAIL:  Failing row contains (137, 729677, 199, null, 0, eti rumiyati, istri, 1979-01-01, Perempuan, pinang 04/01, cuci darah, 2025-04-20 10:29:18). - Invalid query: INSERT INTO "sm_form_penolakan_tindakan_kedokteran" ("id_layanan_pendaftaran", "id_saksi_1", "id_saksi_2", "nama_keluarga", "tanggal_lahir", "jenis_kelamin", "alamat", "hubungan_keluarga", "tindakan", "updated_on", "is_pasien") VALUES ('729677', '199', NULL, 'eti rumiyati', '1979-01-01', 'Perempuan', 'pinang 04/01', 'istri', 'cuci darah', '2025-04-20 10:29:18', 0)
ERROR - 2025-04-20 10:30:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;id_saksi_2&quot; violates not-null constraint
DETAIL:  Failing row contains (138, 729677, 199, null, 0, evi rumiyati, istri, 1979-01-01, Perempuan, pinang 04/01, cuci darah, 2025-04-20 10:30:22). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:30:23 --> Query error: ERROR:  null value in column "id_saksi_2" violates not-null constraint
DETAIL:  Failing row contains (138, 729677, 199, null, 0, evi rumiyati, istri, 1979-01-01, Perempuan, pinang 04/01, cuci darah, 2025-04-20 10:30:22). - Invalid query: INSERT INTO "sm_form_penolakan_tindakan_kedokteran" ("id_layanan_pendaftaran", "id_saksi_1", "id_saksi_2", "nama_keluarga", "tanggal_lahir", "jenis_kelamin", "alamat", "hubungan_keluarga", "tindakan", "updated_on", "is_pasien") VALUES ('729677', '199', NULL, 'evi rumiyati', '1979-01-01', 'Perempuan', 'pinang 04/01', 'istri', 'cuci darah', '2025-04-20 10:30:22', 0)
ERROR - 2025-04-20 10:43:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 10:44:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (845901, 730675, null, 10, nyeri (+), perdarahan (-), blighted ovum post dilatase and curretage, asmef 2x1
 cefad 2x1
app 3 buah kasa jam 15.00 blpl kontrol tg..., , 767, 1, asmef 2x1&lt;div&gt;Â cefad 2x1&lt;/div&gt;&lt;div&gt;app 3 buah kasa jam 15.00 ..., null, null, 767, 2025-04-20 10:44:07, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:44:07 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (845901, 730675, null, 10, nyeri (+), perdarahan (-), blighted ovum post dilatase and curretage, asmef 2x1
 cefad 2x1
app 3 buah kasa jam 15.00 blpl kontrol tg..., , 767, 1, asmef 2x1<div>Â cefad 2x1</div><div>app 3 buah kasa jam 15.00 ..., null, null, 767, 2025-04-20 10:44:07, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('730675', NULL, '10', 'nyeri (+)', 'perdarahan (-)', 'blighted ovum post dilatase and curretage', 'asmef 2x1
 cefad 2x1
app 3 buah kasa jam 15.00 blpl kontrol tgl 2 Mei', '', '', '', '', '', '', '', '', '767', '1', 'asmef 2x1<div>Â cefad 2x1</div><div>app 3 buah kasa jam 15.00 blpl kontrol tgl 2 Mei</div>', NULL, '767', 0, NULL, '2025-04-20 10:44:07')
ERROR - 2025-04-20 10:47:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 10:47:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 10:53:16 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-04-20 03:56:19 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-04-20 03:56:32 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-04-20 11:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:01:15 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('730647', '2025-04-20 10:56', '8', '', '', '', '', '', '', '', '', 'tidak ada keluhan, meco+ miksi+ 

', 'Ku baik kes cm  HR : 135 x/m, suhu : 36.5 ''C, RR : 42 x/m, SPO2 : 98» : 2540 g
NCH - 
TH : retraksi -- ves ++ rh -- wh -- 
Abdomen tali pusat (+) tidak ada tanda-tanda infeksi
', 'NCB SMK 
', 'lapor dr anak ', '737', '1', '<p>sudah dilakukan konfrimais ulang advis dr Angelia Sp A</p><p>Kalau kondisi baik blpl</p>', NULL, '737', '1', NULL, '2025-04-20 11:01:15')
ERROR - 2025-04-20 11:25:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:25:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 11:27:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x74 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:27:52 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x74 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('730620', '2025-04-20 11:18', '18', '-', 'jam 07:30 melakukan operan dines dengan dines malam kesadaran coma GCS E1M1Vett TD : 60/30mmhg,Hr:152x/mnt,RR 42x/mnt, terpasang cvc Tanggal 19/4/2025 di vena subclavicula dextra double lumen dex 5% 1/2 ns 900 cc/ 24jam fentanyl drip 2,7cc/jam vascon 3cc/jam epineprin drip 2cc/jam, terpasang NGT no.8 tgl 19/4/25, Terpasang DC no.6 tanggal 19/4/2025, pasien sdh terintubasi dari igd dgn ett nmr 4 bb 12cm mode press ac total rate 30 p insp 18 peep 6 I:E 1:3 Fi02 100 Úta penunjang radiologi ro thorax pre dan post intubasi tgl 19/4/2025. cek gds jam 08:30 hasil 38 extra dex 10,c/kgbb cek ulang jam 09.30 gds hasil 78.pada pukul 10:15 TD 52/36 sat 72% HR 48x/mnt dilakukan rjp 2 siklus pasien tdk respon TD tdk terukur nadi tdk teraba dilakukan rekam ekg asistole pasien dinyatakan meninggal dunia pikul 10.28 wib oleh dr.fauzia di hadapan klrga dan perawat', 'Gangguan Ventilasi spontan, gangguan sirkulasi spontan,Bersihan Jalan Napas Tidak Efektif, Gangguan Integritas Kulit/Jaringan tidak teratasi', 'perawatan jenazah', '', '', '', '', '', '', '', '', '1617', '1', 'perawatan jenazah', NULL, '1617', 0, NULL, '2025-04-20 11:27:52')
ERROR - 2025-04-20 11:28:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x74 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:28:11 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x74 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('730620', '2025-04-20 11:18', '18', '-', 'jam 07:30 melakukan operan dines dengan dines malam kesadaran coma GCS E1M1Vett TD : 60/30mmhg,Hr:152x/mnt,RR 42x/mnt, terpasang cvc Tanggal 19/4/2025 di vena subclavicula dextra double lumen D5 1/2 ns 900 cc/ 24jam fentanyl drip 2,7cc/jam vascon 3cc/jam epineprin drip 2cc/jam, terpasang NGT no.8 tgl 19/4/25, Terpasang DC no.6 tanggal 19/4/2025, pasien sdh terintubasi dari igd dgn ett nmr 4 bb 12cm mode press ac total rate 30 p insp 18 peep 6 I:E 1:3 Fi02 100 Úta penunjang radiologi ro thorax pre dan post intubasi tgl 19/4/2025. cek gds jam 08:30 hasil 38 extra dex 10,c/kgbb cek ulang jam 09.30 gds hasil 78.pada pukul 10:15 TD 52/36 sat 72% HR 48x/mnt dilakukan rjp 2 siklus pasien tdk respon TD tdk terukur nadi tdk teraba dilakukan rekam ekg asistole pasien dinyatakan meninggal dunia pikul 10.28 wib oleh dr.fauzia di hadapan klrga dan perawat', 'Gangguan Ventilasi spontan, gangguan sirkulasi spontan,Bersihan Jalan Napas Tidak Efektif, Gangguan Integritas Kulit/Jaringan tidak teratasi', 'perawatan jenazah', '', '', '', '', '', '', '', '', '1617', '1', 'perawatan jenazah', NULL, '1617', 0, NULL, '2025-04-20 11:28:11')
ERROR - 2025-04-20 11:28:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x74 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:28:37 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x74 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('730620', '2025-04-20 11:18', '18', '-', 'jam 07:30 melakukan operan dines dengan dines malam kesadaran coma GCS E1M1Vett TD : 60/30mmhg,Hr:152x/mnt,RR 42x/mnt, terpasang cvc Tanggal 19/4/2025 di vena subclavicula dextra double lumen D5 1/2 ns 900 cc/ 24jam fentanyl drip 2,7cc/jam vascon 3cc/jam epineprin drip 2cc/jam, terpasang NGT no.8 tgl 19/4/25, Terpasang DC no.6 tanggal 19/4/2025, pasien sdh terintubasi dari igd dgn ett nmr 4 bb 12cm mode press ac total rate 30 p insp 18 peep 6 I:E 1:3 Fi02 100 Úta penunjang radiologi ro thorax pre dan post intubasi tgl 19/4/2025. cek gds jam 08:30 hasil 38 extra dex 10 persen 2cc/kgbb cek ulang jam 09.30 gds hasil 78.pada pukul 10:15 TD 52/36 sat 72 persen HR 48x/mnt dilakukan rjp 2 siklus pasien tdk respon TD tdk terukur nadi tdk teraba dilakukan rekam ekg asistole pasien dinyatakan meninggal dunia pikul 10.28 wib oleh dr.fauzia di hadapan klrga dan perawat', 'Gangguan Ventilasi spontan, gangguan sirkulasi spontan,Bersihan Jalan Napas Tidak Efektif, Gangguan Integritas Kulit/Jaringan tidak teratasi', 'perawatan jenazah', '', '', '', '', '', '', '', '', '1617', '1', 'perawatan jenazah', NULL, '1617', 0, NULL, '2025-04-20 11:28:37')
ERROR - 2025-04-20 11:29:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:29:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 11:29:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:29:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 11:38:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (845926, 729807, null, 10, keluhan -, kes cm , usg +, djj +, hb 4 bag 10.1, G2P1A0 hamil 37 minggu ec partus prematurus imminens, anemia, BLPL , , 767, 1, &lt;p&gt;BLPLÂ &lt;/p&gt;&lt;p&gt;kontrol poli RSUD KOTA TANGERANGÂ &lt;/p&gt;&lt;p&gt;therapy..., null, null, 767, 2025-04-20 11:38:15, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:38:15 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (845926, 729807, null, 10, keluhan -, kes cm , usg +, djj +, hb 4 bag 10.1, G2P1A0 hamil 37 minggu ec partus prematurus imminens, anemia, BLPL , , 767, 1, <p>BLPLÂ </p><p>kontrol poli RSUD KOTA TANGERANGÂ </p><p>therapy..., null, null, 767, 2025-04-20 11:38:15, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('729807', NULL, '10', 'keluhan -', 'kes cm , usg +, djj +, hb 4 bag 10.1', 'G2P1A0 hamil 37 minggu ec partus prematurus imminens, anemia', 'BLPL ', '', '', '', '', '', '', '', '', '767', '1', '<p>BLPLÂ </p><p>kontrol poli RSUD KOTA TANGERANGÂ </p><p>therapy kala 1x1</p><p>nifedipin 3x10</p><p>sf 1x1</p>', NULL, '767', 0, NULL, '2025-04-20 11:38:15')
ERROR - 2025-04-20 11:46:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:46:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 11:46:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:46:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 11:47:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:47:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 11:53:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 11:58:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:58:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 11:59:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:59:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 11:59:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 11:59:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 12:12:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 12:37:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 12:37:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 12:39:39 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 12:52:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 12:52:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 12:53:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 12:53:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 12:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 12:57:12 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-20 12:57:12 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-04-20 12:57:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-04-20 13:01:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:01:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 13:01:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:01:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 13:01:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:01:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 13:07:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:07:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 13:07:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:07:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 13:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 13:10:23 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 13:10:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-20 13:23:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (829436, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:23:19 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (829436, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (829436, '1', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-20 13:27:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 13:29:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 13:29:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 13:29:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 13:29:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 13:33:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 13:37:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-20 13:45:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:45:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-20 13:45:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:45:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-20 13:47:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:47:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 13:47:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6006765, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:47:53 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6006765, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6006765, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-04-20 13:48:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:48:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 13:51:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-20 13:52:49 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 13:53:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 13:53:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 13:58:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 13:58:32 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('728926', '2025-04-20 13:44', '8', '', '', '', '', '', '', '', '', 'belum bab sejak 4 hari yll', '
cm TD : 146/88 mmHg Nadi : 82 x/mnt Suhu 36.5 : C RR : 20 x/mnt Spo2 : 100 «domen: bu + supel', '
Closed fracture of the left tibial plateau Closed fracture of the right distal radius', 'lapor dr rheza SpOT', '1880', '1', 'sudah konfirmasi ulang dr Rheza SpOT', NULL, '1880', '1', NULL, '2025-04-20 13:58:32')
ERROR - 2025-04-20 14:12:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 14:12:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 14:12:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 14:17:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 14:18:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 14:21:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 14:31:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 5: AND &quot;NO_KEC&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:31:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 5: AND "NO_KEC" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = '71'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-20 14:31:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id_layanan_pendaftaran&quot; = ''
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:31:33 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id_layanan_pendaftaran" = ''
                                         ^ - Invalid query: SELECT *
FROM "sm_order_laboratorium"
WHERE "id_layanan_pendaftaran" = ''
AND "status" != 'batal'
ERROR - 2025-04-20 14:31:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id_layanan_pendaftaran&quot; = ''
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:31:53 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id_layanan_pendaftaran" = ''
                                         ^ - Invalid query: SELECT *
FROM "sm_order_laboratorium"
WHERE "id_layanan_pendaftaran" = ''
AND "status" != 'batal'
ERROR - 2025-04-20 14:32:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id_layanan_pendaftaran&quot; = ''
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:32:20 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id_layanan_pendaftaran" = ''
                                         ^ - Invalid query: SELECT *
FROM "sm_order_laboratorium"
WHERE "id_layanan_pendaftaran" = ''
AND "status" != 'batal'
ERROR - 2025-04-20 14:35:38 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 14:35:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:35:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 14:35:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:35:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 14:36:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:36:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 14:36:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:36:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 14:44:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 14:45:34 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 14:49:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (829452, '5', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:49:01 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (829452, '5', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (829452, '5', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-20 14:51:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 14:51:53 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 14:53:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 14:54:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 14:55:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:55:33 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-20 14:55:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 14:55:33 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-04-20 14:57:21 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 15:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 15:04:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:04:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:05:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:05:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:05:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 15:05:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:05:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:05:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:05:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:05:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:05:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:06:09 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:06:09 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:06:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:06:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:06:45 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:06:45 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:07:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:07:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:07:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:07:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:07:48 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:07:48 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:07:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:07:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:08:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:08:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:08:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:08:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:08:55 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:08:55 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:09:02 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-04-20 15:09:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-04-20 15:09:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 15:10:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (829462, '8', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:10:53 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (829462, '8', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (829462, '8', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-20 15:11:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:11:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:12:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:12:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:12:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:12:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:12:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:12:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:12:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 15:12:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 15:22:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 15:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 15:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 15:35:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 15:47:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 16:02:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (829479, '3', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:02:37 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (829479, '3', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (829479, '3', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-20 16:06:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 16:20:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:20:58 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '662586'
AND "lp"."id_pendaftaran" = '662586'
ORDER BY "lp"."id" ASC
ERROR - 2025-04-20 16:21:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:21:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:23:31 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 16:26:17 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 16:26:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:26:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:26:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:26:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:26:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:26:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:26:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6007196, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:26:58 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6007196, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6007196, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-04-20 16:27:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:27:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:27:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:27:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:27:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:27:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:29:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:29:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:29:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:29:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:30:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 16:30:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 16:50:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 17:16:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 17:16:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 17:16:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6007269, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 17:16:25 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6007269, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6007269, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 17:16:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 17:16:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 17:20:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 17:28:32 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 17:47:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 18:04:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:04:16 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('729764', '2025-04-20 17:16', '8', '', '', '', '', '', '', '', '', 'kondisi pasien makin menurun, nafas gasping', 'ku : dpo berat
td : 110/64 mmhg, hr : 140 x/menit, S : 39,1 c, rr : 19 x/menit, sp02 : 95 Þngan venti fio2 60%', 'tetanus berat', 'lapor kondisi pasien sebelum rujuk ke dr. Angel, Sp. A', '1885', '1', '<p>sudah konfirmasi ulang ke dr. Angel, Sp. A</p><p>advice :</p><p>kondisi pasien tidak transportable > pasien batal rujuk</p><p>Cek agd ulang dan elektrolit</p><p>Kultur darah</p><p>Setelah ambil darah</p><p>Inj meropenem 650mg/8jam diberikan selama 1jam</p><p>kie keluarga bahwa pasien mengalami perburukan kondisi</p>', NULL, '1885', '1', NULL, '2025-04-20 18:04:16')
ERROR - 2025-04-20 18:04:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:04:23 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('729764', '2025-04-20 17:16', '8', '', '', '', '', '', '', '', '', 'kondisi pasien makin menurun, nafas gasping', 'ku : dpo berat
td : 110/64 mmhg, hr : 140 x/menit, S : 39,1 c, rr : 19 x/menit, sp02 : 95 Þngan venti fio2 60%', 'tetanus berat', 'lapor kondisi pasien sebelum rujuk ke dr. Angel, Sp. A', '1885', '1', '<p>sudah konfirmasi ulang ke dr. Angel, Sp. A</p><p>advice :</p><p>kondisi pasien tidak transportable > pasien batal rujuk</p><p>Cek agd ulang dan elektrolit</p><p>Kultur darah</p><p>Setelah ambil darah</p><p>Inj meropenem 650mg/8jam diberikan selama 1jam</p><p>kie keluarga bahwa pasien mengalami perburukan kondisi</p>', NULL, '1885', '1', NULL, '2025-04-20 18:04:23')
ERROR - 2025-04-20 18:04:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:04:31 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('729764', '2025-04-20 17:16', '8', '', '', '', '', '', '', '', '', 'kondisi pasien makin menurun, nafas gasping', 'ku : dpo berat
td : 110/64 mmhg, hr : 140 x/menit, S : 39,1 c, rr : 19 x/menit, sp02 : 95 Þngan venti fio2 60 persen', 'tetanus berat', 'lapor kondisi pasien sebelum rujuk ke dr. Angel, Sp. A', '1885', '1', '<p>sudah konfirmasi ulang ke dr. Angel, Sp. A</p><p>advice :</p><p>kondisi pasien tidak transportable > pasien batal rujuk</p><p>Cek agd ulang dan elektrolit</p><p>Kultur darah</p><p>Setelah ambil darah</p><p>Inj meropenem 650mg/8jam diberikan selama 1jam</p><p>kie keluarga bahwa pasien mengalami perburukan kondisi</p>', NULL, '1885', '1', NULL, '2025-04-20 18:04:31')
ERROR - 2025-04-20 18:11:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;0.9&quot;
LINE 1: ... '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:11:44 --> Query error: ERROR:  invalid input syntax for type smallint: "0.9"
LINE 1: ... '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('670453', '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NULL, '21.9', '45', '3', NULL, NULL, NULL, '48', '-26.1', NULL, '100%', NULL, 'CM', 'P', '+', 'ASI', '18:00', '274', '2025-04-20 18:10:23')
ERROR - 2025-04-20 18:12:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;0.9&quot;
LINE 1: ... '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:12:00 --> Query error: ERROR:  invalid input syntax for type smallint: "0.9"
LINE 1: ... '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('670453', '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NULL, '21.9', '45', '3', NULL, NULL, NULL, '48', '-26.1', NULL, '100%', NULL, 'CM', 'P', '+', 'ASI', '18:00', '274', '2025-04-20 18:10:23')
ERROR - 2025-04-20 18:12:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;0.9&quot;
LINE 1: ... '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:12:07 --> Query error: ERROR:  invalid input syntax for type smallint: "0.9"
LINE 1: ... '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('670453', '730022', '1686', '2025-04-20', '20', NULL, '1', '0.9', NULL, '21.9', '45', '3', NULL, NULL, NULL, '48', '-26.1', NULL, '100%', NULL, 'CM', 'P', '+', 'ASI', '18:00', '274', '2025-04-20 18:10:23')
ERROR - 2025-04-20 18:23:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (829499, '6', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:23:35 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (829499, '6', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (829499, '6', '2', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-04-20 18:28:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:28:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 18:28:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:28:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 18:28:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:28:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 18:29:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:29:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 18:30:16 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 18:32:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:32:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 18:32:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 18:34:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:34:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 18:36:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:36:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 18:36:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:36:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 18:41:07 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 18:55:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-04-20 18:59:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 5: AND &quot;NO_KEC&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 18:59:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 5: AND "NO_KEC" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = '71'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-04-20 19:07:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 19:09:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-04-20 19:10:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:10:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 19:10:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:10:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 19:41:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:41:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 19:41:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:41:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 19:41:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6007650, '1373', 8280, '10', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:41:33 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6007650, '1373', 8280, '10', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6007650, '1373', 8280, '10', '1.00', 'Ya', 'null')
ERROR - 2025-04-20 19:41:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:41:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 19:42:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:42:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 19:42:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:42:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 19:52:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 19:52:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 19:52:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 19:52:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 19:57:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:57:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 19:57:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6007738, '887', 1272, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:57:39 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6007738, '887', 1272, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6007738, '887', 1272, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 19:57:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 19:57:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 20:09:06 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 20:10:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 20:10:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 20:11:04 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 20:15:30 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 20:20:49 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 20:20:54 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 20:42:14 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 20:56:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 20:56:50 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-20 20:56:50 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-04-20 21:10:35 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 21:16:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:16:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:16:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6007825, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:16:33 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6007825, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6007825, '123', 2386.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 21:18:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:18:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:18:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6007832, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:18:22 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6007832, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6007832, '123', 2386.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 21:18:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:18:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:20:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ... '-', &quot;pm_keadaan_1&quot; = '-', &quot;pm_waktu_partus_2&quot; = '', &quot;pm_te...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:20:03 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ... '-', "pm_keadaan_1" = '-', "pm_waktu_partus_2" = '', "pm_te...
                                                             ^ - Invalid query: UPDATE "sm_maternal_igd" SET "id_layanan_pendaftaran" = '730668', "pm_waktu_kajian" = '2025-04-19 20:23', "pm_diperoleh" = '1', "pm_diperoleh_sebutkan" = NULL, "pm_cara_masuk" = '1', "pm_keluhan_utama" = 'psien mengatakan mules sampai pinggang sejak siang, keluar darah banyak 3x ganti pembalut sejak jam 09.30. ', "pm_kontraksi" = '1', "pm_waktu_kontraksi" = '2025-04-19 09:30', "pm_lendir" = NULL, "pm_waktu_lendir" = NULL, "pm_ketuban" = NULL, "pm_waktu_ketuban" = NULL, "pm_warna_ketuban" = NULL, "pm_darah" = '1', "pm_darah_sebutkan" = '09.30', "pm_lainnya" = NULL, "pm_lainnya_sebutkan" = NULL, "pm_hamil_muda" = NULL, "pm_hamil_muda_muntah" = NULL, "pm_hamil_muda_pendarahan" = NULL, "pm_hamil_muda_lain" = '1', "pm_hamil_muda_sebutkan" = NULL, "pm_hamil_tua" = NULL, "pm_hamil_tua_kepala" = NULL, "pm_hamil_tua_pendarahan" = NULL, "pm_hamil_tua_lain" = '1', "pm_hamil_tua_sebutkan" = NULL, "pm_anc_x" = NULL, "pm_anc_lokasi" = NULL, "pm_anc" = NULL, "pm_anc_tidak_teratur" = NULL, "pm_anc_imunisasi" = NULL, "pm_nifas_g" = '1', "pm_nifas_p" = '0', "pm_nifas_a" = '1', "pm_nifas_hidup" = '0', "pm_waktu_partus_1" = '2021-01-01', "pm_tempat_partus_1" = '-', "pm_umur_hamil_1" = '5-6minggu', "pm_jenis_persalinan_1" = 'abortus komplit, tidak kuret', "pm_penolong_persalinan_1" = '-', "pm_penyulit_1" = '-', "pm_nifas_1" = '-', "pm_kelamin_1" = '-', "pm_keadaan_1" = '-', "pm_waktu_partus_2" = '', "pm_tempat_partus_2" = NULL, "pm_umur_hamil_2" = NULL, "pm_jenis_persalinan_2" = NULL, "pm_penolong_persalinan_2" = NULL, "pm_penyulit_2" = NULL, "pm_nifas_2" = NULL, "pm_kelamin_2" = NULL, "pm_keadaan_2" = NULL, "pm_waktu_partus_3" = NULL, "pm_tempat_partus_3" = NULL, "pm_umur_hamil_3" = NULL, "pm_jenis_persalinan_3" = NULL, "pm_penolong_persalinan_3" = NULL, "pm_penyulit_3" = NULL, "pm_nifas_3" = NULL, "pm_kelamin_3" = NULL, "pm_keadaan_3" = NULL, "pm_waktu_partus_4" = NULL, "pm_tempat_partus_4" = NULL, "pm_umur_hamil_4" = NULL, "pm_jenis_persalinan_4" = NULL, "pm_penolong_persalinan_4" = NULL, "pm_penyulit_4" = NULL, "pm_nifas_4" = NULL, "pm_kelamin_4" = NULL, "pm_keadaan_4" = NULL, "pm_waktu_partus_5" = NULL, "pm_tempat_partus_5" = NULL, "pm_umur_hamil_5" = NULL, "pm_jenis_persalinan_5" = NULL, "pm_penolong_persalinan_5" = NULL, "pm_penyulit_5" = NULL, "pm_nifas_5" = NULL, "pm_kelamin_5" = NULL, "pm_keadaan_5" = NULL, "pm_waktu_partus_6" = NULL, "pm_tempat_partus_6" = NULL, "pm_umur_hamil_6" = NULL, "pm_jenis_persalinan_6" = NULL, "pm_penolong_persalinan_6" = NULL, "pm_penyulit_6" = NULL, "pm_nifas_6" = NULL, "pm_kelamin_6" = NULL, "pm_keadaan_6" = NULL, "pm_umur_menarche" = '1', "pm_umur_menarche_sebutkan" = '12', "pm_lama_haid" = '7', "pm_pembalut" = '2', "pm_dismenorroe" = '1', "pm_spoting" = NULL, "pm_menorrhagia" = NULL, "pmm_metrorhagia" = NULL, "pm_menstrual" = NULL, "pm_hpht" = '8-03-2025', "pm_taksiran" = NULL, "pm_asma" = NULL, "pm_hipertensi" = '1', "pm_jantung" = NULL, "pm_diabetes" = NULL, "pm_penyakit_lain" = NULL, "pm_penyakit_lain_sebutkan" = NULL, "pm_kesadaran" = '1', "pm_sistolik" = '156', "pm_suhu_sistolik" = '36.5', "pm_diastolik" = '100', "pm_cgs_e" = '4', "pm_cgs_m" = '6', "pm_cgs_v" = '5', "pm_cgs_total" = '15', "pm_spo2" = '100', "pm_frekuensi_nadi" = '99', "pm_frekuensi_nafas" = '20', "pm_membesar" = NULL, "pm_melebar" = NULL, "pm_pelebaran" = NULL, "pm_linea_alba" = NULL, "pm_linea_nigra" = NULL, "pm_striae_livide" = NULL, "pm_striae_albican" = NULL, "pm_luka" = NULL, "pm_luka_lain" = '1', "pm_luka_lain_sebutkan" = 'tidak ada', "pm_tfu" = '-', "pm_leopold_1" = NULL, "pm_leopold_bokong" = NULL, "pm_leopold_lain" = NULL, "pm_leopold_1_sebutkan" = NULL, "pm_leopold_2" = NULL, "pm_leopold_punggung" = NULL, "pm_leopold_lainn" = NULL, "pm_leopold_2_sebutkan" = NULL, "pm_leopold_3" = NULL, "pm_leopold_bokonggg" = NULL, "pm_leopold_lainnn" = NULL, "pm_leopold_3_sebutkan" = NULL, "pm_leopold_4" = NULL, "pm_leopold_bokongggg" = NULL, "pm_janin_masuk" = '-', "pm_taksiran_janin" = NULL, "pm_djj_x" = NULL, "pm_djj" = NULL, "pm_gerak_janin" = NULL, "pm_his_x" = NULL, "pm_his_detik" = NULL, "pm_his_kekuatan" = '-', "pm_vulva" = '1', "pm_vulva_sebutkan" = NULL, "pm_pengeluaran_lendir" = NULL, "pm_pengeluaran_ketuban" = NULL, "pm_pengeluaran_ketuban_warna" = NULL, "pm_pengeluaran_flex" = NULL, "pm_pengeluaran_darah" = '1', "pm_pengeluaran_darah_sebanyak" = 'flek', "pm_pengeluaran_lain" = NULL, "pm_pengeluaran_lain_sebutkan" = NULL, "pm_introitus" = '2', "pm_introitus_sebutkan" = 'tidak dilakukan', "pm_porsio" = NULL, "pm_porsio_sebutkan" = NULL, "pm_pembukaan" = '-', "pm_pembukaan_ketuban" = NULL, "pm_pembukaan_ketuban_warna" = NULL, "pm_hodge" = '-', "pm_uuk" = '-', "pm_moulage" = '-', "pm_nyeri_porsio" = NULL, "pm_jatuh" = '0', "pm_diagnosis" = '0', "pm_kursi_roda" = NULL, "pm_kursi_roda_ya" = NULL, "pm_kruk" = NULL, "pm_kruk_ya" = NULL, "pm_pegangan" = '1', "pm_pegangan_ya" = '30', "pm_heparin" = NULL, "pm_imobilisasi" = NULL, "pm_imobilisasi_ya" = NULL, "pm_lemah" = '1', "pm_lemah_ya" = '10', "pm_terganggu" = NULL, "pm_terganggu_ya" = NULL, "pm_kemampuan" = '1', "pm_kemampuan_ya" = '0', "pm_lupa" = NULL, "pm_lupa_ya" = NULL, "pm_jumlah_skor" = '40', "pm_skala_nyeri" = '4', "pm_kualitas_nyeri" = 'sedang', "pm_frekuensi_nyeri" = '2x', "pm_pemberat_nyeri" = 'aktivitas', "pm_lama_nyeri" = '15"', "pm_pengurang_nyeri" = 'istirahat', "pm_alergi" = '1', "pm_alergi_obat" = NULL, "pm_alergi_obat_reaksi" = NULL, "pm_alergi_makan" = NULL, "pm_alergi_makan_reaksi" = NULL, "pm_alergi_lain" = NULL, "pm_alergi_lain_reaksi" = NULL, "pm_alergi_obat_konsumsi" = NULL, "pm_berat_badan" = '1', "pm_berat_badan_kg" = NULL, "pm_berat_badan_sebutkan" = NULL, "pm_berat_badan_t" = NULL, "pm_fungsional" = '1', "pm_fungsional_sebutkan" = NULL, "pm_psikologis" = '1', "pm_psikologis_sebutkan" = NULL, "pm_mental" = '1', "pm_mental_sebutkan" = NULL, "pm_pekerjaan" = '1', "pm_bayar" = '2', "pm_bayar_asuransi_sebutkan" = NULL, "pm_bayar_sebutkan" = NULL, "pm_bayar_t" = NULL, "pm_keagamaan" = 'sholat', "pm_ibadah" = '1', "pm_ibadah_sebutkan" = NULL, "pm_thaharoh" = '1', "pm_sholat" = '1', "pm_banyak_makan" = '3', "pm_waktu_makan" = '17:00', "pm_banyak_minum" = '5', "pm_waktu_minum" = '17:00', "pm_banyak_bak" = '7', "pm_waktu_bak" = '18:30', "pm_banyak_bab" = '1', "pm_waktu_bab" = '18:30', "pm_sex" = 'seminggu lalu', "sews_respirasit" = '0_2', "sews_saturasit" = NULL, "sews_o2t" = NULL, "sews_suhut" = NULL, "sews_td_sintolikt" = NULL, "sews_td_diastolikt" = NULL, "sews_nadit" = NULL, "sews_kesadarant" = NULL, "sews_nyerit" = NULL, "sews_pengeluwarant" = NULL, "sews_proteint" = NULL, "pm_meows" = 'Putih', "sews_laju_respirasio" = '0_3', "sews_saturasio" = '0_4', "sews_suplemeno" = '0_2', "sews_temperaturo" = '0_3', "sews_tdso" = '1_4', "sews_laju_jantungo" = '0_2', "sews_kesadarano" = '0_1', "pm_news" = 'Hijau', "pm_tanggal_lab" = '19/04/2025', "pm_hasil_lab" = 'menunggu hasil', "pm_tanggal_cgt" = NULL, "pm_hasil_cgt" = NULL, "pm_penunjang_lain" = NULL, "pm_infeksi" = NULL, "pm_pendarahan" = '1', "pm_nausea" = NULL, "pm_gawat_jalan" = NULL, "pm_anxietas" = '1', "pm_nyeri_melahirkan" = NULL, "pm_pola_nafas" = NULL, "pm_kebutuhan_lain" = NULL, "pm_kebutuhan_sebutkan" = NULL, "pm_asuhan_jelaskan" = '1', "pm_asuhan_laporkan" = '1', "pm_asuhan_fasilitas" = '1', "pm_asuhan_masalah" = '1', "pm_asuhan_observasi" = NULL, "pm_asuhan_edukasi" = '1', "pm_asuhan_lain" = NULL, "pm_asuhan_sebutkan" = NULL, "pm_waktu_bidan" = '2025-04-19 20:31', "pm_waktu_dpjp" = '2025-04-19 20:31', "pm_bidan" = '615', "pm_dpjp" = '50', "pm_paraf_bidan" = '1', "pm_paraf_dpjp" = '1', "updated_date" = '2025-04-20 21:20:02'
WHERE "id" = '11859'
ERROR - 2025-04-20 21:27:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:27:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:27:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6007858, '420', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:27:07 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6007858, '420', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6007858, '420', 8858.4, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 21:27:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:27:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:27:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:27:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:31:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:31:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:31:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:31:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:51:25 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 21:53:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:53:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:57:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:57:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:57:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6008003, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:57:06 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6008003, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6008003, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 21:57:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:57:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:59:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:59:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 21:59:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6008021, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:59:26 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6008021, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6008021, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-04-20 21:59:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 21:59:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:02:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:02:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:02:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:02:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:02:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6008053, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:02:40 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6008053, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6008053, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-04-20 22:02:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:02:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:02:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:02:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:03:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:03:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:03:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6008071, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:03:26 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6008071, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6008071, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-04-20 22:03:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 22:03:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 22:03:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 22:03:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-04-20 22:03:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:03:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:03:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:03:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:04:57 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 22:05:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:05:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:05:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:05:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:11:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 22:15:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:15:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:16:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:16:54 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-04-20 22:17:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:17:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:22:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:22:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:22:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6008235, '922', 1017.648, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:22:38 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6008235, '922', 1017.648, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6008235, '922', 1017.648, '1', '2.00', NULL, 'null')
ERROR - 2025-04-20 22:22:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:22:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:23:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:23:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:23:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:23:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:23:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:23:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:23:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:23:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:23:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:23:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:23:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:23:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:24:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:24:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:33:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:33:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:33:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:33:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:37:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:37:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:39:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:39:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:39:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 22:39:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 22:52:44 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 22:56:10 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 23:17:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:17:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:17:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (6008320, '554', 5280.048, '1000', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:17:57 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (6008320, '554', 5280.048, '1000', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6008320, '554', 5280.048, '1000', '1.00', 'Ya', 'null')
ERROR - 2025-04-20 23:18:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:18:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:18:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:18:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:18:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:18:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:19:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:19:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:20:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:20:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:21:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:21:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:22:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6008365, '405', 418.8, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:22:02 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6008365, '405', 418.8, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6008365, '405', 418.8, '1', '2.00', NULL, 'null')
ERROR - 2025-04-20 23:22:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:22:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:22:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:22:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-04-20 23:28:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (6008383, '3583', 273060, '2.5', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:28:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (6008383, '3583', 273060, '2.5', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6008383, '3583', 273060, '2.5', '2.00', 'Ya', 'null')
ERROR - 2025-04-20 23:34:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:34:32 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-04-20 23:35:26 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-04-20 23:48:37 --> 404 Page Not Found --> /index
ERROR - 2025-04-20 23:58:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ...yanan_pendaftaran&quot; = '730747', &quot;id_pendaftaran&quot; = '', &quot;id_us...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-04-20 23:58:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ...yanan_pendaftaran" = '730747', "id_pendaftaran" = '', "id_us...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_kebidanan_dan_kandungan" SET "id_layanan_pendaftaran" = '730747', "id_pendaftaran" = '', "id_users" = '1355', "waktu_kajian_kebidanan" = '2025-04-20 23:44', "cara_tiba" = '{"cara_tiba_diruangan_pasien":"KursiRoda"}', "rujukan" = '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":"lain-lain","rujukan_pasienl":null}', "informasi" = '{"informasi_pasien":"Keluarga","informasi_pasienn":null}', "keluhan_utama_keb" = '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":null}', "rks_hamil_muda" = '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":null}', "rks_hamil_tua" = '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":null}', "rks_anc" = '{"anc_1":"-","anc_2":"-","anc_3":null,"anc_4":null,"anc_5":null}', "rks_g" = '-', "rks_p" = '6', "rks_a" = '0', "rks_usia_kehamilan" = '-', "rks_hpht" = '-', "rks_tp" = '-', "rk_riwayat_menstruasi" = '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"11","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"2","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', "rk_riwayat_perkawinan" = '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"11","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', "rk_riwayat_penyakit_operasi" = '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"1","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"1","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', "rk_obat_dikosumsi" = NULL, "rk_membawa_obat_dari_luar" = '{"membawa_obat_1":"0"}', "rk_terapi_komplementari" = '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":null}', "rk_riwayat_penyakit_kluwarga" = '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":null}', "rk_riwayat_kluwarga_berencana" = '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":"1","riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":"8","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', "rk_riwayat_ginekologi" = '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":null}', "rk_riwayat_alergi" = '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', "rk_riwayat_tranfusi_darah" = '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":"1","riwayat_tranfusi_darah_5":null}', "rk_kebiasaan" = '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', "rk_status_psikologi" = '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', "rk_status_mental" = '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', "rk_kebutuhan_biologis" = '{"kebutuhan_biologis_1":"3x","kebutuhan_biologis_2":"23:00","kebutuhan_biologis_3":"3-6","kebutuhan_biologis_4":"23:00","kebutuhan_biologis_5":"3-4","kebutuhan_biologis_6":"23:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"5:00","kebutuhan_biologis_9":"1minggu"}', "rk_kebutuhan_sosial" = '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', "rk_status_ekonomi" = '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', "rk_status_nilai_kepercayaan" = '{"status_nn_kepercayaan_1":"1","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"1","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":null}', "rk_spiritual" = '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', "rk_budaya" = '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', "ikbe_kewarganegaraan" = '1', "ikbe_suku_bangsa" = NULL, "ikbe_bicara" = '0', "ikbe_jelaskan" = NULL, "ikbe_perlu_peterjemah" = '0', "ikbe_bahasa" = NULL, "ikbe_bahasa_isyarat" = '0', "ikbe_pemahaman_penyakit" = '1', "ikbe_pemahaman_pengobatan" = '1', "ikbe_pemahaman_nutrisi" = '1', "ikbe_pemahaman_spiritual" = '1', "ikbe_pemahaman_peralatan" = '0', "ikbe_pemahaman_rahab" = '0', "ikbe_pemahaman_manajemen" = '1', "hambatan_keb" = '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', "pkdk_inpeksi_abdomen" = '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":"1","infeksi_abdomen_10":null}', "pkdk_palpasi" = '{"palpasi_1":"2jari dibawah pusat","palpasi_2":null,"palpasi_3":null,"palpasi_4":"1","palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":"1","palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":"1","palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', "pkdk_auskultasi" = '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', "pkdk_gerak_janin" = '-', "pkdk_his_kontraksi" = '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', "pkdk_pemeriksaan_dalam" = '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":"1","pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":"1","pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', "pkf_makan" = '10', "pkf_mandi" = '0', "pkf_personal" = '5', "pkf_berpakaian" = '5', "pkf_buang_besar" = '10', "pkf_buang_kecil" = '10', "pkf_berpindah" = '10', "pkf_toileting" = '5', "pkf_mobilitas" = '10', "pkf_naik" = '10', "pkf_jumlah_skor" = '75', "sn_penurunan_bb_kebidanan" = '1', "sn_penurunan_bb_on_kebidanan" = NULL, "sn_asupan_makan_kebidanan" = '0', "sn_total_kebidanan" = '0', "ptn_nilai_tingkat_nyeri" = '{"keterangan_kebidanan_1":"Berat"}', "ptn_nyeri_hilang" = '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', "prjd_riwayat_jatuh" = NULL, "prjd_diagnosis" = '15', "prjd_kursi_roda" = NULL, "prjd_kruk_tongkat" = NULL, "prjd_berpegangan" = '30', "prjd_terpasang_infus" = '20', "prjd_normal" = NULL, "prjd_lemah" = '10', "prjd_terganggu" = NULL, "prjd_sadar" = '0', "prjd_sering" = NULL, "prjd_jumlah_skor" = '75', "spak_usia" = '0', "spak_nafas" = '0', "spak_sepsis" = '0', "spak_multiple" = '0', "spak_studium" = '0', "pftv_kesadaran" = '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', "pftv_gsc_e" = '4', "pftv_gsc_m" = '6', "pftv_gsc_v" = '5', "pftv_total" = '15', "pftv_tekanan_darah" = '{"tekanan_darah_1":"121","tekanan_darah_2":"87","tekanan_darah_3":"36.6"}', "pftv_frekuensi_nadi" = '{"frekuensi_nadi_1":"87","frekuensi_nadi_2":"21"}', "pftv_berat_badan" = '{"berat_badan_1":null,"berat_badan_2":null}', "pftv_mata" = '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', "pftv_dada_aksila" = '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', "pftv_ekstremitas" = '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', "pftv_sistem_pernafasan" = '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', "pftv_sistem_kardiovaskuler" = '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":null,"sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', "sews_respirasi" = '0_2', "sews_saturasi_1" = '0_3', "sews_o2" = '0_2', "sews_suhu" = '0_2', "sews_td_sistolik" = '0_2', "sews_td_diastolik" = '0_1', "sews_nadi" = '0_3', "sews_kesadaran_1" = '0_1', "sews_nyeri" = '0_1', "sews_pengeluaran" = NULL, "sews_protein_urin" = NULL, "sews_total_1" = 'Putih', "sews_laju_respirasi" = NULL, "sews_saturasi_2" = NULL, "sews_suplemen" = NULL, "sews_temperatur" = NULL, "sews_tds" = NULL, "sews_laju_jantung" = NULL, "sews_kesadaran_2" = '1', "sews_total_2" = NULL, "dp_pemeriksaan_lab_tanggal" = '2025-04-20', "dp_pemeriksaan_ctg_tanggal" = NULL, "dp_hasil" = 'terlampir', "dp_hasil1" = NULL, "dp_lain_lain" = NULL, "pk_penyakit_menular" = '{"pk_penyakit_menular_1":null,"pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', "pk_penurunan_daya_tahan_tubuh" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', "pk_pasien_kekerasan_penganiayaan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"1"}', "pk_pasien_ketergantungan_obat" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "ak_infeksi" = NULL, "ak_anxeitas" = NULL, "ak_perdarahan" = NULL, "ak_melahirkan" = '1', "ak_nausea" = NULL, "ak_efektif" = NULL, "ak_janin" = NULL, "ak_lain" = NULL, "ak_lainl" = NULL, "rak_kluwarga" = '1', "rak_selanjutnya" = '1', "rak_consent" = NULL, "rak_kebutuhan" = '1', "rak_persalinan" = NULL, "rak_pasien" = '1', "rak_lain" = NULL, "rak_lainl" = NULL, "kriteria_discharge_planing" = '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"1"}', "perencanaa_pulang" = '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":"1","kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":"1","kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":"1","kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', "tanggal_jam_bidan" = '2025-04-21 06:00:00', "id_bidan" = '295', "ttd_bidan" = '1', "tanggal_jam_dokter_keb" = '2025-04-21 06:52:00', "id_dokter" = '50', "ttd_dokter" = '1', "updated_date" = '2025-04-20 23:58:23'
WHERE "id" = '2852'
