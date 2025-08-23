<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-08-19 13:56:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 13:56:33 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 13:56:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 13:56:33 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 13:56:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 13:56:40 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 13:56:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 13:56:40 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 13:56:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 13:56:48 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 13:56:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 13:56:48 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 14:17:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 14:17:27 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
AND  "p"."id" LIKE '%00102736' ESCAPE '!'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 14:23:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 14:23:32 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 14:23:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 14:23:32 --> Query error: ERROR:  syntax error at or near ","
LINE 1: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tang...
                                        ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*., pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 14:26:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;..&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 14:26:43 --> Query error: ERROR:  syntax error at or near ".."
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = '44'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 14:27:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;..&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 14:27:52 --> Query error: ERROR:  syntax error at or near ".."
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = '11'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 14:27:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;..&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 14:27:52 --> Query error: ERROR:  syntax error at or near ".."
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = '11'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 14:30:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;..&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 14:30:02 --> Query error: ERROR:  syntax error at or near ".."
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = '44'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-08-19 14:43:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;..&quot;
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-19 14:43:29 --> Query error: ERROR:  syntax error at or near ".."
LINE 1: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tang...
                                     ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp..*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk, pd.kode_booking, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-08-19 00:00:00' AND '2025-08-19 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = '44'
ORDER BY "lp"."id" DESC
 LIMIT 10
