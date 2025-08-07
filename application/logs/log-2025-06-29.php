<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-29 00:02:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 00:59:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 01:25:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 02:13:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 02:22:29 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11555
ERROR - 2025-06-29 02:22:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...2', '2025-06-29', '8', '1', '174', '1', '1', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 02:22:59 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...2', '2025-06-29', '8', '1', '174', '1', '1', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('716327', '775892', '2025-06-29', '8', '1', '174', '1', '1', '1', '', '2', '2', '1', '2025-06-29 02:19:53', '1558')
ERROR - 2025-06-29 02:23:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...2', '2025-06-29', '8', '1', '174', '1', '1', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 02:23:26 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...2', '2025-06-29', '8', '1', '174', '1', '1', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('716327', '775892', '2025-06-29', '8', '1', '174', '1', '1', '1', '', '2', '2', '1', '2025-06-29 02:19:53', '1558')
ERROR - 2025-06-29 05:16:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 06:36:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:03:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:04:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:09:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:21:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 18: AND &quot;b&quot;.&quot;id&quot; = 'undefined'
                        ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 07:21:54 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
AND "lp"."tanggal_layanan" BETWEEN '2025-06-29 00:00:00' AND '2025-06-29 23:59:59'
AND "lp"."id" IS NULL
AND "lp"."jenis_layanan" in ('Rawat Inap')
AND  ("pd"."tanggal_keluar" is NULL OR "lp"."tindak_lanjut" = 'cco sementara' ) 
AND "b"."id" = 'undefined'
ORDER BY "lp"."id" DESC, "lp"."tanggal_layanan" DESC
 LIMIT 10
