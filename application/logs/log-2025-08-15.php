<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-08-15 11:16:52 --> Severity: Notice  --> Trying to get property 'id' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pendaftaran\models\Pendaftaran_model.php 453
ERROR - 2025-08-15 11:16:52 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\models\Pelayanan_model.php 10117
ERROR - 2025-08-15 11:16:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 4:                 where lp.id_pendaftaran = '' 
                                                  ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-15 11:16:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 4:                 where lp.id_pendaftaran = '' 
                                                  ^ - Invalid query: select lp.*, sp.id as id_spesialisasi, sp.nama as spesialisasi 
                from sm_layanan_pendaftaran as lp 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                where lp.id_pendaftaran = '' 
                order by lp.id desc 
ERROR - 2025-08-15 13:59:07 --> Severity: Notice  --> Trying to get property 'id' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pendaftaran\models\Pendaftaran_model.php 453
ERROR - 2025-08-15 13:59:07 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\models\Pelayanan_model.php 10117
ERROR - 2025-08-15 13:59:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 4:                 where lp.id_pendaftaran = '' 
                                                  ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-15 13:59:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 4:                 where lp.id_pendaftaran = '' 
                                                  ^ - Invalid query: select lp.*, sp.id as id_spesialisasi, sp.nama as spesialisasi 
                from sm_layanan_pendaftaran as lp 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                where lp.id_pendaftaran = '' 
                order by lp.id desc 
ERROR - 2025-08-15 15:20:11 --> Severity: Error  --> Maximum execution time of 120 seconds exceeded C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php 606
ERROR - 2025-08-15 15:20:11 --> Severity: Error  --> Maximum execution time of 120 seconds exceeded C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\libraries\Session\drivers\Session_files_driver.php 178
ERROR - 2025-08-15 15:20:11 --> Severity: Warning  --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2025-08-15 15:20:11 --> Severity: Warning  --> Unknown: Failed to write session data using user defined save handler. (session.save_path: C:\Users\HP\AppData\Local\Temp) Unknown 0
ERROR - 2025-08-15 15:20:11 --> Severity: Error  --> Maximum execution time of 120 seconds exceeded C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\libraries\Session\drivers\Session_files_driver.php 178
ERROR - 2025-08-15 15:20:11 --> Severity: Warning  --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2025-08-15 15:20:11 --> Severity: Warning  --> Unknown: Failed to write session data using user defined save handler. (session.save_path: C:\Users\HP\AppData\Local\Temp) Unknown 0
ERROR - 2025-08-15 15:20:11 --> Severity: Error  --> Maximum execution time of 120 seconds exceeded C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\libraries\Session\drivers\Session_files_driver.php 178
ERROR - 2025-08-15 15:20:11 --> Severity: Warning  --> Unknown: Cannot call session save handler in a recursive manner Unknown 0
ERROR - 2025-08-15 15:20:11 --> Severity: Warning  --> Unknown: Failed to write session data using user defined save handler. (session.save_path: C:\Users\HP\AppData\Local\Temp) Unknown 0
ERROR - 2025-08-15 15:20:11 --> Query error: server closed the connection unexpectedly
	This probably means the server terminated abnormally
	before or while processing the request. - Invalid query: SELECT CONCAT_WS('.', profil, type) AS avatar FROM sm_pegawai WHERE id = 1939
ERROR - 2025-08-15 15:20:11 --> Severity: Notice  --> Unknown: Cannot set connection to blocking mode Unknown 0
ERROR - 2025-08-15 15:20:12 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Network is unreachable (0x00002743/10051)
	Is the server running on host &quot;202.150.152.107&quot; and accepting
	TCP/IP connections on port 1094? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-15 15:20:12 --> Unable to connect to the database
ERROR - 2025-08-15 15:22:23 --> Severity: Warning  --> pg_query(): Query failed: server closed the connection unexpectedly
	This probably means the server terminated abnormally
	before or while processing the request. C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-15 15:22:23 --> Query error: server closed the connection unexpectedly
	This probably means the server terminated abnormally
	before or while processing the request. - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
ERROR - 2025-08-15 15:22:23 --> Severity: Notice  --> Unknown: Cannot set connection to blocking mode Unknown 0
ERROR - 2025-08-15 15:22:23 --> Query error: server closed the connection unexpectedly
	This probably means the server terminated abnormally
	before or while processing the request. - Invalid query: SELECT CONCAT_WS('.', profil, type) AS avatar FROM sm_pegawai WHERE id = 1939
ERROR - 2025-08-15 15:22:23 --> Severity: Notice  --> Unknown: Cannot set connection to blocking mode Unknown 0
ERROR - 2025-08-15 15:32:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pa...
                                                             ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-15 15:32:26 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pa...
                                                             ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-15 00:00:00' AND '2025-08-15 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-15 15:32:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pa...
                                                             ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-15 15:32:27 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pa...
                                                             ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-15 00:00:00' AND '2025-08-15 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-15 15:32:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pa...
                                                             ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-15 15:32:44 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pa...
                                                             ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar., pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