ERROR - 2025-06-29 07:23:22 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 07:23:22 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 07:23:22 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 07:23:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 07:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:37:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:39:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:45:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:46:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 07:46:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-29 07:47:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 07:47:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 07:47:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 07:53:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-06-29 06:00&quot;
LINE 1: ...elp&quot;, &quot;konsul&quot;, &quot;created_date&quot;) VALUES ('775896', '25-06-29 ...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 07:53:14 --> Query error: ERROR:  date/time field value out of range: "25-06-29 06:00"
LINE 1: ...elp", "konsul", "created_date") VALUES ('775896', '25-06-29 ...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('775896', '25-06-29 06:00', '18', 'Pasien mengatakan demam naik turun, mual, napsu makan berkurang, sakit kepala seperti di tusuk - tusuk', 'Kesadaran cm, EWS 3 (H) akral hangat, nadi kuat, mukosa lembab, makan habis 1/4 porsi, TD: 102/73mmHg, N: 104x/mnt S: 37,5''C RR:20x/mnt Spo2:98% IVFD: RL 1500cc per 24 jam (29/6/25) HB: 15,9 HT:48 Leu:2,7 Trom:170', 'Hipertermi, nausea', '', '', '', '', '', '', '', '', '', '1624', '1', 'Cek ur cr gds besok 30/6/25<div>Cek darah rutin 2 hari lagi tgl 1/7/25</div>', NULL, '1624', 0, NULL, '2025-06-29 07:53:14')
ERROR - 2025-06-29 07:53:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-06-29 06:00&quot;
LINE 1: ...elp&quot;, &quot;konsul&quot;, &quot;created_date&quot;) VALUES ('775896', '25-06-29 ...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 07:53:22 --> Query error: ERROR:  date/time field value out of range: "25-06-29 06:00"
LINE 1: ...elp", "konsul", "created_date") VALUES ('775896', '25-06-29 ...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('775896', '25-06-29 06:00', '18', 'Pasien mengatakan demam naik turun, mual, napsu makan berkurang, sakit kepala seperti di tusuk - tusuk', 'Kesadaran cm, EWS 3 (H) akral hangat, nadi kuat, mukosa lembab, makan habis 1/4 porsi, TD: 102/73mmHg, N: 104x/mnt S: 37,5''C RR:20x/mnt Spo2:98% IVFD: RL 1500cc per 24 jam (29/6/25) HB: 15,9 HT:48 Leu:2,7 Trom:170', 'Hipertermi, nausea', '', '', '', '', '', '', '', '', '', '1624', '1', 'Cek ur cr gds besok 30/6/25<div>Cek darah rutin 2 hari lagi tgl 1/7/25</div>', NULL, '1624', 0, NULL, '2025-06-29 07:53:22')
ERROR - 2025-06-29 07:53:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-06-29 06:00&quot;
LINE 1: ...elp&quot;, &quot;konsul&quot;, &quot;created_date&quot;) VALUES ('775896', '25-06-29 ...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 07:53:39 --> Query error: ERROR:  date/time field value out of range: "25-06-29 06:00"
LINE 1: ...elp", "konsul", "created_date") VALUES ('775896', '25-06-29 ...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('775896', '25-06-29 06:00', '18', 'Pasien mengatakan demam naik turun, mual, napsu makan berkurang, sakit kepala seperti di tusuk - tusuk', 'Kesadaran cm, EWS 3 (H) akral hangat, nadi kuat, mukosa lembab, makan habis 1/4 porsi, TD: 102/73mmHg, N: 104x/mnt S: 37,5''C RR:20x/mnt Spo2:98% IVFD: RL 1500cc per 24 jam (29/6/25) HB: 15,9 HT:48 Leu:2,7 Trom:170', 'Hipertermi, nausea', '', '', '', '', '', '', '', '', '', '1624', '1', 'Cek ur cr gds besok 30/6/25<div>Cek darah rutin 2 hari lagi tgl 1/7/25</div>', NULL, '1624', 0, NULL, '2025-06-29 07:53:39')
ERROR - 2025-06-29 07:54:01 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-29 07:59:19 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 17437
ERROR - 2025-06-29 08:03:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 08:09:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 08:39:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 08:39:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 08:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 08:56:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 08:57:19 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-29 08:57:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-29 08:57:26 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-29 08:57:26 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-29 08:59:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 09:02:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:02:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:13:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 09:20:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 09:22:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:22:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:22:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:22:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:24:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:24:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:24:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:24:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:25:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:25:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:26:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:26:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:26:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:26:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:28:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 09:31:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:31:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:35:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:35:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:36:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:36:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:36:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:36:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:36:30 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-29 09:36:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-29 09:36:32 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 09:36:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 09:36:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:36:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 09:37:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 09:37:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 02:37:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 02:37:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 02:41:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 02:41:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 09:42:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 09:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 02:58:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 02:58:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:02:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 10:02:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 10:09:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 10:11:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 10:27:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 10:27:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 10:27:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 10:27:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 10:27:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 10:27:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 10:35:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 10:36:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 10:43:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 10:43:34 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('775889', '2025-06-29 11:28', '18', 'Pasien mengatakan  sesak nafas masih dirasakan, sesak memberat saat batuk, batuk berdahak masih terasa, masih sulit beraltivitas, aktivitas dibantu keluarga', 'Kesadaran composmentis GCS 15 E4M6V5 EWS Hijau (4) akral hangat, nadi teraba kuat, Pasien tampak batuk - batuk. Pasien tampak sesak juga, TD:  mmhg, N: x/mnt, R: 20x/mnt. S: 36.C, Sat: 97Þngan 3 lpm, Hasil radiologi pada tanggal 28/6/2025 Thorax Dewasa Pa/Ap sedang di expertisi di radiologi, Hasil pemeriksaan laboratorium pada tanggal 28/6/25 hb: 13.4 hema: 38 tromb: 170 erit: 4.13 hema: 38 nat: 139 kal: 3.9 ur: 58 cr: 1.4 gds : 191, riwayat alergi antalgin', 'Bersihan jalan nafas tidak efektif, Intoleransi aktifitas', 'setelah dilakukan asuhan keperawatan selama 2x24 jam di harapkan Bersihan jalan napas meningkat dengan kriteria hasil Batuk efektif meningkat, Produksi sputum menurun ,Frekuensi napas membaik, Pola napas membaik. setelah dilakukan tindakan asuhan keperawatan selama 3 x 24 jam diharapkan Toleransi Aktivitas Meningkat dengan kriteria hasil Kemudahan dalam melakukan aktivitas sehari-hari meningkat ,Keluhan lelah menurun,Dispnea saat beraktivitas menurun


', '', '', '', '', '', '', '', '', '1991', '1', '<p><b>Rencana Keperawatan :</b></p><p><b>- Cek GDS per hari </b></p><p><b>- Nebu : Ventolin pulmicort 2x, Combivent 2x</b></p><p>PP Sore</p><p>Monitor pola napas Monitr bunyi napas ,Pertahankan kepatenan jalan napas, Posisikan semi-fowler atau fowler, Berikan minuman hangat,Lakukan penghisapan lendir kurang dari 15 detik (bila perlu), Berikan oksigen, jika perlu, Ajarkan tehnik batuk efektif, Kolaborasi pemberian bronkhodilator, ekspectoran, mukolitik</p><p>Identifikasi gangguan fungsi tubuh yang mengakibatkan kelelahan,Monitor kelelahan fisik dan emosional.Monitor pola dan jam tidur,Monitor lokasi dan ketidaknyamanan selama melakukan aktivitas, Sediakan lingkungan nyaman dan rendah stimulus,Lakukan latihan rentang gerak pasif dan atau akti,Berikan aktivitas distraksi yang menenangkan,Fasilitasi duduk di sisi tempat tidur, jika tidak dapat berpindah atau berjalan Anjurkan tirah baring,Anjurkan melakukan aktivitas secara bertahap,Anjurkan menghubungi perawat jika tanda dan gejala kelelahan tidak berkurang</p><p>PP Malam</p><p>Monitor pola napas Monitr bunyi napas ,Pertahankan kepatenan jalan napas, Posisikan semi-fowler atau fowler, Berikan minuman hangat,Lakukan penghisapan lendir kurang dari 15 detik (bila perlu), Berikan oksigen, jika perlu, Ajarkan tehnik batuk efektif, Kolaborasi pemberian bronkhodilator, ekspectoran, mukolitik</p><p>Identifikasi gangguan fungsi tubuh yang mengakibatkan kelelahan,Monitor kelelahan fisik dan emosional.Monitor pola dan jam tidur,Monitor lokasi dan ketidaknyamanan selama melakukan aktivitas, Sediakan lingkungan nyaman dan rendah stimulus,Lakukan latihan rentang gerak pasif dan atau akti,Berikan aktivitas distraksi yang menenangkan,Fasilitasi duduk di sisi tempat tidur, jika tidak dapat berpindah atau berjalan Anjurkan tirah baring,Anjurkan melakukan aktivitas secara bertahap,Anjurkan menghubungi perawat jika tanda dan gejala kelelahan tidak berkurang</p><p><div></div></p>', NULL, '1991', 0, NULL, '2025-06-29 10:43:34')
ERROR - 2025-06-29 10:44:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 10:54:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 11:09:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 11:10:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:10:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 11:14:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 11:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 11:18:55 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8024
ERROR - 2025-06-29 11:19:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 11:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 11:29:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:29:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 11:31:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:31:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 11:31:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:31:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 11:32:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:32:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 11:35:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:35:07 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-29 11:35:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:35:07 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-29 11:35:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:35:07 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-29 11:47:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 04:55:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 04:55:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:56:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND &quot;tanggal_kunjungan&quot; = ''
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 11:56:02 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND "tanggal_kunjungan" = ''
                                  ^ - Invalid query: SELECT max(urutan) as urutan
FROM "sm_antrian_bpjs"
WHERE "usia_pasien" = 'Asuransi'
AND "tanggal_kunjungan" = ''
ERROR - 2025-06-29 12:00:05 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-06-29 12:00:05 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-06-29 12:00:14 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-06-29 12:00:14 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-06-29 12:00:20 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-06-29 12:00:20 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-06-29 12:01:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(57342) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 12:01:21 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(57342) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '57342'
ERROR - 2025-06-29 12:01:51 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-06-29 12:01:51 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-06-29 12:02:02 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-06-29 12:02:02 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-06-29 12:03:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 12:06:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16363
ERROR - 2025-06-29 05:13:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 05:13:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 12:13:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (877885, '4', '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 12:13:26 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (877885, '4', '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (877885, '4', '3', '', '', '', 'null', '0', '', '0', '', 'ASAM MEFENAMAT 3X500 MG', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 05:14:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 05:14:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 05:14:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 05:14:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 12:17:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 12:20:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 12:27:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 12:27:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 12:27:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 12:27:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 12:27:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 12:30:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 12:31:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 12:31:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-29 12:31:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 12:31:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-29 12:32:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 12:36:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 12:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 12:53:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 13:03:46 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-29 13:03:50 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-29 13:04:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:08:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 13:08:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 13:08:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 13:08:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 13:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 13:13:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 13:13:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 13:15:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 13:15:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 13:23:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 13:38:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:39:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:39:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 13:39:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 13:39:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:42:47 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2641
ERROR - 2025-06-29 13:42:47 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2643
ERROR - 2025-06-29 06:42:48 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2875
ERROR - 2025-06-29 06:42:48 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2876
ERROR - 2025-06-29 06:42:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(55) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 06:42:48 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(55) is not present in table "sm_jadwal_dokter". - Invalid query: UPDATE "sm_surat_kontrol" SET "tanggal" = '2025-07-08', "id_spesialisasi" = '11', "updated_date" = '2025-06-29 13:42:47', "id_dokter_asal" = NULL, "id_dokter_tujuan" = NULL, "id_jadwal_dokter" = '55'
WHERE "id" = '324769'
ERROR - 2025-06-29 13:42:51 --> Severity: Notice  --> Trying to get property 'id_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2641
ERROR - 2025-06-29 13:42:51 --> Severity: Notice  --> Trying to get property 'kode_bpjs' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2643
ERROR - 2025-06-29 06:42:51 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2875
ERROR - 2025-06-29 06:42:51 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2876
ERROR - 2025-06-29 06:42:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_surat_kontrol&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(55) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 06:42:51 --> Query error: ERROR:  insert or update on table "sm_surat_kontrol" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(55) is not present in table "sm_jadwal_dokter". - Invalid query: UPDATE "sm_surat_kontrol" SET "tanggal" = '2025-07-08', "id_spesialisasi" = '11', "updated_date" = '2025-06-29 13:42:51', "id_dokter_asal" = NULL, "id_dokter_tujuan" = NULL, "id_jadwal_dokter" = '55'
WHERE "id" = '324769'
ERROR - 2025-06-29 13:42:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 13:42:58 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_jadwal_dokter"
WHERE "id" = ''
ERROR - 2025-06-29 13:45:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:45:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 13:46:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:49:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:52:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:53:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 13:53:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 14:05:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 14:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 14:11:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 14:12:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 14:24:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 14:24:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 14:26:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-29 14:26:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-29 14:29:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 14:29:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 14:33:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (877919, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 14:33:36 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (877919, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (877919, '3', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 14:36:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (877921, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 14:36:00 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (877921, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (877921, '2', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 14:39:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 14:43:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 14:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (877925, '1', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 14:45:09 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (877925, '1', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (877925, '1', '', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 14:48:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 14:55:35 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1949
ERROR - 2025-06-29 14:55:35 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1962
ERROR - 2025-06-29 14:55:35 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1975
ERROR - 2025-06-29 08:00:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 08:00:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 08:00:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 08:00:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 08:01:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 08:01:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 08:01:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 08:01:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:02:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 15:02:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 15:02:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6501401, '922', 1017.648, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 15:02:15 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6501401, '922', 1017.648, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6501401, '922', 1017.648, '1', '2.00', NULL, 'null')
ERROR - 2025-06-29 15:02:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 15:02:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 15:04:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 15:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 15:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 15:25:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1949
ERROR - 2025-06-29 15:25:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1962
ERROR - 2025-06-29 15:25:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1975
ERROR - 2025-06-29 15:26:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Form_rekam_medis' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 15:43:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('877930', '2', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 15:43:49 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('877930', '2', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('877930', '2', '', '1', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 09:14:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 09:14:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 09:14:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 09:14:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 16:15:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 09:23:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 09:23:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 16:23:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 16:23:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 16:28:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 09:29:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 09:29:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 09:29:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 09:29:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 16:35:21 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:21 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:21 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:21 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 16:35:21 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('775932', '2025-06-29 16:35:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 16:35:25 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:25 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:25 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:25 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 16:35:25 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('775932', '2025-06-29 16:35:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 16:35:36 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:36 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:36 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:36 --> Severity: Notice  --> Array to string conversion /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/DB_driver.php 1476
ERROR - 2025-06-29 16:35:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;,&quot;
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 16:35:36 --> Query error: ERROR:  syntax error at or near ","
LINE 1: ...L, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, A...
                                                             ^ - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar", "alergi") VALUES ('775932', '2025-06-29 16:35:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, Array, Array, Array, Array, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 16:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 16:38:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6501718, '60', 130.8, '1', '4.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 16:38:31 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6501718, '60', 130.8, '1', '4.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6501718, '60', 130.8, '1', '4.00', NULL, 'null')
ERROR - 2025-06-29 16:42:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 16:47:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6501727, '60', 130.8, '1', '4.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 16:47:21 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6501727, '60', 130.8, '1', '4.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6501727, '60', 130.8, '1', '4.00', NULL, 'null')
ERROR - 2025-06-29 16:51:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 16:54:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 16:54:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 17:00:35 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 10:03:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:03:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 17:12:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 17:15:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 17:19:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-06-29 17:19:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-06-29 17:19:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 17:25:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 17:26:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 10:36:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:36:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:36:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:36:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:37:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:37:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:37:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:37:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:37:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:37:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:37:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:37:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:38:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:38:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 17:44:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 17:51:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 17:51:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 17:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6501876, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 17:51:34 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6501876, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6501876, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-06-29 17:53:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 17:54:22 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-29 10:59:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 10:59:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 18:10:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:10:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:11:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:11:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:11:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:11:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:11:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:11:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:11:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:11:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:11:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6501913, '2495', 18648, '12', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:11:37 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6501913, '2495', 18648, '12', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6501913, '2495', 18648, '12', '1.00', 'Ya', 'null')
ERROR - 2025-06-29 18:12:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:12:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:12:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:12:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:12:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:12:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:12:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 18:12:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 18:17:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 11:28:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:28:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:28:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:28:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:28:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:28:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:45:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:45:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:45:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 11:45:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 18:47:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-29 19:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 19:18:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11555
ERROR - 2025-06-29 19:20:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 19:20:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 19:20:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('877967', '9', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 19:20:12 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('877967', '9', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('877967', '9', '', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', 'intrakonazole 2 x 1 tablet', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-29 19:20:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 19:20:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 19:24:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 19:28:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6502053, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 19:28:21 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6502053, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6502053, '123', 2386.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-29 19:40:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 19:40:08 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-29 19:40:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 19:40:08 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-29 19:42:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6502112, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 19:42:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6502112, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6502112, '689', 8287.2, '0.9', '1.00', 'Ya', 'null')
ERROR - 2025-06-29 19:46:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 19:46:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-29 19:46:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-29 19:57:19 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-29 19:57:21 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-29 20:06:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6502146, '3744', 8991, '1', '3.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 20:06:17 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6502146, '3744', 8991, '1', '3.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6502146, '3744', 8991, '1', '3.00', NULL, 'null')
ERROR - 2025-06-29 20:15:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11862
ERROR - 2025-06-29 20:16:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 20:56:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 20:56:55 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '775946', "waktu" = '2025-06-29 20:56:55', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = NULL, "anamnesa_sosial" = NULL, "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = NULL, "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = NULL, "prognosis" = NULL, "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = NULL, "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = NULL, "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = NULL, "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = NULL, "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = 'OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari', "o_soap" = 'kes E3V1M5
TD 154/81
Hr 117 iregular
RR 26
S 37
Spo 92% room air -> 97 dg 3 lpm

Kepala: Ca -/- , si -/-
Leher : jvp 5
Th: SDV +/+, Rh +/+, Wh -/-, retraksi (-)
Cor: S1 S2 ireguler, murmur +, gallop -
Abd: BU +, supel, nte -, 
Ekstremitas: akral hangat, crt &lt; 2 detik

Status neurologis:
kaku kuduk (-)
Pupil bulat isokor rc+/+
Parese cn 7 kesan negatif
Lateralisasi motorik kanan (+)
R. patologis babinski +/-

Motorik 2222/4444
               2222/4444
', "a_soap" = 'CVD SNH + HT emergensi + Atrial Fibrilasi + DMT2 tidak terkontrol + Riw. pemasangan pace maker jantung + susp. aspirasi pneumonia
', "p_soap" = 'Terapi RS Cinta Kasih
O2 nk 3 lpm
IVFD NaCl 0,9  jam/kolf
Inj citicolin 1000 mg
Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama
titrasi naik per 15 menit, Target TDS 170
Stop Simarc
pasang kateter', "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '775946'
ERROR - 2025-06-29 20:57:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 20:57:19 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '775946', "waktu" = '2025-06-29 20:57:19', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = NULL, "anamnesa_sosial" = NULL, "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = NULL, "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = NULL, "prognosis" = NULL, "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = NULL, "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = NULL, "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = NULL, "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = NULL, "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = 'OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari', "o_soap" = 'kes E3V1M5
TD 154/81
Hr 117 iregular
RR 26
S 37
Spo 92 persen room air -> 97 dg 3 lpm

Kepala: Ca -/- , si -/-
Leher : jvp 5
Th: SDV +/+, Rh +/+, Wh -/-, retraksi (-)
Cor: S1 S2 ireguler, murmur +, gallop -
Abd: BU +, supel, nte -, 
Ekstremitas: akral hangat, crt &lt; 2 detik

Status neurologis:
kaku kuduk (-)
Pupil bulat isokor rc+/+
Parese cn 7 kesan negatif
Lateralisasi motorik kanan (+)
R. patologis babinski +/-

Motorik 2222/4444
               2222/4444
', "a_soap" = 'CVD SNH + HT emergensi + Atrial Fibrilasi + DMT2 tidak terkontrol + Riw. pemasangan pace maker jantung + susp. aspirasi pneumonia
', "p_soap" = 'Terapi RS Cinta Kasih
O2 nk 3 lpm
IVFD NaCl 0,9  jam/kolf
Inj citicolin 1000 mg
Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama
titrasi naik per 15 menit, Target TDS 170
Stop Simarc
pasang kateter', "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '775946'
ERROR - 2025-06-29 20:57:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 20:57:48 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '775946', "waktu" = '2025-06-29 20:57:48', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = NULL, "anamnesa_sosial" = NULL, "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = NULL, "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = NULL, "prognosis" = NULL, "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = NULL, "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = NULL, "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = NULL, "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = NULL, "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = 'OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari', "o_soap" = NULL, "a_soap" = 'CVD SNH + HT emergensi + Atrial Fibrilasi + DMT2 tidak terkontrol + Riw. pemasangan pace maker jantung + susp. aspirasi pneumonia
', "p_soap" = 'Terapi RS Cinta Kasih
O2 nk 3 lpm
IVFD NaCl 0,9  jam/kolf
Inj citicolin 1000 mg
Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama
titrasi naik per 15 menit, Target TDS 170
Stop Simarc
pasang kateter', "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL, "alergi" = NULL
WHERE "id_layanan_pendaftaran" = '775946'
ERROR - 2025-06-29 13:59:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 13:59:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 13:59:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 13:59:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 21:01:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:01:06 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: UPDATE "sm_kajian_medis_igd" SET "id_layanan_pendaftaran" = '775946', "keluhan_utama" = 'penurunan kesadaran', "riwayat_penyakit_sekarang" = 'OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari', "riwayat_penyakit_dahulu" = '{"asma":"","diabetes_miletus":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', "riwayat_penyakit_keluarga" = '{"asma":"","diabetes_miletus":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', "riwayat_detail" = '', "alergi" = NULL, "ket_alergi" = '', "ket_reaksi_alergi" = '', "neonatus" = '{"menangis":"","spo":"","vital":"","wajah":"","tidur":"","total":""}', "ket_nyeri" = 'Berat', "ket_nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "flacc_wajah" = NULL, "flacc_kaki" = NULL, "flacc_aktifitas" = NULL, "flacc_menangis" = NULL, "flacc_bicara" = NULL, "flacc_total" = NULL, "fisik_kepala" = 'normocephal, jejas -, hematom -, ', "fisik_mata" = 'ca -/-', "fisik_mulut" = 'mukosa kering', "fisik_leher" = 'kgb tidak t eraba', "fisik_thoraks_cor" = 'bsing -', "fisik_thoraks_pulmo" = 'ves +/+ rh -/-', "fisik_abdomen" = 'supel', "fisik_ekstermitas" = 'akral hangat', "fisik_kulit_kelamin" = 'tak', "fisik_note_anathomi" = '', "fisik_status_lokalis" = '', "diagnosa_awal" = 'CVD SNH', "diagnosa_banding" = '', "penunjang_lab" = '{"dpl":"","agd":"","elektrolit":"","urin":"","ck":"","gds":"","ureum":"","lain":"","ket_lain":""}', "penunjang_xray" = '{"tidak_ada":"","thorax":"","abdomen":"","ctscan":"","lain":"","ket_lain":""}', "penunjang_ekg" = '{"ekg":"","ket_ekg":""}', "terapi_tindakan" = 'O2 nk 3 lpm<div>IVFD NaCl 0,9  jam/kolf</div><div>Inj citicolin 1000 mg</div><div>Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama</div><div>titrasi naik per 15 menit, Target TDS 170</div><div>Stop Simarc</div><div>pasang kateter</div><div><br></div>', "id_bangsal" = NULL, "kontrol" = NULL, "ket_kontrol" = '', "dirujuk_ke" = '', "alasan_rujuk" = '', "alasan_pulang_paksa" = '', "meninggal" = 0, "kondisi_saat_pulang" = '', "kesadaran" = '{"cm":"","apatis":"","delirium":"","sopor":"","koma":""}', "gcs_e" = '', "gcs_m" = '', "gcs_v" = '', "catatan_khusus" = '', "id_dokter_igd" = '365', "id_dokter_dpjp" = NULL, "signature_dokter_igd" = '1', "signature_dokter_dpjp" = NULL, "updated_date" = '2025-06-29 21:01:06'
WHERE "id" = '50866'
ERROR - 2025-06-29 21:01:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:01:10 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: UPDATE "sm_kajian_medis_igd" SET "id_layanan_pendaftaran" = '775946', "keluhan_utama" = 'penurunan kesadaran', "riwayat_penyakit_sekarang" = 'OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari', "riwayat_penyakit_dahulu" = '{"asma":"","diabetes_miletus":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', "riwayat_penyakit_keluarga" = '{"asma":"","diabetes_miletus":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', "riwayat_detail" = '', "alergi" = NULL, "ket_alergi" = '', "ket_reaksi_alergi" = '', "neonatus" = '{"menangis":"","spo":"","vital":"","wajah":"","tidur":"","total":""}', "ket_nyeri" = 'Berat', "ket_nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "flacc_wajah" = NULL, "flacc_kaki" = NULL, "flacc_aktifitas" = NULL, "flacc_menangis" = NULL, "flacc_bicara" = NULL, "flacc_total" = NULL, "fisik_kepala" = 'normocephal, jejas -, hematom -, ', "fisik_mata" = 'ca -/-', "fisik_mulut" = 'mukosa kering', "fisik_leher" = 'kgb tidak t eraba', "fisik_thoraks_cor" = 'bsing -', "fisik_thoraks_pulmo" = 'ves +/+ rh -/-', "fisik_abdomen" = 'supel', "fisik_ekstermitas" = 'akral hangat', "fisik_kulit_kelamin" = 'tak', "fisik_note_anathomi" = '', "fisik_status_lokalis" = '', "diagnosa_awal" = 'CVD SNH', "diagnosa_banding" = '', "penunjang_lab" = '{"dpl":"","agd":"","elektrolit":"","urin":"","ck":"","gds":"","ureum":"","lain":"","ket_lain":""}', "penunjang_xray" = '{"tidak_ada":"","thorax":"","abdomen":"","ctscan":"","lain":"","ket_lain":""}', "penunjang_ekg" = '{"ekg":"","ket_ekg":""}', "terapi_tindakan" = 'O2 nk 3 lpm<div>IVFD NaCl 0,9  jam/kolf</div><div>Inj citicolin 1000 mg</div><div>Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama</div><div>titrasi naik per 15 menit, Target TDS 170</div><div>Stop Simarc</div><div>pasang kateter</div><div><br></div>', "id_bangsal" = NULL, "kontrol" = NULL, "ket_kontrol" = '', "dirujuk_ke" = '', "alasan_rujuk" = '', "alasan_pulang_paksa" = '', "meninggal" = 0, "kondisi_saat_pulang" = '', "kesadaran" = '{"cm":"","apatis":"","delirium":"","sopor":"","koma":""}', "gcs_e" = '', "gcs_m" = '', "gcs_v" = '', "catatan_khusus" = '', "id_dokter_igd" = '365', "id_dokter_dpjp" = NULL, "signature_dokter_igd" = '1', "signature_dokter_dpjp" = NULL, "updated_date" = '2025-06-29 21:01:10'
WHERE "id" = '50866'
ERROR - 2025-06-29 21:01:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:01:19 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: UPDATE "sm_kajian_medis_igd" SET "id_layanan_pendaftaran" = '775946', "keluhan_utama" = 'penurunan kesadaran', "riwayat_penyakit_sekarang" = 'OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari', "riwayat_penyakit_dahulu" = '{"asma":"","diabetes_miletus":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', "riwayat_penyakit_keluarga" = '{"asma":"","diabetes_miletus":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', "riwayat_detail" = '', "alergi" = NULL, "ket_alergi" = '', "ket_reaksi_alergi" = '', "neonatus" = '{"menangis":"","spo":"","vital":"","wajah":"","tidur":"","total":""}', "ket_nyeri" = 'Berat', "ket_nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "flacc_wajah" = NULL, "flacc_kaki" = NULL, "flacc_aktifitas" = NULL, "flacc_menangis" = NULL, "flacc_bicara" = NULL, "flacc_total" = NULL, "fisik_kepala" = 'normocephal, jejas -, hematom -, ', "fisik_mata" = 'ca -/-', "fisik_mulut" = 'mukosa kering', "fisik_leher" = 'kgb tidak t eraba', "fisik_thoraks_cor" = 'bsing -', "fisik_thoraks_pulmo" = 'ves +/+ rh -/-', "fisik_abdomen" = 'supel', "fisik_ekstermitas" = 'akral hangat', "fisik_kulit_kelamin" = 'tak', "fisik_note_anathomi" = '', "fisik_status_lokalis" = '', "diagnosa_awal" = 'CVD SNH', "diagnosa_banding" = '', "penunjang_lab" = '{"dpl":"","agd":"","elektrolit":"","urin":"","ck":"","gds":"","ureum":"","lain":"1","ket_lain":""}', "penunjang_xray" = '{"tidak_ada":"","thorax":"","abdomen":"","ctscan":"","lain":"1","ket_lain":""}', "penunjang_ekg" = '{"ekg":"1","ket_ekg":""}', "terapi_tindakan" = 'O2 nk 3 lpm<div>IVFD NaCl 0,9  jam/kolf</div><div>Inj citicolin 1000 mg</div><div>Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama</div><div>titrasi naik per 15 menit, Target TDS 170</div><div>Stop Simarc</div><div>pasang kateter</div><div><br></div>', "id_bangsal" = NULL, "kontrol" = NULL, "ket_kontrol" = '', "dirujuk_ke" = '', "alasan_rujuk" = '', "alasan_pulang_paksa" = '', "meninggal" = 0, "kondisi_saat_pulang" = '', "kesadaran" = '{"cm":"","apatis":"","delirium":"","sopor":"","koma":""}', "gcs_e" = '', "gcs_m" = '', "gcs_v" = '', "catatan_khusus" = '', "id_dokter_igd" = '365', "id_dokter_dpjp" = NULL, "signature_dokter_igd" = '1', "signature_dokter_dpjp" = NULL, "updated_date" = '2025-06-29 21:01:19'
WHERE "id" = '50866'
ERROR - 2025-06-29 21:03:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:03:47 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: UPDATE "sm_kajian_medis_igd" SET "id_layanan_pendaftaran" = '775946', "keluhan_utama" = 'penurunan kesadaran', "riwayat_penyakit_sekarang" = ' OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari
', "riwayat_penyakit_dahulu" = '{"asma":"","diabetes_miletus":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', "riwayat_penyakit_keluarga" = '{"asma":"","diabetes_miletus":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', "riwayat_detail" = '', "alergi" = NULL, "ket_alergi" = '', "ket_reaksi_alergi" = '', "neonatus" = '{"menangis":"","spo":"","vital":"","wajah":"","tidur":"","total":""}', "ket_nyeri" = 'Berat', "ket_nyeri_hilang" = '{"minum_obat":"1","mendengarkan_musik":"","istirahat":"","berubah_posisi":"","lain":"","ket_lain":""}', "flacc_wajah" = NULL, "flacc_kaki" = NULL, "flacc_aktifitas" = NULL, "flacc_menangis" = NULL, "flacc_bicara" = NULL, "flacc_total" = NULL, "fisik_kepala" = 'normocephal', "fisik_mata" = 'ca -/-', "fisik_mulut" = 'mukosa kering', "fisik_leher" = 'kgb tidak teraba', "fisik_thoraks_cor" = 'bsing -', "fisik_thoraks_pulmo" = 'ves +/+ rh -/-', "fisik_abdomen" = 'supel', "fisik_ekstermitas" = 'akral hangaty, lateralisasi kanan', "fisik_kulit_kelamin" = 'tak', "fisik_note_anathomi" = '', "fisik_status_lokalis" = '', "diagnosa_awal" = 'CVD SNH', "diagnosa_banding" = '', "penunjang_lab" = '{"dpl":"","agd":"","elektrolit":"","urin":"","ck":"","gds":"","ureum":"","lain":"1","ket_lain":""}', "penunjang_xray" = '{"tidak_ada":"","thorax":"","abdomen":"","ctscan":"","lain":"1","ket_lain":""}', "penunjang_ekg" = '{"ekg":"1","ket_ekg":""}', "terapi_tindakan" = 'O2 nk 3 lpm<div>IVFD NaCl 0,9  jam/kolf</div><div>Inj citicolin 1000 mg</div><div>Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama</div><div>titrasi naik per 15 menit, Target TDS 170</div><div>Stop Simarc</div><div>pasang kateter</div><div><br></div>', "id_bangsal" = NULL, "kontrol" = NULL, "ket_kontrol" = '', "dirujuk_ke" = '', "alasan_rujuk" = '', "alasan_pulang_paksa" = '', "meninggal" = 0, "kondisi_saat_pulang" = '', "kesadaran" = '{"cm":"","apatis":"","delirium":"","sopor":"","koma":""}', "gcs_e" = '', "gcs_m" = '', "gcs_v" = '', "catatan_khusus" = '', "id_dokter_igd" = '365', "id_dokter_dpjp" = NULL, "signature_dokter_igd" = '1', "signature_dokter_dpjp" = NULL, "updated_date" = '2025-06-29 21:03:47'
WHERE "id" = '50866'
ERROR - 2025-06-29 21:04:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (6502200, '548', 1463.868, '200', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:04:58 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (6502200, '548', 1463.868, '200', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6502200, '548', 1463.868, '200', '10.00', 'Ya', 'null')
ERROR - 2025-06-29 14:11:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 14:11:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 14:11:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 14:11:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 14:11:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 14:11:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 21:11:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...at_menerima_malam&quot;, &quot;id_users&quot;) VALUES ('775902', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:11:55 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...at_menerima_malam", "id_users") VALUES ('775902', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('775902', '', NULL, '2025-06-29 21:14:00', 'Ansietas ', 'vf', 'R/ operasi besok senin ', '211', '403', '1605')
ERROR - 2025-06-29 14:11:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 14:11:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 21:12:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...at_menerima_malam&quot;, &quot;id_users&quot;) VALUES ('775940', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:12:52 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...at_menerima_malam", "id_users") VALUES ('775940', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('775940', '', NULL, '2025-06-30 07:30:00', 'hipertermi, bersihan jalan napas tidak efektif', ' vemplon', 'oberservasi demam', '227', '224', '978')
ERROR - 2025-06-29 21:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:20:57 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('775946', '2025-06-29 21:19', '8', '', '', '', '', '', '', '', '', 'S/ OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari
', '
O/
kes E3M5Vafasia
TD 154/81
Hr 117 iregular
RR 26
S 37
Spo 92% room air -> 97 dg 3 lpm

Kepala: Ca -/- , si -/-
Leher : jvp 5
Th: SDV +/+, Rh +/+, Wh -/-, retraksi (-)
Cor: S1 S2 ireguler, murmur +, gallop -
Abd: BU +, supel, nte -, 
Ekstremitas: akral hangat, crt &lt; 2 detik

Status neurologis:
kaku kuduk (-)
Pupil bulat isokor rc+/+
Parese cn 7 kesan negatif
Lateralisasi motorik kanan (+)
R. patologis babinski +/-

Motorik 2222/4444
               2222/4444
', 'CVD SNH + HT emergensi + Atrial Fibrilasi + DMT2 tidak terkontrol + Riw. pemasangan pace maker jantung + susp. aspirasi pneumonia', '
P/ Terapi RS Cinta Kasih
O2 nk 3 lpm
IVFD NaCl 0,9  jam/kolf
Inj citicolin 1000 mg
Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama
titrasi naik per 15 menit, Target TDS 170
Stop Simarc
pasang kateter

Terapi igd RSUD kota tangerang
Ro thorax, CT Brain NK', '1257', '1', '<p>Konsul dan sudah konfirmasi dr Vinnie SpN</p><p>Citicolin 2x1000mg</p><p>Piracetam 2x1200mg</p><p>Mecobalamin 2x500mg</p><p>saran rujuk trombectomi</p>', NULL, '1257', '1', NULL, '2025-06-29 21:20:57')
ERROR - 2025-06-29 21:21:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x72 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:21:04 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x72 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('775946', '2025-06-29 21:19', '8', '', '', '', '', '', '', '', '', 'S/ OS rujukan RS Cinta Kasih untuk pemeriksaan penunjang CT Brain non kontras dan ronsen thorax, os penurunan kesadaran mendadak sejak jam 4 sore, ditemukan jatuh di toilet, tidak nyambung komunikasi, kelemahan anggota gerak kanan +, kesulitan menelan +, benturan kepala disangkal (-), 
demam -, batuk -, sesak +
muntah 2x, sempat diberi minum sedikit, 

Riw. HT + , DM on insulin, Jantung riw. pemasangan pacemaker (riwayat aritmia)
riwayat mitral stenosis dan sudah ganti katup
Riw. alergi obat sulfa (antibiotik)
RPO:
valsartan, levemir
Janovia
Teragam M
Antiplatelet simarc 5 mg setiap hari
', '
O/
kes E3M5Vafasia
TD 154/81
Hr 117 iregular
RR 26
S 37
Spo 92% room air -> 97 dg 3 lpm

Kepala: Ca -/- , si -/-
Leher : jvp 5
Th: SDV +/+, Rh +/+, Wh -/-, retraksi (-)
Cor: S1 S2 ireguler, murmur +, gallop -
Abd: BU +, supel, nte -, 
Ekstremitas: akral hangat, crt &lt; 2 detik

Status neurologis:
kaku kuduk (-)
Pupil bulat isokor rc+/+
Parese cn 7 kesan negatif
Lateralisasi motorik kanan (+)
R. patologis babinski +/-

Motorik 2222/4444
               2222/4444
', 'CVD SNH + HT emergensi + Atrial Fibrilasi + DMT2 tidak terkontrol + Riw. pemasangan pace maker jantung + susp. aspirasi pneumonia', '
P/ Terapi RS Cinta Kasih
O2 nk 3 lpm
IVFD NaCl 0,9  jam/kolf
Inj citicolin 1000 mg
Drip nicardipin 1 amp dalam 50 cc NaCl 0,9 % via syringe pump titrasi naik sesuai kenaikan TD sesuai algoritme ya,target turun TD 15Úri TDS awal satu jam pertama
titrasi naik per 15 menit, Target TDS 170
Stop Simarc
pasang kateter

Terapi igd RSUD kota tangerang
Ro thorax, CT Brain NK', '1257', '1', '<p>Konsul dan sudah konfirmasi dr Vinnie SpN</p><p>Citicolin 2x1000mg</p><p>Piracetam 2x1200mg</p><p>Mecobalamin 2x500mg</p><p>saran rujuk trombectomi</p>', NULL, '1257', '1', NULL, '2025-06-29 21:21:04')
ERROR - 2025-06-29 21:21:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...at_menerima_malam&quot;, &quot;id_users&quot;) VALUES ('774046', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:21:11 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...at_menerima_malam", "id_users") VALUES ('774046', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('774046', '', NULL, '2025-06-29 21:20:00', 'Gangguan ventilasi spontan, menyusui tidak efektif', 'D10 (156) + Nacl 3 persen (10) + KCL (2,5)+ ca gluconas (2,5): 3 cc/jam dan AA 6%: 3 cc/jam', 'Monitor TTV dan k/u, monitor intake output, observasi sianosis, Diet 10cc/3jam, post tranfusi albumin ke (2) 25% (10 cc) selesai jam jam 15:00, Rencana cek ulang Drah rutin ulang,CRP pemberian antibiotik ke7 tanggal (01_07-25) ,cek Tekan darah /shift.', '286', '409', '1610')
ERROR - 2025-06-29 21:21:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...at_menerima_malam&quot;, &quot;id_users&quot;) VALUES ('774046', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:21:17 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...at_menerima_malam", "id_users") VALUES ('774046', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('774046', '', NULL, '2025-06-29 21:20:00', 'Gangguan ventilasi spontan, menyusui tidak efektif', 'D10 (156) + Nacl 3 persen (10) + KCL (2,5)+ ca gluconas (2,5): 3 cc/jam dan AA 6%: 3 cc/jam', 'Monitor TTV dan k/u, monitor intake output, observasi sianosis, Diet 10cc/3jam, post tranfusi albumin ke (2) 25% (10 cc) selesai jam jam 15:00, Rencana cek ulang Drah rutin ulang,CRP pemberian antibiotik ke7 tanggal (01_07-25) ,cek Tekan darah /shift.', '286', '409', '1610')
ERROR - 2025-06-29 21:23:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 21:43:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 21:43:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 15:06:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:06:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:06:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:06:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:17:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:17:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:18:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:18:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:18:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 15:18:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 22:21:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-29 22:40:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 22:45:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 22:45:48 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1343008'),
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
			 
ERROR - 2025-06-29 22:49:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-29 22:55:13 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-29 22:55:13 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 573
ERROR - 2025-06-29 22:55:13 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 575
ERROR - 2025-06-29 23:07:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 23:07:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 23:07:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 23:07:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 23:09:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 23:09:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 23:10:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 23:10:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 23:10:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-29 23:10:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-29 17:59:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 17:59:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 23:52:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-29 23:52:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
